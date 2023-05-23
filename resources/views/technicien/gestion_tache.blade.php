@extends('layouts.squlette_technicien')
@section('content')
                  
    @foreach ($datas as $data)
        <div class="col-md-8">
                
        
            <div class="card border-primary mt-2" style="max-width: 100%;">
                <div class="card-header bg-transparent border-primary">
                    @if ($data->etat == "0")
                    <button class="btn-danger btn-sm">refuser</button>
                    @endif
                    @if ($data->etat == "1")
                    <button class="btn-success btn-sm">accepte</button>
                    @endif
                    @if ($data->etat == null)
                    <button class="btn-warning btn-sm">en attente</button>
                    @endif
                   
                </div>
                <div class="card-body text-dark">
                  <h5 class="card-title">Nom de Tache : {{ $data->name_tache }}</h5>
                  <p class="card-text">Description : {{ $data->description }}</p>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    @if ($data->photo == null)
                    <button data-toggle="modal" data-target="#reponsetache{{ $data->id }}"  class="btn btn-secondary btn-sm">repondre</button>
                    @else
                    <button data-toggle="modal" data-target="#monreponsetache{{ $data->id }}"  class="btn btn-secondary btn-sm">voir reponse</button>
                    @endif
                   
                </div>
              </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="reponsetache{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{ url('technicien/repondre_tache',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalCenterTitle">Repondre </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Piece de rechange</label>
                                    <input type="text" class="form-control" name="pieces_de_rechange">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
        
        
                            
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="monreponsetache{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalCenterTitle"> Ma Reponse </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Piece de rechange</label>
                                    <input type="text" class="form-control"  value="{{ $data->pieces_de_rechange }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">photo</label>
                                    <img src="../../../uploads/{{ $data->photo }}" style="width: 300px" alt="photo">
                                </div>
                            </div>                       
                        </div>                      
                    </div>
                </form>
            </div>
        </div>
    @endforeach
       
 
@endsection