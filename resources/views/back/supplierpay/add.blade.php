<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

@extends('layouts.back.index')
@section('title',"Supplier Payment")
@section('brand',"Supplier Payment")
@section('content')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Supplier Payment</h4>
                                </div>
                                <div class="card-body ">

                                         <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Supplier Name</label>

                                                    <select name="" class="selectpicker form-control" data-live-search="true"  data-hide-disabled="true"
                                                    onchange="
                                                        loadSupplierData($(this).val());
                                                    ">
                                                      <option value="0">--- Choose Supplier ---</option>
                                                        @foreach($suppliers as $supp)
                                                          <option  data-tokens="{{$supp->name}}"  value="{{$supp->id}}">{{$supp->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                        </div>
                                        <div class="row" style="min-height:130px">
                                            <div class="col-md-12">
                                                <table class="table table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th>Supplier No.</th>
                                                        <th>date</th>
                                                        <th>Total Amount</th>
                                                        <th>Discount</th>
                                                        <th>Net Total</th>
                                                        <th>Due Amount</th>

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
                                                <div class="form-group">
                                                    <label for="amout">Supplier Advance</label>
                                                    <input name="" type="number" id="advance" class="form-control" value="0" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="amout">Supplier Due</label>
                                                    <input name="" type="number" id="suppdue" class="form-control" value="0"  disabled/>
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
                                                    <input name="amount" type="number" class="form-control" placeholder="Enter due amount" required/>
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

                                        <input type="hidden" name="supplier_id" id="supplier_id"/>

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
    var supp=[];
    @foreach($suppliers as $supplier)
        supp['supplier-{{$supplier->id}}']={!! $supplier->toJson() !!};
    @endforeach


    $(function() {
            $('.selectpicker').selectpicker();
        });

       function renderBills(bill){
        if(bill.iscancel==0){
            return "<tr id='bill-"+bill.id+"'>"
            +"<td>"+bill.supplier_id+"</td>"
            +"<td>"+bill.date+"</td>"
            +"<td>"+bill.total_amount+"</td>"
            +"<td>"+bill.discount+"</td>"
            +"<td>"+(bill.total_amount - bill.discount)+"</td>"
            +"<td>"+bill.due+"</td>"
            +"</tr>";
        }
    }

     function  loadSupplierData(id){

        $('#bills').empty();
         if(id==0){
            $("#suppdue").val(0);
            $("#advance").val(0);


         }else{

         $("#advance").val(supp['supplier-'+id].advance);
         $("#supplier_id").val(supp['supplier-'+id].id);
         $("#suppdue").val(supp['supplier-'+id].due - supp['supplier-'+id].advance);



         axios.get("/supplier/due/"+id)
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
