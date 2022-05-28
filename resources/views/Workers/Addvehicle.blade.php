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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="md:w-100 p-4 m-2 w-full" name="uplode_vehicle" method="post" action="{{route('storeAddvehicle')}}"enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-jet-label for="brand" value="{{ __('brand') }}" />
                        <select data-placeholder="Make" id="brand" class="block rounded-lg mt-1 w-full" name="brand" tabindex="2" id="make"  :value="old('brand')" required autofocus autocomplete="brands">
                            @foreach ($brands as $item)
                                <option value="{{$item->id}}">{{$item->brand}}</option>
                            
                        @endforeach
                        </select>
                    </div>
                    <div>
                        <x-jet-label for="type" value="{{ __('type') }}" />
                        <select data-placeholder="Trim" id="type" class="block rounded-lg mt-1 w-full" name="type" :value="old('type')" required autofocus autocomplete="type" tabindex="4">
                            @foreach ($Type as $item)
                                <option value="{{$item->id}}">{{$item->type}}</option>
                            
                        @endforeach
                        </select>
                    </div>
                    <div>
                        <x-jet-label for="model" value="{{ __('model') }}" />
                        <select class="block rounded-lg mt-1 w-full" name="model" id="model" :value="old('model')" required autofocus autocomplete="model" >
                            @include('components.Car.Model')
                        </select>
                    </div>

                    <div>
                        <x-jet-label for="year" value="{{ __('year') }}" />
                        <select id="year" name="year" class="block rounded-lg mt-1 w-full"  :value="old('year')" required autofocus autocomplete="year" >
                            @include('components.Car.Year')
                        </select>
                    </div>

                    <div>
                        <x-jet-label for="color" value="{{ __('color') }}" />
                        <select name="color" id="color" class="block rounded-lg mt-1 w-full"  :value="old('color')" required autofocus autocomplete="color">
                            @include('components.Car.Color')
                        </select>
                        </div>

                    <div>
                        <x-jet-label for="capacity" value="{{ __('capacity') }}" />
                        <x-jet-input id="capacity" class="block mt-1 w-full" type="text" name="capacity" :value="old('capacity')" required autofocus autocomplete="capacity" />
                    </div>

                    <div>
                        <x-jet-label for="license number" value="{{ __('license number') }}" />
                        <x-jet-input id="license number" class="block mt-1 w-full" type="text" name="license_number" :value="old('license_number')" required autofocus autocomplete="license_number" />
                    </div>

                    <div>
                        <x-jet-label for="price" value="{{ __('price') }}" />
                        <x-jet-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus autocomplete="price" />
                    </div>

                    <div>
                        <x-jet-label for="description" value="{{ __('description') }}" />
                        <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                    </div>
                    <div class="border border-gray-400 flex mt-2 p-3 rounded-md">

                        <x-jet-label for="location" value="{{ __('location') }}" class="p-3 text-center border-r border-gray-400 " />

                        <x-jet-label for="address_description" value="{{ __('address_description') }}" class="p-3 text-center"/>
                        <x-jet-input id="address_description" class="inline mt-1 w-1/3" type="text" name="address_description" :value="old('address_description')" required autofocus autocomplete="address_description" />
                        <x-jet-label for="country" value="{{ __('country') }}" class="p-3"/>
                        <x-jet-input id="county" class="inline mt-1 w-1/3" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
                        <x-jet-label for="city" value="{{ __('city') }}" class="p-3" />
                        <x-jet-input id="city" class="inline mt-1 w-1/3" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                    </div>

                    <div>
                        <x-jet-label for="picture" value="{{ __('picture') }}" />
                        <x-jet-input id="picture" class="block mt-1 w-full" type="file" name="picture" :value="old('picture')" required autofocus autocomplete="picture" />
                    </div>
                    <div class="flex text-center items-center justify-end mt-4 ">
                        <x-jet-button class=" m-2 w-full ">
                            {{ __('Add vehicle') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
