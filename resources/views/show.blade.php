@extends('layouts.app')

@section('content')
<div class="flex justify-center">

    <div class="w-10/12 bg-white p-6 rounded-lg flex flex-col">
        <div class="grid md:grid-cols-2 grid-cols-1">
            <div class="h-screen bg-gray-100 p-6 rounded-lg">
                <img src="" alt="product image">
            </div>
            <div class="p-6">
                <div class="border-b">
                    <div class="text-2xl font-bold mb-2">{{$event->name}}</div>
                </div>
                <div class="text-lg text-gray-500 mb-2">{{$event->description}}</div>

                <div class="text-lg mb-4"><span class="font-bold">Venue:</span> {{$event->venue}}</div>
                
                <div class="text-md font-bold p-2 border-b flex-items-start">Tickets</div>
                <form action="{{route('book',$event->id)}}" method="POST">
                    @csrf
                    <div class="flex flex-col p-4">
                        <div class="flex justify-between w-3/4 mb-4">
                            <div class=" mr-5">
                                <div class="text-md text-gray-800">Regular</div>
                            </div>
                            <div>
                                <label for="qty">Quantity:</label>
                                <input name='qty_regular' id="qty_regular" type="number" class="w-16 h-8 rounded-sm" max="5">
                            </div>
                        </div>
                        <div class="flex justify-between w-3/4 mb-4">
                            <div class="mr-5">
                                <div class="text-md text-gray-800">VIP</div>
                            </div>
                            <div>
                                <label for="qty">Quantity:</label>
                                <input name='qty_vip' id="qty_vip" type="number" class="w-16 h-8 rounded-sm" max="5">
                            </div>
                        </div>
                    </div>
                    <button class="w-full h-12 bg-blue-500 text-white font-bold text-lg" type=submit>Book Tickets</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection