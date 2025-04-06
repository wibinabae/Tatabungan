<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    protected $Location;


    public function __construct(Location $Location)
    {
        $this->Location = $Location;
    }

    public function getCitiesByProvince($code)
    {
        $cities = $this->Location->getCities($code);
        return response()->json($cities['data']);
    }

    public function getDistrictsByCity($code)
    {
        $districts = $this->Location->getDistricts($code);
        return response()->json($districts['data']);
    }
    
    public function getVillagesByDistrict($code)
    {
        $villages = $this->Location->getVillages($code);
        return response()->json($villages['data']);
    }

}
