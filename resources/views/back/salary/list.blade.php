@extends('layouts.back.index')
@section('title',"Salary list")
@section('brand',"Salary List")
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
                                            <th data-field="name" class="text-center">Staff Name</th>
                                            <th data-field="cdate" data-sortable="true">Issued Date</th>
                                            <th data-field="amount" data-sortable="true">Salary Amount</th>
                                            <th data-field="fdate" data-sortable="true">Issued From</th>
                                            <th data-field="tdate">Issued Till</th>
                                            <th data-field="days">Total Days</th>
                                            <th data-field="iby">Issued By</th>
                                            {{-- <th data-field="actions" class="td-actions text-center"  >Actions</th> --}}
                                        </thead>
                                        <tbody>
                                        @foreach($salaries as $salary)
                                            <tr>
                                              <td>{{$salary->staff->name}}</td>
                                              <td>{{$salary->date}}</td>
                                              <td>Rs. {{$salary->amount}}</td>
                                              <td>{{$salary->issued_date}}</td>
                                              <td>{{$salary->issued_till}}</td>
                                              <td>{{$salary->tDays()}}</td>
                                              <td>{{$salary->issued_by}}</td>
                                              {{-- <td><a class="btn btn-primary btn-sm" href="{{url('/salary/edit/'.$salary->id)}}">Edit</a> <a class="btn btn-danger btn-sm" href="{{url('/salary/cancel/'.$salary->id)}}">Cancel</a></td> --}}
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
