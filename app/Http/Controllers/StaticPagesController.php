<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StaticPagesController extends Controller
{
    function home() {
         $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
        }
        return View('static/home',compact('feed_items'));
    }
    function about() {
        return View('static/about');
    }
    function help() {
        return View('static/help');
    }
}
