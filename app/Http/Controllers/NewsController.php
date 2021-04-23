<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    public function index()
    { 
        $news = News::paginate(6);

        return view('news.index', compact('news'));
    }

    public function inner()
    { 
        $news = News::where('type', true)->paginate(6);

        return view('news.companynews', compact('companyNews'));
    }

    public function global()
    { 
        $worldNews = News::where('type', false)->paginate(6);

        return view('news.worldnews', compact('worldNews'));
    }

    public function single(News $news)
    { 
        return view('news.shownews', compact('news'));
    }

}
