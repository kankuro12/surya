@extends('layouts.back.index')
@section('title',"Costomer Order Items")
@section('brand',"Coustomer Order Items")
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
                                            <th data-field="ptr" class="text-center">Particlar</th>
                                            @if($orderitems[0]->height != 0)
                                             <th data-field="size" data-sortable="true">Size</th>
                                            @endif
                                            <th data-field="qty" data-sortable="true">Quantity</th>
                                            @if($orderitems[0]->height != 0)
                                             <th data-field="square" data-sortable="true">Sqft</th>
                                            @endif
                                            <th data-field="rate">Rate</th>
                                            <th data-field="total">Total</th>
                                            {{-- <th data-field="actions" class="td-actions text-right"  >Actions</th> --}}
                                        </thead>
                                        <tbody>
                                        @foreach($orderitems as $order)
                                            <tr>
                                                <td>{{$order->particular}}</td>

                                                @if($order->height != 0 && $order->length != 0)
                                                 <td>{{$order->height}} X {{$order->length}}</td>
                                                @endif

                                                <td>{{$order->qty}}</td>

                                                @if($order->height != 0 && $order->length != 0)
                                                <td>{{$order->height * $order->length}}</td>
                                                @endif

                                                <td>{{$order->rate}}</td>

                                                <td>
                                                @if($order->length==0 || $order->height==0)
                                                  {{$order->qty * $order->rate}}
                                                @else
                                                  {{($order->length * $order->height * $order->qty)*$order->rate}}
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



{{-- image list --}}
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Image/File For Job Order</h4>
                                </div>
                                <div class="card-body ">
                                <div class="row">
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
                                                            <a href="{{ route('imagedownload',$image->id)}}" class="btn btn-primary btn-sm">Download</a> ||
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
                    </div>

                    {{-- image end list --}}

                      <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">File Uploaded By Designer</h4>
                                </div>
                                <div class="card-body ">
                                <table id="bootstrap-table" class="table">
                                        <thead>
                                            <th data-field="file name" class="text-center">File Name</th>
                                            <th data-field="desc" data-sortable="true">Description</th>
                                            <th data-field="download" data-sortable="true">Action</th>
                                           
                                            {{-- <th data-field="actions" class="td-actions text-right"  >Actions</th> --}}
                                        </thead>
                                        <tbody>
                                         @foreach($files as $file)
                                         <tr>
                                            <td>{{$file->path}}</td>
                                            <td>{{$file->description}}</td>
                                            <td>
                                            <a href="{{ asset('back/img/design/') }}/{{$file->path}}" class="btn btn-primary btn-sm">Download</a> ||
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                         </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                     </div>
                    </div>

                     {{-- add image --}}
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#image">Image For Order</button>

                     <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#imagedesigner">File Upload By Designer</button>

                  {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Image For Job Order</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                            <p >Image Upload</p>
                                            <img src="" style="height: 200px;" id="photo"/>
                                            <input type="file" name="path" class="form-control"  onchange="readURL(this);">
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
 --}}

{{-- model for order image upload --}}

<!-- Modal -->
<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image Upload For Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                            <p >Image Upload</p>
                                            <img src="" style="height: 200px;"  id="photo"/>
                                            <input type="file" name="path" class="form-control"  onchange="readURL(this);">
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

<!-- Modal -->
<div class="modal fade" id="imagedesigner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">File Upload By Designer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('/design/order_items/'.$orderitems[0]->id)}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group " >
                                           <label>Choose File</label>
                                            <input type="file" name="path[]" multiple class="form-control"  >
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



    function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#photo')
                     .attr('src', e.target.result);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }

</script>
@endsection
