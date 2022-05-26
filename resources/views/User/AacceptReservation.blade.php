<script type = "text/javascript" >
    function calculatePrice()
    {
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

        //To display the final no. of days (result)
        document.write(Difference_In_Days);


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
            {{-- @foreach($vehicles as $vehicle) --}}

                {{--Date-start--}}
               
                <div>
                    <div class="text-gray-800 font-bold text-2xl">
                        <span>Date</span>
                    </div>
                    <div class="flex gap-x-4">
                        <div class="flex flex-col">
                            <label for="date-from">From</label>
                            <input class="p-2 rounded-md w-[12rem]" type="date" id="date-from" name="date-from">
                        </div>
                        <div class="flex flex-col">
                            <label for="date-to">To</label>
                            <input class="p-2 rounded-md w-[12rem]" type="date" id="date-to" name="date-to">
                        </div>
                    </div>
                </div>
                {{--Date-end--}}
                <button onclick="calculatePrice()">Click me</button>
               
        {{-- @endforeach --}}
        </div>
    </div>
</x-app-layout>

