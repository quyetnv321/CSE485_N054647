<?php
namespace App\Http\Controllers;
session_start();
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\User;
use Hash;
class LoginController extends Controller
{
    
    public function index(Request $request) {
        $username = $request->userName;
        $password = $request->password;
        // $user = new User();
        
        if(Auth::attempt(['user_name'=>$username,'password'=>$password])) {
            $_SESSION['login'] = $username;
            return redirect('/game');
        }
        else {
            return redirect()->back();
        }
    }
    public function status() {
        if(!isset($_SESSION['login'])) {
            return redirect('home');
        }
        else {
            $dataUser = view()->share('user_login',Auth::user());
            return view('/game')->with('user_login',$dataUser);
        }
    }
    public function logout() {
        Auth::logout();
        unset($_SESSION['login']);
        return redirect('home');
    }
}
?>