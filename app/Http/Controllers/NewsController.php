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
        $news = News::latest()->paginate(6);

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

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $news[$title];

        //likes and dislikes
        $likes = $news->grades->where('like', true);
        $dislikes = $news->grades->where('like', false);

        //used to get users grade for blade template
        $usersGrade = $news->grades->where('user_id', Auth::user()->id)->first();
        if(!$usersGrade) $usersGrade = 'null';
        else if($usersGrade->like) $usersGrade = 'like';
            else $usersGrade = 'dislike';

        //comments
        $comments = $news->comments()->latest()->get();
        $commentsCount = count($comments);

        return view('news.single', compact('news', 'crumbsTitle', 'likes', 'dislikes', 'usersGrade', 'comments', 'commentsCount'));
    }

    public function store(Request $request)
    {
        $news = News::create([
            'ruTitle' => $request->ruTitle,
            'tjTitle' => $request->tjTitle,
            'enTitle' => $request->enTitle,
            'ruText' => $request->ruText,
            'tjText' => $request->tjText,
            'enText' => $request->enText,
            'global' => $request->global,
            'image' => 'image.jpg'
        ]);

        //change image
        $file = $request->file('image');

        $fileName = $news->id . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/news'), $fileName);

        $news->image = $fileName;
        $news->save();

        return redirect()->route('dashboard.news.index');
    }

    public function update(Request $request)
    {
        $news = News::find($request->id);

        $news->ruTitle = $request->ruTitle;
        $news->tjTitle = $request->tjTitle;
        $news->enTitle = $request->enTitle;
        $news->ruText = $request->ruText;
        $news->tjText = $request->tjText;
        $news->enText = $request->enText;
        $news->global = $request->global;
        $news->save();

        //change image
        $file = $request->file('image');

        if($file) 
        {
            $fileName = $news->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/news'), $fileName);

            $news->image = $fileName;
            $news->save();
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        News::find($request->id)->delete();

        return redirect()->route('dashboard.news.index');
    }

}
