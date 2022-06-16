<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function all(){
        $events = Calendar::all();
//        var_dump($events->toArray());
        return view('allEvents');
    }

    public function create(){
        return view('create');
    }
}
