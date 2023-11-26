<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class WeatherData extends Component
{
    public $meteoStation;
    public $meteorogicalData;
    public $stationContent = [];

    public function render()
    {
        return view('livewire.weather-data');
    }

    public function mount(){
        $this->setStationContent();
    }

    public function getMeteoStation()
    {
        $response = Http::get('https://dev.edwin.pcss.pl/api/meteo/v3/observationStation?page=0&size=20');
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
            
            //Pobieranie danych meteorologicznych
            $this->getMeteorogicalData($station['id'], 1);
            #dd($this->meteorogicalData);
            foreach($this->meteorogicalData as $data){
                // Dodawanie danych meteorologicznych jako część wpisu stacji
                $this->stationContent[$station['id']]['meteorologicalData'][] = [
                    'measurementDate' => $data['measurementDate'] ?? null,
                    'airTemperature' => $data['airTemperature'] ?? null,
                    'relativeHumidity' => $data['relativeHumidity'] ?? null,
                    'windSpeed' => $data['windSpeed'] ?? null,
                    'windDirection' => $data['windDirection'] ?? null,
                    'airPressure' => $data['airPressure'] ?? null,
                    'precipitation' => $data['precipitation'] ?? null,
                    'soilTemp' => $data['soilTemp0_05'] ?? null,
                    'soilTempDepth' => $data['soilTempDepth0_1'] ?? null
                ];
            }
        }
    }
}
