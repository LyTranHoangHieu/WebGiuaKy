<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function store(Request $request){
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))){
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc Mật khẩu không đúng');
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin/users/login');
    }
}
