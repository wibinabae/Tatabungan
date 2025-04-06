<?php

namespace App\Models;

// use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function getProvinces(){
        $response = file_get_contents('https://wilayah.id/api/provinces.json');
        return json_decode($response, true);
    }

    public function getCities($province_id){
        $response = file_get_contents('https://wilayah.id/api/regencies/'.$province_id.'.json');
        return json_decode($response, true);
    }

    public function getDistricts($city_id){
        $response = file_get_contents('https://wilayah.id/api/districts/'.$city_id.'.json');
        return json_decode($response, true);
    }
    
    public function getVillages($district_id){
        $response = file_get_contents('https://wilayah.id/api/villages/'.$district_id.'.json');
        return json_decode($response, true);
    }
}
