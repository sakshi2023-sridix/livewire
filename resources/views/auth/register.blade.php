<x-guest-layout>
    
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-12">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

            <!-- Title -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">{{ __('Create an Account') }}</h2>
                <p class="text-sm text-gray-500">{{ __('Join us by filling the information below') }}</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-sm font-semibold text-gray-700" />
                    <x-text-input
                        id="name"
                        class="block mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
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
                        required
                        autocomplete="new-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-semibold text-gray-700" />
                    <x-text-input
                        id="password_confirmation"
                        class="block mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Buttons -->
                <button type="submit"
                    class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700  text-sm font-medium rounded-md shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                    {{ __('Register') }}
                </button>

                <a href="{{ route('login') }}"
                    class="w-full inline-block text-center px-4 py-2 bg-gray-600 hover:bg-gray-700  text-sm font-medium rounded-md shadow focus:outline-none focus:ring-2 focus:ring-gray-500 transition">
                    {{ __('Already have an account? Log in') }}
                </a>
            </form>

        </div>
    </div>
</x-guest-layout>
