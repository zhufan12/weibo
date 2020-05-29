<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionController extends Controller
{
    public function login(){
        return view('session.login');
    }

    public function store(Request $request){
        $credentials =  $this->validate($request,[
            'email' => 'required|max:255|email',
            'password' => 'required'
        ]);

       if (Auth::attempt($credentials)) {
           // 登录成功后的相关操作
        session()->flash('success','welcome');
         return redirect()->route('users.show', [Auth::user()]);
       } else {
           // 登录失败后的相关操作
        session()->flash('danger','sorry you are password and email error');
        return redirect()->back()->withInput();
       }
    }
}
