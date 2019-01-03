<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Questions;
use App\models\User;
use App\models\Reward;
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
      $list = $user::orderBy('scores', 'ASC')->where(
                  [
                     ['id_room', $room],
                  ])->get()->toArray();
      return $list;
   }
   public function Sum() {
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $user = new User();
      $dataUsers = $user::all();
      $timeMidnight = strtotime('today midnight');
      $yesterday_TimeMidnight = strtotime('yesterday midnight');
      $yesterday_TimeMidnight = date('Y-m-d H:i:s', $yesterday_TimeMidnight);
      // dd($yesterday_TimeMidnight);
      $dayMidnight = date('d', $timeMidnight);
      foreach($dataUsers as $item) {
         $time_login = strtotime($item['updated_at']);
         $IdUser = $item['id'];
         if($time_login < $timeMidnight) {   // lần đầu đăng nhập trong ngày
            $ScoreUser = $item['scores'];
            $QuestionDay = $item['questions_day'];
            $dayLogin = date('d', $time_login);
            $totalDayOff = ($dayMidnight - $dayLogin) - 1; // số ngày ko online
            if($QuestionDay > 0 ) { // số câu hỏi chưa hoàn thành của những ngày hôm trc sẽ bị tính full điểm
               $QuestionDay = $QuestionDay + $totalDayOff * 15; // số câu hỏi ko hoàn thành
               $score = $QuestionDay * 15;
               $ScoreUser += $score;
               $user::where('id',$IdUser)->update(['scores' => $ScoreUser]);
            }
         }
         // reset info
         $user::where('id',$IdUser)->update(['questions_day' => 0]); 
         $user::where('id',$IdUser)->update(['updated_at' => $yesterday_TimeMidnight]);
         //end reset info
      } 
      // $dataUsers_Sum = $user::all();
      $listUsersWin = array();   // danh sách người chơi thắng cuộc của các phòng
      $dataUsers_Sum = $user::all()->groupBy('id_room')->toArray();
      foreach($dataUsers_Sum as &$items) {
         for($i = 0; $i < count($items); $i++) {
            for($j = 0; $j < count($items); $j++ ) {
               if($items[$j]['scores'] > $items[$i]['scores']) {
                  $arrtmp = $items[$j];
                  $items[$j] = $items[$i];
                  $items[$i] = $arrtmp;
               }
            }
         }
         array_push($listUsersWin, $items[0]);
      }

      return $listUsersWin;
   }
   public function upRewardRandom(Request $request) {
      $reward = new Reward();
      $nameRewardRandom = $request->nameRewardRandom;
      $donorRewardRandom = $request->donorRewardRandom;
      $priceRewardRandom = $request->priceRewardRandom;
      $reward->name = $nameRewardRandom;
      $reward->donor = $donorRewardRandom;
      $reward->price = $priceRewardRandom;
      $reward->level = 1;
      $reward->save();
   }
   public function upRewardVip(Request $request) {
      $reward = new Reward();
      $nameRewardVip = $request->nameRewardVip;
      $donorRewardVip = $request->donorRewardVip;
      $priceRewardVip = $request->priceRewardVip;
      $reward->name = $nameRewardVip;
      $reward->donor = $donorRewardVip;
      $reward->price = $priceRewardVip;
      $reward->level = 2;
      $reward->save();
   }
}
?>