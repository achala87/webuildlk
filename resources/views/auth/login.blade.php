<style> 
.cregister{
    color:darkolivegreen; font-weight:bold;
}
.regrow{
    font-size:0.8rem; margin-bottom:1em;
}
</style>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="/webuildlk-logo.png" width="70px;" height="70px">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        @if (session('loginmessage'))
            <div class="alert alert-success">
                {{ session('loginmessage') }}
            </div>
       @endif
       
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="row"> <div class="regrow text-center block mt-1 w-full">
            <a class="cregister" href="{{ route('register', app()->getLocale()) }}">Register</a> to rate organizations, make pledges and much more.
        </div></div>
        <form method="POST" action="{{ route('login', app()->getLocale()) }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request', app()->getLocale()) }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
