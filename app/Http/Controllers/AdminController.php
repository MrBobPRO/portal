<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function news()
    {
        $allNews = DB::table('news')
                        ->select('news.id', 'news.title', 'news.created_at')
                        ->latest()
                        ->get();

        $news = DB::table('news')
                        ->select('news.id', 'news.title', 'news.created_at', 'news.global')
                        ->latest()
                        ->paginate(30);

        return view('dashboard.news.index', compact('news', 'allNews'));
    }

    public function news_single($id)
    {
        $news = News::find($id);

        return view('dashboard.news.single', compact('news'));
    }

}
