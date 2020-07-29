@extends('layouts.back.index')
@section('title',"List Staff")
@section('brand',"List Staff")
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
                                            <th data-field="image" class="text-center">Image</th>
                                            <th data-field="name" data-sortable="true">Name</th>
                                            <th data-field="address" data-sortable="true">Address</th>
                                            <th data-field="type" data-sortable="true">Staff Type</th>
                                            <th data-field="phone" data-sortable="true">Phone</th>
                                            <th data-field="email">Email</th>
                                            <th data-field="start-date">Start From</th>
                                            <th data-field="salary">Salary</th>
                                            <th data-field="advacne">Advance</th>
                                            <th data-field="actions" class="td-actions text-right">Actions</th>
                                        </thead>
                                        <tbody>
                                        @foreach($staffs as $staff)
                                            <tr>
                                                <td><img src="{{ URL::to('back/img/staff/'.$staff->image) }}" alt="Staff-img" style="height:100px;"></td>
                                                <td>{{$staff->name}}</td>
                                                <td>{{$staff->address}}</td>
                                                <td>{{$staff->type}}</td>
                                                <td>{{$staff->phone}}</td>
                                                <td>{{$staff->email}}</td>
                                                <td>{{$staff->start_date}}</td>
                                                <td>Rs. {{$staff->salary}}</td>
                                                <td>Rs. {{$staff->advance}}</td>
                                                <td><a title="Edit" class="btn btn-link btn-warning table-action edit" href="{{ url('/staff/edit/'.$staff->id) }}"><i class="fa fa-edit"></i></a>  <a title="Delete" class="btn btn-link btn-danger table-action remove" href="{{ url('/staff/delete/'.$staff->id) }}"><i class="fa fa-remove"></i></a> </td>
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
