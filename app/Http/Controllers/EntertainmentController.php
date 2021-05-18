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

        $video->ruTitle = $request->ruTitle;
        $video->tjTitle = $request->tjTitle;
        $video->enTitle = $request->enTitle;
        $video->save();

        // change subtitles
        $sub = $request->file('subtitles');
        if($sub) {
            $filename = $video->id . '.' . $sub->getClientOriginalExtension();

            $video->subtitles = $filename;
            $video->save();
    
            $sub->move(public_path('videos/entertainment/subtitles'), $filename);
        }

        // change poster
        $pos = $request->file('poster');
        if($pos) {
            $filename = $video->id . '.' . $pos->getClientOriginalExtension();

            $video->poster = $filename;
            $video->save();
    
            $pos->move(public_path('videos/entertainment/posters'), $filename);
        }

        // change video file
        $file = $request->file('file');
        if($file) {
            $filename = $video->id . '.' . $file->getClientOriginalExtension();

            $video->filename = $filename;
            $video->save();
    
            $file->move(public_path('videos/entertainment'), $filename);
        }

        return 'success';
    }

}
