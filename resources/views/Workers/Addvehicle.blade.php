<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Vehicles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--  --}}
            <form class="md:w-100 w-full" name="uplode_vehicle" method="post" action="{{route('storeAddvehicle')}}"enctype="multipart/form-data">
                @csrf
                <div>
                    <x-jet-label for="brand" value="{{ __('brand') }}" />
                    <x-jet-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand')" required autofocus autocomplete="brands" />
                </div>

                <div>
                    <x-jet-label for="model" value="{{ __('model') }}" />
                    <x-jet-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus autocomplete="model" />
                </div>

                <div>
                    <x-jet-label for="year" value="{{ __('year') }}" />
                    <x-jet-input id="year" class="block mt-1 w-full" type="date" name="year" :value="old('year')" required autofocus autocomplete="year" />
                </div>

                <div>
                    <x-jet-label for="color" value="{{ __('color') }}" />
                    <x-jet-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" required autofocus autocomplete="color" />
                </div>

                <div>
                    <x-jet-label for="capacity" value="{{ __('capacity') }}" />
                    <x-jet-input id="capacity" class="block mt-1 w-full" type="text" name="capacity" :value="old('capacity')" required autofocus autocomplete="capacity" />
                </div>

                <div>
                    <x-jet-label for="license number" value="{{ __('license number') }}" />
                    <x-jet-input id="license number" class="block mt-1 w-full" type="text" name="license number" :value="old('license number')" required autofocus autocomplete="license number" />
                </div>

                <div>
                    <x-jet-label for="price" value="{{ __('price') }}" />
                    <x-jet-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus autocomplete="price" />
                </div>

                <div>
                    <x-jet-label for="description" value="{{ __('description') }}" />
                    <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                </div>
                <div class="border border-gray-400 flex  p-3 rounded-md">

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
                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Add vehicle') }}
                    </x-jet-button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
