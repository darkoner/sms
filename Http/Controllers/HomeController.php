<?php

namespace App\Http\Controllers;

use App\Mail\ClientLoginDetails;
use App\Models\Client\ClientProfile;
use App\Models\Projects\Project;
use App\Models\Projects\QuoteAttachment;
use App\Models\Projects\Quotes;
use App\Models\Settings\CaseStudy;
use App\Models\Settings\Product\Product;
use App\Models\Staff\StaffProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function index()
    {
        return self::getDashboard();
    }

    private static function getDashboard()
    {
        if (Auth::check())
        {
            return view('dashboard.admin');
        }
    }

    public static function getDataForDashboard()
    {
        $user = Auth::user();
        //gets currently logged in user

            //stats for admin dashboard
            $data['user'] = User::select('users.*','users.id as user_id')->get();


        return $data;
    }

    public function saveUserData(Request $request)
    {
        $user = $request->user;

        foreach ($user as $u)
        {
            if ($u['id'] > 0)
            {
                $update_user_data = User::where('id', '=', $u['id'])->first();
            }
            else
            {
                $update_user_data = new User();
            }

            $update_user_data->name = $u['name'];
            $update_user_data->email = $u['email'];
            $update_user_data->save();
        }
        return $this->getDataForDashboard();
    }
}
