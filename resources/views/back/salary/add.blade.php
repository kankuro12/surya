<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

@extends('layouts.back.index')
@section('title',"Salary Add")
@section('brand',"Salary Add")
@section('content')
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Salary Add</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="">
                                        @csrf

                                         <div class="form-group">
                                                    <label for="name">Staff Name</label>

                                                    <select id="" name="staff_id" class="selectpicker form-control" data-live-search="true"  data-hide-disabled="true"
                                                    onchange="
                                                        loadCustomerData($(this).val());
                                                    ">
                                                      <option value="0">--- Choose Staff ---</option>
                                                        @foreach($staffs as $staff)
                                                          <option  data-tokens="{{$staff->name}}"  value="{{$staff->id}}">{{$staff->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Staff Total Salary</label>
                                                            <input type="number" id="s_salary"  class="form-control" value="0" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <label>Staff Advance Amout</label>
                                                            <input type="number" id="advance"  class="form-control" value="0" disabled>
                                                    </div>
                                                </div>

                                        <div class="form-group">
                                            <label>Salary Amout</label>
                                            <input name="amount" type="number" id="salary"  class="form-control" value="0" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Current Date</label>
                                            <input id="nepali-calendar" name="date" type="text" placeholder="Enter date" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Issued From</label>
                                            <input id="nepali-calendar1" name="issued_date" type="text" placeholder="Enter date" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Issued Till</label>
                                            <input id="nepali-calendar2" name="issued_till" type="text" placeholder="Enter date" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Issued By </label>
                                            <input name="issued_by" type="text" placeholder="Enter issuer name" class="form-control" required>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script>
    var sta=[];
        @foreach($staffs as $staff)
            sta['staff-{{$staff->id}}']={!! $staff->toJson() !!};
        @endforeach

       $(function() {
            $('.selectpicker').selectpicker();
        });

        function loadCustomerData(id){
            if(id==0){
                  $('#salary').val('0');
                  $('#advance').val('0');
                  $('#s_salary').val('0');

            }
           var saly = (sta['staff-'+id].salary) - (sta['staff-'+id].advance);
            $("#salary").val(saly);
            $("#advance").val(sta['staff-'+id].advance);
            $("#s_salary").val(sta['staff-'+id].salary);
        }

        $(document).ready(function () {
            $('#nepali-calendar').nepaliDatePicker();
        });
        $(document).ready(function () {
            $('#nepali-calendar1').nepaliDatePicker();
        });
        $(document).ready(function () {
            $('#nepali-calendar2').nepaliDatePicker();
        });


</script>
@endsection
