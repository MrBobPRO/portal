<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendCredentials;
use App\Models\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('email');
    }

    public function index()
    {   
        // return view('home.index');
        return view('login.forgot_password');
        
    }

    public function send_credentials()
    {
        $users = User::all();
        \Mail::to('boburjon_n@mail.ru')->send(new SendCredentials('Botir', '12345'));

        return redirect()->back();
    }

}
