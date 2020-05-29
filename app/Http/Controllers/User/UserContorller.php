<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserContorller extends Controller
{
   public function create() {
        return View('users.create');
    }

    public function show(User $user){
        return View('users.show', compact('user'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

           $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Auth::login($user);
        session()->flash('success','welcome   '.$user->name);
        return redirect()->route('users.show',[$user]);
    }

    public function edit(User $user){
        return View('users.edit',compact('user'));
    }

    public function update(Request $request,User $user){

        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'confirmed'
        ]);
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success','edit success');
        return redirect()->route('users.show',$user);
    }

}
