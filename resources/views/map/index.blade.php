<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stacje meteo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">                
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 w-full">
                    @livewire('weather-data')
                </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        </div>
    </div>
</x-app-layout>

