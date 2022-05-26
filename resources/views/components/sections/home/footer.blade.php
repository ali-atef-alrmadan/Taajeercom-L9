<div class="h-[30rem] bg-gradient-to-r from-gray-900 to-blue-900 flex justify-around items-center">
    <div class="w-[20rem] h-[25rem]">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('AddToOffice') }}" :active="request()->routeIs('AddToOffice')">
                {{ __('Create office') }}
            </x-jet-nav-link>
        </div>
    </div>
    <div class="w-[20rem] h-[25rem]">

    </div>
    <div class="w-[20rem] h-[25rem]">

    </div>
</div>
