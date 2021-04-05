<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    public function index()
    { 
        $allNews = News::paginate(6);

        return view('news.index', compact('allNews'));
    }

    public function companynews()
    { 
        $companyNews = News::where('type', true)->paginate(6);
        return view('news.companynews', compact('companyNews'));
    }
    public function worldnews()
    { 
        $worldNews = News::where('type', false)->paginate(6);
        return view('news.worldnews', compact('worldNews'));
    }
    public function show(News $news)
    { 
        return view('news.show', compact('news'));
    }

}
