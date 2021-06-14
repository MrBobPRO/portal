<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['download_file', 'response']);
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $complaint = new Complaint;
        $complaint->user_id = $user_id;
        $complaint->title = $request->title;
        $complaint->text = $request->text;
        $complaint->save();

        $file = $request->file;
        if($file) 
        {
            $fileName = $complaint->id . ') ' .  $file->getClientOriginalName();
            $file->move(public_path('files/complaints'), $fileName);

            $complaint->file = $fileName;
            $complaint->save();
        }

        session()->flash('flash', 'Ваша жалоба успешно оформлена !');

        return redirect()->back();
    }

    public function download_file(Request $request)
    {
        $path = public_path('files/complaints/' . $request->file);

        return response()->download($path);
    }

    public function response(Request $request)
    {
        $complaint = Complaint::find($request->id);
        $response = $request->response;

        $complaint->response = $response;
        $complaint->save();

        //send notification to user
        $notification = new Notification;
        $notification->user_id = $complaint->user_id;
        $notification->title = 'Ответ на вашу жалобу "' . $complaint->title . '"';
        $notification->text = $request->response;
        $notification->save();

        return redirect()->back();
    }

}
