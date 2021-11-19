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
                <div class="text-lg text-gray-500 mb-8">{{$event->description}}</div>

                <div class="text-lg mb-4"><span class="font-bold">Venue:</span> {{$event->venue}}</div>
                <div class="text-lg mb-4">
                    <span class="font-bold">Date:</span>
                     {{ date('jS F Y', strtotime($event->datetime)) }}
                </div>
                <div class="text-lg mb-8">
                    <span class="font-bold">Time:</span>
                     {{ date('h:i A', strtotime($event->datetime)) }}
                </div>
                
                <div class="text-md font-bold p-2 border-b flex-items-start">Tickets</div>
                <form id="book" action="{{route('book',$event->id)}}" method="POST">
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
                    <div id="ticket_error" aria-hidden="true" class="hidden p-4 bg-red-100 text-red-700 m-2 rounded-lg">You can only book a maximum of 5 tickets</div>
                    <button id='submit' class="w-full h-12 bg-blue-500 text-white font-bold text-lg rounded-lg" type=submit>Book Tickets</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        
      const submit = document.getElementById('book');
      submit.addEventListener("submit",validate)
      function validate(e){
        
        let regular = document.getElementById("qty_regular").value;
        let vip = document.getElementById("qty_vip").value;
        let sum;
        if (!isNaN(vip) && !isNaN(regular)) {
            sum = parseInt(regular) + parseInt(vip);
            if(sum>5){
                console.log(sum);
                const text = document.getElementById('text');
                text.classList.add("jlings");
                const ticketError = document.getElementById("ticket_error");
                ticketError.setAttribute("aria-hidden",false);
                ticketError.classList.remove("hidden");
                
                e.preventDefault();
                
            }
        }
        return true;
      
      }
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('book').on("submit",function(){
                console.log("Loading...");
                if()
                
        });
    });
    </script> --}}

@endsection