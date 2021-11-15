<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.min.css" /> 
    <title>Document</title>
</head>
<body class="bg-gray-100 ">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li><a href="" class="p-3">Home</a></li>
            @can('isAdmin')
                <li><a href="" class="p-3">Dashboard</a></li>
            @endcan
            
            <li><a href="" class="p-3">Tickets</a></li>
        </ul>
        <ul class="flex items-center">
            @if(auth()->user())
                <li><a href="" class="p-3">{{ auth()->user()->username }}</a></li>
                <li><a href="{{ route('logout')}}" class="p-3">Logout</a></li>
                
            @else
                <li><a href="{{ route('register_page')}}" class="p-3">Register</a></li>
                <li><a href=" {{ route('login_page')}}" class="p-3">Login</a></li>
            @endif
            
        </ul>
    </nav>
    @yield('content')
</body>
</html>