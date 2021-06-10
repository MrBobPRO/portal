<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    public function create()
    {
        return view('ideas.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $idea = new Idea;
        $idea->user_id = $user_id;
        $idea->title = $request->title;
        $idea->text = $request->text;
        $idea->save();

        $file = $request->file;
        if($file) 
        {
            $fileName = $idea->id . ') ' .  $file->getClientOriginalName();
            $file->move(public_path('files/ideas'), $fileName);

            $idea->file = $fileName;
            $idea->save();
        }

        session()->flash('flash', 'Ваша идея успешно оформлена !');

        return redirect()->back();
    }

    
    public function index()
    {
        $allIdeas = Idea::select('ideas.id', 'ideas.title') 
                        ->orderBy('title', 'asc')
                        ->get();

        $ideas = Idea::latest()->paginate(30);

        return view('dashboard.ideas.index', compact('allIdeas', 'ideas'));
    }

    public function single($id)
    {
        $idea  = Idea::find($id);

        //genereate title for breadcrumbs
        if(mb_strlen($idea->title) > 55)
            $crumbsTitle = mb_substr($idea->title, 0, 52) . '...';
        else
            $crumbsTitle = $idea->title;

        $likes = $idea->grades->where('like', true);
        $dislikes = $idea->grades->where('like', false);

        //used to get users grade for blade template
        $usersGrade = $idea->grades->where('user_id', Auth::user()->id)->first();
        if(!$usersGrade) $usersGrade = 'null';
        else if($usersGrade->like) $usersGrade = 'like';
            else $usersGrade = 'dislike';

        //comments
        $comments = $idea->comments()->latest()->get();
        $commentsCount = count($comments);

        return view('dashboard.ideas.single', compact('idea', 'crumbsTitle', 'likes', 'dislikes', 'usersGrade', 'comments', 'commentsCount'));
    }

    public function download_file(Request $request)
    {
        $path = public_path('files/ideas/' . $request->file);

        return response()->download($path);
    }

}
