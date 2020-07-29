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

    <div class="container">
            <div class="row" style="margin-top:5rem;">
                    <div class="col-md-12">
                        <div class="card bootstrap-table">
                            <div class="card-body table-full-width">
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <table id="bootstrap-table" class="table">
                                    <thead>
                                        <th data-field="ptr" class="text-center">Particlar</th>
                                        <th data-field="size" data-sortable="true">Size</th>
                                        <th data-field="qty" data-sortable="true">Quantity</th>
                                        <th data-field="square" data-sortable="true">Sqft</th>
                                        <th data-field="rate">Rate</th>
                                        <th data-field="total">Total</th>
                                        <th>Status</th>
                                        {{-- <th data-field="actions" class="td-actions text-right"  >Actions</th> --}}
                                    </thead>
                                    <tbody>
                                    @foreach($orderitems as $order)
                                        <tr>
                                            <td>{{$order->particular}}</td>
                                            <td>{{$order->length}} X {{$order->height}}</td>
                                            <td>{{$order->qty}}</td>
                                            <td>{{$order->height * $order->length}}</td>
                                            <td>{{$order->rate}}</td>
                                            <td>{{($order->length * $order->height * $order->qty)*$order->rate}}</td>
                                            <td>
                                            @if($order->status==0)
                                                Order Received at initial Phase
                                            @elseif($order->status==1)
                                                Order in Printing Phase
                                            @else
                                                Order Complete
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#image">Image/File Upload</button>
                


{{-- image list --}}
<div class="row" style="margin-top:1.5rem;">
        <div class="col-md-12">
            <div class="card stacked-form">
                <div class="card-header text-center ">
                    <h4 class="card-title">Image/File For Job Order</h4>
                </div>
                <div class="card-body ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Content Name</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                 @foreach($images as $image)
                                    <tr>
                                        <td>{{$image->path}}</td>
                                        <td>{{$image->description}}</td>
                                        <td>
                                            <a href="{{URL::to('/back/img/joborder/'.$image->path)}}" class="btn btn-primary btn-sm" target="_blank">View</a> ||
                                            <a href="{{ route('imagedelete',$image->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                         </td>
                                    </tr>
                                 @endforeach
                            </tbody>
                        </thead>
                    </table>
            </div>
        </div>
     </div>
    </div>

    {{-- image end list --}}
    </div>



<!-- Modal -->
<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Image/File Upload For Order</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                              <form method="post" action="" enctype="multipart/form-data">
                                              @csrf

                                              <div class="form-group ">
                                                  <label>Image/File Upload</label>
                                                  <img src="" style="height: 200px;"  id="photo"/>
                                                  <input type="file" name="path" class="form-control" >
                                              </div>
                                               <div class="form-group">
                                                  <label>Description</label>
                                                 <textarea name="description" class="form-control" rows="5" ></textarea>
                                              </div>
                                                  <input type="hidden" name="joborderitem_id" class="form-control"  value="{{$orderitems[0]->id}}">

                                          </div>
                                          <div class="card-footer  text-center">
                                              <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
                                          </div>
                                      </form>
            </div>
          </div>
        </div>
      </div>

      {{-- model for order file upload --}}




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

