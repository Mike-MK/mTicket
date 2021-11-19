<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Event;


class DashboardController extends Controller
{
    
    public function index(){
        $events = Event::with('price')->get();
        
        return view('dashboard')->with(['events' => $events,'success'=>"Success"]);
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'name'=> 'required|max:255',
            'venue' => 'required|max:255',
            'datetime' => 'required',
            'max_attendance' => 'required',
            'regular'=>'required',
        ]);
    
        $event = Event::create([
            'name'=> $request->name,
            'venue' => $request->venue,
            'datetime' => $request->datetime,
            'description' => $request->description,
            'max_attendees' => $request->max_attendance,
            'quantity_available' => $request->max_attendance,
        ]);
        $price = Price::create([
            'event_id' => $event->id,     
            'regular' => $request->regular,
            'vip' => $request->vip,
        ]);  
        
        
        return redirect()->route('dashboard');
    }
    
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=> 'required|max:255',
            'venue' => 'required|max:255',
            'datetime' => 'required',
            'max_attendance' => 'required',
            'regular'=>'required',
        ]);
        
        $event = Event::with('price')->find($id);
        $event->name = $request->name;
        $event->venue = $request->venue;
        $event->price->regular = $request->regular;
        $event->price->vip = $request->vip;
        $event->description = $request->description;
        $event->datetime = $request->datetime;
        $event->max_attendees = $request->max_attendance;
        $event->quantity_available = $request->max_attendance;
        $event->push();
        return redirect()->route('dashboard')->with('success','Event updated succefully');

    }
    public function edit($id)
    {
        $event = Event::with('price')->find($id);
        return view('edit')->with('event',$event);
    }
    public function delete($id)
    {
        $event=Event::find($id)->delete();
        return redirect()->route('dashboard')->with('success','Event updated succefully');
    }
}
