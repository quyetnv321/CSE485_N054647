<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Hash;
class RegisterController extends Controller
{
    public function index(Request $request) {
        $this->validate(
            $request,
            [
                'userName' => 'required|unique:users,user_name|min:3',
                'pass' => 'required|min:6',
                'passA' => 'required|same:pass',
                'email' => 'required|email',
                'phone' => 'required|min:9',
                'full_name' => 'required'
            ],
            [
                'userName.unique' => 'Tài khoản đã tồn tại'
            ]
        );
        $user = new User();
        $user->user_name = $request->userName;
        $user->password = Hash::make($request->pass);
        $user->name = $request->full_name;
        $user->sex = $request->gender;
        $birthday = date('Y-m-d', time($request->birthday));
        $user->birthday = $birthday;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->level = 0;
        $user->questions_day = 15;
        $user->id_room = rand(1,10);
        if(!$user->where('user_name',$request->userName)->first()){
            $user->save();
            return redirect()->back()->with('done','Tạo tài khoản thành công');
        }
        else 
            return redirect()->back()->with('fails','Đăng ký thất bại! Tài khoản đã tồn tại');
    }
}
