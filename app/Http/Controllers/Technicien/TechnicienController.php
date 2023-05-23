<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tache;

class TechnicienController extends Controller
{
    public function Accueil(){
        return view('technicien.dashboard');
    }


    public function GestionTache(){
        $datas = Tache::all();

        return view('technicien.gestion_tache',compact('datas'));
    }


    public function RepondreTache(Request $request ,$id){
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
