<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    
    /* protected $redirectTo = RouteServiceProvider::HOME; */



    public function redirectTo(){

        if(Auth::user()->role == 'admin')
        {
            return 'admin/dashboard'; 
        }

        if(Auth::user()->role == 'responsable')
        {
            return 'responsable/dashboard'; 
        }

        if(Auth::user()->role == 'technicien')
        {
            return 'technicien/dashboard'; 
        }

        if(Auth::user()->role == 'fournisseur')
        {
            return 'fournisseur/dashboard'; 
        }
    }
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
