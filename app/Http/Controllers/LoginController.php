<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\User;
use Hash;
class LoginController extends Controller
{
    public function index(Request $request) {
        $username = $request->userName;
        $password = $request->password;

        // $password = Hash::make( $request->password);
        // dd($username);
        $user = new User();
        // dd($password);
        
        
        if(Auth::attempt(['user_name'=>$username,'password'=>$password])) {
            return view('game');
        }
        else {
            return redirect()->back();
        }
    }
}
?>