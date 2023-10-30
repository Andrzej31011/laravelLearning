<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usługi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-button class="ml-4">
                    <a href="{{ route('services.export') }}" class="btn btn-success">Export Excel</a>
                </x-button>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
                    @foreach($services as $service)
                        <div class="group border-indigo-500 hover:bg-gray-100 hover:shadow-lg hover:border-transparent bg-white shadow-md rounded-lg p-4">
                            <h3 class="text-lg font-semibold">{{ $service->name }}</h3>
                            <p class="text-gray-600">{{ $service->description }}</p>
                            <p class="text-green-600 font-semibold mt-2">{{ $service->price }}zł</p>
                            <x-button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-full">
                                <i class="bi bi-cart2"></i>Dodaj do koszyka
                            </x-button>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</x-app-layout>

