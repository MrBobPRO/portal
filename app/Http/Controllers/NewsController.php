<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class NewsController extends Controller
{
    public function index()
    { 
        return view('news.index');
    }

    public function companynews()
    { 
        return view('news.companynews');
    }
    public function worldnews()
    { 
        return view('news.worldnews');
    }

}
