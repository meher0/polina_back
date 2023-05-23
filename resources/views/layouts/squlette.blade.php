<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pou LiNa </title>
 <!-- Bootstrap -->
 <link href="../../../assets/font/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- jquery -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
 <!-- Toaster -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- Font Awesome -->
 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
 <!-- NProgress -->
 <link href="../../../assets/font/vendors/nprogress/nprogress.css" rel="stylesheet">
 <!-- iCheck -->
 <link href="../../../assets/font/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
 
 <!-- bootstrap-progressbar -->
 <link href="../../../assets/font/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
 <!-- JQVMap -->
 <link href="../../../assets/font/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
 <!-- bootstrap-daterangepicker -->
 <link href="../../../assets/font/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

 <!-- Custom Theme Style -->
 <link href="../../../assets/font/build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="index.html" class="site_title"> <img src="../../../assets/images/logo.png" style="width: 40px; border-radius:100px;" alt="">
                  <span>Pou LiNa</span>
               </a>
              </div>
        
  
              <div class="clearfix"></div>
  
              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="../../../assets/images/user.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2>{{ Auth::user()->name }}</h2>
                </div>
              </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                   
                  </li>
                  <li><a><i class="fa fa-users"></i> Utilisateurs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/consultercompte') }}">Consulter liste des comptes </a></li>
                      <li><a href="{{ url('admin/ajoutercompte') }}">Ajouter compte </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file"></i> Reclamations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Technicien de maintenance</a></li>
                      <li><a href="media_gallery.html">Fournisseur de materiel</a></li>
                      <li><a href="typography.html">Responsable des services</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-history"></i> Historiques <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Technicien de maintenance</a></li>
                      <li><a href="media_gallery.html">Fournisseur de materiel</a></li>
                      <li><a href="typography.html">Responsable des services</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-bullhorn"></i> Publicitaires<span class="fa fa-chevron-down"></span></a>

                  </li>

                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>

              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle" ><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="../../../assets/images/user.jpg" alt="">{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out pull-right"></i> Log Out
                </a>
        
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                      
                      
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa-sharp fa-solid fa-bell fa-shake " style="font-size: 20px"></i>
                      <span class="badge bg-red">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="../../../assets/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            msg
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>





                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number"  id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-message" style="font-size: 20px"></i>
                      @if ($messages->count() <> 0)
                      <span class="badge bg-red">{{ $messages->count() }}</span>
                      @else
                          
                      @endif
                     
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      
                      
                     @foreach ($messages as $message)
                         
                
                      <li class="nav-item">
                        <a href="http://localhost:8000/chatify/{{ $message->from_id }}" class="dropdown-item">
                          <span class="image"><img src="../../../assets/images/img.jpg" alt="Profile Image" /></span>
                         
                          <span>
                            <span>anonyme</span>
                            <span class="time">{{  $message->created_at->diffInMinutes($timenow) ;}} min ago</span>
                          </span>
                          <span class="message">{{ $message->body }}  </span>
                        </a>
                      </li>

                      @endforeach
                      <li class="nav-item">
                        <div class="text-center">
                          <a href="http://localhost:8000/chatify" class="dropdown-item">
                            <strong>See All messages</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>





                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Ferme Avicole Po LiNa
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  <!-- jQuery -->
  <script src="../../../assets/font/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../../../assets/font/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../../../assets/font/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../../../assets/font/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="../../../assets/font/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="../../../assets/font/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../../../assets/font/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../../../assets/font/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="../../../assets/font/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="../../../assets/font/vendors/Flot/jquery.flot.js"></script>
  <script src="../../../assets/font/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="../../../assets/font/vendors/Flot/jquery.flot.time.js"></script>
  <script src="../../../assets/font/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="../../../assets/font/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../../../assets/font/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../../../assets/font/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../../../assets/font/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../../../assets/font/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="../../../assets/font/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../../../assets/font/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../../../assets/font/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../../../assets/font/vendors/moment/min/moment.min.js"></script>
  <script src="../../../assets/font/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../../../assets/font/build/js/custom.min.js"></script>
	
  </body>
</html>
