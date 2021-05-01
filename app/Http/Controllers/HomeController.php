<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Mail\SendCredentials;
use App\Models\User;
use App\Models\News;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('email');
    }

    public function store_dashboard_visibility(Request $request)
    {   
        session([
            'dashboard' => $request->visibility
        ]);

        return 'success';
    }

    public function index()
    {  
        return view('home.index');
    }

    public function send_credentials()
    {
        $users = User::all();
        \Mail::to('boburjon_n@mail.ru')->send(new ForgotPassword('Botir', '12345'));

        return redirect()->back();
    }

}
