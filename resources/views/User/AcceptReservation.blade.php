<script type = "text/javascript" >
    function calculatePrice()
    {
        var Price = document.getElementById("Price").value;
        var date3 = document.getElementById("date-from").value;
        var date4 = document.getElementById("date-to").value;

	// JavaScript program to illustrate
	// calculation of no. of days between two date

	// To set two dates to two variables
    	var date1 = new Date(date3);
        var date2 = new Date(date4);

        // To calculate the time difference of two dates
        var Difference_In_Time = date2.getTime() - date1.getTime();

        // To calculate the no. of days between two dates
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

        var FinalPrice= Price*Difference_In_Days;
        //To display the final no. of days (result)
        // document.getElementById("FinalPrice").innerHTML =FinalPrice;

        const element = document.getElementById("FinalPrice");
        element.getAttributeNode("value").value = FinalPrice;


    }
	

</script>
<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-lg  leading-tight">
                Accept Reservation
            </h2>
        </div>
    </x-slot>
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
            @foreach($vehicles as $vehicle)
            <div class="w-[21rem] h-[30rem] max-w-md max-h-lg rounded-md shadow bg-white">
                <img src="{{asset('storage/images_Vehicle/'.$vehicle->picture_path)}}" class="w-full h-[15rem] bg-gray-300 rounded-md bg-cover bg-fix"/>
                <div class="p-3 relative">
                    <div class="bg-white p-2 rounded-md text-gray-600 absolute -top-10  right-0">
                        <input type="text" value="{{ $vehicle->price }}" id="Price" hidden>
                        <span class="text-green-500 font-bold text-lg">${{ $vehicle->price }}</span>
                    </div>
                    <div class="text-2xl text-gray-600 font-bold">
                        {{ $vehicle->brand }} <span class="text-lg text-gray-500 font-medium">{{ $vehicle->year }}</span>
                    </div>
                    <div class="ml-4 mt-2">
                        <ul class="text-gray-600">
                            <li><span class="font-bold mr-2">Type:</span>{{ $vehicle->type }}</li>
                            <li><span class="font-bold mr-2">Color:</span>{{ $vehicle->color }}</li>
                            <li><span class="font-bold mr-2">Capacity:</span>{{ $vehicle->capacity }}</li>
                            <li><span class="font-bold mr-2">Office:</span><a class="hover:text-blue-500 transition-colors" href="{{ $vehicle->owner}}">{{ $vehicle->name }}</a></li>
                            <li><span class="font-bold mr-2">Location:</span>{{$vehicle->city}} {{$vehicle->address_description}}</a></li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <a href="" class="text-blue-500">see more</a>
                    </div>
                    
                   
                </div>
                    
            </div>
                

                <div class="">
                    {{-- <button onclick="calculatePrice()">Click me</button> --}}
                    <form action="{{route('storeAcceptReservation')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        {{--Date-start--}}
                        <div>
                            <div class="text-gray-800 font-bold text-2xl">
                                <span>Date</span>
                            </div>
                            <div class="flex gap-x-4">
                                <div class="flex flex-col">
                                    <label for="date-from">From</label>
                                    <input class="p-2 rounded-md w-[12rem]" type="date" id="date-from" name="Start_date">
                                </div>
                                <div class="flex flex-col">
                                    <label for="date-to">To</label>
                                    <input class="p-2 rounded-md w-[12rem]" type="date" id="date-to" name="End_date" onchange="calculatePrice()">
                                </div>
                            </div>
                        </div>
                        {{--Date-end--}}
                         
                        <input type="text" value="{{$vehicle->id}}" name="vehicle_id" hidden>
                        <input type="text" value="" name="FinalPrice" id="FinalPrice" readonly>
                        <input type="submit" value="Reservation" class="bg-blue-500 hover:bg-blue-700 transition-colors text-white p-2 rounded cursor-pointer">
                    </form>
                </div>
        @endforeach
        </div>
    </div>
</x-app-layout>
