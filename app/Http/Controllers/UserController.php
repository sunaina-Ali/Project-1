<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function company(){
         return view('company.index');
    }

    public function employe(){
        return view('employe.index');
    }
}
