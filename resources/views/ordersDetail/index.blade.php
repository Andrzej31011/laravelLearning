<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historia zamówień') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if($finalOrderDetails->isEmpty())
                    <p class="m-5">Brak zamówien.</p>
                @endif
                @foreach ($finalOrderDetails as $paymentMethod)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden my-5 hover:shadow-lg transition-shadow duration-300 m-5">
                        {{-- Zakomentowany kod: <h3>Metoda płatności: {{ $paymentMethod->payment_method }}</h3> --}}
                        @foreach ($paymentMethod->ordersDetails as $deliveryDetail)
                            <div class="p-4 border-b border-gray-200">
                                <p class="text-lg font-semibold">Szczegóły dostawy:</p>
                                <div class="mt-4">
                                    <p class="font-semibold">Odbiorca:</p>
                                    <p>{{ $deliveryDetail->name }}</p>
                                </div>
                                <div class="mt-4">
                                    <p class="font-semibold">Adres:</p>
                                    <p>{{ $deliveryDetail->postal_code }} {{ $deliveryDetail->post_office }}</p>
                                    <p>{{ $deliveryDetail->city }} ul.{{ $deliveryDetail->street }} {{ $deliveryDetail->house_number }}/{{ $deliveryDetail->apartment_number }}</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-lg font-semibold">Usługi:</p>
                                @foreach ($deliveryDetail->orders as $order)
                                    <p>{{ $order->service->name }} x{{ $order->quantity }}</p>
                                @endforeach
                                <p class="mt-4 font-semibold">Koszt zakupu: {{ $paymentMethod->cost }}zł</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>



</x-app-layout>

