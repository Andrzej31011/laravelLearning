@php
    $total = 0;
@endphp
<div>
    @if($isOpen)
    <div @click.away="$wire.closeModal()" class="fixed top-0 left-0 w-full h-full z-40"></div>
    <div class="fixed top-0 right-0 z-50 w-full h-1/3 flex justify-end">
        <div class="bg-slate-100 p-6 rounded-lg shadow-lg m-4 mt-12 w-3/4 md:w-1/3">
            <!-- Zawartość koszyka -->
            @if(count($cart) > 0)
                <div class="overflow-y-auto max-h-96">
                    @foreach($cart as $id => $details)
                        <div class="flex justify-between items-center p-2 border-b">
                            <div class="flex items-center space-x-4">
                                <span>{{ $details['name'] }}</span>
                                <span class="text-sm text-gray-600">Ilość: {{ $details['quantity'] }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span>{{ $details['price'] }} zł</span>
                                <button wire:click="removeFromCart('{{ $id }}')" class="text-red-500 hover:text-red-700">
                                    <svg class="w-6 h-6" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @php
                            $total += $details['price']*$details['quantity'];    
                        @endphp
                    @endforeach
                </div>
                <div class="text-right font-bold mt-4">Razem: {{ $total }} zł</div>
            @else
                <p>Koszyk jest pusty.</p>
            @endif
            <div class="flex justify-end space-x-4 mt-4">
                <x-button wire:click="closeModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zamknij</x-button>
                @if (count($cart) > 0)
                    <x-button>
                        <a href="{{ route('clearCart') }}" class="btn btn-success">Wyczyść koszyk</a>
                    </x-button>
                    <x-button>
                        <a href="{{ route('formularz.platnosci') }}" class="btn btn-success">Przejdź do płatności</a>
                    </x-button>
                @endif
            </div>
        </div>    
    </div>
    @endif
    <button wire:click="openModal"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9V4a3 3 0 0 0-6 0v5m9.92 10H2.08a1 1 0 0 1-1-1.077L2 6h14l.917 11.923A1 1 0 0 1 15.92 19Z"/>
      </svg>
    </button>
</div>
