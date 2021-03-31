<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $todayBDs = User::whereMonth('birth_date', date('m'))->whereDay('birth_date', date('d'))->get();
        
        $news = News::latest()->take(3)->get();

        return view('home.index', compact('news', 'todayBDs'));
    }

    public function videos()
    {
        return view('videos.index');
    }

}
