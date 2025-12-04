<header class="bg-white text-gray-600 p-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{url('/')}}">WorkFromHere</a>
        </h1>
        <nav class="hidden lg:flex items-center">
            <x-nav-link url="/" icon="home" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link icon="laptop" url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link>
            @auth
                <x-nav-link icon="save" url="/bookmarks" :active="request()->is('bookmarks')">Saved</x-nav-link>
                <x-logout-button />
                <x-button-link url="/jobs/create" :active="request()->is('jobs/create')" icon="edit" colorClass="bg-gray-600 text-[#e7e7e7]">
                    Create Job
                </x-button-link>
                <div class="flex justify-center m-2">
                    <a href="{{route('dashboard')}}">
                        @if(Auth::user()->avatar)
                            <img class="w-20 h-20 rounded-full" src="{{asset('storage/' . Auth::user()->avatar)}}" alt="{{Auth::user()->name}}">
                        @else
                            <img class="w-20 h-20 rounded-full" src="{{asset('storage/avatars/default.png')}}" alt="{{Auth::user()->name}}">
                        @endif
                    </a>
                </div>
            @else
                {{-- login link --}}
                @if(request()->is('login'))
                    <a class="bg-gray-600 m-1 text-center text-[17px] block rounded text-white px-4 py-2" href="/login"><i class="fa fa-user mr-1"></i> Login</a>
                @else
                    <a class="bg-[#e7e7e7] m-1 text-center text-[17px] block rounded text-gray-600 px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300" href="/login"><i class="fa fa-user mr-1"></i> Login</a>
                @endif
                
                {{-- register link --}}
                @if(request()->is('register'))
                    <a class="bg-gray-600 m-1 text-center text-[17px] block rounded text-white px-4 py-2" href="/register"><i class="fa fa-pen mr-1"></i> Register</a>
                @else
                    <a class="bg-[#e7e7e7] m-1 text-center text-[17px] block rounded text-gray-600 px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300" href="/register"><i class="fa fa-pen mr-1"></i> Register</a>
                @endif
            @endauth
        </nav>
        <div class="lg:hidden">
            <button id="hamburger" class="text-gray-600 m-2 cursor-pointer lg:hidden">
                <i class="fa fa-bars text-2xl"></i>
            </button>
            <button id="X-icon" class="text-gray-600 m-2 cursor-pointer hidden lg:hidden">
                <i class="fa-solid fa-x text-2xl"></i>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="hidden lg:hidden shadow-2xl bg-white text-stone-600 mt-5 p-4">
        @auth
        <div class="flex justify-center m-2">
            <a href="{{route('dashboard')}}">
                @if(Auth::user()->avatar)
                    <img class="w-15 h-15 m-4 shadow rounded-full" src="{{asset('storage/' . Auth::user()->avatar)}}" alt="{{Auth::user()->name}}">
                @else
                    <img class="w-15 h-15 m-4 shadow rounded-full" src="{{asset('storage/avatars/default.png')}}" alt="{{Auth::user()->name}}">
                @endif
            </a>
        </div>
        @endauth
        <x-nav-link icon="laptop" url="/jobs" :active="request()->is('jobs')" :mobile="true">All Jobs</x-nav-link>
        @auth
            <x-nav-link icon="save" url="/bookmarks" :active="request()->is('bookmarks')">Saved</x-nav-link>
            <x-logout-button />
            <x-button-link url="/jobs/create" :active="request()->is('jobs/create')" icon="edit" colorClass="bg-gray-600 text-[#e7e7e7]">
                Create Job
            </x-button-link>
        @else
            {{-- login link --}}
            <div class="flex justify-center">
                @if(request()->is('login'))
                    <a class="bg-gray-600 w-full m-1 text-center text-[17px] block rounded text-white px-4 py-2" href="/login"><i class="fa fa-user mr-1"></i> Login</a>
                @else
                    <a class="bg-[#e7e7e7] w-full m-1 text-center text-[17px] block rounded text-gray-600 px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300" href="/login"><i class="fa fa-user mr-1"></i> Login</a>
                @endif
            </div>
            
            {{-- register link --}}
            <div class="flex justify-center">
                @if(request()->is('register'))
                    <a class="bg-gray-600 w-full m-1 text-center text-[17px] block rounded text-white px-4 py-2" href="/register"><i class="fa fa-pen mr-1"></i> Register</a>
                @else
                    <a class="bg-[#e7e7e7] w-full m-1 text-center text-[17px] block rounded text-gray-600 px-4 py-2 hover:shadow-[0_0_6px_0_rgba(0,0,0,0.3)] hover:scale-101 duration-300" href="/register"><i class="fa fa-pen mr-1"></i> Register</a>
                @endif
            </div>
        @endauth
    </nav>
</header>
