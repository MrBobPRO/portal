<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\FileExists;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['store', 'update', 'remove']);
    }

    public function index()
    { 
        $news = News::latest()->paginate(10);

        return view('news.index', compact('news'));
    }

    public function inner()
    { 
        $news = News::where('global', false)->latest()->paginate(10);

        return view('news.categories', compact('news'));
    }

    public function global()
    { 
        $news = News::where('global', true)->latest()->paginate(10);

        return view('news.categories', compact('news'));
    }

    public function single($id)
    { 
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $text = App::currentLocale() . 'Text';

        $news = News::where('id', $id)
                        ->select('news.id',
                                'news.' . $title . ' as title',
                                'news.' . $text . ' as text',
                                'news.image',
                                'news.video',
                                'news.global',
                                'news.created_at')
                        ->first();

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

        return view('news.single', compact('news', 'likes', 'dislikes', 'usersGrade', 'comments', 'commentsCount'));
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

        // change image
        $file = $request->file('image');

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/news'), $fileName);
        // store video if exists
        $video = $request->file('video');

        if ($video) {
            $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos/news'), $videoName);
            
            $news->video = $videoName;
            $news->save();
        }

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
            // delete previous news->image 
            $path = public_path('img/news/' . $news->image);
            if (file_exists($path)) {
                unlink($path);
            }

            $fileName =uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/news'), $fileName);

            $news->image = $fileName;
            $news->save();
        }

        // change video if exists
        $video = $request->file('video');

        if ($video) {
            if ($news->video != '') {
                $filepath = public_path('videos/news/' . $news->video);
                if(file_exists($filepath)) 
                    unlink($filepath);
            }

            $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos/news'), $videoName);
            
            $news->video = $videoName;
            $news->save();
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $news = News::find($request->id);
        // delete news->image
        $path = public_path('img/news/' . $news->image);
        if (file_exists($path)) {
            unlink($path);
        }
        // delete news video
        if ($news->video != '') {
            $filepath = public_path('videos/news/' . $news->video);
            if(file_exists($filepath)) 
                unlink($filepath);
        }
        // delete news from db
        $news->delete();
        return redirect()->route('dashboard.news.index');
    }

    public function remove_video(Request $request)
    {
        $news = News::find($request->id);

        $filepath = public_path('videos/news/' . $news->video);
        if(file_exists($filepath)) {
            unlink($filepath);
        }

        $news->video = '';
        $news->save();
        
        return redirect()->back();
    }

}
