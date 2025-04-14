<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-12">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
            
            <!-- Title -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">{{ __('Login to Your Account') }}</h2>
                <p class="text-sm text-gray-500">{{ __('Please enter your credentials') }}</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-sm text-green-600 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        type="password"
                        name="password"
                        required autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember"
                        >
                        <span class="ms-2">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a
                            class="text-sm text-indigo-600 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Buttons -->
                <button type="submit"
    class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700  text-sm font-medium rounded-md shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
    {{ __('Log in') }}
</button>

<a href="{{ route('register') }}"
    class="w-full inline-block text-center px-4 py-2 bg-gray-600 hover:bg-gray-700  text-sm font-medium rounded-md shadow focus:outline-none focus:ring-2 focus:ring-gray-500 transition">
    {{ __('Register') }}
</a>

            </form>
        </div>
    </div>
</x-guest-layout>
