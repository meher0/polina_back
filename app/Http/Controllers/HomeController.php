<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AlertNotification;
use App\Models\User;
use App\Models\Temperature;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }



   
    public function index()
    {

/* 
        $var = Auth::user()->role == 'responsable';
        dd($var);
         */


        $datas = Temperature::all();
        return view('home',compact('datas'));
    }



    public function Notify ()
    {
        $temp = Temperature::orderBy('id', 'DESC')
        ->paginate(1)
        ->where('value_tem','>=','35');

        if ($temp->count()) {
            $msg ='temperature trés chaud ';
            $user = User::all();
            Notification::send($user, new AlertNotification($msg));
          return redirect('home');
        } else {
         
            return redirect('home');
        }
        
           
        
      
    }
}
