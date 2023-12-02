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
                        @foreach ($paymentMethod->ordersDetails as $deliveryDetail)
                            <div class="flex justify-between items-start p-4 border-b border-gray-200">
                                <div>
                                    <p class="text-lg font-semibold">Szczegóły dostawy:</p>
                                    <div class="mt-4">
                                        <p class="font-semibold">Odbiorca:</p>
                                        <p>{{ $deliveryDetail->name }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="font-semibold">Sposób dostawy:</p>
                                        <p>{{ App\Enums\DeliveryMethodEnum::fromName($deliveryDetail->delivery_method)->value }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="font-semibold">Adres:</p>
                                        <p>{{ $deliveryDetail->postal_code }} {{ $deliveryDetail->post_office }}</p>
                                        <p>{{ $deliveryDetail->city }} ul.{{ $deliveryDetail->street }} {{ $deliveryDetail->house_number }}/{{ $deliveryDetail->apartment_number }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('generate-pdf', ['id' => $deliveryDetail->id]) }}" class="ml-4 px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-900 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                      </svg>   
                                      PDF                                   
                                </a>
                            </div>
                            <div class="p-4">
                                <p class="text-lg font-semibold">Szczegóły zamówienia:</p>
                                <div class="mt-4">
                                    <p class="font-semibold">Sposób płatności:</p>
                                    <p>{{ App\Enums\PaymentMethodEnum::fromName($paymentMethod->payment_method)->value }}</p>
                                </div>
                                <div class="mt-4">
                                    <p class="font-semibold">Usługi:</p>
                                    @foreach ($deliveryDetail->orders as $order)
                                        <p>{{ $order->service->name }} x{{ $order->quantity }}</p>
                                    @endforeach
                                </div>
                                <p class="mt-4 font-semibold">Koszt zakupu: {{ $paymentMethod->cost }}zł</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="flex justify-center">{{ $finalOrderDetails->links('vendor.pagination.tailwind') }}</div>
            </div>
        </div>
    </div>
</x-app-layout>

