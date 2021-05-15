<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Idea;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function news()
    {
        $allNews = DB::table('news')
                        ->orderBy('ruTitle', 'asc')
                        ->select('news.id', 'news.ruTitle')
                        ->get();

        $news = DB::table('news')
                        ->latest()
                        ->select('news.id', 'news.ruTitle', 'news.created_at', 'news.global')
                        ->paginate(30);

        return view('dashboard.news.index', compact('news', 'allNews'));
    }

    public function news_create()
    {
        return view('dashboard.news.create');
    }

    public function news_single($id)
    {
        $news = News::find($id);

        //genereate title for breadcrumbs
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

        return view('dashboard.news.single', compact('news', 'crumbsTitle'));
    }

    public function ideas()
    {
        $allIdeas = DB::table('ideas')
                        ->orderBy('title', 'asc')
                        ->select('ideas.id', 'ideas.title')
                        ->get();

        $ideas = Idea::latest()->paginate(30);

        return view('dashboard.ideas.index', compact('allIdeas', 'ideas'));
    }

    public function ideas_single($id)
    {
        $idea  = Idea::find($id);
        //change ideas status
        $idea->new = false;
        $idea->save();
        //genereate title for breadcrumbs
        if(mb_strlen($idea->title) > 55)
            $crumbsTitle = mb_substr($idea->title, 0, 52) . '...';
        else
            $crumbsTitle = $idea->title;

        return view('dashboard.ideas.single', compact('idea', 'crumbsTitle'));
    }

    public function complaints()
    {
        $allComplaints = DB::table('complaints')
                        ->orderBy('title', 'asc')
                        ->select('complaints.id', 'complaints.title')
                        ->get();

        $complaints = Complaint::latest()->paginate(30);

        return view('dashboard.complaints.index', compact('allComplaints', 'complaints'));
    }

    public function complaints_single($id)
    {
        $complaint  = Complaint::find($id);
        //change ideas status
        $complaint->new = false;
        $complaint->save();
        //genereate title for breadcrumbs
        if(mb_strlen($complaint->title) > 55)
            $crumbsTitle = mb_substr($complaint->title, 0, 52) . '...';
        else
            $crumbsTitle = $complaint->title;

        return view('dashboard.complaints.single', compact('complaint', 'crumbsTitle'));
    }

    public function upload_simditor_photo(Request $request)
    {
        $file = $request->file('simditor_photo');
        $filename = Str::random(15) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('img/' . $request->folder . '/simditor'), $filename);

        return [
            "success" => true,
            "msg" => "success", 
            "file_path" => '/img/' . $request->folder . '/simditor/' . $filename
        ];
    }

}
