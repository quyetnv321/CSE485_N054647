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
            // update lượt chơi ngày mới
            $time_login = strtotime(Auth::user()->updated_at);
            $timeMidnight = strtotime('today midnight');
            if($time_login < $timeMidnight) {
                $IdUser = Auth::user()->id;
                $user::where('id',$IdUser)->update(['questions_day' => 15]);
            }
            //end update lượt chơi ngày mới
            return redirect()->route('game');
        }
        else
            echo "sai ten dang nhap";
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