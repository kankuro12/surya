@extends('layouts.back.index')
@section('title',"Costomer Orders")
@section('brand',"Coustomer Orders")
@section('content')

            {{-- user details --}}
            <div class="content">
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
                                                            <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$customer->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" disabled="" value="{{$customer->address}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Phone</label>
                                                            <input type="text" disabled=""  class="form-control" value="{{$customer->phone}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" placeholder="Home Address" disabled="" value="{{$customer->email}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                           
                                                            <input type="text" class="form-control" placeholder="No Data" disabled="" value="">
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
                                                    <h5 class="card-title">{{$customer->name}}</h5>
                                                </a>
                                                <p class="card-description">
                                                  
                                                </p>
                                            </div>
                                            {{-- <p class="card-description text-center">
                                               
                                            </p> --}}
                                        </div>
                                        {{-- <div class="card-footer ">
                                            <hr>
                                            <div class="button-container text-center">
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-facebook-square"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-google-plus-square"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
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
                                                <td><a href="{{ url('customer/order_items/'.$job->id) }}"> Details</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



@endsection
@section('scripts')
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
@endsection
