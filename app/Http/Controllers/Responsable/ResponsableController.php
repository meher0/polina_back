<?php

namespace App\Http\Controllers\Responsable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tache;
use App\Notifications\TacheNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use DB;
use Mail;
use App\Mail\refuserMail;
use App\Models\ChMessage;
use App\Models\MaterielReclamer;
use Carbon\Carbon;

class ResponsableController extends Controller
{
    public function Accueil(){
        $countFournisseur    = User::where('role','fournisseur')->count();
        $countResponsable    = User::where('role','responsable')->count();
        $countTechnicien     = User::where('role','technicien')->count();
        $countReclamation    = User::where('role','technicien')->count();
        $countTacheEffectuer = Tache::where('etat','1')->count();
        $countTacheRefuser   = Tache::where('etat','0')->count();
        $users = User::count();

        $id = Auth::user()->id;
        $messages = ChMessage::where('from_id','<>',$id)
        ->where('to_id',$id)
        ->where('seen',0)
        ->get();
        $timenow = carbon::now();


        return view('responsable.dashboard', compact(
            'timenow',
            'messages',
            'countFournisseur',
            'countResponsable',
            'countTechnicien',
            'countReclamation',
            'users',
            'countTacheEffectuer',
            'countTacheRefuser'
        ));
    }


        public function showGetAllTache()
        {
            $users = User::where('role','technicien')->get();

                $datas = Tache::Leftjoin('users' , 'users.id' , '=' , 'taches.user_id')
                 ->select('users.*', 'taches.*')
                 ->get();

                 $id = Auth::user()->id;
                 $messages = ChMessage::where('from_id','<>',$id)
                 ->where('to_id',$id)
                 ->where('seen',0)
                 ->get();
                 $timenow = carbon::now();



                return view('responsable.gerer_tache', compact('datas', 'users','timenow','messages'));

        }


    public function handleAddTache(Request $request){
        $data = new Tache();
        $data->user_id     = $request->user_id;
        $data->name_tache  = $request->name_tache;
        $data->type        = $request->type;
        $data->description = $request->description;
        $data->save();
        return back()->with('status','tache created with success');
    }


    public function handleRefuserTache(Request $request, $id){
       $data = Tache::find($id);
       $cause = $request->cause;
       $name_tache = $data->name_tache;

       if(!$data) abort(404);
       $etat = '0'; //** 0 egale a refuser */
       $data->cause = $request->cause;
       $data->etat  = $etat;
       Mail::to($data->user->email)->send(new refuserMail($cause,$name_tache));
       $data->save();
       return back()->with('status','tache refused with success');
    }


    public function handleAccepterTache(Request $request, $id){

       $msg ='teche accepted';
       $user = User::where('id',$request->user_id)->first();

       $data =  Tache::find($id);
       if(!$data) abort(404);
       $etat = '1'; //** 1 egale a accepter */
       $data->etat  = $etat;
       Notification::send($user, new TacheNotification($msg));
       $data->save();
       return back()->with('status','tache accepted with success');
    }


    public function handleDeleteTache($id){
       $data =  Tache::find($id);
       if(!$data) abort(404);
       $data->delete();
       return back()->with('status','tache deleted with success');
    }

    public function showListFournisseurs(){
        $id = Auth::user()->id;
        $messages = ChMessage::where('from_id','<>',$id)
        ->where('to_id',$id)
        ->where('seen',0)
        ->get();
        $timenow = carbon::now();


        $datas = User::all();





        return view('responsable.liste_fournisseurs',compact('messages','timenow','datas'));
    }


    public function handleReclamerMateriel(Request $request) {

        $donneesMultiples = implode('---', $request->input('checkbox'));

        $data = new MaterielReclamer();
        $data->user_id        = $request->user_id;
        $data->materiel       = $donneesMultiples;
        $data->autre_materiel = $request->autre_materiel;
        $data->save();
        return back()->with('status','success');

    }


    public function showGetReclamationMateriel(){

        $id = Auth::user()->id;
        $messages = ChMessage::where('from_id','<>',$id)
        ->where('to_id',$id)
        ->where('seen',0)
        ->get();
        $timenow = carbon::now();

        $datas = MaterielReclamer::leftjoin('users' , 'users.id' , '=' , 'materiel_reclamers.user_id')
        ->select('users.*', 'materiel_reclamers.*')
        ->get();

        return view('responsable.gestion_reclamation',compact('datas','messages','timenow'));

    }

    public function handleDeleteReclamationMateriel($id){

        $data = MaterielReclamer::find($id)->delete();
        return back()->with('status','deleted');
    }



}
