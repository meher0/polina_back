@extends('layouts.squlette')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Utilisateurs</h3>
        </div>

        <div class="title_right">
          <form action="{{ url('admin/search') }}" method="get">
            @csrf
          <div class="col-md-5 col-sm-5  form-group pull-right top_search">
            <div class="input-group">
              
              <input type="search"  name="q" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Go</button>
              </span>
   
            </div>
          </div>
        </form>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="x_panel">
          @if (session('status'))
              <script>
                toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
              }
                toastr.warning("{{ session('status') }}",'oops', {timeOut:12000})
              </script>
          @endif
          @if (session('alert_green'))
              <script>
                toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
              }
                toastr.success("{{ session('alert_green') }}",'Inbanned', {timeOut:12000})
              </script>
          @endif
          @if (session('alert_red'))
            <script>
              toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
              }
              toastr.error("{{ session('alert_red') }}",'Banned', {timeOut:12000})
            </script>
          @endif
        
            <div class="x_content">

                <div class="clearfix"></div>
                @foreach ($datas as $data)
                    <div class="col-md-4 col-sm-4  profile_details">
                    <div class="well profile_view">
                        <div class="col-sm-12">
                        <h4 class="brief"><i>{{ $data->name }} Tbini</i></h4>
                        <div class="left col-md-8 col-sm-8">
                            <h2></h2>
                           
                            <ul class="list-unstyled">
                            <li><i class="fa fa-user-tie" ></i> {{ $data->role }} </li>
                            <li><i class="fa fa-envelope"></i> {{ $data->email }} </li>
                            <li><i class="fa fa-phone"></i> 28020537</li>
                          
                            </ul>
                        </div>
                        <div class="right col-md-4 col-sm-4 text-center">
                            <img src="../../../assets/images/img.jpg" alt="" class="img-circle img-fluid">
                        </div>
                        </div>
                        <div class=" profile-bottom text-center">
                       
                        <div class=" col-sm-6 emphasis">
                          <span>
                            @if ($data->status == 0)
                            <button type="button" title="banned" data-toggle="modal" data-target="#banned{{ $data->id }}" style="width: 70px" class="btn btn-danger btn-sm"> 
                              <i class="fa fa-user"></i> 
                              <i class="fa fa-ban"></i>
                            </button>
                                @if ($data->isUserOnline())
                                  <button title="connecte" class="btn btn-light"> 
                                    <i class="fa-regular fa-circle-dot fa-fade" style="color: #03912e;"></i>
                                  </button>
                                @else
                                  <button title="offline"  class="btn btn-light btn-sm">
                                    <i class="fa fa-low-vision" style="color: #f1a707;"></i>
                                  </button>                                
                                @endif
                              @else
                            <button type="button" disabled title="banned"  style="width: 70px" class="btn btn-danger btn-sm"> 
                              <i class="fa fa-user"></i> 
                              <i class="fa fa-ban"></i>
                            </button>
                            <button title="inbanned" data-toggle="modal" data-target="#inbanned{{ $data->id }}"   class="btn btn-success btn-sm">
                              <i class="fa fa-check"></i>
                            </button>
                            @endif
                            
                           
                             
                            
                              
                             </button>

                          </span>
                           
                            <button type="button" style="width: 120px" class="btn btn-primary btn-sm">
                            <i class="fa fa-user"> </i> View Profile
                            </button>
                            


                        </div>
                        </div>
                    </div>
                    </div>


                 <!-- Modal inbanned-->
                <div class="modal fade" id="inbanned{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                          <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="staticBackdropLabel">Confirmation</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ url('admin/inbanned') }}" method="POST">
                            @csrf
                            @method('put')
                          <div class="modal-body">
                            <input type="hidden" name="id"  class="form-control"  value="{{ $data->id }}" >   
                            Are you sure to inbanned an account for <b>{{ $data->name }} {{ $data->lastname }}</b>   ??
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                            <button type="submit" class="btn btn-success">confirme</button>
                          </div>
                        </form>
                        </div>
                      </div>
                </div>
    
                 <!-- Modal confirme banned-->
                <div class="modal fade" id="banned{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content ">
                        <div class="modal-header bg-danger">
                          <h5 class="modal-title text-white" id="staticBackdropLabel">Confirmation</h5>
                          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('admin/banned') }}" method="POST">
                          @csrf
                          @method('put')
                          <div class="modal-body">
                          <input type="hidden" name="id"  class="form-control"  value="{{ $data->id }}" >   
                          Are you sure to banned an account for <b>{{ $data->name }} {{ $data->lastname }}</b>   ??
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                          <button type="submit" class="btn btn-danger">confirme</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                
                @endforeach

              
            </div>
          </div>
      </div>
    </div>
  </div>

  
  <!-- /page content -->


@endsection