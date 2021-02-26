<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Settings\Semester;
use App\Models\Student\Student;
use App\Models\Student\StudentSem;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('student.add_student');
    }
    public function getProfileView()
    {
        return view('student.student_profile');
    }

    public function getProfileDetails(Request $request)
    {
        $user_id = $request->user_id;

        $data['auth_user'] = User::where('id', '=', $user_id)->first();
        $data['profile'] = Student::where('user_id', '=', $user_id)->first();
        $data['profile']->profile_pic = $data['auth_user']['profile_pic'];

        return $data;
    }
    public function getDetails()
    {
        return Semester::getSemester();
    }

    public function addNewStudent(Request $request)
    {
        //getting data sent by angular
        $student_data = $request->student_data;

        $validator = \Validator::make($student_data, [
            'pid' => 'required|unique:student,p_no'
        ]);

        if ($validator->fails())
        {
            $errors = [];

            foreach ($validator->messages()->all() as $error)
            {
                array_push($errors, $error);
            }

            return response()->json([
                'errors' => $errors,
                'status' => 400
            ], 400);
        }

        //saving student details in user table
        $user_data = new User();
        $user_data->name = $student_data['name'];
        $user_data->email= $student_data['email'];
        $user_data->is_student= 1;
        $user_data->password= bcrypt($student_data['mobile']);
        $email = $user_data->email;

        $confirmation_code = Str::random(30);

        //User Confirmation Code change in db. Verified 0.
        $user_data->confirmation_code = $confirmation_code;
        $user_data->is_confirmed = 0;
        $user_data->save();

        //saving student data
        $student_profile = new Student();
        $student_profile->p_no = $student_data['pid'];
        $student_profile->user_id = $user_data->id;
        $student_profile->name = $student_data['name'];
        $student_profile->email = $student_data['email'];
        $student_profile->mobile = $student_data['mobile'];
        $student_profile->address = $student_data['address'];
        $student_profile->city = $student_data['city'];
        $student_profile->state = $student_data['state'];
        $student_profile->dob = Carbon::parse($student_data['dob'])->format('d-m-Y');
        $student_profile->gender = $student_data['gender'];
        $student_profile->marital_status = $student_data['mstatus'];
        $student_profile->status = 'active';
        $student_profile->save();

        $student_sem = new StudentSem();
        $student_sem->student_id = $student_profile->id;
        $student_sem->semester_id = $student_data['semester'];
        $student_sem->save();

        $data['confirmation_code'] = $confirmation_code;

        Mail::to($email)->queue(new VerifyEmail($data));
    }

    public function studentListView()
    {
        return view('student.student');
    }

    public function studentView()
    {
        $data = Student::all();

        return $data;
    }
}
