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

class ResponsableController extends Controller
{
    public function Accueil(){
        $countFournisseur = User::where('role','fournisseur')->count();  
        $countResponsable = User::where('role','responsable')->count();  
        $countTechnicien  = User::where('role','technicien')->count();
        $countReclamation = User::where('role','technicien')->count();     
        $users = User::count();
    
     
        return view('responsable.dashboard', compact('countFournisseur','countResponsable','countTechnicien','countReclamation','users'));
    }

  
        public function GetAllTache()
        {
            $users = User::all();

                $datas = DB::table('taches')
                 ->Leftjoin('users' , 'users.id' , '=' , 'taches.user_id')
                 ->select('users.*', 'taches.*')
                 ->get();
          

                return view('responsable.gerer_tache', compact('datas', 'users'));
          
        }


    public function AddTache(Request $request){
        $data = new Tache();
        $data->user_id     = $request->user_id;
        $data->name_tache  = $request->name_tache;
        $data->type        = $request->type;
        $data->description = $request->description;
        $data->save();
        return back()->with('status','tache created with success');
    }


    public function RefuserTache(Request $request, $id){
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


    public function AccepterTache(Request $request, $id){
       

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


    public function DeleteTache($id){
       $data =  Tache::find($id);
       if(!$data) abort(404);
       $data->delete();
       return back()->with('status','tache deleted with success');
    }



}
