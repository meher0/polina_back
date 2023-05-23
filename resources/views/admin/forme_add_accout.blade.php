@extends('layouts.squlette')
@section('content')

<!-- page content -->

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
<div class="right_col" role="main">
    <div class="">
        
        <div class="clearfix"></div>
       <!-- Button trigger modal -->

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <strong>whoops!</strong> There were some probleme with your input
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ error }}</li>
        @endforeach
    </ul>
    </div>
    
@endif --}}
  
 



        <div class="row">
            <div class="col-md-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> <i class="fa fa-user-plus"></i> Ajouter Compte </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-label-left input_mask" method="POST" action="{{ url('admin/storeaccount') }}">
                            @csrf

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="name" id="inputSuccess2" placeholder="First Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" class="form-control" name="lastname" id="inputSuccess3" placeholder="Last Name">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="email" class="form-control has-feedback-left" name="email" id="inputSuccess4" placeholder="Email">
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="tel" class="form-control" name="phone" id="inputSuccess5" placeholder="Phone">
                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="cin" id="inputSuccess4" placeholder="Cin">
                                <span class="fa-regular fa-id-card form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="address" id="inputSuccess4" placeholder="Address">
                                <span class="fa-regular fa-map form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            
                           
                               
                      
                          
                          
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button class="btn btn-warning" type="reset">Vider</button>
                                    <button type="submit" class="btn btn-success">Register</button>
                                </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    

<!-- /page content -->


@endsection