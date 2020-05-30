<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionController extends Controller
{
    public function __construct(){
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    public function login(){
        return view('session.login');
    }

    public function store(Request $request){
        $credentials =  $this->validate($request,[
            'email' => 'required|max:255|email',
            'password' => 'required'
        ]);

       if (Auth::attempt($credentials,$request->has('remember'))) {
            if (Auth::user()->acticated) {
                Session()->falsh('success','welcome back');
               $fallback = route('users.show', Auth::user());
               return redirect()->intended($fallback);
            }else {
               Auth::logout();
               session()->flash('warning', 'sorry you are ancient not activated');
               return redirect('/');
           }
       } else {
           // 登录失败后的相关操作
        session()->flash('danger','sorry you are password and email error');
        return redirect()->back()->withInput();
       }
    }

    public function destory(){
        Auth::logout();
        session()->flash('success','logout success');
        return redirect()->route('login');
    }
}
