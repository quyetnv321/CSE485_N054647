<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Admin;
use Hash;
session_start();
class LoginAdminController extends Controller
{
    public function CheckAdminLogin(Request $request) {
        // $user = new User();
        // $user_data = array(
        //     'user_name' => $request->userName,
        //     'password' => $request->password
        // );
        // if(Auth::attempt($user_data)) {
        //     return redirect()->route('game');
        // }
        // else
        //     echo "sai ten dang nhap";
        $admin = new Admin();
        $user_name = $request->userName;
        $password = $request->password;
        if($admin::where([['user_name',$user_name],['password',$password]])->first()) {
            $_SESSION['login'] = $user_name;
            return redirect()->route('admin.manage');
        }
        else
            return redirect()->back()->withErrors(['msg', 'Sai tên tài khoản hoặc mật khẩu']);
    }
    public function manage() {
        if(!isset($_SESSION['login']))
            return redirect()->route('admin.login');
        return view('admin.manage');
    }
    public function GetLogin() {
        if(isset($_SESSION['login']))
            return redirect()->route('admin.manage');
        return view('admin.login');
    }
    public function logout() {
        unset($_SESSION['login']);
        return redirect()->route('admin.login');
    }
}
?>