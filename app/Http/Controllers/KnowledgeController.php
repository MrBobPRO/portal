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
                        ->paginate(12);

        //used in breadcrumbs       
        $subjectcat = Subjectcat::where('id', $material->subjectcat_id)->first();
        $subject = Subject::where('id', $subjectcat->subject_id)->first();

        return view('knowledge.books.index', compact('books', 'material', 'subjectcat', 'subject'));
    }
    
    public function books_single(Book $book) {

        return view('knowledge.books.single', compact('book'));
        
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

}
