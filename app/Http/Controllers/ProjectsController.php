<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectsController extends Controller
{
    public function index()
    {  
        $projects = Project::paginate(6);

        return view('projects.index', compact('projects'));
    }
    public function showproject(Project $project)
    {  
        return view('projects.showproject', compact('project'));
    }
}
