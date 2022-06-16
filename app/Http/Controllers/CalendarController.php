<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function all(){

    }

    public function create(){
        return view('create');
    }
}
