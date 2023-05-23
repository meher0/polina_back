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
    <title>Responsable | PoLiNa</title>

    <!-- favicons================================================== -->
    <link rel="icon" type="image/png" href="../../../assets/images/logo.png">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Fontfaces CSS-->
    <link href="../../../assets/font_client/css/font-face.css" rel="stylesheet" media="all">
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
        background: rgba(221, 3, 3, 0.966);
    }
</style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="../../../assets/images/logo.png" alt="CoolAdmin" style="width: 68px;border-radius:50px" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="{{ url('responsable/dashboard') }}">
                                    <i class="fas fa-home"></i>Accueil
                                    <span class="bot-line"></span>
                                </a>
                            </li> 
                            <li class="has-sub">
                                <a href="{{ url('responsable/gerer_tache') }}">
                                    <i class="fas fa-list"></i>Gestionnaire des taches
                                    <span class="bot-line"></span>
                                </a>
                            </li> 
                            
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-file"></i>Gestionnaire des reclamations
                                    <span class="bot-line"></span>
                                </a>
                            </li> 

                        </ul>
                    </div>
                    <div class="header__tool">

                        <div class="header-button-item js-item-menu">
                            <span class="badge">6</span>
                            <i class="zmdi zmdi-email"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                               
                                <div class="notifi__footer">
                                    <a href="#">All Messages</a>
                                </div>
                            </div>
                        </div>
                        <div class="header-button-item  js-item-menu">
                            <span class="badge">6</span>
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../../../assets/font_client/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../../../assets/font_client/images/icon/avatar-01.jpg" alt="John Doe" />
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
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="../../../assets/font_client/images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                       <li class="has-sub">
                                <a href="{{ url('responsable/dashboard') }}">
                                    <i class="fas fa-home"></i>Accueil
                                    <span class="bot-line"></span>
                                </a>
                            </li> 
                            <li class="has-sub">
                                <a href="{{ url('responsable/gerer_tache') }}">
                                    <i class="fas fa-list"></i>Gestionnaire des taches
                                    <span class="bot-line"></span>
                                </a>
                            </li> 
                            
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-file"></i>Gestionnaire des reclamations
                                    <span class="bot-line"></span>
                                </a>
                            </li> 
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="header-button-item js-item-menu">
                    <span class="badge">6</span>
                    <i class="zmdi zmdi-email"></i>
                    <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                        <div class="notifi__title">
                            <p>You have 3 Notifications</p>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c1 img-cir img-40">
                                <i class="zmdi zmdi-email-open"></i>
                            </div>
                            <div class="content">
                                <p>You got a email notification</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                       
                        <div class="notifi__footer">
                            <a href="#">All Messages</a>
                        </div>
                    </div>
                </div>
                <div class="header-button-item  js-item-menu">
                    <span class="badge">6</span>
                    <i class="zmdi zmdi-notifications"></i>
                    <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                        <div class="notifi__title">
                            <p>You have 3 Notifications</p>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c1 img-cir img-40">
                                <i class="zmdi zmdi-email-open"></i>
                            </div>
                            <div class="content">
                                <p>You got a email notification</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c2 img-cir img-40">
                                <i class="zmdi zmdi-account-box"></i>
                            </div>
                            <div class="content">
                                <p>Your account has been blocked</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c3 img-cir img-40">
                                <i class="zmdi zmdi-file-text"></i>
                            </div>
                            <div class="content">
                                <p>You got a new file</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__footer">
                            <a href="#">All notifications</a>
                        </div>
                    </div>
                </div>
               
              
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="../../../assets/font_client/images/icon/avatar-01.jpg" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="../../../assets/font_client/images/icon/avatar-01.jpg" alt="John Doe" />
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
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
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
        <!-- END HEADER MOBILE -->

        @yield('content')

        <!-- COPYRIGHT-->
        <section class="p-t-60 p-b-20" style="margin-top: 300px">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright" style="background: rgb(26, 25, 25)">
                        <p>Copyright © 2023 PoLiNa. All rights reserved.</p>
                    </div>
                </div>
            </div>    
        </section>
        <!-- END COPYRIGHT-->
   
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
