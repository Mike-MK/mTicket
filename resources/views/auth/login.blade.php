@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 md:w-4/12 bg-white p-6 rounded-lg">
            <div class="text-center text-2xl font-semibold mb-4 text-blue-900">mTicket</div>
            @if (session('failure'))
                <div class="flex justify-center rounded-lg mb-4">
                    <div class="text-md py-4 px-2 bg-red-200 text-red-700 w-full">
                        {{session('failure')}}
                    </div>
                </div>   
            @endif
            <form action="{{ route('login')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username"
                     class="bg-gray-100 border-2 w-full py-2 px-4 rounded-lg  @error('email') border-red-500 @enderror" value="{{old('username')}}">
                     @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password"
                     class="bg-gray-100 border-2 w-full py-2 px-4 p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                     @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-8">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember"class="mr-2" Checked>
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                @if (session('error_message'))
                    <div class="flex justify-left mt-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        <div class="text-red-500 text-sm">
                            {{session('error_message')}}
                        </div>
                    </div>
                    
                @endif
                
                <div class="flex justify-center mb-4">
                    <button type="submit" class="bg-blue-700 text-white px-4 py-3 rounded font-medium w-full hover:bg-blue-800 hover:ring-4 hover:ring-blue-300">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
@endsection