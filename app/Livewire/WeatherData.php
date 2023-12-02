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
        $url = config('api.meteo_station_api_url');
        $response = Http::get($url);
        if ($response->successful()) {
            $this->meteoStation = $response['content'];
        }
    }

    public function getMeteorogicalData($id_station, $size)
    {
        $url = config('api.meteorogical_data_api_url') . "?ids={$id_station}&page=0&size={$size}";
        $response = Http::get($url);
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
        $stationFinalData = !empty($this->meteorogicalData[0]) ? array_merge($stationData, $this->meteorogicalData[0]) : array_merge($stationData, $this->meteorogicalData);
        $this->dispatch('mapUpdated', ['stationData' => $stationFinalData]);
    }

}
