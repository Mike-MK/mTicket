@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
                <div class="text-lg text-gray-900">Edit Event</div>
                <div class="px-4 py-5 bg-white sm:p-6">
                    <form action="{{route('edit_event',$event->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter event name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror" value="{{$event->name}}">
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-6 ">
                            <label for="Venue" class="block text-sm font-medium text-gray-700">Venue</label>
                            <input type="text" name="venue" id="venue" placeholder="Enter venue"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('venue') border-red-500 @enderror" value="{{$event->venue}}">
                            @error('venue')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="relative">
                            <label for="datetime" class="block text-sm font-medium text-gray-700">Date</label>
                            <input id="datetime" name="datetime" value="{{date('Y-m-d\TH:i', strtotime($event->datetime))}}" type="datetime-local" class="bg-gray-50 z-9999 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block col-span-6 p-2.5 @error('datetime') border-red-500 @enderror" placeholder="Select date">
                            @error('datetime')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="block col-span-6 text-md font-medium text-gray-700">Price</div>
                        <div class="col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Regular(Ksh)</label>
                            <input type="text" name="regular" id="regular" placeholder="Ksh.00"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('regular') border-red-500 @enderror" value="{{$event->price->regular}}">
                            @error('regular')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">VIP(Ksh)</label>
                            <input type="text" name="vip" id="vip" placeholder="Ksh.00"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('vip') border-red-500 @enderror" value="{{$event->price->vip}}">
                            @error('vip')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-6 ">
                            <label for="Description" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="description" id="description"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('description') border-red-500 @enderror" value="{{$event->description}}">
                            @error('description')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Maximum Attendance</label>
                            <input type="text" name="max_attendance" id="vip" placeholder=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('max_attendance') border-red-500 @enderror" value="{{$event->max_attendees}}">
                            @error('max_attendance')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-6">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                                Edit event
                            </button>
                        </div>
                   </div>
                </form>
                   
                </div>
        </div>
    </div>
@endsection