<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function create(Request $request){
        var_dump($request);
//        $this->validate($request, [
//            'date'=>'required',
//            'statTime'=>'required',
//            'finishTime'=>'required',
//            'title'=>'required|min:5',
//        ]);
//var_dump($request);
//        $event = new Calendar();
//        var_dump($event);
//        $event->date = $request->date;
//        $event->start_at = $request->statTime;
//        $event->finish_at = $request->finishTime;
//        $event->title = $request->title;
//        $event->description = $request->description;
//        $event->user_id = $request->user_id;
//        $event->save();
    }
}
