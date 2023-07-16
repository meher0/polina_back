@extends('layouts.squlette_responsable')
@section('content')
   <!-- main-->
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">Liste des Fournisseurs</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        @if ($datas->count())
                        <div class="row">
                            <div class="col-md-10">
                                <input type="search"  class="form-control" name="q" id="q" placeholder="search...">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-dark">
                                    <i class="fa fa-search"></i> 
                                </button>
                            </div>
                           </div>
                        @else
                        
                        <div class="row">
                            <div class="col-md-10">
                                <input type="search" disabled class="form-control" name="q" id="q" placeholder="search...">
                            </div>
                            <div class="col-md-2">
                                <button disabled class="btn btn-dark">
                                    <i class="fa fa-search"></i> 
                                </button>
                            </div>
                           </div>
                            
                        @endif
                       
                     </div>
                </div>
                <div class="row">
                        @forelse ($datas as $data)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Profile</strong>
                                        <small>
                                            @if ($data->etat == '0')  
                                            <span class="badge badge-success badge-pill float-right mt-4 mr-3" style="background: rgb(209, 212, 10)">en attente</span> 
                                            @endif

                                            @if ($data->etat == '1')
                                                <span class="badge badge-success badge-pill float-right mt-4 mr-3" style="background: green">Success</span>
                                            @endif

                                          

                                           
                                        </small>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="../../../assets/images/user.png" style="width: 100px" alt="Card image cap">
                                            <h5 class="text-sm-center mt-2 mb-1"> <i class="fa fa-user"></i> {{ $data->name }}</h5>
                                            <div class="location text-sm-center">
                                                <i class="fa fa-envelope"></i> {{ $data->email }}</div>
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center"> 
                                            <a href="#">
                                                <i style="color: green" class="fa fa-phone"></i>
                                            </a>
                                            <span>
                                                <a href="tel:{{ $data->phone }}">{{ $data->phone }}</a>
                                                
                                            </span> <br>
                                            @if ($data->etat == '0')
                                                
                                            <span  data-toggle="modal"  class="btn btn-success btn-sm disabled">Reclamer</span>
                                            @else
                                            <span data-toggle="modal" data-target="#exampleModalLong{{ $data->id }}" class="btn btn-success btn-sm">Reclamer</span>
                                                
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ url('responsable/add_reclamation_materiel') }}" method="POST">
                                       @csrf
                                        <div class="modal-header bg-dark">
                                        <h5 class="modal-title text-white" id="exampleModalLongTitle">Reclamer materiel</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="user_id" value="{{ $data->id }}">
                                            <table class="table table-bordred table-hover">
                                                <tr>
                                                    <td>LED</td>
                                                    <td> <input type="checkbox" class="form-control" name="checkbox[]" value="led" > </td>    
                                                </tr>
                                                <tr>
                                                    <td>Capteur Temp</td>
                                                    <td> <input type="checkbox" class="form-control" name="checkbox[]" value="capteur temp" > </td>    
                                                </tr>
                                                <tr>
                                                    <td>Capteur Humdite</td>
                                                    <td> <input type="checkbox" class="form-control" name="checkbox[]" value="capteur humidite" > </td>    
                                                </tr>
                                                <tr>
                                                    <td>Lamp</td>
                                                    <td> <input type="checkbox" class="form-control" name="checkbox[]" value="lamp" > </td>    
                                                </tr>

                                            </table>
                                            <br>
                                            <p>
                                                <button class="btn btn-warning" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">autre <i class="fa-solid fa-ellipsis"></i></button>
                                                
                                            </p>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <div class="card card-body">
                                                    <textarea name="autre_materiel" class="form-control" cols="30" rows="5" placeholder="ecrivez autre materiel"> </textarea>
                                                    </div>
                                                </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Envoyer</button>
                                        </div>
                                </form>
                                </div>
                                </div>
                            </div>    
                    @empty
                    <br><br><br>
                    <div class="alert alert-danger">               
                        <span>Aucune Fournisseurs</span>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
   </section>
   <!-- END main-->
@endsection