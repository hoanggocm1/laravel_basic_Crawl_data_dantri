<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.accounts.login', [
            'title' => 'Đăng nhập hệ thống Admin'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            // return dd(Auth::user());
            if (Auth::user()->role == 1) {
                return redirect()->route('admin');
            } else {
                Auth::logout();
                session()->flash('error', 'Chỉ tài khoản admin mới có thể truy cập!!!');
                return redirect()->route('login');
            }
        }

        session()->flash('error', 'Email hoặc mật khẩu không đúng');
        return  redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
