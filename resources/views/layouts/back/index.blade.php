<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="back/img/apple-icon.png">
    <link rel="icon" type="image/png" href="back/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('back/css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/nepali.datepicker.v2.2.min.css') }}" rel="stylesheet" />

    @yield('style')
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="{{ URL::to('back/img/sidebar-5.jpg') }}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">

                    <a href="#" class="simple-text logo-normal" style="margin-left:1.5rem;">
                        Surya Advertising
                    </a>
                </div>
                <div class="user">
                    <div class="photo">
                        <img src="{{ URL::to('back/img/surya.png') }}" />
                    </div>
                    <div class="info ">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>{{ config('app.name', '') }}
                                <b class="caret"></b>
                            </span>
                        </a>
                        <!-- <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a class="profile-dropdown" href="#pablo">
                                        <span class="sidebar-mini">MP</span>
                                        <span class="sidebar-normal">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="#pablo">
                                        <span class="sidebar-mini">EP</span>
                                        <span class="sidebar-normal">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="#pablo">
                                        <span class="sidebar-mini">S</span>
                                        <span class="sidebar-normal">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/admin') }}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>
                                Customer
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="componentsExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/customer/add') }}">
                                        <span class="sidebar-mini">C.A</span>
                                        <span class="sidebar-normal">Customer Add</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/customer/list') }}">
                                        <span class="sidebar-mini">C.L</span>
                                        <span class="sidebar-normal">Customer List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#payment">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>
                                Customer Payment
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="payment">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/customer/due') }}">
                                        <span class="sidebar-mini">C.A</span>
                                        <span class="sidebar-normal">Add Payment</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/customer/payments') }}">
                                        <span class="sidebar-mini">C.L</span>
                                        <span class="sidebar-normal">List Payment</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#staff">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>
                                Staffs
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="staff">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/staff/add') }}">
                                        <span class="sidebar-mini">S.A</span>
                                        <span class="sidebar-normal">Staff Add</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/staff/list') }}">
                                        <span class="sidebar-mini">S.L</span>
                                        <span class="sidebar-normal">Staff List</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/advance/add') }}">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Advacne</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/advance/list') }}">
                                        <span class="sidebar-mini">A.L</span>
                                        <span class="sidebar-normal">List Advance</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#joborder">
                            <i class="nc-icon nc-bag"></i>
                            <p>
                                Job Order
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="joborder">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/joborder/add') }}">
                                        <span class="sidebar-mini">J.A</span>
                                        <span class="sidebar-normal">Job Order Add</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/joborder/list') }}">
                                        <span class="sidebar-mini">J.L</span>
                                        <span class="sidebar-normal">Job Order List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#exp">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>
                                Expenses
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="exp">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/exp/add') }}">
                                        <span class="sidebar-mini">E.C</span>
                                        <span class="sidebar-normal">Add ExpCategory</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/expcat/list') }}">
                                        <span class="sidebar-mini">M.E</span>
                                        <span class="sidebar-normal">Manage Expense</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#sala">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>
                                Salary
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="sala">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/salary/add') }}">
                                        <span class="sidebar-mini">A.S</span>
                                        <span class="sidebar-normal">Add Salary</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/salary/list') }}">
                                        <span class="sidebar-mini">S.L</span>
                                        <span class="sidebar-normal">List Salary</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#sup">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>
                                Suppliers
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="sup">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier/add') }}">
                                        <span class="sidebar-mini">A.S</span>
                                        <span class="sidebar-normal">Add Supplier</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier/list') }}">
                                        <span class="sidebar-mini">S.L</span>
                                        <span class="sidebar-normal">List Supplier</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier-adv/add') }}">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Advacne</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier-adv/list') }}">
                                        <span class="sidebar-mini">A.L</span>
                                        <span class="sidebar-normal">List Advance</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#billing">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>
                                Supplier Billing
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="billing">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier/billing') }}">
                                        <span class="sidebar-mini">A.B</span>
                                        <span class="sidebar-normal">Add Billing</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier/bills') }}">
                                        <span class="sidebar-mini">L.B</span>
                                        <span class="sidebar-normal">List Bills</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/cancel/bills') }}">
                                        <span class="sidebar-mini">C.B</span>
                                        <span class="sidebar-normal">Cancel Bills</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#suppay">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>
                                Supplier Payment
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="suppay">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier/payment') }}">
                                        <span class="sidebar-mini">A.P</span>
                                        <span class="sidebar-normal">Add Payment</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/supplier/payment_list') }}">
                                        <span class="sidebar-mini">P.L</span>
                                        <span class="sidebar-normal">Payment List</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#front">
                            <i class="nc-icon nc-tv-2"></i>
                            <p>
                                FrontEnd
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="front">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/slide') }}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">sliders</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/gallery') }}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">Gallery</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/service') }}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">Services</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/testimonial') }}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">Testimonials</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar"
                                class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">@yield('brand') </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        {{-- <ul class="nav navbar-nav mr-auto">
                            <form class="navbar-form navbar-left navbar-search-form" role="search">
                                <div class="input-group">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                        </ul> --}}
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-bullet-list-67"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{url('/admin')}}">
                                        <i class="nc-icon nc-chart-pie-35"></i> Dashboard
                                    </a>
                                    <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="nc-icon nc-button-power"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @include('message')
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav>

                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://suryaadvertising.com">Surya Advertising</a>
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>


    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>

            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Style</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Background Image</p>
                        <label class="switch-image">
                            <input type="checkbox" data-toggle="switch" checked="" data-on-color="info"
                                data-off-color="info"><span class="toggle"></span>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <label class="switch-mini">
                            <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info">
                            <span class="toggle"></span>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Fixed Navbar</p>
                        <label class="switch-nav">
                            <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info">
                            <span class="toggle"></span>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <p>Filters</p>
                        <div class="pull-right">
                            <span class="badge filter badge-black" data-color="black"></span>
                            <span class="badge filter badge-azure" data-color="azure"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-orange active" data-color="orange"></span>
                            <span class="badge filter badge-red " data-color="red"></span>
                            <span class="badge filter badge-purple" data-color="purple"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Sidebar Images</li>

                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ URL::to('back/img/sidebar-1.jpg') }}" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ URL::to('back/img/sidebar-3.jpg') }}" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ URL::to('back/img/sidebar-4.jpg') }}" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{ URL::to('back/img/sidebar-5.jpg') }}" alt="" />
                    </a>
                </li>

                <li class="button-container">
                    <button id="twitter" class="btn btn-social btn-twitter btn-round sharrre"><i
                            class="fa fa-twitter"></i> · 256</button>
                    <button id="facebook" class="btn btn-social btn-facebook btn-round sharrre"><i
                            class="fa fa-facebook-square"> · 426</i></button>
                </li>
            </ul>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('back/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('back/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script> --}}
<!--  Chartist Plugin  -->
<script src="{{ asset('back/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('back/js/plugins/bootstrap-notify.js') }}"></script>
<!--  jVector Map  -->
{{-- <script src="{{ asset('back/js/plugins/jquery-jvectormap.js') }}" type="text/javascript"></script> --}}
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('back/js/plugins/moment.min.js') }}"></script>
<!--  DatetimePicker   -->
<script src="{{ asset('back/js/plugins/bootstrap-datetimepicker.js') }}"></script>
<!--  Sweet Alert  -->
<script src="{{ asset('back/js/plugins/sweetalert2.min.js') }}" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{ asset('back/js/plugins/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{ asset('back/js/plugins/nouislider.js') }}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{ asset('back/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{ asset('back/js/plugins/jquery.validate.min.js') }}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('back/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{ asset('back/js/plugins/bootstrap-table.js') }}"></script>
<!--  DataTable Plugin -->
<script src="{{ asset('back/js/plugins/jquery.dataTables.min.js') }}"></script>
<!--  Full Calendar   -->
<script src="{{ asset('back/js/plugins/fullcalendar.min.js') }}"></script>
<!-- Conti Dashbrol Center for Now Uoard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('back/js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('back/js/demo.js') }}"></script>
<script src="{{ asset('back/js/axios.js') }}"></script>
<script src="{{ asset('back/nepali.datepicker.v2.2.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        // demo.initDashboardPageCharts();

        // demo.showNotification();

        // demo.initVectorMap();


    });

</script>
@yield('scripts')

</html>
