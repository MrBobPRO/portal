<?php

namespace App\Http\Controllers;

use App\Models\Entertainment;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EntertainmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'videos', 'videos_single', 'gallery', 'gallery_single']);
    }

    public function index()
    {
        $videos = Entertainment::latest()->paginate(16);

        return view('entertainment.index', compact('videos'));
    }

    //-----------------------------------Videos start----------------------------------------
    public function videos()
    {
        $videos = Entertainment::latest()->paginate(16);

        return view('entertainment.videos.index', compact('videos'));
    }

    public function videos_single($id)
    {
        $entertainment = Entertainment::find($id);

        return view('entertainment.videos.single', compact('entertainment'));
    }

    public function videos_update(Request $request)
    {
        $video = Entertainment::find($request->id);

        $video->ruTitle = $request->ruTitle;
        $video->tjTitle = $request->tjTitle;
        $video->enTitle = $request->enTitle;

        //check if video file selected from catalog
        if($request->catalog != '') {
            $video->from_catalog = true;
            $video->filename = $request->catalog;
        }

        $video->save();

        // change subtitles
        $sub = $request->file('subtitles');
        if($sub) {
            // delete previous subtitles
            unlink(public_path('videos/entertainment/subtitles/' . $video->subtitles));

            $filename = uniqid() . '.' . $sub->getClientOriginalExtension();

            $video->subtitles = $filename;
            $video->save();
    
            $sub->move(public_path('videos/entertainment/subtitles'), $filename);
        }

        // change poster
        $pos = $request->file('poster');
        if($pos) {
            // delete previous poster if its not default poster
            if ($video->poster != 'default.jpg') {
                unlink(public_path('videos/entertainment/posters/' . $video->poster));
            }
            $filename = uniqid() . '.' . $pos->getClientOriginalExtension();

            $video->poster = $filename;
            $video->save();
    
            $pos->move(public_path('videos/entertainment/posters'), $filename);
        }

        // change video file
        $file = $request->file('file');
        if($file) {
            // delete previous videofile
            unlink(public_path('videos/entertainment/' . $video->filename));

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $video->from_catalog = false;
            $video->filename = $filename;
            $video->save();
    
            $file->move(public_path('videos/entertainment'), $filename);
        }

        return 'success';
    }

    public function videos_store(Request $request)
    {   
        // check if its video from catalog or uploading new file
        if($request->catalog == '') {
            $from_catalog = false;
            $filename = 'error';
        } 
        else {
            $from_catalog = true;
            $filename = $request->catalog;
        }

        $video = Entertainment::create([
            'filename' => $filename,
            'ruTitle' => $request->ruTitle,
            'tjTitle' => $request->tjTitle,
            'enTitle' => $request->enTitle,
            'from_catalog' => $from_catalog
        ]);

        // save subtitles
        $sub = $request->file('subtitles');
        if($sub) {
            $filename = uniqid() . '.' . $sub->getClientOriginalExtension();

            $video->subtitles = $filename;
            $video->save();
    
            $sub->move(public_path('videos/entertainment/subtitles'), $filename);
        }

        // save poster
        $pos = $request->file('poster');
        if($pos) {
            $filename = uniqid() . '.' . $pos->getClientOriginalExtension();

            $video->poster = $filename;
            $video->save();
    
            $pos->move(public_path('videos/entertainment/posters'), $filename);
        }

        //if its not video from catalog
        if($request->file) {
            $file = $request->file('file');
            $filename = $video->id . '.' . $file->getClientOriginalExtension();
    
            $video->filename = $filename;
            $video->save();
    
            $file->move(public_path('videos/entertainment'), $filename);
        }

        return route('dashboard.videos.index');

    }

    public function videos_remove(Request $request)
    {
        $video = Entertainment::find($request->id);
        // delete video->poster
        if ($video->poster != 'default.jpg') {
            unlink(public_path('videos/entertainment/posters/' . $video->poster));
        }
        // delete video->subtitles
        unlink(public_path('videos/entertainment/subtitles/' . $video->subtitles));
        // delete videofile
        unlink(public_path('videos/entertainment/' . $video->filename));
        // delete video table from db
        $video->delete();

        return redirect()->route('dashboard.videos.index');
    }
    //-----------------------------------Videos end----------------------------------------


    //-----------------------------------Gallery start----------------------------------------
    public function gallery() 
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('entertainment.gallery.index', compact('galleries'));
    }

    public function gallery_single($id) 
    {
        $gallery = Gallery::find($id);

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $gallery[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('entertainment.gallery.single', compact('gallery', 'crumbsTitle'));
    }

    public function delete_gallery_image(Request $request)
    {
        $path = public_path('img/entertainment/images/' . $request->filename);
        //delete image
        unlink($path);
        
        //delete from DB
        Image::where('filename', $request->filename)->first()->delete();

        return 'success';
    }

    public function galleries_store(Request $request)
    {
        $gallery = Gallery::create([
            'ruTitle' => $request->ruTitle,
            'tjTitle' => $request->tjTitle,
            'enTitle' => $request->enTitle,
            'date' => $request->date,
            'image' => 'image'
        ]);

        //save image
        $file = $request->file('image');

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/entertainment/galleries'), $fileName);

        $gallery->image = $fileName;
        $gallery->save();

        return redirect()->route('dashboard.galleries.single', $gallery->id);
    }

    public function galleries_update(Request $request)
    {
        $gallery = Gallery::find($request->id);
        $gallery->ruTitle = $request->ruTitle;
        $gallery->tjTitle = $request->tjTitle;
        $gallery->enTitle = $request->enTitle;
        $gallery->date = $request->date;
        $gallery->save();

        //save image
        $file = $request->file('image');
        if($request->image) {
            // delete previous gallery->image
            unlink(public_path('img/entertainment/galleries/' . $gallery->image));

            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/entertainment/galleries'), $fileName);
    
            $gallery->image = $fileName;
            $gallery->save();
        }

        return redirect()->route('dashboard.galleries.single', $gallery->id);
    }

    public function galleries_remove(Request $request)
    {
        // delete gallery from db
        $gallery = Gallery::find($request->id);
        $gallery->delete();
        // delete gallery's poster from storage
        unlink(public_path('img/entertainment/galleries/' . $gallery->image));
        // find gallery's images
        $images = Image::where('gallery_id', $gallery->id)->get();
        // delete all images of gallery
        foreach ($images as $image) {
            // delete image from db
            $image->delete();
            // delete image from storage
            unlink(public_path('img/entertainment/images/' . $image->filename));
        }
        return redirect('/dashboard/galleries');
    }
    //-----------------------------------Gallery end----------------------------------------

}
