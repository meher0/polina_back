<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function count(){
        $nbr = Notification::get()->count();
        return response()->json($nbr);

    }
}
