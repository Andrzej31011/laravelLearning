<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if(session('cart') && count(session('cart')) > 0)
                <h2>Koszyk Zakupowy</h2>
                    <ul>
                        @foreach(session('cart') as $id => $details)
                            <li>
                                {{ $details['name'] }} - Ilość: {{ $details['quantity'] }} - Cena: {{ $details['price'] }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Koszyk jest pusty.</p>
                @endif
                <x-button class="ml-4">
                    <a href="{{ route('clearCart') }}" class="btn btn-success">Wyczyść koszyk</a>
                </x-button>
            </div>
        </div>
    </div>

</x-app-layout>

