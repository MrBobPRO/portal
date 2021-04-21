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

    public function check(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user) {
            $token = Str::random(15);
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token
            ]);

            \Mail::to($user->email)->send(new ForgotPassword($user->nickname, route('login.reset_password') . '?token=' . $token));
            return 'success';
        }
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
