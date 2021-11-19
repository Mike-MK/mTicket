@extends('layouts.app')

@section('content')
    <div class="text-3xl font-semibold md:pl-32 pl-16 pb-4">
        Home
    </div>
    @if (session('success'))
        <div class="flex justify-center rounded-lg mb-4">
            <div class="text-md py-4 px-2 bg-green-200 text-green-700 w-10/12">
                {{session('success')}}
            </div>
        </div>   
    @endif
    @if (session('failure'))
        <div class="flex justify-center rounded-lg mb-4">
            <div class="text-md py-4 px-2 bg-red-200 text-red-700 w-10/12 ">
                {{session('failure')}}
            </div>
        </div>   
    @endif
    <div class="flex justify-center">
        <div class="w-10/12 bg-white p-6 rounded-lg flex flex-col">
            <div class="container mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <h1 class="text-xl font-semibold pb-4 border-b">Events</h1>
                        <div class="p-2">
                            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                                @foreach ($events as $event)
                                <div class="group relative p-2 rounded:lg hover:shadow ">
                                    <div class="absolute ml-2 h-14 w-14 bg-blue-900 rounded-full shadow:xl float-top z-50">
                                        <div class="text-white text-lg text-center font-semibold">{{ date('jS', strtotime($event->datetime)) }}</div>
                                        <div class="text-white text-lg text-center font-semibold">{{ date('M', strtotime($event->datetime)) }}</div>
                                        
                                    </div>
                                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
        
                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Event Poster Image" class="relative w-full h-full object-center object-cover lg:w-full lg:h-full">
                                    </div>
                                    <div class="mt-4 flex flex-col px-2">
                                    
                                        <h3 class="text-lg font-semibold text-gray-700 pb-2">
                                            <a href="{{route('show',$event->id)}}">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{$event->name}}
                                            </a>
                                        </h3>
                                            
                                        
                                        <p class="text-md font-medium text-gray-500">Ksh.{{$event->price->regular}}</p>
                                        <p class="mt-2 text-sm text-gray-500 align-baseline">{{$event->description}}</p>
                                    </div>
                                    
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
@endsection