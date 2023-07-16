@extends('layouts.squlette_responsable')
@section('content')

<!-- main-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Gestionnaire des reclamations</h3>
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
                    </div>
                       
                        <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>materiel</th>
                                    <th>autre_materiel</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                        <tr class="tr-shadow">                         
                            <td>{{ $data->name }}</td>
                            
                            <td>
                                <span class="block-email">{{ $data->email }}</span>
                            </td>
                            <td>{{ $data->materiel }}</td>
                            <td>{{ $data->autre_materiel }}</td>
                            <td>
                                @if ($data->etat == "0")
                                    <button class="btn btn-danger btn-sm">refuser</button>
                                @endif 

                                @if ($data->etat == "1")  
                                    <button class="btn btn-success btn-sm">accepter</button>
                                @endif 
                            </td>
                            <td>
                                <div class="table-data-feature">

                                    <a href="{{ url('responsable/delete_reclamation_materiel',$data->id) }}" class="item"  title="Delete">
                                        <i class="zmdi zmdi-delete" style="color: rgb(218, 13, 13)"></i>
                                    </a>   

                                    <button data-toggle="modal"   class="item"  title="detail">
                                        <i class="fa fa-eye" style="color: rgb(228, 205, 3)"></i>

                                </div>
                            </td>
                            </tr>
                            <tr class="spacer"></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</section>
   <!-- END main-->
    
@endsection