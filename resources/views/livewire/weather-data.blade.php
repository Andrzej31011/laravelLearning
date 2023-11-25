<div>
    <div>
        @if($stationContent)
            <!-- wyświetlanie danych pogodowych -->
            {{-- @foreach ($stationContent as $data)
                <div>Nazwa: {{ $data['name'] }} Latitude: {{ $data['latitude'] }} Longitude: {{ $data['longitude'] }}</div>
            @endforeach --}}
            <div class="mt-4 m-5">
                <div id="mapid" style="height: 500px;" class="w-full"></div>
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
        
        console.log(locations);
        
        Object.values(locations).forEach(function (location) {
            // Tworzenie treści dymku
            let popupContent = '<b>Szczegóły lokalizacji:</b> ' + location.name;
        
            // Sprawdzanie, czy istnieją dane meteorologiczne
            if (location.meteorologicalData && location.meteorologicalData.length > 0) {
                // Przejście przez wszystkie dane meteorologiczne
                location.meteorologicalData.forEach(function(data) {
                    popupContent += '<br><b>Data pomiaru:</b> ' + data.measurementDate;
                    popupContent += '<br><b>Temperatura powietrza:</b> ' + data.airTemperature + '°C';
                    popupContent += '<br><b>Wilgotność względna:</b> ' + (data.relativeHumidity || 'brak danych');
                    // Dodaj tutaj więcej informacji meteorologicznych w razie potrzeby
                });
            } else {
                popupContent += '<br>Brak danych meteorologicznych.';
            }
        
            // Dodawanie markera z dymkiem
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup(popupContent);
        });
    });
    // Opcjonalnie: Dodaj markery, kształty itp.
</script>