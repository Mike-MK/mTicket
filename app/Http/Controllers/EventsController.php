<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::with('price')->get();
        
        return view('home')->with('events',$events);
    }
    public function show($id)
    {
        $event = Event::with('price')->find($id);

        return view('show')->with('event',$event);
    }
    public function book(Request $request,$id)
    {
        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'event_id' => $id,
            'quantity_regular' => $request->qty_regular,
            'quantity_vip' => $request->qty_vip,
        ]);

        return redirect()->route('home');
    }
}
