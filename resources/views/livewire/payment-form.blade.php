<div class="container mx-auto p-6">
        <!-- Koszyk -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">Twój Koszyk</h2>
            @foreach($cart as $item)
                <div class="flex justify-between items-center border-b py-3">
                    <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                    <span>{{ $item['price'] }} zł</span>
                </div>
            @endforeach
        </div>

        <!-- Formularz Zamówienia -->
        <form wire:submit.prevent="processPayment" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-semibold mb-4 text-center">Dane do zamówienia</h2>
            <hr><br>
            <div class="flex flex-wrap -mx-3 mb-4">
                <!-- Pole Imię i Nazwisko -->
                <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fullName">
                        Imię i Nazwisko
                    </label>
                    <input wire:model="fullName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Imię i Nazwisko">
                    <x-input-error for="fullName" class="mt-2" />
                </div>
            
                <!-- Pole Email -->
                <div class="w-full md:w-1/3 px-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Adres email
                    </label>
                    <input wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
                    <x-input-error for="email" class="mt-2" />
                </div>

                <!-- Pole Numeru Telefonu -->
                <div class="w-full md:w-1/3 px-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Numer Telefonu
                    </label>
                    <input wire:model="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="tel" placeholder="Numer Telefonu">
                    <x-input-error for="phone" class="mt-2" />
                </div>
            </div>

             

             <!-- Pola Adresowe -->
            <div class="flex flex-wrap -mx-4 mb-4">
                <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                        Miasto
                    </label>
                    <input wire:model="city" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="city" type="text" placeholder="Miasto">
                    <x-input-error for="city" class="mt-2" />
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="street">
                        Ulica
                    </label>
                    <input wire:model="street" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="street" type="text" placeholder="Ulica">
                    <x-input-error for="street" class="mt-2" />
                </div>
                <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="houseNumber">
                        Numer Domu
                    </label>
                    <input wire:model="houseNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="houseNumber" type="text" placeholder="Numer Domu">
                    <x-input-error for="houseNumber" class="mt-2" />
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="apartmentNumber">
                        Numer Mieszkania (Opcjonalnie)
                    </label>
                    <input wire:model="apartmentNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="apartmentNumber" type="text" placeholder="Numer Mieszkania">
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
                
            </div>

            <div class="flex flex-wrap -mx-4 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="postalCode">
                        Kod Pocztowy
                    </label>
                    <input wire:model="postalCode" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="postalCode" type="text" placeholder="Kod Pocztowy">
                    <x-input-error for="postalCode" class="mt-2" />
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="postOffice">
                        Poczta
                    </label>
                    <input wire:model="postOffice" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="postOffice" type="text" placeholder="Poczta">
                    <x-input-error for="postOffice" class="mt-2" />
                </div>
            </div>

            <!-- Sekcja Wybór Sposobu Dostawy -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-4 text-center">Wybierz sposób dostawy</h3>
                <hr><br>
                <div class="flex justify-center space-x-4">
                    <!-- Kurier -->
                    <label class="flex flex-col items-center bg-white shadow-md rounded-lg p-4 border w-40 h-44 justify-center text-center hover:bg-gray-100 cursor-pointer"">
                        <input type="radio" name="deliveryMethod" value="kurier" wire:model="deliveryMethod" class="mb-2">
                        <!-- Ikonka Kuriera -->
                        <svg class="h-8 w-8 mb-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h2l1.5-4h10l1.5 4H21v6h-1m-16 0h16v6H4v-6zm2 0v6m12-6v6m-6-6v6" />
                        </svg>
                        <span class="text-md">Kurier</span>
                        <span class="text-sm text-gray-600">19,99 zł</span>
                    </label>
                
                    <!-- InPost -->
                    <label class="flex flex-col items-center bg-white shadow-md rounded-lg p-4 border w-40 h-44 justify-center text-center hover:bg-gray-100 cursor-pointer"">
                        <input type="radio" name="deliveryMethod" value="inpost" wire:model="deliveryMethod" class="mb-2">
                        <!-- Ikonka InPost -->
                        <svg class="h-8 w-8 mb-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.51l-7.428 4.49V6h8v7.51z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3H6a2 2 0 00-2 2v14.5l7-4.25 7 4.25V5a2 2 0 00-2-2z" />
                        </svg>
                        <span class="text-md">InPost</span>
                        <span class="text-sm text-gray-600">9,99 zł</span>
                    </label>
                
                    <!-- Odbiór Osobisty -->
                    <label class="flex flex-col items-center bg-white shadow-md rounded-lg p-4 border w-40 h-44 justify-center text-center hover:bg-gray-100 cursor-pointer"">
                        <input type="radio" name="deliveryMethod" value="personalPickup" wire:model="deliveryMethod" class="mb-2">
                        <!-- Ikonka Odbioru Osobistego -->
                        <svg class="h-8 w-8 mb-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.382V7c0-1.1.9-2 2-2h14a2 2 0 012 2v8.382a2 2 0 01-.553 1.894L15 20l-3-1.5-3 1.5z" />
                        </svg>
                        <span class="text-md">Odbiór Osobisty</span>
                        <span class="text-sm text-gray-600">0,00 zł</span>
                    </label>
                </div>
                <div class="flex justify-center space-x-4"><x-input-error for="deliveryMethod" class="mt-2" /></div>
            </div>

            <!-- Sekcja Wybór Sposobu Płatności -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-4 text-center">Wybierz sposób płatności</h3>
                <hr><br>
                <div class="flex justify-center space-x-4">
                    <!-- Blik -->
                    <label class="flex flex-col items-center bg-white shadow-md rounded-lg p-4 border w-40 h-44 justify-center text-center hover:bg-gray-100 cursor-pointer">
                        <input type="radio" name="paymentMethod" value="blik" wire:click="$set('paymentMethod', 'blik')" class="mb-2">
                        <!-- Ikonka Blik -->
                        <svg class="h-8 w-8 mb-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h1m-1 0H9l2-3 2 3z" />
                        </svg>
                        <span class="text-md">Blik</span>
                    </label>
                
                    <!-- Karta -->
                    <label class="flex flex-col items-center bg-white shadow-md rounded-lg p-4 border w-40 h-44 justify-center text-center hover:bg-gray-100 cursor-pointer">
                        <input type="radio" name="paymentMethod" value="card" wire:click="$set('paymentMethod', 'card')" class="mb-2">
                        <!-- Ikonka Karty -->
                        <svg class="h-8 w-8 mb-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16v12H4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16" />
                        </svg>
                        <span class="text-md">Karta</span>
                    </label>
                
                    <!-- Płatność przy Odbiorze -->
                    <label class="flex flex-col items-center bg-white shadow-md rounded-lg p-4 border w-40 h-44 justify-center text-center hover:bg-gray-100 cursor-pointer">
                        <input type="radio" name="paymentMethod" value="cashOnDelivery" wire:click="$set('paymentMethod', 'cashOnDelivery')" class="mb-2">
                        <!-- Ikonka Płatności przy Odbiorze -->
                        <svg class="h-8 w-8 mb-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 11V7a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2v-5" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11l2-2 2 2m-2-2v4" />
                        </svg>
                        <span class="text-md">Płatność przy Odbiorze</span>
                    </label>
                </div>
                <div class="flex justify-center space-x-4"><x-input-error for="paymentMethod" class="mt-2" /></div>
            </div>


            <!-- Formularze dla Metod Płatności -->
            <div class="mt-4">
                @if ($paymentMethod == 'blik')
                    <!-- Formularz dla Blik -->
                    <div class="flex justify-center -mx-3 mb-4">
                        <div class="w-full md:w-1/5 px-3 mb-4 md:mb-0">
                            <label for="blikCode" class="block text-gray-700 text-sm font-bold mb-2">Kod BLIK:</label>
                            <input type="text" id="blikCode" wire:model="blikCode" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Wpisz kod BLIK">
                            @error('blikCode') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                @elseif ($paymentMethod == 'card')
                    <!-- Formularz dla Karty -->
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <!-- Pole Numer karty  -->
                        <div class="w-full md:w-2/5 px-3 mb-4 md:mb-0">
                            <label for="cardNumber" class="block text-gray-700 text-sm font-bold mb-2">Numer Karty:</label>
                            <input type="text" id="cardNumber" wire:model="cardNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="0000 0000 0000 0000">
                            @error('cardNumber') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    
                        <!-- Pole Data ważności -->
                        <div class="w-10 md:w-1/5 px-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="expirationDate">
                                Data ważności
                            </label>
                            <input wire:model="expirationDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="expirationDate" type="text" placeholder="00/00">
                            @error('expirationDate') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Pole kod CCV -->
                        <div class="w-10 md:w-1/5 px-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="ccv">
                               CCV
                            </label>
                            <input wire:model="ccv" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ccv" type="text" placeholder="000">
                            @error('ccv') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Pole Nazwisko -->
                        <div class="w-10 md:w-1/5 px-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="surname">
                                Nazwisko na karcie
                            </label>
                            <input wire:model="surname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="surname" type="text" placeholder="Nazwisko">
                            @error('surname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        
                       
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Zapłać
                </button>
            </div>
        </form>
        <div wire:loading class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50">
            <div class="animate-spin" style="border-top: 4px solid white; border-right: 4px solid transparent; border-radius: 50%; width: 64px; height: 64px; position: absolute; top: 0; right: 0; bottom: 0; left: 0; margin: auto;"></div>
        </div>      
             
</div>
