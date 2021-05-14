<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function forgotPassword()
    {
        return view('login.forgot_password');
    }

    public function checkEmail(Request $request)
    {
        //Defining user by email
        $user = User::where('email', $request->email)->first();
        //If user exists
        if($user) {
            //Generate token and save it with mail
            $token = Str::random(15);
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token
            ]);
            //Sending password reset link to user's mail
            \Mail::to($user->email)->send(new ForgotPassword($user->nickname, route('login.reset_password') . '?token=' . $token));
            return 'success';
        }
        //If user doesn't exist
        else return 'error';
    }

    public function resetPassword(Request $request)
    {   
        //Get token
        $token = $request->token;
        //Find email from password_resets table by token
        $email = DB::table('password_resets')->where('token', $token)->value('email');
        //If email not exists
        if (!$email){
            return view('login.invalid_link');
        } else {
            return view('login.reset_password', compact('token'));
        } 
    }

    public function resetPasswordPost(Request $request)
    {
        //Get token
        $token = $request->token;
        $password = $request->password;
        //Find email from password_resets table by token
        $email = DB::table('password_resets')->where('token', $token)->value('email');
        //Find user by email
        $user = User::where('email', $email)->first();
        //Reset user's password
        $user->password = bcrypt($password);
        $user->save();
        //Delete password_reset table
        DB::table('password_resets')->where('email', $email)->delete();
        
        return 'success';
    }

}
