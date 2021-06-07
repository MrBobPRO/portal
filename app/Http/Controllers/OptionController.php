<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Option;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OptionController extends Controller
{
    public function like(Request $request)
    {
        //check if admin hasnt deleted option while user was voting
        $opt = Option::find($request->option_id);
        $questionUpdatedMsg = 'Опрос был обновлён. Пожалуйста <a href="' . route('questionnaire.index') . '">перейдите по нижней ссылке !</a>';
        if(!$opt) return $questionUpdatedMsg;

        $option_id = $request->option_id;
        $question = Questionnaire::find($request->question_id);

        //check if user has already voted
        $question_options_id = $question->options->pluck('id');
        $users_choice = Auth::user()->choices->whereIn('option_id', $question_options_id)->first();

        //change choice option id if user has already voted
        if($users_choice) {
            $users_choice->option_id = $option_id;
            $users_choice->save();
        }
        //else create new choice
        else
            Choice::create([
                'option_id' => $option_id,
                'user_id' => Auth::user()->id
            ]);

        return redirect()->back();
    }

    public function remove_like(Request $request)
    {
        //check if admin hasnt deleted option while user was voting
        $opt = Option::find($request->option_id);
        $questionUpdatedMsg = 'Опрос был обновлён. Пожалуйста <a href="' . route('questionnaire.index') . '">перейдите по нижней ссылке !</a>';
        if(!$opt) return $questionUpdatedMsg;

        $question = Questionnaire::find($request->question_id);

        //check if user has voted
        $question_options_id = $question->options->pluck('id');
        $users_choice = Auth::user()->choices->whereIn('option_id', $question_options_id)->first();
        //delete choice if exists
        if($users_choice) $users_choice->delete();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        Option::create([
            'text' => $request->text,
            'questionnaire_id' => $request->question_id
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $opt = Option::find($request->id);
        $opt->text = $request->text;
        $opt->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        Option::find($request->id)->delete();
        //also delete all choices (Because calculation errors may occur)
        Choice::where('option_id', $request->id)->delete();

        return redirect()->back();
    }

}
