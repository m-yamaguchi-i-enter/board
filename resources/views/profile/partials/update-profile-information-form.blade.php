<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')


        <div>
            <x-input-label for="user_id" :value="__('userID')" />
            <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $user->user_id)" required autofocus autocomplete="user_id" />
            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
        </div>
        
        <div>
            <x-input-label for="user_name" :value="__('Name')" />
            <x-text-input id="user_name" name="user_name" type="text" class="mt-1 block w-full" :value="old('user_name', $user->user_name)" required autofocus autocomplete="user_name" />
            <x-input-error class="mt-2" :messages="$errors->get('user_name')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
