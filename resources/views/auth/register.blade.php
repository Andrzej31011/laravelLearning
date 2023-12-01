<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nick') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="voievodeship" value="{{ __('Województwo') }}" />
                <x-select class="mt-1 block w-full" id="voievodeship" :name="('voievodeship')" :value="old('voievodeship')">
                    <option value="0">-</option>
                    <option value="1">Dolnośląskie</option>
                    <option value="2">Kujawsko-Pomorskie</option>
                    <option value="3">Lubelskie</option>
                    <option value="4">Lubuskie</option>
                    <option value="5">Łódzkie</option>
                    <option value="6">Małopolskie</option>
                    <option value="7">Mazowieckie</option>
                    <option value="8">Opolskie</option>
                    <option value="9">Podkarpackie</option>
                    <option value="10">Podlaskie</option>
                    <option value="11">Pomorskie</option>
                    <option value="12">Śląskie</option>
                    <option value="13">Świętokrzyskie</option>
                    <option value="14">Warmińsko-Mazurskie</option>
                    <option value="15">Wielkopolskie</option>
                    <option value="16">Zachodniopomorskie</option>
                </x-select>
                <x-input-error for="voievodeship" class="mt-2" />
            </div>

            <div class="mt-4" x-data="{pw: ''}"">
                <x-label for="password" value="{{ __('Hasło') }}" />
                <input x-model="pw"
                       id="password" type="password" value="password" name="password"
                       class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                       placeholder="&bull;&bull;&bull;&bull;&bull;"
                ><div class="flex w-full mt-3">
                    <span class="h-1 w-1/3 rounded"
                          x-bind:class="pw.length > 5 ? 'bg-red-300' : 'bg-gray-200'"></span>
                    <span class="h-1 w-1/3 rounded mx-3"
                          x-bind:class="pw.length > 7 && pw.match(/[\w]+/) ? 'bg-yellow-300' : 'bg-gray-200'"></span>
                    <span class="h-1 w-1/3 rounded"
                          x-bind:class="pw.length > 8 && pw.match(/[!@#$%^&*(),.?:{}|<>]/) ? 'bg-green-300' : 'bg-gray-200'"></span>
                </div>
                <x-input-error for="password" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Potwierdź hasło') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="shoe_number" value="{{ __('Numer buta (opcjonalnie)') }}" />
                <x-input id="shoe_number" class="block mt-1 w-full" type="text" name="shoe_number" :value="old('shoe_number')" autocomplete="shoe_number" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Jesteś już zarejestrowany?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Zarejestruj') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
