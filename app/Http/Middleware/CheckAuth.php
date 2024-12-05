<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect('/dang-nhap');
        }
        // Kiểm tra vai trò của người dùng
        if (auth()->user()->role === 'user' && auth()->user()->active === 1) {
            return redirect()->back();// Chuyển hướng về trang trước
        }else if(auth()->user()->role === 'admin' && auth()->user()->active === 1){
            return $next($request); // Cho phép tiếp tục nếu người dùng là admin
        }else{
            Auth::logout();
            return redirect()->route('/dang-nhap')->withErrors(['message' => "403 (Forbidden) - tài khoản đã bị khóa"]);
        }
    }
}
