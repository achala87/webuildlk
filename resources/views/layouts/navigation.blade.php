<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center" style="padding-left:10%;">
                    <a href="#">
                        <!-- <x-application-logo class="block h-10 w-auto fill-current text-gray-600" /> -->
                        <img class="block h-14 w-auto fill-current text-gray-600" src="{{ asset('/webuildlk-logo.png') }}" />
                    </a>
                </div>
                <!-- <x-slot name="logo">
                   
                </x-slot> -->

                <!-- Navigation Links -->
                <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    </div>     -->

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('list-organizations')" :active="request()->routeIs('list-organizations')">
                        {{ __('Rate Organizations') }}
                    </x-nav-link>
                    </div>

                    <div class="hidden flex-shrink space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('anti-corruption')" :active="request()->routeIs('anti-corruption')">
                        {{ __('Vote Anti-Corruption') }}
                    </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('value-added-economy')" :active="request()->routeIs('value-added-economy')">
                        {{ __('Value Added Industry & Economy') }}
                    </x-nav-link>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('centralized-cities-environment')" :active="request()->routeIs('centralized-cities-environment')">
                        {{ __('Centralized Cities, Environment & Constitution') }}
                    </x-nav-link>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                        {{ __('About') }}
                    </x-nav-link>
                    </div>

                   
                

                    @if (Route::has('login'))
                        @auth
                            <!-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">Dashboard</a> -->
                        @else
                        <div class="pt-2 pb-3 space-y-1">
                            <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700">Login</a></div>

                            @if (Route::has('register'))
                        <div class="pt-2 pb-3 space-y-1">
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a></div>
                            @endif
                        @endauth
                @endif
                   

                  
                </div>
                
            </div>

            <!-- Settings Dropdown -->
             @if (Auth::check()) 
             <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                      
                            <div>{{ Auth::user()->name }}</div>
                       
                        <!-- xmlns="http://www.w3.org/2000/svg" -->
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4"  viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div> @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div> -->

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('list-organizations')" :active="request()->routeIs('list-organizations')">
                {{ __('Rate Organizations') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('anti-corruption')" :active="request()->routeIs('anti-corruption')">
                    {{ __('Vote Anti-Corruption') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('value-added-economy')" :active="request()->routeIs('value-added-economy')">
                        {{ __('Value Added Industry & Economy') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('centralized-cities-environment')" :active="request()->routeIs('centralized-cities-environment')">
                        {{ __('Centralized Cities & Constitution') }}
            </x-responsive-nav-link>
        </div>
        @if (Route::has('login'))
                        @auth
                            <!-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">Dashboard</a> -->
                        @else
                        <div class="pt-2 pb-3 space-y-1">
                            <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700">Login</a></div>

                            @if (Route::has('register'))
                        <div class="pt-2 pb-3 space-y-1">
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a></div>
                            @endif
                        @endauth
                @endif


        <!-- Responsive Settings Options -->
           @if (Auth::check())<div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
              <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
               
                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>@endif
    </div>
</nav>
