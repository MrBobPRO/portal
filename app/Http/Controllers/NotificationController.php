<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->paginate(30);

        return view('notifications.index', compact('notifications'));
    }

    public function single($id)
    {
        $notification = Notification::find($id);
        $notification->new = false;
        $notification->save();

        //genereate title for breadcrumbs
        if(mb_strlen($notification->title) > 55)
            $crumbsTitle = mb_substr($notification->title, 0, 52) . '...';
        else
            $crumbsTitle = $notification->title;

        return view('notifications.single', compact('notification', 'crumbsTitle'));
    }
}
