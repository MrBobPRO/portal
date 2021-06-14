<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendCredentials;
use App\Models\News;
use App\Models\Slider;
use App\Models\User;
use App\MOdels\Book;
use App\MOdels\Entertainment;
use App\MOdels\Gallery;
use App\MOdels\Project;
use App\MOdels\Video;
use stdClass;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('send_credentials');
    }

    public function index()
    {
        $items = Slider::orderBy('priority', 'asc')->get();

        return view('home.index', compact('items'));
    }

    public function store_dashboard_visibility(Request $request)
    {   
        session([
            'dashboard' => $request->visibility
        ]);

        return 'success';
    }

    public function send_credentials()
    {
        $users = User::all();
        \Mail::to('boburjon_n@mail.ru')->send(new SendCredentials('Botir', '12345'));

        return redirect()->back();
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

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        
        $result = new stdClass;
        
        $result->books = Book::where('ruTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('tjTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('enTitle', 'like', '%' . $keyword . '%')
                    ->get();

        $result->entertainments = Entertainment::where('ruTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('tjTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('enTitle', 'like', '%' . $keyword . '%')
                    ->get();

        $result->galleries = Gallery::where('ruTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('tjTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('enTitle', 'like', '%' . $keyword . '%')
                    ->get();

        $result->news = News::where('ruTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('tjTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('enTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('ruText', 'like', '%' . $keyword . '%')
                    ->orWhere('tjText', 'like', '%' . $keyword . '%')
                    ->orWhere('enText', 'like', '%' . $keyword . '%')
                    ->get();
                    
        $result->projects = Project::where('ruTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('tjTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('enTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('ruText', 'like', '%' . $keyword . '%')
                    ->orWhere('tjText', 'like', '%' . $keyword . '%')
                    ->orWhere('enText', 'like', '%' . $keyword . '%')
                    ->get();
            
        $result->users = User::where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('nickname', 'like', '%' . $keyword . '%')
                    ->orWhere('surname', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%')
                    ->get();
                    
        $result->videos = Video::where('ruTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('tjTitle', 'like', '%' . $keyword . '%')
                    ->orWhere('enTitle', 'like', '%' . $keyword . '%')
                    ->get();

        $resultsCount = $result->books->count()
                    + $result->entertainments->count() 
                    + $result->galleries->count()
                    + $result->news->count()
                    + $result->projects->count()
                    + $result->users->count()
                    + $result->videos->count();

        return view('search.index', compact('result', 'resultsCount', 'keyword'));

    }

}
