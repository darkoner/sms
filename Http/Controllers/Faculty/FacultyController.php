<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Faculty\Faculty;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('faculty.add_faculty');
    }

    public function addNewFaculty(Request $request)
    {
        //getting data sent by angular
        $faculty_data = $request->faculty_data;

        //saving faculty details in user table
        $user_data = new User();
        $user_data->name = $faculty_data['name'];
        $user_data->email= $faculty_data['email'];
        $user_data->is_faculty = 1;
        $user_data->password =  bcrypt($faculty_data['mobile']);
        $user_data->save();

        $email = $user_data->email;

        $confirmation_code = Str::random(30);

        //User Confirmation Code change in db. Verified 0.
        $user_data->confirmation_code = $confirmation_code;
        $user_data->is_confirmed = 0;
        $user_data->save();

        //saving faculty data
        $faculty = new Faculty();
        $faculty->user_id = $user_data->id;
        $faculty->name = $faculty_data['name'];
        $faculty->email = $faculty_data['email'];
        $faculty->mobile = $faculty_data['mobile'];
        $faculty->address = $faculty_data['address'];
        $faculty->city = $faculty_data['city'];
        $faculty->state = $faculty_data['state'];
        $faculty->dob = Carbon::parse($faculty_data['dob'])->format('d-m-Y');
        $faculty->gender = $faculty_data['gender'];
        $faculty->marital_status = $faculty_data['mstatus'];
        $faculty->status = 'active';
        $faculty->about_us = 'NULL';
        $faculty->save();

        $data['confirmation_code'] = $confirmation_code;

        Mail::to($email)->queue(new VerifyEmail($data));
    }

    public function facultyListView()
    {
        return view('faculty.faculty');
    }
    public function facultyView()
    {
        $data = Faculty::all();

        return $data;
    }

    public function getProfileView()
    {
        return view('faculty.faculty_profile');
    }

    public function getProfileDetails(Request $request)
    {
        $user_id = $request->user_id;

        $data['auth_user'] = User::where('id', '=', $user_id)->first();
        $data['profile'] = Faculty::where('user_id', '=', $user_id)->first();
        $data['profile']->profile_pic = $data['auth_user']['profile_pic'];
        return $data;
    }

    public function updateProfileDetails(Request $request)
    {
        $user_id = $request->user_id;
        $profile = $request->data;

        $faculty = Faculty::where('id', '=', $profile['id'])->where('user_id', '=', $user_id)->first();

        $faculty->name = $profile['name'];
        $faculty->email = $profile['email'];
        $faculty->mobile = $profile['mobile'];
        $faculty->gender = $profile['gender'];
        $faculty->dob = $profile['dob'];
        $faculty->address = $profile['address'];

        $faculty->save();

        return $this->getProfileDetails(new Request(['user_id' => $user_id]));
    }
}
