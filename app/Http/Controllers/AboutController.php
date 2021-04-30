<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    
    public function index()
    {   
        return view('about.index');
    }

    public function whoweare() 
    {
        return view('about.whoweare');
    }

    public function structure() 
    {
        $departments = Department::orderBy('priority', 'asc')->get();

        return view('about.structure', compact('departments'));
    }

    public function leadership() 
    {
        return view('about.leadership');
    }
    
}
