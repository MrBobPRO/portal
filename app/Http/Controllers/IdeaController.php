<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function download(Request $request)
    {
        $path = public_path('files/ideas/' . $request->file);

        return response()->download($path);
    }

    public function response(Request $request)
    {
        $idea = Idea::find($request->id);
        $response = $request->response;

        $idea->response = $response;
        $idea->save();

        //send notification to user
        $notification = new Notification;
        $notification->user_id = $idea->user_id;
        $notification->title = 'Ответ на вашу идею "' . $idea->title . '"';
        $notification->text = $request->response;
        $notification->save();

        return redirect()->back();
    }

}
