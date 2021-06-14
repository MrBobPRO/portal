<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Subjectcat;
use App\Models\Material;
use App\Models\Video;
class KnowledgeController extends Controller
{
    public function index()
    { 
        $subjects = Subject::get();
        $subjectcats = Subjectcat::get();
        $materials = Material::get();
        
        return view('knowledge.index', compact('subjects', 'subjectcats', 'materials'));
    }

    public function books(Material $material) {
        $books = Book::where('material_id', $material->id)
                    ->where('category', $material->category)
                    ->paginate(30);

        //used in breadcrumbs       
        $subjectcat = Subjectcat::where('id', $material->subjectcat_id)->first();
        $subject = Subject::where('id', $subjectcat->subject_id)->first();

        return view('knowledge.books.index', compact('books', 'material', 'subjectcat', 'subject'));
    }
    
    public function books_single(Book $book) {

        return view('knowledge.books.single', compact('book'));
        
    }

    public function books_download(Request $request)
    {
        $book = Book::find($request->id);

        $path = public_path('books/' . $book->filename);

        return response()->download($path, $book->filename);
    }

    public function videos($id) {
        $material = Material::find($id);
        $videos = Video::where('material_id', $material->id)
                        ->where('category', $material->category)
                        ->paginate(16);
        
        //used in breadcrumbs       
        $subjectcat = Subjectcat::where('id', $material->subjectcat_id)->first();
        $subject = Subject::where('id', $subjectcat->subject_id)->first();

        return view('knowledge.videos.index', compact('videos', 'material', 'subjectcat', 'subject'));
    }

    public function videos_single($id)
    {
        $video = Video::find($id);

        return view('knowledge.videos.single', compact('video'));
    }

    // ----------------------------------Admin routes start----------------------------------
    public function books_store(Request $request) 
    {
        $book = new Book;
        $book->material_id = $request->material_id;
        $book->category = $request->category;
        $book->ruCategory = $request->ruCategory;
        $book->ruTitle = $request->ruTitle;
        $book->tjTitle = $request->tjTitle;
        $book->enTitle = $request->enTitle;
        $book->filename = 'file';
        $book->save();

        //store file
        $file = $request->file('upload_file');

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('books'), $fileName);
        //Edit books filename
        $book->filename = $fileName;
        $book->save(); 

        return redirect()->route('dashboard.knowledge.books');
    }

    public function books_update(Request $request)
    {
        //Get book by id
        $book = Book::find($request->book_id);

        $book->ruTitle = $request->ruTitle;
        $book->tjTitle = $request->tjTitle;
        $book->enTitle = $request->enTitle;
        $book->save();

        if ($request->file) {
            //Delete previous file
            unlink(public_path('books/' . $book->filename));
            //Save file
            $file = $request->file('file');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('books'), $fileName);
            //Edit books filename
            $book->filename = $fileName;
            $book->save(); 
        }

        return redirect()->back();
    } 

    public function books_remove(Request $request)
    {
        $book = Book::find($request->id);
        unlink(public_path('books/' . $book->filename));
        $book->delete();

        return redirect()->route('dashboard.knowledge.books');
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

        $video = Video::create([
            'filename' => $filename,
            'material_id' => $request->material_id,
            'category' => $request->category,
            'ruCategory' => $request->ruCategory,
            'ruTitle' => $request->ruTitle,
            'tjTitle' => $request->tjTitle,
            'enTitle' => $request->enTitle,
            'from_catalog' => $from_catalog
        ]);

        // save subtitles
        $subtitle = $request->file('subtitles');
        if($subtitle) {
            $filename = uniqid() . '.' . $subtitle->getClientOriginalExtension();

            $video->subtitles = $filename;
            $video->save();
    
            $subtitle->move(public_path('videos/knowledge/subtitles'), $filename);
        }

        // save poster
        $poster = $request->file('poster');
        if($poster) {
            $filename = uniqid() . '.' . $poster->getClientOriginalExtension();

            $video->poster = $filename;
            $video->save();
    
            $poster->move(public_path('videos/knowledge/posters'), $filename);
        }

        // if video is not  from catalog
        if ($request->file) {
            $file = $request->file('file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $video->filename = $filename;
            $video->save();

            $file->move(public_path('videos/knowledge'), $filename);
        }
        

        return route('dashboard.knowledge.videos');

    }

    public function videos_update(Request $request)
    {
        // Find video by id
        $video = Video::find($request->id);
        
        $video->ruTitle = $request->ruTitle;
        $video->tjTitle = $request->tjTitle;
        $video->enTitle = $request->enTitle;

        //check if video file selected from catalog
        if($request->catalog != '') {
            $video->from_catalog = true;
            $video->filename = $request->catalog;
        }

        $video->save();

        // Change subtitles
        $sub = $request->file('subtitles');
        if($sub) {
            if ($video->subtitles != '') {
                // Delete previous subtitles
                unlink(public_path('videos/knowledge/subtitles/' . $video->subtitles));
            }

            $filename = uniqid() . '.' . $sub->getClientOriginalExtension();
            $video->subtitles = $filename;
            $video->save();
    
            $sub->move(public_path('videos/knowledge/subtitles'), $filename);
        }

        // Change poster
        $pos = $request->file('poster');
        if($pos) {
            if ($video->poster != 'default.jpg') {
                // Delete previous poster
                unlink(public_path('videos/knowledge/posters/' . $video->poster));
            }
            $filename = uniqid() . '.' . $pos->getClientOriginalExtension();

            $video->poster = $filename;
            $video->save();
    
            $pos->move(public_path('videos/knowledge/posters'), $filename);
        }

        // Change video file
        $file = $request->file('file');
        if($file) {
            if ($video->filename) {
                // Delete previous video
                unlink(public_path('videos/knowledge/' . $video->filename));
            }

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $video->from_catalog = false;
            $video->filename = $filename;
            $video->save();
    
            $file->move(public_path('videos/knowledge'), $filename);
        }

        return 'success';
    }

    public function videos_remove(Request $request)
    {
        $video = Video::find($request->id);
        // delete video->poster
        if ($video->poster != 'default.jpg') {
            unlink(public_path('videos/knowledge/posters/' . $video->poster));
        }
        // delete video->subtitles
        if ($video->subtitles) {
            unlink(public_path('videos/knowledge/subtitles/' . $video->subtitles));
        }
        // delete videofile
        if (!$video->from_catalog) {
            unlink(public_path('videos/knowledge/' . $video->filename));
        }
        // delete video table from db
        $video->delete();

        return redirect()->route('dashboard.knowledge.videos');
    }
    // ----------------------------------Admin routes end----------------------------------

}
