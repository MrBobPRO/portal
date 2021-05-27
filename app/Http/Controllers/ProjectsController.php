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

    public function completed()
    {  
        $projects = Project::where('completed', true)->paginate(10);

        return view('projects.categories', compact('projects'));
    }

    public function ongoing()
    {  
        $projects = Project::where('completed', false)->paginate(10);

        return view('projects.categories', compact('projects'));
    }

    public function single($id)
    {  
        $project = Project::find($id);

        //generate titile for breadcrumb
        if(mb_strlen($project->ruTitle) > 23)
            $crumbsTitle = mb_substr($project->ruTitle, 0, 20) . '...';
        else
            $crumbsTitle = $project->ruTitle;

        //comments
        $comments = $project->comments()->oldest()->get();
        $commentsCount = count($comments);

        return view('projects.single', compact('project', 'crumbsTitle', 'comments', 'commentsCount'));
    }

    public function store(Request $request)
    {
        $project = Project::create([
            'ruTitle' => $request->ruTitle,
            'tjTitle' => $request->tjTitle,
            'enTitle' => $request->enTitle,
            'ruText' => $request->ruText,
            'tjText' => $request->tjText,
            'enText' => $request->enText,
            'completed' => $request->completed,
            'image' => 'image.jpg'
        ]);

        //change image
        $file = $request->file('image');

        $fileName = $project->id . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/projects'), $fileName);

        $project->image = $fileName;
        $project->save();

        return redirect()->route('dashboard.projects.index');
    }

    public function update(Request $request)
    {
        $project = Project::find($request->id);

        $project->ruTitle = $request->ruTitle;
        $project->tjTitle = $request->tjTitle;
        $project->enTitle = $request->enTitle;
        $project->ruText = $request->ruText;
        $project->tjText = $request->tjText;
        $project->enText = $request->enText;
        $project->completed = $request->completed;
        $project->save();

        //change image
        $file = $request->file('image');

        if($file) 
        {
            $fileName = $project->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/projects'), $fileName);

            $project->image = $fileName;
            $project->save();
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        Project::find($request->id)->delete();

        return redirect()->route('dashboard.projects.index');
    }

}
