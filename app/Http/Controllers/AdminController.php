<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Complaint;
use App\Models\Entertainment;
use App\Models\Gallery;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

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
        $allComplaints = Complaint::select('complaints.id', 'complaints.title')
                        ->orderBy('title', 'asc')
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


    // -----------------------------------Structure start-------------------------------------------
    public function structure_index() 
    {
        $departments = Department::orderBy('priority', 'asc')->get();
        $allUsers = User::select('users.id', 'users.name', 'users.surname')
                        ->orderBy('name', 'asc')
                        ->get();
        return view('dashboard.structure.index', compact('departments', 'allUsers'));
    }

    public function users_update($id) 
    {
        $user = User::find($id);
        $departments = Department::orderBy('name', 'asc')->get();
        $designations = Designation::orderBy('priority', 'asc')->get();
        $positions = Position::orderBy('name', 'asc')->get();

        // get needed column from app locale
        $name = App::currentLocale() . 'Name';
        
        $languages = DB::table('languages')
                ->select('languages.id', 'languages.' . $name . ' as name')
                ->orderBy($name, 'asc')
                ->get();

        return view('dashboard.structure.user_update', compact('user', 'departments', 'designations', 'positions', 'languages'));
    }

    public function users_create() 
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $designations = Designation::orderBy('priority', 'asc')->get();
        $positions = Position::orderBy('name', 'asc')->get();

        return view('dashboard.structure.users_create', compact('departments', 'designations', 'positions'));
    }

    public function departments_index()
    {
        $departments = Department::orderBy('priority', 'asc')
                            ->get();

        return view('dashboard.structure.departments.index', compact('departments'));
    }

    public function designations_index()
    {
        $designations = Designation::orderBy('priority', 'asc')
                            ->get();
                            
        return view('dashboard.structure.designations.index', compact('designations'));
    }

    public function positions_index()
    {
        $positions = Position::orderBy('name', 'asc')
                            ->get();

        return view('dashboard.structure.positions.index', compact('positions'));
    }    
    // -----------------------------------Structure end-------------------------------------------

    
    // -----------------------------------Knowledge start-------------------------------------------
    public function knowledge_index()
    {
        $booksCount = Book::count();
        $videosCount = Video::count();

        return view('dashboard.knowledge.index', compact('booksCount', 'videosCount'));
    }

    public function knowledge_create()
    { 
        $subjects = Subject::get();
        $subjectcats = Subjectcat::get();
        $materials = Material::get();
        
        return view('dashboard.knowledge.create', compact('subjects', 'subjectcats', 'materials'));
    }

    public function knowledge_books() 
    {
        $allBooks = Book::select('books.id', 'books.ruTitle') 
                        ->orderBy('ruTitle', 'asc')
                        ->get();

        $books = Book::select('books.id', 'books.ruTitle', 'books.ruCategory', 'books.created_at')
                    ->latest()
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

    public function knowledge_videos() 
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allVideos = Video::select('videos.id', 'videos.' . $title . ' as title') 
                        ->orderBy($title, 'asc')
                        ->get();

        $videos = Video::select('videos.id', 'videos.' . $title . ' as title', 'videos.ruCategory', 'videos.created_at')
                        ->latest() 
                        ->paginate(30);

        return view('dashboard.knowledge.videos', compact('videos', 'allVideos'));
    }

    public function knowledge_videos_single($id) 
    {
        $video = Video::find($id);

        //get array of all files in catalog folder
        $path = public_path('catalog/videos');
        $files = scandir($path);

        // remove . & .. from array
        $files = array_diff($files, array('.', '..'));
        //sort by name
        sort($files);

        return view('dashboard.knowledge.videos_single', compact('video', 'files'));
    }

    public function knowledge_videos_create(Material $material) 
    {
        $subjectcat = Subjectcat::find($material->subjectcat_id);
        $subject = Subject::find($subjectcat->subject_id);

        //get array of all files in catalog folder
        $path = public_path('catalog/videos');
        $files = scandir($path);

        // remove . & .. from array
        $files = array_diff($files, array('.', '..'));
        //sort by name
        sort($files);

        return view('dashboard.knowledge.videos_create', compact('material', 'subjectcat', 'subject', 'files'));
    }
    // -----------------------------------Knowledge end-------------------------------------------


    // -----------------------------------News start-------------------------------------------
    public function news()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allNews = News::select('news.id', 'news.' . $title . ' as title') 
                        ->orderBy($title, 'asc')
                        ->get();

        $news = News::select('news.id', 'news.' . $title . ' as title', 'news.created_at', 'news.global') 
                    ->latest()
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


    // -----------------------------------Projects start-------------------------------------------
    public function projects()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allProjects = Project::select('projects.id', 'projects.' . $title . ' as title') 
                                ->orderBy($title, 'asc')
                                ->get();

        $projects = Project::select('projects.id', 'projects.' . $title . ' as title', 'projects.created_at', 'projects.completed') 
                        ->latest()
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


    // -----------------------------------Videos start-------------------------------------------
    public function videos()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allVideos = Entertainment::select('entertainments.id', 'entertainments.' . $title . ' as title')
                                ->orderBy($title, 'asc')
                                ->get();

        $videos = Entertainment::select('entertainments.id', 'entertainments.' . $title . ' as title', 'entertainments.created_at')
                            ->latest()
                            ->paginate(30);

        return view('dashboard.entertainment.videos.index', compact('videos', 'allVideos'));
    }

    public function videos_create()
    {
        //get array of all files in catalog folder
        $path = public_path('catalog/videos');
        $files = scandir($path);

        // remove . & .. from array
        $files = array_diff($files, array('.', '..'));
        //sort by name
        sort($files);

        return view('dashboard.entertainment.videos.create', compact('files'));
    }

    public function videos_single($id)
    {
        $video = Entertainment::find($id);

        //genereate title for breadcrumbs as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';
        $crumbsTitle = $video[$title];

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        //get array of all files in catalog folder
        $path = public_path('catalog/videos');
        $files = scandir($path);

        // remove . & .. from array
        $files = array_diff($files, array('.', '..'));
        //sort by name
        sort($files);

        return view('dashboard.entertainment.videos.single', compact('video', 'crumbsTitle', 'files'));
    }
    // -----------------------------------Videos end-------------------------------------------


    // -----------------------------------Gallery start-------------------------------------------
    public function galleries()
    {
        //generate title as ruTitle & tjTitle & enTitle
        $title = App::currentLocale() . 'Title';

        $allGalleries = Gallery::select('galleries.id', 'galleries.' . $title . ' as title')
                        ->orderBy($title, 'asc')
                        ->get();

        $galleries = Gallery::select('galleries.id', 'galleries.' . $title . ' as title', 'galleries.date')
                        ->latest()
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


    // -----------------------------------Translations start-------------------------------------------
    public function translations_index()
    {
        return view('dashboard.translations.index');
    }

    public function translations_single($id)
    {
        $lang = '';
        
        if ($id == 1) {
            $lang = 'en';
        } else {
            $lang = 'tj';    
        }

        $file = file_get_contents(base_path('resources/lang/' . $lang . '.json'));
        return view('dashboard.translations.single', compact('file', 'lang'));
    }

    public function translations_update(Request $request)
    {
        $file = base_path('resources/lang/' . $request->lang . '.json');
        $translations = $request->translations;

        file_put_contents($file, $translations);

        return redirect()->back();
    }
    // -----------------------------------Translations end-------------------------------------------

}

















