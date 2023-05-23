<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChMessage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function Index () {
      $id = Auth::user()->id;
      $messages = ChMessage::where('from_id','<>',$id)
      ->where('to_id',$id)
      ->where('seen',0)
      ->get();
    
      $timenow = carbon::now();
    

    
   


     
    
    
   
   
        return view ('admin.dashboard',compact('messages','timenow'));
    }

   
}
