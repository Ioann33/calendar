<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * get all selected events
     */
    public function get(){
        $first = $_GET['first'];
        $second = $_GET['second'];
        $events = Calendar::all()->where('date','>=', $first)->where('date','<=',$second)->toArray();

        Response::json($events);
//        return $events;
    }

    /**validate request and store new event
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request){

        $this->validate($request, [
            'date'=>'required',
            'statTime'=>'required',
            'finishTime'=>'required',
            'title'=>'required',
        ]);

        if ($request->user_id){
            $event = new Calendar();
            $event->date = $request->date;
            $event->start_at = $request->statTime;
            $event->finish_at = $request->finishTime;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->user_id = $request->user_id;
            $event->save();
        }else{
            $events = Calendar::all()->where('date','=', $request->date)->where('start_at','>=',$request->statTime)->where('finish_at','<=',$request->finishTime)->toArray();
            if ($events){
                echo 'event on this time already exist';
            }else{
                $event = new Calendar();
                $event->date = $request->date;
                $event->start_at = $request->statTime;
                $event->finish_at = $request->finishTime;
                $event->title = $request->title;
                $event->description = $request->description;
                $event->user_id = $request->user_id;
                $event->save();
            }
        }



    }

    /**
     * update event by id
     * @param array $values
     * @param int $id
     */
    public function update(array $values, int $id){
        $event = Calendar::findOrFail($id);
        $event->date = $values[0];
        $event->start_at = $values[1];
        $event->finish_at = $values[2];
        $event->title = $values[3];
        $event->description = $values[4];
        $event->save();

    }

    /**
     * delete event by id
     * @param int $id
     */
    static public function delete(int $id){
        $event = Calendar::findOrFail($id);
        $event->delete();
        echo true;
    }
}
