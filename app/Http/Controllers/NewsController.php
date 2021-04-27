<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
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
        if(mb_strlen($news->title) > 23)
            $crumbsTitle = mb_substr($news->title, 0, 20) . '...';
        else
            $crumbsTitle = $news->title;

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
