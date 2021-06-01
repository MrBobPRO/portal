<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function index() 
    {
        $departments = Department::orderBy('priority', 'asc')->get();
        
        return view('structure.index', compact('departments'));
    }

}
