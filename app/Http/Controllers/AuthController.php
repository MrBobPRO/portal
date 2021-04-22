<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
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
            \Mail::to($user->email)->send(new ForgotPassword($user->nickname, route('login.reset_password') . '?token =' . $token));
            return 'success';
        }
        //If user doesn't exist
        else return 'error';
    }

    public function resetPassword(Request $request)
    {   
        $token = $request->token;
        $email = DB::table('password_resets')->where('token', $token)->value('email');
        if(!$email) return 'Ошибка. Запросите новую ссылку!';
        else {
            return view('login.reset_password', compact('token'));
        } 

        return view('login.reset_password');
    }

    public function resetPasswordPost(Request $request)
    {
        $token = $request->token;
        $email = DB::table('password_resets')->where('token', $token)->value('email');
        $user = User::where('email', $email)->first();

        $user->password = bcrypt($request->password);
        $user->save();

        DB::table('password_resets')->where('token', $token)->delete();

        return redirect()->route('login');
    }

}
