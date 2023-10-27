{{-- <!-- resources/views/services/index.blade.php -->
<x-app-layout>
    <div class="container">
        <h2>Lista Usług</h2>

        @foreach ($services as $index => $service)
            <div x-data="{ open: false }" class="service-item">
                <div class="service-header">
                    <p class="service-name"><strong>Nazwa:</strong> {{ $service['name'] }}</p>
                    <p class="service-description"><strong>Opis:</strong> {{ $service['description'] }}</p>
                    <p class="service-price"><strong>Cena:</strong> {{ $service['price'] }}</p>
                </div>

                <div class="service-actions">
                    <button class="edit-button" @click="open = !open">Edytuj</button>

                    <div x-show="open" class="edit-form">
                        <form wire:submit.prevent="updateService({{ $index }})">
                            <div class="form-group">
                                <label for="name">Nazwa:</label>
                                <input type="text" wire:model.defer="services.{{ $index }}.name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Opis:</label>
                                <textarea wire:model.defer="services.{{ $index }}.description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Cena:</label>
                                <input type="number" wire:model.defer="services.{{ $index }}.price" required>
                            </div>

                            <button type="submit" class="save-button">Zapisz</button>
                        </form>

                        <button class="delete-button" @click="deleteService({{ $index }})">Usuń</button>
                    </div>
                </div>
            </div>
        @endforeach

        <hr>

        <h2>Dodaj Usługę</h2>

        {{-- <form action="{{ route('services.store') }}" method="post">
            @csrf
            <div class="form-group">
                <x-label for="name" value="{{ __('Nazwa:') }}" />
                <x-input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <x-label for="description">Opis:</x-label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <x-label for="price">Cena:</x-label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <x-button type="submit" class="btn btn-primary">Dodaj Usługę</x-button>
        </form> --}}
    {{-- </div>
</x-app-layout> --}}









<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usługi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-servicesList />
            </div>
        </div>
    </div>
</x-app-layout>

