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
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block col-span-6 pl-10 p-2.5" placeholder="Select date">
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