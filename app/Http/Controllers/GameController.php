<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models\Questions;
use App\models\User;
class GameController extends Controller
{
    //
    public function getQuestion(Request $request) {
        // echo $request->query;
        $question = new Questions();
        $data = $question::where('pass', 0)->first();
        if($data != NULL)
            return $data;
        else 
           return [
               'OutOfQuestion' => 1
           ];
    }
    public function UpdatePassQuestion(Request $request) {
        $question = new Questions();
        $question::where('id', $request->idQuestion)->update(['pass' => 1]);
    }
    public function Scores(Request $request) {
        $score = $request->score;
        $IdUser = $request->user;
        $user = new User();
        $GetScore = $user::select('scores')->where('id',$IdUser)->get()->toArray();
        $ScoreCurrent = $GetScore[0]['scores']; // điểm hiện tại
        $TotalScores = $score + $ScoreCurrent;
        $user::where('id',$IdUser)->update(['scores' => $TotalScores]);
        // return $score;
    }
}
