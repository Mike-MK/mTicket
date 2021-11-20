@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 md:w-4/12 bg-white p-6 rounded-lg">
            <div class="text-center text-2xl font-semibold mb-4 text-blue-900">mTicket</div>
            @if (session('failure'))
                <div class="flex justify-center rounded-lg mb-4">
                    <div class="text-md py-4 px-2 bg-red-200 text-red-700 w-full rounded-lg">
                        {{session('failure')}}
                    </div>
                </div>   
            @endif
            <form action="{{ route('register')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name"  placeholder="Enter name"
                    class="bg-gray-100 border-2 w-full py-2 px-4 rounded-lg  @error('name') border-red-500 @enderror" value="{{old('name')}}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username"
                    class="bg-gray-100 border-2 w-full py-2 px-4 rounded-lg  @error('username') border-red-500 @enderror" value="{{old('username')}}">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter email"
                     class="bg-gray-100 border-2 w-full py-2 px-4 rounded-lg  @error('email') border-red-500 @enderror" value="{{old('email')}}">
                     @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password"
                     class="bg-gray-100 border-2 w-full py-2 px-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                     @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-8">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password"
                     class="bg-gray-100 border-2 w-full py-2 px-4 rounded-lg" value="">
                    
                </div>
                <div class="flex justify-center mb-4">
                    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-3 rounded font-medium w-full">
                        REGISTER
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection