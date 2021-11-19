<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.min.css" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    
    <title>mTicket</title>
</head>
<body class="bg-gray-100 ">
    <nav class="p-6 bg-white flex justify-between mb-6 text-lg">
        <ul class="flex items-center">
            <li>
                <a href="{{route('home')}}" class="px-6 py-4 rounded-md hover:bg-blue-700 hover:text-white font-semibold hover:underline">
                    Home
                </a>
            </li>
            @can('isAdmin')
                <li>
                    <a href="{{route('dashboard')}}" class="px-6 py-4 rounded-md hover:bg-blue-700 hover:text-white font-semibold hover:underline">
                        Dashboard
                    </a>
                </li>
            @endcan
            
        </ul>
        <ul class="flex items-center">
            @if(auth()->user())
                <li><a href="" class="p-6 font-semibold">{{ auth()->user()->username }}</a></li>
                <li><a href="{{ route('logout')}}" class="p-6 font-semibold hover:underline">Logout</a></li>
                
            @else
                <li><a href="{{ route('register_page')}}" class="p-6 font-semibold hover:underline">Register</a></li>
                <li><a href=" {{ route('login_page')}}" class="p-6 font-semibold hover:underline">Login</a></li>
            @endif
            
        </ul>
    </nav>
    @yield('content')
</body>
</html>