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
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
        
            <div class="w-full h-100 overflow-y-auto" >
                <div class="tableContanier">
                    <div class="mb-5">
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                    <div class="tableContent  text-center">
                        @if ($Vehicles->isempty())
                            <h1 class="msg text-bold">
                                This Office Have Not Vehicles.
                            </h1>
                        @else
                        <div class="px-4">
                            <table class="w-full">
                                <tr class="tableHead px-4">
                                    <th>brand</th>
                                    <th>type</th>
                                    <th>model</th>
                                    <th>year</th>
                                    <th>color</th>
                                    <th>capacity</th>
                                    <th>license_number</th>
                                    <th>price per day</th>
                                    <th>description</th>
                                    <th>available</th>
                                    <th>picture_path</th>
                                </tr>
                                @foreach($Vehicles as $item)
                                    <tr class="tableBody border-b border-gray-300">
                                        <td class="px-3">
                                            {{$item->brand}}
                                        </td>
                                        
                                        <td class="px-3">
                                                {{$item->type}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->model}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->year}}
                                        </td>
                                        
                                        <td class="px-3">
                                            <div class="fix">
                                                {{$item->color}}
                                            </div>
                                        </td>
                                        <td class="px-3">
                                            <div class="fix">
                                                {{$item->capacity}}
                                            </div>
                                        </td>
                                        <td class="px-3">
                                            {{$item->license_number}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->price}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->description}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->available}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->picture_path}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div> 
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>