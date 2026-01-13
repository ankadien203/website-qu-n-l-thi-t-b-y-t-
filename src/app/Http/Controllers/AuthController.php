<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)//phần này đã được chỉnh sửa 
    {
        $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     $role = Auth::user()->role;

        //     return ($role === 'technician')
        //         ? redirect('/dashboard/technician')
        //         : redirect('/dashboard/staff');
        //         }
        if (Auth::attempt($credentials)) {// chỉnh if để thêm director
                $role = Auth::user()->role;

                if ($role === 'technician') {
                    return redirect('/dashboard/technician');
                }

                if ($role === 'staff') {
                    return redirect('/dashboard/staff');
                }

                if ($role === 'director') {
                    return redirect('/dashboard/director');
                }
            }
        return back()->withErrors(['email' => 'Sai email hoặc mật khẩu']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function showRegister()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' => 'required|in:staff,technician,director'//thêm director
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role
    ]);

    return redirect('/login')->with('success', 'Đăng ký thành công! Hãy đăng nhập.');
}

}

