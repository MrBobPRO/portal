<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function like(Request $request)
    {
        //check if user has already graded current news
        $news_id = $request->news_id;
        $user = Auth::user();
        $user_id = $user->id;
        $grade = Grade::where('news_id', $news_id)->where('user_id', $user_id)->first();

        // if user HAS NOT already graded current news
        if($request->action == 'like' && !$grade) {

            Grade::create([
                'user_id' => $user_id,
                'news_id' => $news_id,
                'like' => true
            ]);
        
            return ['action' => 'liked',
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'avatar' => $user->avatar,
            ];
        }

        // else if user HAS already graded current news
        else if($request->action == 'like' && $grade) {
            //dislike grade
            $grade->like = true;
            $grade->save();

            return ['action' => 'changed_dislike_into_like',
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'avatar' => $user->avatar,    
            ];
        }

        //else if uaction is REMOVE like
        else if($request->action == 'remove_like' && $grade) {
            Grade::find($grade->id)->delete();

            return ['action' => 'removed_like'];
        }
    }


    public function dislike(Request $request)
    {
        //check if user has already graded current news
        $news_id = $request->news_id;
        $user = Auth::user();
        $user_id = $user->id;
        $grade = Grade::where('news_id', $news_id)->where('user_id', $user_id)->first();

        // if user HAS NOT already graded current news
        if($request->action == 'dislike' && !$grade) {

            Grade::create([
                'user_id' => $user_id,
                'news_id' => $news_id,
                'like' => false
            ]);
        
            return ['action' => 'disliked',
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'avatar' => $user->avatar,
            ];
        }

        // else if user HAS already graded current news
        else if($request->action == 'dislike' && $grade) {
            //dislike grade
            $grade->like = false;
            $grade->save();

            return ['action' => 'changed_like_into_dislike',
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'avatar' => $user->avatar,    
            ];
        }

        //else if uaction is REMOVE like
        else if($request->action == 'remove_dislike' && $grade) {
            Grade::find($grade->id)->delete();

            return ['action' => 'removed_dislike'];
        }
    }
}
