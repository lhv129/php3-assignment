<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(LoginRequest $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($data)){
            if (Auth::user()->role === 'admin' && Auth::user()->active === 1){
                return redirect()->route('/dashboard'); 
            }else if (Auth::user()->role === 'user' && Auth::user()->active === 1){
                return redirect()->route('/');
            }else{
                Auth::logout();
                return back()->withErrors(['message' => "403 (Forbidden) - tài khoản đã bị khóa"])->withInput();
            }
        }
        return back()->withErrors(['email' => "Thông tin đăng nhập không chính xác"])->withInput();
    }

    public function register(){
        return view('register');
    }

    public function postRegister(RegisterRequest $request){
        if($request->hasFile('avatar')){
            $path_image = $request->file('avatar')->store('images/users/avatars'); 
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $path_image,
        ];
        User::create($data);
        session()->flash('message', 'Đăng ký thành công!');
        return redirect()->route('/dang-nhap');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('/dang-nhap');
    }
}
