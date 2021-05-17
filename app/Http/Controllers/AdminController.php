<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Entertainment;
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

    // -----------------------------------Simditor start-------------------------------------------
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
    // -----------------------------------Simditor end-------------------------------------------


    // -----------------------------------News start-------------------------------------------
    public function news()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allNews = DB::table('news')
                        ->orderBy($title, 'asc')
                        ->select('news.id', 'news.' . $title . ' as title')
                        ->get();

        $news = DB::table('news')
                        ->latest()
                        ->select('news.id', 'news.' . $title . ' as title', 'news.created_at', 'news.global')
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

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $news[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.news.single', compact('news', 'crumbsTitle'));
    }
    // -----------------------------------News end-------------------------------------------


    // -----------------------------------Ideas start-------------------------------------------
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
    // -----------------------------------Ideas end-------------------------------------------


    // -----------------------------------Complaints start-------------------------------------------
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
    // -----------------------------------Complaints end-------------------------------------------


    // -----------------------------------Videos start-------------------------------------------
    public function videos()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allVideos = DB::table('entertainments')
                        ->orderBy($title, 'asc')
                        ->select('entertainments.id', 'entertainments.' . $title . ' as title')
                        ->get();

        $videos = DB::table('entertainments')
                        ->latest()
                        ->select('entertainments.id', 'entertainments.' . $title . ' as title', 'entertainments.created_at')
                        ->paginate(30);

        return view('dashboard.entertainment.videos.index', compact('videos', 'allVideos'));
    }

    public function videos_single($id)
    {
        $video = Entertainment::find($id);

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $video[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.entertainment.videos.single', compact('video', 'crumbsTitle'));
    }
    // -----------------------------------Complaints end-------------------------------------------
}
