<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // if (!Auth::check()) {//đã sửa phần này 
        //     return redirect('/login');
        // }

        // if (Auth::user()->role !== $role) {// đã sửa phần này 
        //     return abort(403, 'Bạn không có quyền truy cập');
        // }
        if (!Auth::check()) {
            return redirect('/login');
        }

        // nếu role hiện tại không nằm trong danh sách role được phép
        // if (!in_array(Auth::user()->role, $roles)) {
        //     abort(403, 'Bạn không có quyền truy cập');
        // }

        return $next($request);
    }
}
