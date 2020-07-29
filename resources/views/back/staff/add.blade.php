@extends('layouts.back.index')
@section('title',"Add Staff")
@section('brand',"Add Staff")
@section('content')
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Add Staff</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="" enctype="multipart/form-data" >
                                        @csrf

                                        <div class="form-group">
                                            <label>Staff Name</label>
                                            <input name="name" type="text" placeholder="Enter customer name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Staff Address</label>
                                            <input name="address" type="text" placeholder="Enter customer address" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Staff Phone No.</label>
                                            <input name="phone" type="number" placeholder="Enter customer pnone no." class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Staff Email</label>
                                            <input name="email" type="email" placeholder="Enter customer email" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Staff Type</label>
                                            <select name="type" id="" class="form-control">
                                                <option value="">---Choose staff type---</option>
                                                <option value="administrator">Administrator</option>
                                                <option value="flex">Flex</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start-date">Start Date</label>
                                                    <input name="start_date" id="nepali-calendar" type="text" class="form-control" placeholder="Date Enter Here" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start-date">Salary</label>
                                                    <input name="salary" type="number" class="form-control" placeholder="Enter salary" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start-date">Citizenship</label>
                                                    <input name="nationality"  type="text" class="form-control" placeholder="Enter Citizenship" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start-date">Citizenship No.</label>
                                                    <input name="nationality_no" type="text" class="form-control" placeholder="Enter Citizenship no." required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                    <label for="start-date">Parent Name</label>
                                                    <input name="parent_name" type="text" class="form-control" placeholder="Enter parent Name." required/>
                                        </div>
                                        <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                            <p >Image</p>
                                            <img src="" style="height: 200px;" id="photo"/>
                                            <input type="file" name="image" class="form-control"  onchange="readURL(this);">
                                        </div>

                                    </div>
                                    <div class="card-footer  text-center">
                                        <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
@endsection
@section('scripts')
<script type="text/javascript">
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
        $(document).ready(function () {
            $('#nepali-calendar').nepaliDatePicker();
        });
</script>
@endsection
