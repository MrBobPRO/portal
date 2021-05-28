<?php

namespace App\Http\Controllers;

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

    // -----------------------------------Questionnaire start-------------------------------------------
    public function questionnaire()
    {
        $questions = Questionnaire::latest()->get();

        return view('dashboard.questionnaire.index', compact('questions'));
    }

    public function questionnaire_create()
    {
        return view('dashboard.questionnaire.create');
    }

    public function questionnaire_single($id)
    {
        $ad = Ads::find($id);

        $crumbsTitle = $ad->text;

        if(mb_strlen($crumbsTitle) > 23)
            $crumbsTitle = mb_substr($crumbsTitle, 0, 20) . '...';

        return view('dashboard.questionnaire.single', compact('ad', 'crumbsTitle'));
    }
    // -----------------------------------Questionnaire end-------------------------------------------


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
            $books = Book::latest()->paginate(30);

            return view('dashboard.knowledge.books', compact('books'));
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
            $book->name = $request->name;
            $book->filename = $fileName;
            $book->save();
    
            return redirect('/dashboard/knowledge/books');
        }

        public function knowledge_books_update(Request $request)
        {
            //Get book by id
            $book = Book::find($request->book_id);

            if ($request->name != $book->name) 
            {   
                //Edit books name
                $book->name = $request->name;
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

        public function knowledge_books_delete(Request $request)
        {
            //Get book by id
            $book = Book::find($request->book_id);

            return redirect('/dashboard/knowledge/books');
        } 

        public function knowledge_videos() 
        {
            $videos = Video::latest()->paginate(30);

            return view('dashboard.knowledge.videos', compact('videos'));
        }

        public function knowledge_videos_single($id) 
        {
            $video = Video::find($id);

            return view('dashboard.knowledge.videos_single', compact('video'));
        }
        // -----------------------------------Knowledge end-------------------------------------------

}
