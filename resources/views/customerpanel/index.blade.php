
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="back/img/apple-icon.png">
    <link rel="icon" type="image/png" href="back/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Customer Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('back/css/demo.css') }}" rel="stylesheet" />

</head>

<body>

   <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Customer Dashboard </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                      
                        <ul class="navbar-nav">
                            
                           
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bullet-list-67"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                  
                                    <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="nc-icon nc-button-power"></i>  {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>




<div class="container">

   {{-- user details --}}
   <div class="content" style="margin-top:4rem;">
        <div class="section-image" data-image="{{URL::to('back/img/bg5.jpg') }}" ;>
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <form class="form" method="" action="">
                            <div class="card ">
                                <div class="card-header ">
                                    <div class="card-header">
                                        <h4 class="card-title">Profile Details</h4>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$jobs[0]->customer->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" disabled="" value="{{$jobs[0]->customer->address}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="text" disabled=""  class="form-control" value="{{$jobs[0]->customer->phone}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" disabled="" value="{{$jobs[0]->customer->email}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Due Amount</label>
                                                <input type="text" class="form-control" disabled="" value="{{$jobs[0]->customer->due}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-header no-padding">
                                <div class="card-image">
                                    <img src="{{URL::to('back/img/full-screen-image-3.jpg') }}" alt="...">
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{URL::to('back/img/default-avatar.png') }}" alt="...">
                                        <h5 class="card-title">{{$jobs[0]->customer->name}}</h5>
                                    </a>
                                    <p class="card-description">

                                    </p>
                                </div>
                                {{-- <p class="card-description text-center">

                                </p> --}}
                            </div>

                        </div>
                    </div>
                </div>
        </div>
 </div>

<hr>
  {{-- end user details --}}

  <div class="row">
        <div class="col-md-12">
            <div class="card bootstrap-table">
                <div class="card-body table-full-width">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <table id="bootstrap-table" class="table">
                        <thead>
                            <th data-field="orderno" class="text-center" data-sortable="true">Order No.</th>
                            <th data-field="order_received_date" data-sortable="true">Received Date</th>
                            <th data-field="order_delever_date" data-sortable="true">Delivery Date</th>
                            <th data-field="nettotal" data-sortable="true">Nettotal</th>
                            <th data-field="due" data-sortable="true"   >Due</th>
                            <th data-field="action" class="td-actions " >Actions</th>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->id}}</td>
                                <td>{{$job->order_received_date}}</td>
                                <td>{{$job->order_delever_date}}</td>
                                <td>{{$job->netTotal()}}</td>
                                <td>{{$job->due}}</td>
                                <td><a href="{{ url('/customer/order/'.$job->id) }}"> Details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="{{ asset('back/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('back/js/plugins/bootstrap-notify.js') }}"></script>
    <!--  jVector Map  -->
    <script src="{{ asset('back/js/plugins/jquery-jvectormap.js') }}" type="text/javascript"></script>
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
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('back/js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
    <!-- Light Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('back/js/demo.js') }}"></script>
    <script src="{{ asset('back/js/axios.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>

<script type="text/javascript">
    var $table = $('#bootstrap-table');



    $().ready(function() {
        window.operateEvents = {
            'click .view': function(e, value, row, index) {
                info = JSON.stringify(row);

                swal('You click view icon, row: ', info);
                console.log(info);
            },
            'click .edit': function(e, value, row, index) {
                info = JSON.stringify(row);

                swal('You click edit icon, row: ', info);
                console.log(info);
            },
            'click .remove': function(e, value, row, index) {
                console.log(row);
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                });
            }
        };

        $table.bootstrapTable({
            toolbar: ".toolbar",
            clickToSelect: true,
            showRefresh: true,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            searchAlign: 'left',
            pageSize: 8,
            clickToSelect: false,
            pageList: [8, 10, 25, 50, 100],

            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        //activate the tooltips after the data table is initialized
        $('[rel="tooltip"]').tooltip();

        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });


    });
</script>

    </html>

