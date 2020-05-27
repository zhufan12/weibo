<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    function home() {
        return View('static/home');
    }
    function about() {
        return View('static/about');
    }
    function help() {
        return View('static/help');
    }
}
