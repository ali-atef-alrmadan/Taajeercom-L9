<div class="bg-gray-100 overflow-x-hidden">
    <div class="flex justify-center flex-row flex-wrap gap-6 p-4">
        @foreach($vehicles as $vehicle)
            <div class="w-[21rem] h-[30rem] max-w-md max-h-lg rounded-md shadow bg-white">
                <img src="{{asset('storage/images_Vehicle/'.$vehicle->picture_path)}}" class="w-full h-[15rem] bg-gray-300 rounded-md bg-cover bg-fix"/>
                <div class="p-3 relative">
                    <div class="bg-white p-2 rounded-md text-gray-600 absolute -top-10  right-0">
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
                    <div class="absolute bottom-0 right-0 mr-2 mb-2">
                        <form action="{{route('AcceptReservation')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{$vehicle->id}}" name="vehicle_id" hidden>
                            <input type="submit" value="Reservation" name="make-reservation" class="bg-blue-500 hover:bg-blue-700 transition-colors text-white p-2 rounded cursor-pointer">
                        </form>
                    </div>
                </div>

            </div>

        @endforeach
    </div>

    <div class="w-2/3 p-4 mx-auto">
        {{ $vehicles->links() }}
    </div>
</div>
