<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Technicien | PoLiNa</title>


     <!-- favicons================================================== -->
     <link rel="icon" type="image/png" href="../../../assets/images/logo.png">


    <!-- Fontfaces CSS-->
    <link href="../../../assets/font_client/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../../assets/font_client/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- ../../../assets/font_client/vendor CSS-->
    <link href="../../../assets/font_client/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../../assets/font_client/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../../assets/font_client/css/theme.css" rel="stylesheet" media="all">

    <style>
        .badge{
            font-size: 15px;
            font-weight: normal ;
            line-height: 13px;
            padding: 2px 6px;
            position: absolute;
            right: -10px;
            top: -8px; 
            color: white;
            background: #ff4b5a;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="../../../assets/images/logo.png" style="width: 70px;" alt="logo" />
                        </a>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            @if (auth()->user()->unreadNotifications->count())
                                <span class="badge bg-red">{{ $count_notify }}</span>
                            @else
                                
                            @endif
                            
                            <div class="notifi-dropdown js-dropdown">
                               
                                @forelse (auth()->user()->unreadNotifications as $notification)
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>{{  $notification->data['msg'] }}</p>
                                        <span class="date">{{ $notification->created_at }}</span>
                                    </div>

                                  
                                        <a href="{{ url('technicien/markasread',$notification->id) }}" class="btn btn-danger" style="height: 40px;" >Mark As Read</a>
                                 
                                </div>
                                 
                                @empty
                                <p>no notifications</p>     
                                @endforelse
                               
                          
                              
                              
                               
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../../../assets/font_client/images/icon/avatar-01.jpg" alt="img user" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../../../assets/font_client/images/icon/avatar-01.jpg" alt="img user"  />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{ Auth::user()->name }}</a>
                                            </h5>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Profil</a>
                                        </div>
                                       
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP -->

        <!-- WELCOME-->
        <section class="welcome2 p-t-40 p-b-55">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb3">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Dashboard</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome2-inner m-t-60">
                            <div class="welcome2-greeting">
                                <h1 class="title-6">Hi
                                    <span>{{ Auth::user()->name }}</span>, Welcome back 😉</h1>
                               
                            </div>
                            <form class="form-header form-header2" action="" method="post">
                                <input class="au-input au-input--w435" type="text" name="search" placeholder="Search for datas &amp; reports...">
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            {{-- <section class="alert-wrap p-t-70 p-b-70">
                <div class="container">
                    <!-- ALERT-->
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content">You successfully read this important alert message.</span>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div>
                    <!-- END ALERT-->
                </div>
            </section> --}}
            <section class="mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- MENU SIDEBAR-->
                            <aside class="menu-sidebar3 js-spe-sidebar">
                                <nav class="navbar-sidebar2 navbar-sidebar3">
                                    <ul class="list-unstyled navbar__list">
                                        <li class="{{ (Request::path()=='technicien/dashboard' ? 'active' : '') }}">
                                            <a class="js-arrow" href="{{ url('technicien/dashboard') }}">
                                                <i class="fas fa-tachometer-alt"></i>Accueil
                                            </a>
                                        </li>

                                        <li>
                                            <a href="inbox.html">
                                                <i class="fas fa-comments"></i>messaging</a>
                                            <span class="inbox-num">3</span>
                                        </li>
                                        <li class="{{ (Request::path()=='technicien/gestion_tache' ? 'active' : '') }}">
                                            <a href="{{ url('technicien/gestion_tache') }}">
                                                <i class="fas fa-shopping-basket"></i>Tache</a>
                                        </li>
                                    </ul>
                                </nav>
                            </aside>
                            <!-- END MENU SIDEBAR-->
                        </div>
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    </div>

    <!-- Jquery JS-->
    <script src="../../../assets/font_client/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../../assets/font_client/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../../assets/font_client/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- ../../../assets/font_client/vendor JS       -->
    <script src="../../../assets/font_client/vendor/slick/slick.min.js">
    </script>
    <script src="../../../assets/font_client/vendor/wow/wow.min.js"></script>
    <script src="../../../assets/font_client/vendor/animsition/animsition.min.js"></script>
    <script src="../../../assets/font_client/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../../assets/font_client/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../../assets/font_client/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../../assets/font_client/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../../assets/font_client/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../../assets/font_client/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../../assets/font_client/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../../assets/font_client/js/main.js"></script>

</body>

</html>
<!-- end document-->