@extends('layouts.back.index')
@section('title',"Supplier Payment")
@section('brand',"Supplier Payments List")
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
                                            <th data-field="name" data-sortable="true" class="text-center">Supplier Name</th>
                                            <th data-field="amt" data-sortable="true">Amount</th>
                                            <th data-field="date" data-sortable="true">Date</th>
                                            <th data-field="type" data-sortable="true">Payment Type</th>
                                            <th data-field="info" data-sortable="true">Payment Info</th>

                                            <th data-field="actions" class="td-actions text-center"  >Actions</th>
                                        </thead>
                                        <tbody>
                                        @foreach($payments as $pay)

                                            <tr>
                                                <td>{{$pay->supplier->name}}</td>
                                                <td>Rs. {{$pay->amount}}</td>
                                                <td>{{$pay->date}}</td>
                                                <td>{{$pay->payment_type}}</td>
                                                <td>{{$pay->payment_info}}</td>

                                                <td><a class="btn btn-danger btn-sm" href="{{ url('/payment/cancel/'.$pay->id) }}">Cancel</a> </td>
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
