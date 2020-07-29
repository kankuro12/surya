<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

@extends('layouts.back.index')
@section('title',"Customer Payment")
@section('brand',"Customer Payment")
@section('content')
 <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Customer Payment</h4>
                                </div>
                                <div class="card-body ">

                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Customer Name</label>

                                                    <select id="c_name" class="selectpicker form-control" data-live-search="true"  data-hide-disabled="true"
                                                    onchange="
                                                        loadCustomerData($(this).val());
                                                    ">
                                                      <option value="0">--- Choose Customer ---</option>
                                                        @foreach($customers as $cus)
                                                          <option  data-tokens="{{$cus->name}}"  value="{{$cus->id}}">{{$cus->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Customer Phone</label>
                                                    <select id="c_name" class="selectpicker form-control" data-live-search="true"  data-hide-disabled="true"
                                                        onchange="
                                                            loadCustomerData($(this).val());
                                                        ">
                                                      <option value="0">--- Choose Customer by Phone ---</option>
                                                        @foreach($customers as $cus)
                                                          <option  data-tokens="{{$cus->phone}}"  value="{{$cus->id}}">{{$cus->phone}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="min-height:130px">
                                            <div class="col-md-12">
                                                <table class="table table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th>Customer No.</th>
                                                        <th>Advance</th>
                                                        <th>Due</th>
                                                        <th>Grand Total</th>
                                                        <th>Received Date</th>
                                                        <th>Delever Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bills">
                                                </tbody>

                                                </table>
                                                <hr>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="amout">Customer Due</label>
                                                    <input name="" type="number" id="kandsflas" class="form-control"  required/>
                                                </div>
                                            </div>
                                        </div>
                                    <form method="post" >
                                     @csrf
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input name="date" id="nepali-calendar"  type="text" class="form-control" placeholder="Enter date" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="amout">Amount</label>
                                                    <input name="amount" type="number" class="form-control" placeholder="Enter customer phone" required/>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paytype">Payment Type</label>
                                                   <select class="form-control" name="payment_type" required>
                                                      <option value="0">--- Choose Payment Type ---</option>
                                                      <option value="cash">Cash</option>
                                                      <option value="cheque">Cheque</option>

                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="info">Payment Info</label>
                                                    <input name="payment_info" type="text" class="form-control" placeholder="Enter info " required/>
                                                </div>
                                            </div>
                                        </div>
                                        <input name="customer_id" id="cus_id" type="hidden" class="form-control"/>


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

    var cus=[];
    @foreach($customers as $customer)
        cus['customer-{{$customer->id}}']={!! $customer->toJson() !!};
    @endforeach
    // search
     $(function() {
        $('.selectpicker').selectpicker();
    });

    function renderBills(bill){
        return "<tr id='bill-"+bill.id+"'>"
        +"<td>"+bill.customer_id+"</td>"
        +"<td>"+bill.advance+"</td>"
        +"<td>"+bill.due+"</td>"
        +"<td>"+bill.grand_total+"</td>"
        +"<td>"+bill.order_received_date+"</td>"
        +"<td>"+bill.order_delever_date+"</td>"
        +"</tr>";
    }


     function  loadCustomerData(id){

            $('#bills').empty();
         if(id==0){

         }else{

         $("#kandsflas").val(cus['customer-'+id].due);
         $("#cus_id").val(cus['customer-'+id].id)

         //die kaha dekhauneho dekahu
         axios.get("/customer/duebills/"+id)
         .then(function(response){
             console.log(response.data);
             response.data.forEach(element => {
                    $("#bills").append(renderBills(element));

             });
         })
         .catch(function(err){

         });
         }
     }

       $(document).ready(function () {
            $('#nepali-calendar').nepaliDatePicker();
        });

</script>
@endsection
