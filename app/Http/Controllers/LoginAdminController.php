<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Admin;
use App\models\rooms;
use Hash;
session_start();
class LoginAdminController extends Controller
{
    public function CheckAdminLogin(Request $request) {
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
    public function Chart() {
        if(!isset($_SESSION['login']))
            return redirect()->route('admin.login');
        $rooms = new rooms();
        $list = $rooms::all();
        return view('admin.chart', compact('list'));
    }
}
?>