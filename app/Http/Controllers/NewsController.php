<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    { 
        $news = News::paginate(6);

        return view('news.index', compact('news'));
    }

    public function inner()
    { 
        $news = News::where('global', false)->paginate(6);

        return view('news.categories', compact('news'));
    }

    public function global()
    { 
        $news = News::where('global', true)->paginate(6);

        return view('news.categories', compact('news'));
    }

    public function single($id)
    { 
        $news = News::find($id);
        //generate titile for breadcrumb
        $locale = App::currentLocale();

        if($locale == 'ru') {
            if(mb_strlen($news->ruTitle) > 23)
                $crumbsTitle = mb_substr($news->ruTitle, 0, 20) . '...';
            else
                $crumbsTitle = $news->ruTitle;
        }

        else if($locale == 'tj') {
            if(mb_strlen($news->tjTitle) > 23)
                $crumbsTitle = mb_substr($news->tjTitle, 0, 20) . '...';
            else
                $crumbsTitle = $news->tjTitle;
        }

        else if($locale == 'en') {
            if(mb_strlen($news->enTitle) > 23)
                $crumbsTitle = mb_substr($news->enTitle, 0, 20) . '...';
            else
                $crumbsTitle = $news->enTitle;
        }

        $likes = $news->grades->where('like', true);
        $dislikes = $news->grades->where('like', false);

        //used to get users grade for blade template
        $usersGrade = $news->grades->where('user_id', Auth::user()->id)->first();
        if(!$usersGrade) $usersGrade = 'null';
        else if($usersGrade->like) $usersGrade = 'like';
            else $usersGrade = 'dislike';

        //comments
        $comments = $news->comments()->oldest()->get();
        $commentsCount = count($comments);

        return view('news.single', compact('news', 'crumbsTitle', 'likes', 'dislikes', 'usersGrade', 'comments', 'commentsCount'));
    }

}
