<?php

use Illuminate\Support\Facades\Route;
use App\Models\Temperature;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Responsable\ResponsableController;
use App\Http\Controllers\Technicien\TechnicienController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/404', function () {
    return view('invalide_route');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//********route admin******** */
Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',      [DashboardController::class,'Index'])->name('admin.dashboard');
    Route::get('consultercompte',[AdminController::class,'GetAllUsers'])->name('admin.consultercompte');
    Route::get('ajoutercompte'  ,[AdminController::class,'FormeAddAccount'])->name('admin.ajoutercompte');
    Route::post('storeaccount'  ,[AdminController::class,'AddAccount'])->name('admin.storeaccount');
    Route::get('search'  ,       [AdminController::class,'SearchAccount'])->name('admin.search');
    Route::put('banned',         [AdminController::class,'BannedAccount'])->name('admin.banned');
    Route::put('inbanned' ,      [AdminController::class,'InbannedAccount'])->name('admin.inbanned');


    
});


//********************route ResponsableService********************** */
Route::group(['prefix'=>'responsable', 'middleware'=>['isResponsable','auth','PreventBackHistory']], function(){
    Route::get('dashboard' ,           [ResponsableController::class,'Accueil'])->name('responsable.dashboard');
    Route::get('gerer_tache' ,         [ResponsableController::class,'GetAllTache'])->name('responsable.gerer_tache');
    Route::get('tester' ,              [ResponsableController::class,'tester'])->name('responsable.tester');
    Route::post('add_tache' ,          [ResponsableController::class,'AddTache'])->name('responsable.add_tache');
    Route::put('refuser_tache/{id}' ,  [ResponsableController::class,'RefuserTache'])->name('responsable.refuser_tache');
    Route::put('accepter_tache/{id}' , [ResponsableController::class,'AccepterTache'])->name('responsable.accepter_tache');
    Route::get('delete_tache/{id}' ,   [ResponsableController::class,'DeleteTache'])->name('responsable.delete_tache');
});


//*******************route technicien maintenance******************** */
Route::group(['prefix'=>'technicien', 'middleware'=>['isTechnicien','auth','PreventBackHistory']], function(){
    Route::get('dashboard' ,           [TechnicienController::class,'Accueil'])->name('technicien.dashboard');
    Route::get('gestion_tache' ,       [TechnicienController::class,'GestionTache'])->name('technicien.gestion_tache');
    Route::put('repondre_tache/{id}' , [TechnicienController::class,'RepondreTache'])->name('technicien.repondre_tache');
});


//********route fournissuer******** */
Route::group(['prefix'=>'fournisseur', 'middleware'=>['isFournisseur','auth','PreventBackHistory']], function(){
    return 'hi technicien';
});



Route::get('/notify', [App\Http\Controllers\HomeController::class, 'Notify'])->name('home');




   