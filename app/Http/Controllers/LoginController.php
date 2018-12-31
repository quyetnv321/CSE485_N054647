<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\User;
use Hash;
class LoginController extends Controller
{
    public function checkLogin(Request $request) {
        $user = new User();
        $user_data = array(
            'user_name' => $request->userName,
            'password' => $request->password
        );
        if(Auth::attempt($user_data)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            // update lượt chơi, điểm ngày mới
            $time_login = strtotime(Auth::user()->updated_at);
            $timeMidnight = strtotime('today midnight');
            $timeNow = time();
            $aDay = 86400;  // 1 ngày = 86400s

            if($time_login < $timeMidnight) {   // lần đầu đăng nhập trong ngày
                $IdUser = Auth::user()->id;
                $ScoreUser = Auth::user()->scores;
                $QuestionDay = Auth::user()->questions_day;
                $dayMidnight = date('d', $timeMidnight);
                $dayLogin = date('d', $time_login);
                $totalDayOff = ($dayMidnight - $dayLogin) - 1; // số ngày ko online
                if($QuestionDay > 0 ) { // số câu hỏi chưa hoàn thành của những ngày hôm trc sẽ bị tính full điểm
                    $QuestionDay = $QuestionDay + $totalDayOff * 15; // số câu hỏi ko hoàn thành
                    $score = $QuestionDay * 15;
                    $ScoreUser += $score;
                    $user::where('id',$IdUser)->update(['scores' => $ScoreUser]);
                }
                $user::where('id',$IdUser)->update(['questions_day' => 15]);
            }
            //end update lượt chơi, điểm ngày mới
            return redirect()->route('game');
        }
        else
            return Redirect::back()->withErrors(['msg', 'Sai tên tài khoản hoặc mật khẩu']);
    }
    public function game() {
        return view('game');
    }
    public function home() {
        return view('home');
    }
    public function logout() {
        Auth::logout();
        return redirect('home');
    }
}
?>