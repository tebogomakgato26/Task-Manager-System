<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl mb-3" style="background:#059669;">
            <span class="text-white font-bold text-xl">T</span>
        </div>
        <h1 class="text-xl font-semibold text-gray-800">Welcome back!</h1>
        <p class="text-sm text-gray-500 mt-1">Sign in to your Task Manager account</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 shadow-sm" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full text-white py-2 px-4 rounded-lg font-medium" style="background:#059669;">
                {{ __('Sign In') }}
            </button>
        </div>

        <div class="text-center text-sm text-gray-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium" style="color:#059669;">Register here</a>
        </div>

        @if (Route::has('password.request'))
        <div class="text-center mt-2">
            <a class="text-xs text-gray-500 hover:text-gray-700" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        </div>
        @endif
    </form>
</x-guest-layout>