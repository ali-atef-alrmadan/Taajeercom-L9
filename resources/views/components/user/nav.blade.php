<div class="w-full bg-white shadow-sm flex justify-center items-center">
    <div class="w-4/5 flex justify-between items-center p-4">

        @guest
            <x-logo/>
        @endguest
        @auth
            <x-logo/>
            <div class="flex items-center gap-x-4">
                
                <div>
                    <x-link href="{{ route('home') }}" content="Home" url="/"/>
                
                </div>
            </div>
        @endauth

        <div class="flex justify-end items-center gap-x-6">
            @auth
            
                <div>
                    <x-link href="{{ route('dashboard') }}" content="{{ auth()->user()->name }}" url="dashboard"/>
                        
                </div>
                <div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="Logout"
                            class="text-gray-800 cursor-pointer hover:text-red-500 transition-colors duration-200 ease-in-out">
                    </form>
                </div>
            @endauth
            @guest
                <div>
                    <x-link href="{{ route('home') }}" content="Home" url="/"/>
                    
                </div>
                <div>
                    <x-link href="{{ route('login') }}" content="Login" url="login"/>
                   
                </div>
                <div>
                    <x-link href="{{ route('register') }}" content="Register" url="register"/>
                    {{-- <a>register</a> --}}
                </div>
            @endguest

        </div>
    </div>
</div>
