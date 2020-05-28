<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserContorller extends Controller
{
   public function create() {
        return View('users.create');
    }

    public function show(User $user){
        return View('users.show', compact('user'));
    }
}
