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
        $room = $request->room;
        if($room == 10) {
            $level = 2;
        }
        else 
            $level = 1;
        $data = $question::where([['pass', 0],['level',$level]])->first();
        if($data != NULL)
            return $data;
        else 
           return [
               'OutOfQuestion' => 1
           ];
    }
    public function getDataUser(Request $request) {
        $user = new User();
        $IdUser = $request->id;
        $data = $user::select('scores')->where('id',$IdUser)->get()->toArray();
        if($data != NULL)
            return $data;
        else 
           return [
               'OutOfDataUser' => 1
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
    public function UpdateQuestionsDay(Request $request) {
        $user = new User();
        $IdUser = $request->id;
        $Get = $user::select('questions_day')->where('id',$IdUser)->get()->toArray();
        $QuestionsCurrent = $Get[0]['questions_day'];
        $after = $QuestionsCurrent - 1;
        $user::where('id',$IdUser)->update(['questions_day' => $after]);
    }
    public function GetChartRoomUser(Request $request) {
        $user = new User();
        $room = $request->room;
        $list = $user::orderBy('scores', 'ASC')->where('id_room', $room)->get()->toArray();
        return $list;
    }
}
