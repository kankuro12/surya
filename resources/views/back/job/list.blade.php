@extends('layouts.back.index')
@section('title',"Job List")
@section('brand',"Job List")
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-body table-full-width">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <table id="bootstrap-table" class="table">
                    <thead>
                        <th data-field="Customer" class="text-center">Customer</th>
                        <th data-field="orderno" data-sortable="true">Order No.</th>
                        <th data-field="order_received_date" data-sortable="true">Received Date</th>
                        <th data-field="order_delever_date" data-sortable="true">Delivery Date</th>
                        <th data-field="nettotal" data-sortable="true">Nettotal</th>
                        <th data-field="due" data-sortable="true">Due</th>
                        <th data-field="action" class="td-actions text-right">Actions</th>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td><a
                                    href="{{ url('/customer/job_orders/'.$job->customer->id) }}">{{$job->customer->name}}</a>
                            </td>
                            <td><a href="/customer/order_items/{{$job->id}}">{{$job->id}}</a></td>
                            <td>{{$job->order_received_date}}</td>
                            <td>{{$job->order_delever_date}}</td>
                            <td>{{$job->netTotal()}}</td>
                            <td>{{$job->due}}</td>
                            <td><a title="Edit" class="btn btn-link btn-warning table-action edit"
                                    href="{{ url('/joborder/edit/'.$job->id) }}"><i class="fa fa-edit"></i></a> <a
                                    title="Delete" class="btn btn-link btn-danger table-action remove"
                                    href="{{ url('/jonorder/delete/'.$job->id) }}"><i class="fa fa-remove"></i></a><a
                                    title="Detail" class="btn btn-link btn-warning table-action detail"
                                    href="{{ url('/joborder/detail/'.$job->id) }}"> <i class="fa fa-asterisk"></i></a>
                            </td>
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