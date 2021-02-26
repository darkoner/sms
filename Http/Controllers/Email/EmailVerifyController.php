<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Mail\LoginDetails;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class EmailVerifyController extends Controller
{
    public function confirmEmail($confirmationCode)
    {
        \Auth::logout();
        if (!$confirmationCode) {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::where('confirmation_code', $confirmationCode)->get()->first();

        if (!empty($user))
        {
            $user->is_confirmed = 1;
            $user->confirmation_code = null;
            $user->email_verified_at = Carbon::now()->format('d-m-Y');
            $user->save();

            $data['name'] = $user->name;
            Mail::to($user->email)->queue(new LoginDetails($data));
            return redirect('home');
        }
    }
}
