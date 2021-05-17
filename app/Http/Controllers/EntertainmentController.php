<?php

namespace App\Http\Controllers;

use App\Models\Entertainment;
use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function index()
    {
        $videos = Entertainment::latest()->paginate(16);

        return view('entertainment.index', compact('videos'));
    }

    public function videos()
    {
        $videos = Entertainment::latest()->paginate(16);

        return view('entertainment.videos.index', compact('videos'));
    }

    public function gallery() 
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('entertainment.gallery.index', compact('galleries'));
    }

    public function gallery_single($id) 
    {
        $gallery = Gallery::find($id);

        return view('entertainment.gallery.single', compact('gallery'));
    }

    public function videos_update(Request $request)
    {
        $video = Entertainment::find($request->id);

        $file = $request->file('file');
        $filename = $video->id . '.' . $file->getClientOriginalExtension();

        $video->filename = $filename;
        $video->save();

        $file->move(public_path('videos/entertainment'), $filename);

        return 'success';
    }

    public function check_uploading_video_size(Request $request)
    {
        $video = Entertainment::find($request->id)->filename;

        $file = public_path('videos/entertainment/' . $video);
        
        if(file_exists($file)) 
            return round((filesize($file) / 1024 / 1204), 2);
        else 
            return '0';
    }

}
