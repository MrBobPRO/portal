<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\Viewed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{

   public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('admin')->only(['store', 'update', 'remove']);
   }

   public function index()
   {  
      //get only questionnaires which were created after user has been created
      $userCreatedAt = \Carbon\Carbon::parse(Auth::user()->created_at);
      $formatted = $userCreatedAt->isoFormat('YYYY-MM-DD');

      $questions = Questionnaire::whereDate('created_at', '>=', $formatted)->latest()->paginate(20);

      $user_id = Auth::user()->id;

      return view('questionnaire.index', compact('questions', 'user_id'));
   }

   public function single($id)
   {  
      $question = Questionnaire::find($id);
      $user_id = Auth::user()->id;

      //set questionnaire as already seen for current user
      $viewed = Viewed::where('source', 'questionnaire')->where('questionnaire_id', $id)->where('user_id', $user_id)->first();
      if(!$viewed)
         Viewed::create([
               'source' => 'questionnaire',
               'questionnaire_id' => $id,
               'user_id' => $user_id
         ]);


      $optionsCount = count($question->options);
      //get maximum count of choices of all options
      $max_options_choices_count = 0;
      //get total choices count
      $total_choices_count = 0;

      foreach($question->options as $option) {
         $choicesCount = $option->choices()->count();
         // add options choices into $total_choices_count
         $total_choices_count += $choicesCount;
         // change maximum
         if($choicesCount > $max_options_choices_count) $max_options_choices_count = $choicesCount;
      }

      //check if user has already voted
      $optionsId = $question->options->pluck('id');
      $usersChoice = Auth::user()->choices->whereIn('option_id', $optionsId)->first();

      if($usersChoice)
         $users_choice_option_id = $usersChoice->option_id;
      else
         $users_choice_option_id = 0;


      //breadcrumbs title
      if(mb_strlen($question->text) > 23)
         $crumbsTitle = mb_substr($question->text, 0, 20) . '...';
      else
         $crumbsTitle = $question->text;

       return view('questionnaire.single', compact('question', 'crumbsTitle', 'optionsCount', 'max_options_choices_count', 'total_choices_count', 'users_choice_option_id'));
   }

   public function store(Request $request)
   {
      $question = Questionnaire::create([
         'text' => $request->text,
         'private' => $request->private ? true : false
     ]);

      return redirect()->route('dashboard.questionnaire.single', $question->id);
   }

   public function update(Request $request)
   {
      $question = Questionnaire::find($request->id);
      $question->text = $request->text;
      $question->private = $request->private ? true : false;

      $question->save();

      return redirect()->back();
   }

   public function remove(Request $request)
   {
       Questionnaire::find($request->id)->delete();

       return redirect()->route('dashboard.questionnaire.index');
   }

}
