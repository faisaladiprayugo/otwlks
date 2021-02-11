<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view('pages.user.index');
    }

    public function pages(){
        return view('pages.user.pages');
    }

    public function academics(){
        return view('pages.user.academics');
    }
    public function admission(){
        return view('pages.user.admission');
    }

    public function courses(){
        return view('pages.user.courses');
    }
}
