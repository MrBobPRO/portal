<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\App;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['store', 'update', 'remove']);
    }

    public function index()
    {  
        return view('projects.index');
    }

    public function completed()
    {  
        $projects = Project::where('completed', true)->latest()->paginate(10);

        return view('projects.categories', compact('projects'));
    }

    public function ongoing()
    {  
        $projects = Project::where('completed', false)->latest()->paginate(10);

        return view('projects.categories', compact('projects'));
    }

    public function single($id)
    {  
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $text = App::currentLocale() . 'Text';

        $project = Project::where('id', $id)
                        ->select('projects.id',
                                'projects.' . $title . ' as title',
                                'projects.' . $text . ' as text',
                                'projects.image',
                                'projects.completed',
                                'projects.created_at')
                                ->first();

        //comments
        $comments = $project->comments()->latest()->get();
        $commentsCount = count($comments);

        return view('projects.single', compact('project', 'comments', 'commentsCount'));
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

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
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
            // delete previous project->image
            $path = public_path('img/projects/' . $project->image);
            if (file_exists($path)) {
                unlink($path);
            }

            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/projects'), $fileName);

            $project->image = $fileName;
            $project->save();
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $project = Project::find($request->id);
        // delete project->image
        $path = public_path('img/projects/' . $project->image); 
        if (file_exists($path)) {
            unlink($path);
        }
        // delete project from db
        $project->delete();
        return redirect()->route('dashboard.projects.index');
    }

}
