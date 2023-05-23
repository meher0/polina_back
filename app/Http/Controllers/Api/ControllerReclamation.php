<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reclamation;
use Illuminate\Http\Request;

class ControllerReclamation extends Controller
{
    public function SendReclamation (Request $request)
    {
        $data = new Reclamation();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->identifient = $request->identifient;
        $data->message = $request->message;
        $data->save();
        return response()->json($data);
        

    }
}
