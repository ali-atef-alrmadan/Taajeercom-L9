<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Worker') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
                
            <form class="md:w-100 w-full" method="POST" action="{{route("storeAddWorker")}}" enctype="multipart/form-data" >
                @csrf
                <div>
                    <x-jet-label for="email" value="{{ __('email') }}" class="p-3"/>
                    <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="m-4 w-full justify-center">
                        {{ __('Add Worker') }}
                    </x-jet-button>
                </div>
                
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
