<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-lg  leading-tight">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:inline">
                    <x-jet-nav-link href="{{ route('Viewvehicle') }}" :active="request()->routeIs('Viewvehicle')">
                        {{ __('View Vehicle') }}
                    </x-jet-nav-link>
                </div>
            
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:inline">
                        <x-jet-nav-link href="{{ route('Addvehicle') }}" :active="request()->routeIs('Addvehicle')">
                            {{ __('Add Vehicle') }}
                        </x-jet-nav-link>
                    </div>
            
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:inline">
                    <x-jet-nav-link href="{{ route('EditVehicle') }}" :active="request()->routeIs('EditVehicle')">
                        {{ __('Edit Vehicle') }}
                    </x-jet-nav-link>
                </div>
                
            </h2>
        </div>
    </x-slot>
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
        
    <div class="w-full h-full overflow-y-auto" >
        <div class="tableContanier">
            <div class="mb-5">
                <x-jet-validation-errors class="mb-4" />
            </div>
            <div class="tableContent  text-center max-w-6xl">
                @if ($Vehicles->isempty())
                    <h1 class="msg text-bold">
                        This Office Have Not Vehicles.
                    </h1>
                @else
                    <table class="w-full">
                        <tr class="tableHead">
                            <th>Edit</th>
                            <th>brand</th>
                            <th>type</th>
                            <th>model</th>
                            <th>year</th>
                            <th>color</th>
                            <th>capacity</th>
                            <th>license_number</th>
                            <th>price per day</th>
                            <th>description</th>
                            <th>picture_path</th>
                            <th>available</th>
                        </tr>
                        @foreach($Vehicles as $item)
                            <tr class="tableBody">
                                <td class="px-3 flex">
                                        <form method="POST" class="inline" action="{{route("DeleteVehicle")}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id" value="{{$item->id}}" hidden>
                                            <input class="sm:inline w-20 p-2 rounded-lg inline-block bg-red-500 text-white hover:bg-red-600 cursor-pointer" type="submit" name="submit" value="Delete">
                                        </form>
                                <form method="POST" class="inline" action="{{route("SaveEditVehicle")}}" enctype="multipart/form-data" class="w-full">
                                        @csrf
                                        <div class="space-y-2 flex">
                                            <input type="text" name="id" value="{{$item->id}}" hidden>
                                            <input class="sm:inline w-20 p-2 rounded-lg inline-block bg-green-500 text-white hover:bg-green-600 cursor-pointer" type="submit" name="submit" value="Save">
                                        </div>
                                        
                                </td>
                                    <td class="px-3">
                                        <input type="text" readonly name="brand" value="{{$item->brand}}" class="p-2 rounded-lg border  cursor-pointer form-control">
                                    </td>
                                    <td class="px-3">
                                        <input type="text" readonly name="type" value="{{$item->type}}" class="p-2 rounded-lg border  cursor-pointer form-control">
                                    </td>
                                    <td class="px-3">
                                        <select id="model" name="model" class="p-2 rounded-lg border  cursor-pointer form-control">
                                            <option value="{{$item->model}}" selected >{{$item->model}}</option>
                                            @include('components.Car.Model')
                                        </select>
                                    </td>
                                    <td class="px-3">
                                        <input type="date" name="year" value="{{$item->year}}" class="p-2 rounded-lg border  cursor-pointer form-control">
                                    </td>
                                    <td class="px-3">
                                        <select id="color" name="color" class="p-2 rounded-lg border  cursor-pointer form-control">
                                            <option value="{{$item->color}}" selected >{{$item->color}}</option>
                                            @include('components.Car.Color')
                                        </select>
                                    </td>
                                    
                                    <td class="px-3">
                                        <input type="text" name="capacity" value="{{$item->capacity}}" class="p-2 rounded-lg border  cursor-pointer form-control">
                                    </td>
                                    <td class="px-3">
                                        <input type="text" name="license_number" value="{{$item->license_number}}" class="p-2 rounded-lg border  cursor-pointer form-control">
                                    </td>
                                    <td class="px-3">
                                        <input type="text" name="price" value="{{$item->price}}" class="p-2 rounded-lg border  cursor-pointer form-control">
                                    </td>
                                    <td class="px-3">
                                        <input type="text" name="description" value="{{$item->description}}" class="p-2 rounded-lg border  cursor-pointer form-control">
                                    </td>

                                    <td class="px-3">
                                        <label id="{{$item->picture_path.'0'}}" class="p-2 rounded-lg border border-indigo-500 cursor-pointer" for="{{$item->picture_path}}">
                                            {{$item->picture_path}}
                                        </label>
                                        <div class="hidden">
                                            <input type="file" name="picture_path" id="{{$item->picture_path}}" onchange="changeName(this)">
                                        </div>
                                    </td>
                                    <td class="px-3">
                                        <select id="available" name="available" class="p-2 rounded-lg border  cursor-pointer form-control">
                                            <option value="{{$item->available}}" selected >
                                                @if ($item->available ===1)
                                                Available
                                                @else
                                                NotAvailable
                                                @endif
                                            </option>
                                            <option value="1" >Available</option>
                                            <option value="0" >NotAvailable</option>
                                        </select>
                                    </td>
                                </form>
                            </tr> 
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>