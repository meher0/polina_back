<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use Mail;
use App\Mail\SendPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ChMessage;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function GetAllUsers () {
        $id = Auth::user()->id;
        $messages = ChMessage::where('from_id','<>',$id)
        ->where('to_id',$id)
        ->where('seen',0)
        ->get();
        $timenow = carbon::now();
        $datas = User::all();
        error_log($datas);
        return view ('admin.consulter_compte',compact('datas','messages','timenow'));
    }


    public function images($id){
        
        return view('admin.images');
    }


    public function FormeAddAccount () {
        $id = Auth::user()->id;
        $messages = ChMessage::where('from_id','<>',$id)
        ->where('to_id',$id)
        ->where('seen',0)
        ->get();
        $timenow = carbon::now();
    
        return view ('admin.forme_add_accout',compact('messages','timenow'));
    }
  


    public function AddAccount(Request $request){
        $users =  new User();
  
       
        $search = User::where('email','=',$email)->get();
        if ($search->count()) {
            return back()->with('alert_red','this account has been exist');
        }else{
        $password = uniqid();
        $users->name      = $request->name;
        $users->email     = $request->email;
        $users->lastname  = $request->lastname;
        $users->cin       = $request->cin;
        $users->phone     = $request->phone;
        $users->address   = $request->address;
        /* $users->role   = $request->role; */
        $users->password  = Hash::make($password);
        Mail::to($request->email)->send(new SendPassword($password));
        $users->save();

        return back()->with('alert_green','account created with success');
        }
     }


     public function BannedAccount(Request $request){
        $data = User::find($request->id);
        $banned ='1';
            $data->status = $banned;
            $data->save();
        return back()->with('alert_red','Accound is banned !!');
     }


     public function InbannedAccount(Request $request){
        $data = User::find($request->id);
        $banned ='0';
            $data->status = $banned;
            $data->save();
        return back()->with('alert_green','Accound is inbanned !!');
     }

     public function SearchAccount (Request $request){
        $id = Auth::user()->id;
      $messages = ChMessage::where('from_id','<>',$id)
      ->where('to_id',$id)
      ->where('seen',0)
      ->get();
      $timenow = carbon::now();


        $search = $request->q;
        $datas  = User::where('name','like','%'. $search. '%')
        ->orwhere('lastname','like','%'. $search. '%')
        ->orwhere('cin','like','%'. $search. '%')
        ->orwhere('role','like','%'. $search. '%')
        ->get();

        if($datas->count())
            {
                return view('admin.consulter_compte',compact('datas','messages','timenow'));
            }
        else
            {
                return back()->with([
                    'status' => 'Account not exist '
                ]);
            }   
     }
   
}
