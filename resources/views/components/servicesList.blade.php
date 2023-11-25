<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    
    <x-button class="ml-4" >
        <a href="{{ route('services.export') }}" class="btn btn-success">Export Excel</a>
    </x-button>
    @extends('layouts.app')

    @section('content')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full md:w-1/2 lg:w-1/3">
            @foreach($services as $service)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold">{{ $service->name }}</h3>
                    <p class="text-gray-600">{{ $service->description }}</p>
                    <p class="text-green-600 font-semibold mt-2">${{ $service->price }}</p>
                    <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-full">Dodaj do koszyka</button>
                </div>
            @endforeach
        </div>
    @endsection

</div>

