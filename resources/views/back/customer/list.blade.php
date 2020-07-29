@extends('layouts.back.index')
@section('title',"Customer list")
@section('brand',"Customer List")
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
                                            <th data-field="due" class="text-center">Due</th>
                                            <th data-field="name" data-sortable="true">Name</th>
                                            <th data-field="salary" data-sortable="true">Address</th>
                                            <th data-field="country" data-sortable="true">Phone</th>
                                            <th data-field="email">Email</th>
                                            <th data-field="actions" class="td-actions text-right"  >Actions</th>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>Rs. {{$customer->due}}</td>
                                                <td>  <a href="{{ url('/customer/job_orders/'.$customer->id) }}"> {{$customer->name}}</a></td>
                                                <td>{{$customer->address}}</td>
                                                <td>{{$customer->phone}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td><a title="Edit" class="btn btn-link btn-warning table-action edit" href="{{ url('/customer/edit/'.$customer->id) }}"><i class="fa fa-edit"></i></a>  <a title="Delete" class="btn btn-link btn-danger table-action remove" href="{{ url('/customer/delete/'.$customer->id) }}"><i class="fa fa-remove"></i></a> </td>
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
