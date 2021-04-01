<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
class NewsController extends Controller
{
    public function index()
    {   
        $todayBDs = User::whereMonth('birth_date', date('m'))
                        ->whereDay('birth_date', date('d'))
                        ->get();
        $tomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 1 day')))
                            ->whereDay('birth_date', date('d', strtotime('+ 1 day')))
                            ->get();
        $afterTomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 2 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 2 day')))
                                ->get();
        
        $news = News::latest()->take(3)->get();

        return view('news.index', compact('news', 'todayBDs', 'tomorrowBDs', 'afterTomorrowBDs'));
    }
}
