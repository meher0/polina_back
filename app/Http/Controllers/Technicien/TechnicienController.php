<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tache;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class TechnicienController extends Controller
{
    public function Accueil(){

        $count_notify = Notification::where('notifiable_id',Auth::user()->id)->count();
        return view('technicien.dashboard',compact('count_notify'));
    }

    public function MarkAsRead($id){
      if ($id) {
        auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
      }
      return back();
    }


    public function showGestionTache(){

        $count_notify = Notification::where('notifiable_id',Auth::user()->id)->count();
        $datas = Tache::where('user_id',Auth::user()->id)->get();

        return view('technicien.gestion_tache',compact('datas','count_notify'));
    }


    public function handleRepondreTache(Request $request ,$id){
        $data = Tache::find($id);
        $file      = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $filename  = time() . '.' . $extension;
        $file->move('uploads',$filename);

        $data->photo = $filename;
        $data->pieces_de_rechange = $request->pieces_de_rechange;


        $data->save();

        return back();
    }
}
