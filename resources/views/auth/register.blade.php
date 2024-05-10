<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- user_id -->
        <div>
            <x-input-label for="user_id" :value="__('userID')" />
            
            <x-text-input id="nauser_idme" class="block mt-1 w-full" type="text" name="user_id" :value="old('user_id')" required autofocus autocomplete="user_id" />
            
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
        </div>
        
        <!-- user_name -->
        <div class="mt-4">
            <x-input-label for="user_name" :value="__('Name')" />
            
            <x-text-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" required autofocus autocomplete="user_name" />
            
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
