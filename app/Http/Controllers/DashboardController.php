<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Event;


class DashboardController extends Controller
{
    
    public function index(){
        $events = Price::get();
        dd($price->event);
        
        return view('dashboard')->with(['events' => $events]);
    }

    public function store(Request $request){
        
        $event = Event::create([
            'name'=> 'Churchill',
            'venue' => 'Nairobi',
            'description' => 'None',
            'max_attendees' => 98,
            'quantity_available' => 98,
        ]);
        $price = Price::create([
            'event_id' => $event->id,     
            'regular' => 2345,
            'vip' => 5436,
        ]);  

        $events = Price::get();
        dd($price->event);
        return redirect()->route('dashboard');
    }
}
