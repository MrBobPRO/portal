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
                        ->get();
        return view('knowledge.books.index', compact('books'));
    }
    public function showbook(Book $book) {
        return view('knowledge.books.index', compact('book'));
    }
    public function videos(Material $material) {
        $videos = Video::where('material_id', $material->id)
                        ->where('category', $material->category)
                        ->get();
        return view('knowledge.videos.showbook', compact('videos'));
    }
    public function showvideo(Video $video) {
        return view('knowledge.videos.showvideo', compact('video'));
    }

}
