<div class="w-full bg-white shadow-sm flex justify-center items-center">
    <div class="w-4/5 flex justify-between items-center p-4">
        <div class="flex justify-end items-center gap-x-6">
            @auth('admin')
                <div>
                    <x-link href="{{ route('admin.dashboard') }}" content="{{ auth()->user()->name }}" url="dashboard"/>
                </div>
                <div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="Logout"
                               class="text-gray-800 cursor-pointer hover:text-red-500 transition-colors duration-200 ease-in-out">
                    </form>
                </div>
            @endauth
        </div>
    </div>
</div>
