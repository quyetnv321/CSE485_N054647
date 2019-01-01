<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Questions;
use App\models\User;
use Hash;
class AdminController extends Controller
{
   public function UploadQuestion(Request $request) {
        $question = new Questions();
        $question->content = $request->thread;
        $question->answerA = $request->answerA;
        $question->answerB = $request->answerB;
        $question->answerC = $request->answerC;
        $question->answerD = $request->answerD;
        $question->time = 15;
        $question->level = $request->level;
        $question->right_answer = $request->rightAnswer;
        $question->pass = 0;
        $question->save();
        return redirect()->back()->withErrors("Tải câu hỏi lên thành công");
   }
   public function GetChartRoom(Request $request) {
      $user = new User();
      $room = $request->room;
      $list = $user::orderBy('scores', 'DESC')->where('id_room', $room)->get()->toArray();
      return $list;
   }
}
?>