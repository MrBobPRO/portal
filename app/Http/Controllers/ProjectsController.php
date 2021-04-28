<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectsController extends Controller
{
    public function index()
    {  
        $projects = Project::paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function single($id)
    {  
        $project = Project::find($id);

        //generate titile for breadcrumb
        if(mb_strlen($project->title) > 23)
            $crumbsTitle = mb_substr($project->title, 0, 20) . '...';
        else
            $crumbsTitle = $project->title;

        //comments
        $comments = $project->comments()->oldest()->get();
        $commentsCount = count($comments);

        return view('projects.single', compact('project', 'crumbsTitle', 'comments', 'commentsCount'));
    }
}
