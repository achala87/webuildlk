<nav class="navbar navbar-expand-lg navbar-expand-sm navbar-light bg-light">
            <div class="navbar-brand">
                <img src="/webuildlk-logo.png" width="70px;" height="70px">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a href="{{ route('list-organizations') }}" class="text-sm text-gray-700 underline">Rate Organization</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('anti-corruption') }}" class="ml-4 text-sm text-gray-700">I Pledge</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('value-added-economy') }}" class="ml-4 text-sm text-gray-700">Economy</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('centralized-cities-environment') }}" class="ml-4 text-sm text-gray-700">Environment</a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('about-us') }}" class="ml-4 text-sm text-gray-700">About</a>
                </li> 
                
                @if (Route::has('login'))
                        @auth
                            <!-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">Dashboard</a> -->
                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700">Login</a></li>

                            @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a></li>
                            @endif
                        @endauth
                @endif
                </ul>
            </div>
           

            <!-- Settings Dropdown -->
             @if (Auth::check()) 
             <div style="margin-right:5%;" class="hidden sm:flex sm:items-center sm:ml-6">

            <div class="dropdown">
                <button class="btn dropdown-toggle" style="font-size: small;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">{{ Auth::user()->email }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                </div>
            </div>
            </div>
            @endif

            </nav>
