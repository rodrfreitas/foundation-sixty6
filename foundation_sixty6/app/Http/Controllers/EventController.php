<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;


class EventController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
       $events = Event::all();

        return response()->json($events);
     }

     public function getOne($id) {
         $events = Event::find($id);
    
        return response()->json($events);
    }
    
    public function save(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required'
        ]);

        $event = Event::create($request->all());
        return response()->json($event, 201);
    }


    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required'
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());
        return response()->json($event, 200);
    }
    

    public function delete($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(null, 204);
    }
    
}
