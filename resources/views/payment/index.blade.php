<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formularz płatności') }}
        </h2>
    </x-slot>
    @livewire('payment-form')
</x-app-layout>

