<?php

use Illuminate\Support\Facades\Route;
use App\Models\Temperature;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Responsable\ResponsableController;
use App\Http\Controllers\Technicien\TechnicienController;


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
    Route::get('dashboard',      [DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('consultercompte',[AdminController::class,'showAllUsers'])->name('admin.consultercompte');
    Route::get('ajoutercompte'  ,[AdminController::class,'showAddAccount'])->name('admin.ajoutercompte');
    Route::post('storeaccount'  ,[AdminController::class,'handleAddAccount'])->name('admin.storeaccount');
    Route::get('search'  ,       [AdminController::class,'handleSearchAccount'])->name('admin.search');
    Route::put('banned',         [AdminController::class,'handleBannedAccount'])->name('admin.banned');
    Route::put('inbanned' ,      [AdminController::class,'handleInbannedAccount'])->name('admin.inbanned');



});


//********************route ResponsableService********************** */
Route::group(['prefix'=>'responsable', 'middleware'=>['isResponsable','auth','PreventBackHistory']], function(){
    Route::get('dashboard' ,                 [ResponsableController::class,'Accueil'])->name('responsable.dashboard');
    Route::get('list_fournisseurs' ,         [ResponsableController::class,'showListFournisseurs'])->name('responsable.list_fournisseurs');
    Route::get('gerer_tache' ,               [ResponsableController::class,'showGetAllTache'])->name('responsable.gerer_tache');
    Route::post('add_reclamation_materiel' , [ResponsableController::class,'handleReclamerMateriel'])->name('responsable.add_reclamation_materiel');
    Route::get('fetch_reclamation_materiel' ,[ResponsableController::class,'showGetReclamationMateriel'])->name('responsable.fetch_reclamation_materiel');
    Route::post('add_tache' ,                [ResponsableController::class,'handleAddTache'])->name('responsable.add_tache');
    Route::put('refuser_tache/{id}' ,        [ResponsableController::class,'handleRefuserTache'])->name('responsable.refuser_tache');
    Route::put('accepter_tache/{id}' ,       [ResponsableController::class,'handleAccepterTache'])->name('responsable.accepter_tache');
    Route::get('delete_tache/{id}' ,         [ResponsableController::class,'handleDeleteTache'])->name('responsable.delete_tache');
    Route::get('delete_reclamation_materiel/{id}', [ResponsableController::class,'handleDeleteReclamationMateriel'])->name('responsable.delete_reclamation_materiel');
});


//*******************route technicien maintenance******************** */
Route::group(['prefix'=>'technicien', 'middleware'=>['isTechnicien','auth','PreventBackHistory']], function(){
    Route::get('dashboard' ,           [TechnicienController::class,'Accueil'])->name('technicien.dashboard');
    Route::get('gestion_tache' ,       [TechnicienController::class,'showGestionTache'])->name('technicien.gestion_tache');
    Route::put('repondre_tache/{id}' , [TechnicienController::class,'handleRepondreTache'])->name('technicien.repondre_tache');
    Route::get('markasread/{id}' ,     [TechnicienController::class,'handleMarkAsRead'])->name('technicien.markasread');
});


//********route fournissuer******** */
Route::group(['prefix'=>'fournisseur', 'middleware'=>['isFournisseur','auth','PreventBackHistory']], function(){
    return 'hi technicien';
});



Route::get('/notify', [App\Http\Controllers\HomeController::class, 'Notify'])->name('home');




