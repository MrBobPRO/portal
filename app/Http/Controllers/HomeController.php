<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Mail\SendCredentials;
use App\Models\News;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use stdClass;

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
        $items = Slider::orderBy('priority', 'asc')->get();

        return view('home.index', compact('items'));
    }

    public function send_credentials()
    {
        $users = User::all();
        \Mail::to('boburjon_n@mail.ru')->send(new SendCredentials('Botir', '12345'));

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        
        $result = new stdClass;

        $result->news = News::where('ruTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('tjTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('enTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('ruText', 'like', '%' . $keyword . '%')
                    ->orWhere('tjText', 'like', '%' . $keyword . '%')
                    ->orWhere('enText', 'like', '%' . $keyword . '%')
                    ->get();

        $result->users = DB::table('users')->
                    where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('nickname', 'like', '%' . $keyword . '%')
                    ->orWhere('surname', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%')
                    ->select('users.id', 'users.name', 'users.surname')
                    ->get();


        $resultsCount = $result->news->count() +  $result->users->count();

        return view('search.index', compact('result', 'resultsCount'));

    }

}
