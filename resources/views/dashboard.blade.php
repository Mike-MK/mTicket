@extends('layouts.app')

@section('content')
    @if (session('success'))
    <div class="flex justify-center mb-4">
        <div class="text-md py-4 px-2 bg-green-200 text-green-700 w-10/12 rounded-lg">
            {{session('success')}}
        </div>
    </div>   
    @endif
    <div class="flex justify-center">
       
        <div class="w-10/12 bg-white p-6 rounded-lg flex flex-col">
            <div class="flex justify-between px-8 border-b pb-4">
                <div class="flex text-center text-xl text-bold">Dashboard</div>
                <button class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-modal-toggle="modal-add-item" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                      </svg>
                      <div class="text-white">Add Event</div>
                </button>
            </div>
            <div class="container mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="p-8">
                            <table class="divide-y divide-gray-300" id="dataTable">
                                <thead class="bg-blue-600">
                                    <tr>
                                        <th class="px-6 py-2 text-sm text-white">
                                            ID
                                        </th>
                                        <th class="px-6 py-2 text-sm text-white">
                                            Name
                                        </th>
                                        <th class="px-6 py-2 text-sm text-white">
                                            Venue
                                        </th>
                                        <th class="px-6 py-2 text-sm text-white">
                                            Regular
                                        </th>
                                        <th class="px-6 py-2 text-sm text-white">
                                            Date
                                        </th>
                                        <th class="px-6 py-2 text-sm text-white">
                                            Edit
                                        </th>
                                        <th class="px-6 py-2 text-sm text-white">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-300">
                                    
                                @foreach ($events as $event)
                                <tr class="text-center whitespace-nowrap hover:bg-gray-100">
                                    <td class="px-6 py-4 text-md text-gray-900">
                                        {{$event->id}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-md text-gray-900">
                                            {{$event->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-md text-gray-900">{{$event->venue}}</div>
                                    </td>
                                    <td class="px-6 py-4 text-md text-gray-900">
                                       {{$event->price->regular}}
                                    </td>
                                    <td class="px-6 py-4 text-md text-gray-900">
                                        {{ date('jS F Y', strtotime($event->datetime)) }}
                                     </td>
                                    <td class="px-6 py-4">
                                        <a href='{{ route('edit',$event->id)}}' class="inline-block text-center" >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400 hover:text-blue-800"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-toggle="delete-modal"  type="button" class="inline-block text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400 hover:text-red-800"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <div id="delete-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-lg shadow relative">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                                <h3 class="text-xl lg:text-2xl font-semibold">
                                                    Warning
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="delete-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <p class="text-gray-500 text-base leading-relaxed">
                                                    Are you sure you want to delete this event?
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b">
                                                <a href="{{route('delete_event',$event->id)}}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</a>
                                                <button data-modal-toggle="delete-modal" type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
  
                                @endforeach
                                {{-- End of row item --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    
    <div id="modal-add-item" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal top-4 left-0 right-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-2xl px-4 h-full">
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h3 class="text-xl lg:text-2xl font-semibold">
                            Add Event
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="modal-add-item">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('add_event')}}" method="post">
                        @csrf
                        <input type="hidden" name="error_add_event" value="error">
                        
                    <div class="p-6 space-y-6">
                        
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="name" placeholder="Enter event name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror" value="{{old('name')}}">
                                        @error('name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 ">
                                        <label for="Venue" class="block text-sm font-medium text-gray-700">Venue</label>
                                        <input type="text" name="venue" id="venue" placeholder="Enter venue"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('venue') border-red-500 @enderror" value="{{old('venue')}}">
                                        @error('venue')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="relative">
                                        <label for="datetime" class="block text-sm font-medium text-gray-700">Date</label>
                                        <input id="datetime" name="datetime" value="{{date('Y-m-d\TH:i', strtotime(old('datetime')))}}" type="datetime-local" class="bg-gray-50 z-9999 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block col-span-6 p-2.5 @error('datetime') border-red-500 @enderror" placeholder="Select date">
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
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('regular') border-red-500 @enderror" value="{{old('regular')}}">
                                        @error('regular')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">VIP(Ksh)</label>
                                        <input type="text" name="vip" id="vip" placeholder="Ksh.00"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('vip') border-red-500 @enderror" value="{{old('vip')}}">
                                        @error('vip')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 ">
                                        <label for="Description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <input type="text" name="description" id="description"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('description') border-red-500 @enderror" value="{{old('description')}}">
                                        @error('description')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Maximum Attendance</label>
                                        <input type="text" name="max_attendance" id="vip" placeholder=""
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('max_attendance') border-red-500 @enderror" value="{{old('max_attendance')}}">
                                        @error('max_attendance')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>                      
                        
                    </div>
                    <!-- Modal footer -->
                    <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b">
                        <button data-modal-toggle="modal-add-item" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Event</button>
                        <button data-modal-toggle="modal-add-item" type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
    @if (old('error_add_event'))
        <script>
            $(document).ready(function () {
                toggleModal('modal-add-item',true);
            });
        </script>
    @endif
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
    
    
@endsection