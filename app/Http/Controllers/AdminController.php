<?php

namespace App\Http\Controllers;

use App\Mail\SendCredentials;
use App\Models\Ads;
use App\Models\Complaint;
use App\Models\Entertainment;
use App\Models\Gallery;
use App\Models\Idea;
use App\Models\Image;
use App\Models\News;
use App\Models\Project;
use App\Models\Questionnaire;
use App\Models\Slider;
use App\Models\Book;
use App\Models\Video;
use App\Models\Subject;
use App\Models\Subjectcat;
use App\Models\Material;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Position;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // -----------------------------------Simditor start-------------------------------------------
    public function upload_simditor_photo(Request $request)
    {
        $file = $request->file('simditor_photo');
        $filename = Str::random(15) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('img/' . $request->folder . '/simditor'), $filename);

        return [
            "success" => true,
            "msg" => "success", 
            "file_path" => '/img/' . $request->folder . '/simditor/' . $filename
        ];
    }
    // -----------------------------------Simditor end-------------------------------------------


    // -----------------------------------Dropzone start-------------------------------------------
    public function upload_dropzone_photo(Request $request)
    {
        $files = $request->file('files');

        if($files) {
            foreach($files as $file) {
                $img = Image::create([
                    'gallery_id' => $request->gallery_id,
                    'filename' => 'file'
                ]);
        
                $filename = $img->id . '.' . $file->getClientOriginalExtension();
                $img->filename = $filename;
                $img->save();
        
                $file->move(public_path('img/entertainment/images'), $filename);
            }
        }

        return 'success';
    }
    // -----------------------------------Dropzone end-------------------------------------------


    // -----------------------------------Ads start-------------------------------------------
    public function ads()
    {
        $ads = Ads::latest()->get();

        return view('dashboard.ads.index', compact('ads'));
    }

    public function ads_create()
    {
        return view('dashboard.ads.create');
    }

    public function ads_single($id)
    {
        $ad = Ads::find($id);

        $crumbsTitle = $ad->text;

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.ads.single', compact('ad', 'crumbsTitle'));
    }
    // -----------------------------------Ads end-------------------------------------------


    // -----------------------------------Complaints start-------------------------------------------
    public function complaints()
    {
        $allComplaints = DB::table('complaints')
                        ->orderBy('title', 'asc')
                        ->select('complaints.id', 'complaints.title')
                        ->get();

        $complaints = Complaint::latest()->paginate(30);

        return view('dashboard.complaints.index', compact('allComplaints', 'complaints'));
    }

    public function complaints_single($id)
    {
        $complaint  = Complaint::find($id);
        //change ideas status
        $complaint->new = false;
        $complaint->save();
        //genereate title for breadcrumbs
        if(mb_strlen($complaint->title) > 55)
            $crumbsTitle = mb_substr($complaint->title, 0, 52) . '...';
        else
            $crumbsTitle = $complaint->title;

        return view('dashboard.complaints.single', compact('complaint', 'crumbsTitle'));
    }
    // -----------------------------------Complaints end-------------------------------------------


    // -----------------------------------Questionnaire start-------------------------------------------
    public function questionnaire()
    {
        $questions = Questionnaire::latest()->paginate(30);

        return view('dashboard.questionnaire.index', compact('questions'));
    }

    public function questionnaire_create()
    {
        return view('dashboard.questionnaire.create');
    }

    public function questionnaire_single($id)
    {
        $question = Questionnaire::find($id);

        $crumbsTitle = $question->text;

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.questionnaire.single', compact('question', 'crumbsTitle'));
    }
    // -----------------------------------Questionnaire end-------------------------------------------


    // -----------------------------------Slider start-------------------------------------------
    public function slider()
    {
        $items = Slider::orderBy('priority', 'asc')->get();

        return view('dashboard.slider.index', compact('items'));
    }

    public function slider_create()
    {
        return view('dashboard.slider.create');
    }

    public function slider_single($id)
    {
        $item = Slider::find($id);

        return view('dashboard.slider.single', compact('item'));
    }
    // -----------------------------------Slider end-------------------------------------------

    
    // -----------------------------------News start-------------------------------------------
    public function news()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allNews = DB::table('news')
                        ->orderBy($title, 'asc')
                        ->select('news.id', 'news.' . $title . ' as title')
                        ->get();

        $news = DB::table('news')
                        ->latest()
                        ->select('news.id', 'news.' . $title . ' as title', 'news.created_at', 'news.global')
                        ->paginate(30);

        return view('dashboard.news.index', compact('news', 'allNews'));
    }

    public function news_create()
    {
        return view('dashboard.news.create');
    }

    public function news_single($id)
    {
        $news = News::find($id);

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $news[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.news.single', compact('news', 'crumbsTitle'));
    }
    // -----------------------------------News end-------------------------------------------


    // -----------------------------------Videos start-------------------------------------------
    public function videos()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allVideos = DB::table('entertainments')
                        ->orderBy($title, 'asc')
                        ->select('entertainments.id', 'entertainments.' . $title . ' as title')
                        ->get();

        $videos = DB::table('entertainments')
                        ->latest()
                        ->select('entertainments.id', 'entertainments.' . $title . ' as title', 'entertainments.created_at')
                        ->paginate(30);

        return view('dashboard.entertainment.videos.index', compact('videos', 'allVideos'));
    }

    public function videos_create()
    {
        return view('dashboard.entertainment.videos.create');
    }

    public function videos_single($id)
    {
        $video = Entertainment::find($id);

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $video[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.entertainment.videos.single', compact('video', 'crumbsTitle'));
    }
    // -----------------------------------Videos end-------------------------------------------

    // -----------------------------------Projects start-------------------------------------------
    public function projects()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allProjects = DB::table('projects')
                        ->orderBy($title, 'asc')
                        ->select('projects.id', 'projects.' . $title . ' as title')
                        ->get();

        $projects = DB::table('projects')
                        ->latest()
                        ->select('projects.id', 'projects.' . $title . ' as title', 'projects.created_at', 'projects.completed')
                        ->paginate(30);

        return view('dashboard.projects.index', compact('projects', 'allProjects'));
    }

    public function projects_create()
    {
        return view('dashboard.projects.create');
    }

    public function projects_single($id)
    {
        $project = Project::find($id);

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $project[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.projects.single', compact('project', 'crumbsTitle'));
    }
    // -----------------------------------Projects end-------------------------------------------


    // -----------------------------------Gallery start-------------------------------------------
    public function galleries()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allGalleries = DB::table('galleries')
                        ->orderBy($title, 'asc')
                        ->select('galleries.id', 'galleries.' . $title . ' as title')
                        ->get();

        $galleries = DB::table('galleries')
                        ->latest()
                        ->select('galleries.id', 'galleries.' . $title . ' as title', 'galleries.date')
                        ->paginate(30);

        return view('dashboard.entertainment.galleries.index', compact('galleries', 'allGalleries'));
    }

    public function galleries_create()
    {
        return view('dashboard.entertainment.galleries.create');
    }

    public function galleries_single($id)
    {
        $gallery = Gallery::find($id);

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $gallery[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.entertainment.galleries.single', compact('gallery', 'crumbsTitle'));
    }
    // -----------------------------------Gallery end-------------------------------------------

    // -----------------------------------Knowledge start-------------------------------------------
    public function knowledge_create()
    { 
        $subjects = Subject::get();
        $subjectcats = Subjectcat::get();
        $materials = Material::get();
        
        return view('dashboard.knowledge.create', compact('subjects', 'subjectcats', 'materials'));
    }

    public function knowledge_books() 
    {
        $allBooks = DB::table('books')
                        ->orderBy('ruTitle', 'asc')
                        ->select('books.id', 'books.ruTitle')
                        ->get();

        $books = DB::table('books')
                        ->latest()
                        ->select('books.id', 'books.ruTitle', 'books.ruCategory', 'books.created_at')
                        ->paginate(30);

        return view('dashboard.knowledge.books', compact('books', 'allBooks'));
    }

    public function knowledge_books_single($id) 
    {
        $book = Book::find($id);

        return view('dashboard.knowledge.books_single', compact('book'));
    }

    public function knowledge_books_create(Material $material) 
    {
        $subjectcat = Subjectcat::find($material->subjectcat_id);
        $subject = Subject::find($subjectcat->subject_id);

        return view('dashboard.knowledge.books_create', compact('material', 'subjectcat', 'subject'));
    }

    public function knowledge_books_store(Request $request) 
    {
        $file = $request->file('upload_file');

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('books'), $fileName);

        $book = new Book;
        $book->material_id = $request->material_id;
        $book->category = $request->category;
        $book->ruCategory = $request->ruCategory;
        $book->ruTitle = $request->ruTitle;
        $book->tjTitle = $request->tjTitle;
        $book->enTitle = $request->enTitle;
        $book->filename = $fileName;
        $book->save();

        return redirect('/dashboard/knowledge/books');
    }

    public function knowledge_books_update(Request $request)
    {
        //Get book by id
        $book = Book::find($request->book_id);

        if ($request->ruTitle != $book->ruTitle) 
        {   
            //Edit books name
            $book->ruTitle = $request->ruTitle;
            $book->save();
        } else if ($request->tjTitle != $book->tjTitle) 
        {   
            //Edit books name
            $book->tjTitle = $request->tjTitle;
            $book->save();
        } else if ($request->enTitle != $book->enTitle) 
        {   
            //Edit books name
            $book->enTitle = $request->enTitle;
            $book->save();
        }
        else if ($request->file != null) {
            //Delete previous file
            unlink(public_path('books/' . $book->filename));
            //Save file
            $file = $request->file('file');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('books'), $fileName);
            //Edit books filename
            $book->filename = $fileName;
            $book->save(); 
        }

        return redirect('/dashboard/knowledge/books');
    } 

    public function knowledge_books_remove(Request $request)
    {
        $book = Book::find($request->id);
        unlink(public_path('books/' . $book->filename));
        $book->delete();

        return redirect('/dashboard/knowledge/books');
    } 

    public function knowledge_videos() 
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allVideos = DB::table('videos')
                        ->orderBy($title, 'asc')
                        ->select('videos.id', 'videos.' . $title . ' as title')
                        ->get();

        $videos = DB::table('videos')
                        ->latest()
                        ->select('videos.id', 'videos.' . $title . ' as title', 'videos.ruCategory', 'videos.created_at')
                        ->paginate(30);

        return view('dashboard.knowledge.videos', compact('videos', 'allVideos'));
    }

    public function knowledge_videos_single($id) 
    {
        $video = Video::find($id);

        return view('dashboard.knowledge.videos_single', compact('video'));
    }

    public function knowledge_videos_create(Material $material) 
    {
        $subjectcat = Subjectcat::find($material->subjectcat_id);
        $subject = Subject::find($subjectcat->subject_id);

        return view('dashboard.knowledge.videos_create', compact('material', 'subjectcat', 'subject'));
    }

    public function knowledge_videos_store(Request $request)
    {
        $video = Video::create([
            'filename' => 'error',
            'material_id' => $request->material_id,
            'category' => $request->category,
            'ruCategory' => $request->ruCategory,
            'ruTitle' => $request->ruTitle,
            'tjTitle' => $request->tjTitle,
            'enTitle' => $request->enTitle
        ]);

        // save subtitles
        $subtitle = $request->file('subtitles');
        if($subtitle) {
            $filename = uniqid() . '.' . $subtitle->getClientOriginalExtension();

            $video->subtitles = $filename;
            $video->save();
    
            $subtitle->move(public_path('videos/knowledge/subtitles'), $filename);
        }

        // save poster
        $poster = $request->file('poster');
        if($poster) {
            $filename = uniqid() . '.' . $poster->getClientOriginalExtension();

            $video->poster = $filename;
            $video->save();
    
            $poster->move(public_path('videos/knowledge/posters'), $filename);
        }

        // save video file
        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $video->filename = $filename;
        $video->save();

        $file->move(public_path('videos/knowledge'), $filename);

        return route('dashboard.knowledge.videos');

    }

    public function knowledge_videos_update(Request $request)
    {
        // Find video by id
        $video = Video::find($request->id);
        
        $video->ruTitle = $request->ruTitle;
        $video->tjTitle = $request->tjTitle;
        $video->enTitle = $request->enTitle;
        $video->save();

        // Change subtitles
        $sub = $request->file('subtitles');
        if($sub) {
            if ($video->subtitles) {
                // Delete previous subtitles
                unlink(public_path('videos/knowledge/subtitles/' . $video->subtitles));
            }

            $filename = uniqid() . '.' . $sub->getClientOriginalExtension();
            $video->subtitles = $filename;
            $video->save();
    
            $sub->move(public_path('videos/knowledge/subtitles'), $filename);
        }

        // Change poster
        $pos = $request->file('poster');
        if($pos) {
            if ($video->poster != 'default.jpg') {
                // Delete previous poster
                unlink(public_path('videos/knowledge/posters/' . $video->poster));
            }
            $filename = uniqid() . '.' . $pos->getClientOriginalExtension();

            $video->poster = $filename;
            $video->save();
    
            $pos->move(public_path('videos/knowledge/posters'), $filename);
        }

        // Change video file
        $file = $request->file('file');
        if($file) {
            if ($video->filename) {
                // Delete previous video
                unlink(public_path('videos/knowledge/' . $video->filename));
            }

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $video->filename = $filename;
            $video->save();
    
            $file->move(public_path('videos/knowledge'), $filename);
        }

        return 'success';
    }

    public function knowledge_videos_remove(Request $request)
    {
        $video = Video::find($request->id);
        // Delete video
        unlink(public_path('videos/knowledge/' . $video->filename));
        // Delete subtitles
        unlink(public_path('videos/knowledge/subtitles/' . $video->subtitles));
        // Delete poster 
        unlink(public_path('videos/knowledge/posters/' . $video->poster));
        
        $video->delete();

        return redirect()->route('dashboard.knowledge.videos');
    }
    // -----------------------------------Knowledge end-------------------------------------------

    // -----------------------------------Structure start-------------------------------------------
    public function structure_index() 
    {
        $departments = Department::orderBy('priority', 'asc')->get();
        $allUsers = DB::table('users')
                        ->orderBy('name', 'asc')
                        ->select('users.id', 'users.name', 'users.surname')
                        ->get();
        return view('dashboard.structure.index', compact('departments', 'allUsers'));
    }

    public function users_update($id) 
    {
        $user = User::find($id);
        $departments = Department::get();
        $designations = Designation::get();
        $positions = Position::get();
        $languages = Language::get();

        return view('dashboard.structure.user_update', compact('user', 'departments', 'designations', 'positions', 'languages'));
    }

    public function users_create() 
    {
        $departments = Department::get();
        $designations = Designation::get();
        $positions = Position::get();
        $languages = Language::get();

        return view('dashboard.structure.users_create', compact('departments', 'designations', 'positions', 'languages'));
    }

    public function users_store(Request $request)
    {
        $user = new User;
        //generate new password for user
        $password = Str::random(6);

        //Validation
        $request->validate([
            'nickname' => 'unique:users',
            'email' => 'unique:users',
        ]);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->avatar = 'default.png';
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->description = 'Описание';
        $user->department_id = $request->department_id;
        $user->position_id = $request->position_id;
        $user->designation_id = $request->designation_id;
        $user->save();
             
        //send email credentials
        \Mail::to($request->email)->send(new SendCredentials($request->nickname, $password));

        return redirect()->back();
    }

    public function users_remove(Request $request)
    {
        $user = User::find($request->id);
        
        $user->delete();

        return redirect()->route('dashboard.structure.index');
    }

    public function departments_index()
    {
        $departments = Department::orderBy('priority', 'asc')
                            ->get();

        return view('dashboard.structure.departments.index', compact('departments'));
    }

    public function departments_update(Request $request)
    {
        $department = Department::find($request->id);
        
        $department->name = $request->name;
        $department->priority = $request->priority;
        $department->save();

        return redirect()->back();
    }

    public function departments_remove(Request $request)
    {
        $users = User::where('department_id', $request->id)->get();
        if ($users) 
        {
            foreach ($users as $user) {
                $user->department_id = 1;
                $user->save();
            }
        }
        Department::find($request->id)->delete();
        $positions = Position::where('department_id', $request->id)->get();
        foreach ($positions as $position) {
            $position->department_id = 1;
            $position->save();
        }
        return redirect()->back();
    }

    public function departments_store(Request $request)
    {
        $department = new Department;
        
        $department->name = $request->name;
        $department->priority = $request->priority;
        $department->save();

        return redirect()->back();
    }

    public function designations_index()
    {
        $designations = Designation::orderBy('priority', 'asc')
                            ->get();
                            
        return view('dashboard.structure.designations.index', compact('designations'));
    }

    public function designations_update(Request $request)
    {
        $designation = Designation::find($request->id);
        
        $designation->name = $request->name;
        $designation->priority = $request->priority;
        $designation->save();

        return redirect()->back();
    }

    public function designations_remove(Request $request)
    {
        $users = User::where('designation_id', $request->id)->get();
        if ($users) 
        {
            foreach ($users as $user) {
                $user->designation = 1;
                $user->save();
            }
        }
        Designation::find($request->id)->delete();

        return redirect()->back();
    }

    public function designations_store(Request $request)
    {
        $designation = new Designation;
        
        $designation->name = $request->name;
        $designation->priority = $request->priority;
        $designation->save();

        return redirect()->back();
    }

    public function positions_index()
    {
        $positions = Position::orderBy('department_id', 'asc')
                            ->get();
        $departments = Department::get();

        return view('dashboard.structure.positions.index', compact('positions', 'departments'));
    }    

    public function positions_update(Request $request)
    {
        $position = Position::find($request->id);
        
        $position->name = $request->name;
        $position->department_id = $request->department_id;
        $position->save();

        return redirect()->back();
    }

    public function positions_remove(Request $request)
    {
        $users = User::where('position_id', $request->id)->get();
        if ($users) 
        {
            foreach ($users as $user) {
                $user->position_id = 1;
                $user->save();
            }
        }
        Position::find($request->id)->delete();

        return redirect()->back();
    }

    public function positions_store(Request $request)
    {
        $position = new Position;
        
        $position->name = $request->name;
        $position->department_id = $request->department_id;
        $position->save();

        return redirect()->back();
    }
    // -----------------------------------Structure start-------------------------------------------

}

















