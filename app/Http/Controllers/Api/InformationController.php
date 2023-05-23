<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\Humidite;
use App\Models\Eclairage;

class InformationController extends Controller
{
    public function GetTemperature() {
        $datas = Temperature::all();
        return response()->json($datas);
    }


    public function GetHumidite() {
        $datas = Humidite::all();
        return response()->json($datas);
    }



    public function GetEclairage() {
        $datas = Eclairage::all();
        return response()->json($datas);
    }
}
