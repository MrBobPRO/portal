<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class KnowledgeController extends Controller
{
    public function index()
    { 
        return view('knowledge.index');
    }

    public function books(Book $book)
    { 
        return view('knowledge.showbook');
    }
}
