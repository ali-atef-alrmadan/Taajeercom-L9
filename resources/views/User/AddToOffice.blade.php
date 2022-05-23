<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add to office') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-jet-validation-errors class="mb-4" />

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
                
            <form class="md:w-100 w-full" method="POST" action="{{route("storeAddToOffice")}}" enctype="multipart/form-data" >
                @csrf
                <div>
                    <x-jet-label for="name" value="{{ __('name') }}" class="p-3"/>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
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
                    <x-jet-label for="phone number" value="{{ __('phone number') }}" class="p-3"/>
                    <x-jet-input id="phone number" class="block mt-1 w-full" type="number" name="phone number" :value="old('phone number')" required autofocus autocomplete="phone number" />
                </div>

                <div>
                    <x-jet-label for="description" value="{{ __('description') }}" class="p-3"/>
                    <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                </div>

                

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="m-4 w-full justify-center">
                        {{ __('Add to office') }}
                    </x-jet-button>
                </div>
                
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
