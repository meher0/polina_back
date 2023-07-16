
    
    
@extends('layouts.squlette_responsable')
@section('content')



<!-- main-->
<section class="p-t-20">
 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <h3 class="title-5 m-b-35">Gestionnaire des comptes</h3>
             <div class="table-data__tool">
                 <div class="table-data__tool-left">
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
                  </div>
                 <div class="table-data__tool-right">
                     <button data-toggle="modal" data-target="#addtache"  class="btn btn-dark" >
                         <i class="fa fa-plus"></i> 
                         Ajouter tache
                     </button> 

                 </div>
             </div>
             <div class="table-responsive table-responsive-data2">
                 <table class="table table-data2">
                     <thead>
                         <tr>
                             <th>name</th>
                             <th>email</th>
                             <th>name de tache</th>
                             <th>type</th>
                             <th>Description</th>
                             <th>status</th>
                             <th>action</th>
                         </tr>
                     </thead>
                     <tbody>
                        @if ($datas->count() == null)
                       <tr>
                        <td class="text-danger"> No Data</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                       </tr>
                         @else
                       
                         @foreach ($datas as $data)
                         <tr class="tr-shadow">                         
                             <td>{{ $data->name }}</td>
                             
                             <td>
                                 <span class="block-email">{{ $data->email }}</span>
                             </td>
                             <td>{{ $data->name_tache }}</td>
                             <td>{{ $data->type }}</td>
                             <td>{{ $data->description }}</td>
                            
                             <td>
                                @if ($data->etat == "0")
                                    <button class="btn btn-danger btn-sm">refuser</button>
                                 @endif 

                                 @if ($data->etat == "1")  
                                 <button class="btn btn-success btn-sm">accepter</button>
                                 @endif 

                                 @if ($data->etat == null)  
                                 <button class="btn btn-info btn-sm">en attente</button>
                                 @endif 
                               
                             </td>
                             <td>
                                 <div class="table-data-feature">

                                     <a href="{{ url('responsable/delete_tache',$data->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                         <i class="zmdi zmdi-delete" style="color: rgb(218, 13, 13)"></i>
                                     </a>   

                                     <button data-toggle="modal" data-target="#detailtache{{ $data->id }}"  class="item" data-toggle="tooltip" data-placement="top" title="detail">
                                         <i class="fa fa-eye" style="color: rgb(228, 205, 3)"></i>
                                     </button>

                                     @if ($data->etat == null)
                                        <button data-toggle="modal" data-target="#acceptertache{{ $data->id }}"  class="item" data-toggle="tooltip" data-placement="top" title="detail">
                                            <i class="fa fa-check" style="color: rgb(9, 170, 57)"></i>
                                        </button>
                                        <button data-toggle="modal" data-target="#refusertache{{ $data->id }}"  class="item" data-toggle="tooltip" data-placement="top" title="detail">
                                            <i class="fa fa-close" style="color: rgb(20, 6, 219)"></i>
                                        </button>   
                                     @endif
                                     
                                 </div>
                             </td>
                         </tr>
                         <tr class="spacer"></tr>
                          

                          {{--  modal refuser taches --}}
                          <div class="modal fade" id="refusertache{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <form action="{{ url('responsable/refuser_tache',$data->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title  text-white" id="exampleModalCenterTitle">refuser tache</h5>
                                            <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           
                                            <textarea name="cause" class="form-control" placeholder="ecrire cause de refuser"></textarea>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">refuser taches</button>
                                        </div>
                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                          {{--  modal accepter taches --}}
                          <div class="modal fade" id="acceptertache{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <form action="{{ url('responsable/accepter_tache',$data->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h5 class="modal-title  text-white" id="exampleModalCenterTitle">accepter tache</h5>
                                            <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                                           <h3>Are you sure to wont accept this tache ?</h3>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Accepter taches</button>
                                        </div>
                                      
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{--  modal detail taches --}}
                         <div class="modal fade" id="detailtache{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                
                                     <div class="modal-content">
                                         <div class="modal-header bg-dark">
                                             <h5 class="modal-title  text-white" id="exampleModalCenterTitle">Détail tache</h5>
                                             <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <div class="modal-body">       
                                            <div class="col-md-12">
                                                <aside class="profile-nav alt">
                                                    <section class="card">
                                                        <div class="card-header user-header alt bg-dark">
                                                            <div class="media">
                                                                <a href="#">
                                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="https://th.bing.com/th/id/OIP.PYipJ_hSncugM2SwnZitvgHaEK?pid=ImgDet&rs=1">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h2 class="text-light display-6">{{ $data->name }}</h2>
                                                                    <p> <i class="fa fa-envelope"></i> {{ $data->email }}</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <a href="#">
                                                                    <i class="fa fa-wrench"></i> Piéces de rechange :  {{ $data->pieces_de_rechange }}
                                                                    
                                                                </a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <img src="../../../uploads/{{ $data->photo }}" style="width: 300px" alt="photo">
                                                            </li>
                                                            
                                                        </ul>

                                                    </section>
                                                </aside>
                                            </div>
                                         </div>
                                       
                                     </div>
                                 </form>
                             </div>
                         </div>
                    @endforeach
                    @endif
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
</section>
<!-- END main-->


<!-- Modal -->
<div class="modal fade" id="addtache" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <form action="{{ url('responsable/add_tache') }}" method="POST">
         @csrf
         <div class="modal-content">
             <div class="modal-header bg-dark">
             <h5 class="modal-title text-white" id="exampleModalCenterTitle">Ajouter nouvelle tache</h5>
             <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6">
                         <label for="name">name</label>
                         <input type="text" class="form-control" name="name_tache">
                     </div>
                     <div class="col-md-6">
                         <label for="name">type</label>
                     <select name="type" class="form-control" >
                             <option disabled>--select type de tache --</option>
                             <option value="danger">difficile</option>
                             <option value="danger">simple</option>
                             <option value="danger">facile</option>
                     </select>
                     </div>


                     <div class="col-md-12">
                         <label for="name">name de technicien</label>
                     <select name="user_id" class="form-control" >
                         <option disabled>--select technicien --</option>
                         @foreach ($users as $user)
                             <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                     </select>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <label for="name">Description</label>
                         <textarea  class="form-control" name="description"></textarea>
                     </div>   
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-dark">Ajouter taches</button>
             </div>
         </div>
     </form>
 </div>
</div>

@endsection
