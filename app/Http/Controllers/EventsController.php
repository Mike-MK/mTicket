<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking;
use Mail;

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
        dd($request);
        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'event_id' => $id,
            'quantity_regular' => $request->qty_regular,
            'quantity_vip' => $request->qty_vip,
        ]);
        
        dd();
        Mail::send(['text'=>'mail'], ['name'=>auth()->user()->username], function($message) {
            $message->to('michaelmukiri99@gmail.com', 'Tutorials Point')->subject
                ('Ticket(s) booked successfully');
            $message->from('mticket99@gmail.com','m Ticket');
        });
        
        return redirect()->route('home');
    }
}
