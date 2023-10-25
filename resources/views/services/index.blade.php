<!-- resources/views/services/index.blade.php -->
<x-app-layout><p>asd</p>
@foreach ($services as $service)
    <p>{{ $service->name }} - {{ $service->description }}</p>
@endforeach
</x-app-layout>