<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function get(){
        $first = $_GET['first'];
        $second = $_GET['second'];
        $events = Calendar::all()->where('date','>=', $first)->where('date','<=',$second)->toArray();

        Response::json($events);
//        return $events;
    }
    public function save(Request $request){

        $this->validate($request, [
            'date'=>'required',
            'statTime'=>'required',
            'finishTime'=>'required',
            'title'=>'required',
        ]);

        $event = new Calendar();
        $event->date = $request->date;
        $event->start_at = $request->statTime;
        $event->finish_at = $request->finishTime;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->user_id = $request->user_id;
        $event->save();
    }

    public function update(){
        echo 'hello update';
    }

    public function delete(){

    }
}
