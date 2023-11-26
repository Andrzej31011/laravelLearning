<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Start') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h1 class="text-2xl font-bold text-gray-700 mb-6">Witaj, {{ $user->name }}</h1>
                
                @php
                    $groupedOrders = $user->orders->groupBy('order_details_id');
                    $numberOrder = 1;
                @endphp
                @if ($groupedOrders->isEmpty())
                    <p>Brak zamówien.</p>
                @endif
                @foreach ($groupedOrders as $orderDetailsId => $orders)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden my-5 hover:shadow-lg transition-shadow duration-300 m-5">
                        <h3 class="font-semibold text-lg text-gray-600 mb-4 m-5">Zamówienie: {{ $numberOrder++ }}</h3>
                        @foreach ($orders as $order)
                            <div class="p-2 border-b border-gray-100">
                                <p class="text-gray-600">Usługa: {{ $order->service->name }}</p>
                                {{-- Możesz dodać więcej szczegółów o usłudze tutaj --}}
                            </div>
                        @endforeach
                    </div>
                @endforeach

                {{-- Tutaj może być link do historii zamówień --}}
                {{-- <a href="{{ route('order_history') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Zobacz pełną historię zamówień</a> --}}

            </div>
        </div>
    </div>
</x-app-layout>
