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
        return view('knowledge.books.index', compact('books', 'material'));
    }
    public function showbook(Book $book) {
        $material = Material::where('id', $book->material_id)->first();
        return view('knowledge.books.showbook', compact('book', 'material'));
    }
    public function videos(Material $material) {
        $videos = Video::where('material_id', $material->id)
                        ->where('category', $material->category)
                        ->paginate(12);
        return view('knowledge.videos.index', compact('videos', 'material'));
    }

}
