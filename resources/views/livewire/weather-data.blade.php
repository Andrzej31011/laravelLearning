<div>
    <div>
        @if($stationContent)
            <!-- wyświetlanie danych pogodowych -->
            <select wire:model="selectedStation" wire:change="updateMap" class="m-5">
                <option value="">Wybierz stację</option>
                @foreach($stationContent as $id => $station)
                    <option value="{{ $id }}">{{ $station['name'] }}</option>
                @endforeach
            </select>
            <div class="relative mt-4 m-5 z-0">
                <div wire:ignore id="mapid" style="height: 900px;" class="w-full"></div>
            </div>
            <div wire:loading>
                @livewire('spinner')
            </div>               
        @endif
    </div>
</div>

<script>
    

    var map = L.map('mapid').setView([51.733254, 23.241472], 13); // Ustawia początkową pozycję i poziom zoomu

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    document.addEventListener('DOMContentLoaded', () => {
        console.log('Loaded');
        var locations = @json($stationContent);
    
        
        Object.values(locations).forEach(function (location) {
            // Tworzenie treści dymku
            let popupContent = '<b>Szczegóły lokalizacji:</b> ' + location.name;
        
            popupContent += '<br>Brak danych meteorologicznych - wybierz stację z listy.';
        
            // Dodawanie markera z dymkiem
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup(popupContent);
        });

        window.Livewire.on('mapUpdated', (data) => {
            if (data && data.length > 0 && data[0].stationData) {
                updateMapWithSelectedStation(data[0].stationData);
            } else {
                console.error("Brak poprawnych danych stacji");
            }
        });
    });
    
    var currentMarker; // Globalna zmienna do przechowywania aktualnego markera

    function updateMapWithSelectedStation(stationData) {
        let popupContent = '<b>Szczegóły stacji:</b> ' + stationData.name;
        popupContent += '<br><b>Data pomiaru:</b> ' + stationData.measurementDate;
        popupContent += '<br><b>Temperatura powietrza:</b> ' + stationData.airTemperature + '°C';
        popupContent += '<br><b>Wilgotność:</b> ' + (stationData.relativeHumidity || 'brak danych');

        // Sprawdź, czy są dane geograficzne
        if (stationData && stationData.latitude && stationData.longitude) {
            // Dodaj nowy marker
            currentMarker = L.marker([stationData.latitude, stationData.longitude])
                .addTo(map)
                .bindPopup(popupContent);

            // Ustaw mapę na nową lokalizację
            map.setView([stationData.latitude, stationData.longitude], 13);
        } else {
            console.error("Brak danych geograficznych dla stacji");
        }
    }
</script>