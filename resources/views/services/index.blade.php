<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usługi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-button class="ml-4 m-5">
                    <a href="{{ route('services.export') }}" class="btn btn-success">Export Excel</a>
                </x-button>
                <hr>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
                    @foreach($services as $service)
                        <div class="group border-indigo-500 hover:bg-gray-100 hover:shadow-lg hover:border-transparent bg-white shadow-md rounded-lg p-4 m-5">
                            <h3 class="text-lg font-semibold">{{ $service->name }}</h3>
                            <p class="text-gray-600">{{ $service->description }}</p>
                            <p class="text-green-600 font-semibold mt-2">{{ $service->price }}zł</p>
                            <form action="{{ route('addToCart', $service->id) }}" method="POST">
                                @csrf
                                <input type="number" value="1" name="quantity" class="w-1/6 border border-gray-300 px-2 py-1 rounded">
                                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-full">
                                    <i class="bi bi-cart2"></i>Dodaj do koszyka
                                </button>
                            </form>
                            {{-- <a href="{{ route('addToCart', $service->id) }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-full">
                                <i class="bi bi-cart2"></i>Dodaj do koszyka
                            </a> --}}
                        </div>
                    @endforeach
                </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        </div>
    </div>
</x-app-layout>

