<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class WeatherData extends Component
{
    public $meteoStation;
    public $meteorogicalData;
    public $stationContent = [];
    public $selectedStation;
    public $stationDataForMap = [];

    public function render()
    {
        return view('livewire.weather-data');
    }

    public function mount(){
        $this->setStationContent();
    }

    public function getMeteoStation()
    {
        $response = Http::get('https://dev.edwin.pcss.pl/api/meteo/v3/observationStation?page=0&size=1000');
        if ($response->successful()) {
            $this->meteoStation = $response['content'];
        }
    }

    public function getMeteorogicalData($id_station, $size){
        $response = Http::get('https://dev.edwin.pcss.pl/api/meteo/v3/meteoadv/stations?ids='.$id_station.'&page=0&size='.$size);
        if ($response->successful()) {
            $this->meteorogicalData = $response['content'];
        }
    }

    public function setStationContent(){
        $this->getMeteoStation();
        foreach($this->meteoStation as $station){
            $this->stationContent[$station['id']] = [
                'name' => $station['name'],
                'latitude' => $station['latitude'],
                'longitude' => $station['longitude'],
                'ownerId' => $station['ownerId'],
                'stationType' => $station['stationType'],
                'stationStatus' => $station['stationStatus']
            ];
        }
    }

    public function updateMap()
    {
        $stationData = $this->stationContent[$this->selectedStation] ?? null;
        $this->getMeteorogicalData($this->selectedStation, 1);
        $stationFinalData = $this->meteorogicalData[0] != null ? array_merge($stationData, $this->meteorogicalData[0]) : array_merge($stationData, $this->meteorogicalData);
        $this->dispatch('mapUpdated', ['stationData' => $stationFinalData]);
    }

}
