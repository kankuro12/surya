@extends('layouts.back.index')
@section('title',"Add Job Order")
@section('brand',"Add Job Order")
@section('style')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    /* The overlay effect with black background */
    .overlay {
        height: 100%;
        width: 100%;
        display: none;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgb(0, 0, 0);
        background-color: white;
        /* Black with a little bit see-through */
    }

    /* The content */
    .overlay-content {
        position: relative;
        top: 20px;
        width: 80%;
        text-align: center;
        margin-top: 30px;
        margin: auto;
    }

    /* Close button */
    .overlay .closebtn {
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 30px;
        cursor: pointer;
        color: black;
    }

    .overlay .closebtn:hover {
        color: #ccc;
    }

    /* Style the search field */

    /* Style the submit button */
    /* .overlay button {
        float: left;
        width: 20%;
        padding: 15px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    } */

    .overlay button:hover {
        background: #bbb;
    }
</style>
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card stacked-form">
            <div class="card-header text-center ">
                <h4 class="card-title">Add Job Order</h4>
            </div>
            <div class="card-body ">
                <form method="post" enctype="multipart/form-data" id="form" autocomplete="none">
                    <div class="p-3">
                        <span onclick="openSearch();" class="btn btn-primary"><i class="fa fa-search"></i> Old
                            Customer</span>
                    </div>

                    @csrf
                    {{-- customer detail --}}
                    <div id="customer_holder">
                        <div class="row">
                            <div class="col-md-6">

                                <input type="hidden" name="c_id" id="c_id">

                                <div class="form-group">
                                    <label>Customer Phone No.</label>
                                    <input onkeyup="searchCustomer(this.value)" name="c_phone" type="tel"
                                        placeholder="Enter customer pnone no." class="form-control" id="c_phone">
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input name="c_name" type="text" placeholder="Enter customer name"
                                        class="form-control" required id="c_name" autocomplete="off">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Customer Address</label>
                                    <input name="c_address" type="text" placeholder="Enter customer address"
                                        class="form-control" id="c_address">
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Customer Email</label>
                                    <input name="c_email" type="email" placeholder="Enter customer email"
                                        class="form-control" id="c_email">
                                </div>

                            </div>

                        </div>
                    </div>
                    {{-- /customer detail --}}

                    {{-- order date --}}
                    <div id="orderDetail">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Received Date</label>
                                    <input name="order_received_date" type="text" id="nepali-date"
                                        placeholder="Received Date" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Delivery Date</label>
                                    <input name="order_delever_date" id="nepali-calendar1" type="text"
                                        placeholder="Delivery Date" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- /order date --}}

                    {{-- order item add --}}
                    <div id="orderitemadd">
                        <div class="row">
                            <div class="col-md-9">

                                <div class="form-group">
                                    <label>Particular</label>
                                    <input type="text" placeholder="Particular" class="form-control"
                                        id="item_particular">
                                </div>

                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>Type</label>
                                    <select onchange="mediaTypeChange()" placeholder="Total" class="form-control"
                                        id="item_type">
                                        <option value="1">Flex</option>
                                        <option value="2">Frame</option>
                                        <option value="3">design</option>
                                        <option value="4">others</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2" style="margin-top:3px;">
                                <h5 class="text-danger"> If No Dimension:</h5>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check checkbox-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="singlejob" onchange="
                                                                if(this.checked){
                                                                     document.getElementById('item_height').disabled=true;
                                                                     document.getElementById('item_height_in').disabled=true;
                                                                     document.getElementById('item_width').disabled=true;
                                                                     document.getElementById('item_width_in').disabled=true;
                                                                     document.getElementById('item_size').disabled=true;
                                                                }else{
                                                                     document.getElementById('item_height').disabled=false;
                                                                     document.getElementById('item_height_in').disabled=false;
                                                                     document.getElementById('item_width').disabled=false;
                                                                     document.getElementById('item_width_in').disabled=false;
                                                                     document.getElementById('item_size').disabled=false;
                                                                }
                                                                " type="checkbox" checked>
                                        <span class="form-check-sign"></span>
                                        For Single Type Order
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Height in feet</label>
                                    <input onkeyup="calculateSize(); calculateItemSize();" type="number"
                                        placeholder="Height" class="form-control dis" id="item_height" value="0">

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Height in inch</label>
                                    <input onkeyup="calculateSize(); calculateItemSize();" type="number"
                                        placeholder="Height" class="form-control dis" id="item_height_in" value="0">
                                    <input type="hidden" id="item_height_in1" value="0" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>width in feet</label>
                                    <input onkeyup="calculateSize(); calculateItemSize();" type="number"
                                        placeholder="Width" class="form-control dis" id="item_width" value="0">

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>width in inch</label>
                                    <input onkeyup="calculateSize(); calculateItemSize();" type="number"
                                        placeholder="Width" class="form-control dis" id="item_width_in" value="0">
                                    <input type="hidden" id="item_width_in1" value="0" />
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>Qty</label>
                                    <input onkeyup="calculateSize(); calculateItemSize();" type="number"
                                        placeholder="Qty" class="form-control" id="item_qty" value="1">
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Size</label>
                                    <input onkeyup="calculateItemSize();" type="number" placeholder="Size"
                                        class="form-control dis" id="item_size" value="0">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input onkeyup="calculateItemSize();" type="number" placeholder="Rate"
                                        class="form-control" id="item_rate" value="0">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="number" placeholder="Total" class="form-control" id="item_total" />
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" name="remark" placeholder="Enter remarks" class="form-control"
                                        id="item_remarks">
                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label> </label>
                                    <input type="submit" class="form-control btn btn-primary"
                                        onclick="addItem();return false;" value="Add">
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- /order item add --}}

                    {{-- ItemsCounter --}}
                    <input type="hidden" name="counter" id="counter" val="" />
                    {{-- /ItemsCounter --}}


                    {{-- orderitem list --}}
                    <table class="table" id="item_table">
                        <tr>
                            <th>Particular</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Sqft</th>
                            <th>Rate</th>
                            <th>Total</th>
                            <th>Remarks</th>
                            <th></th>
                        </tr>

                    </table>
                    {{-- /orderitem list --}}
                    <hr />
                    {{-- totals and discount --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Grand Total</label>
                                <input name="grand_total" type="number" placeholder="grand_total" class="form-control"
                                    required id="grandtotal" value="0" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discount </label>
                                <input name="discount" onkeyup="calculateTotal()" type="number" placeholder="discount"
                                    class="form-control" required id="discount" min="0" value="0">
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label>Paid</label>
                                <input name="advance" onkeyup="calculateTotal()" type="number" placeholder="advance"
                                    class="form-control" required id="paid" value="0" min="0">
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>Due</label>
                                <input name="due" type="number" placeholder="Due" class="form-control" required id="due"
                                    value="0" min="0" readonly>
                            </div>

                        </div>
                    </div>
                    {{-- /total and discounts --}}

                    <div class="card-footer  text-center">
                        <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="myOverlay" class="overlay">
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
        <div class="overlay-content">
            <table id="bootstrap-table" class="table">
                <thead>
                    <tr>
                        <th data-field="name" class="text-center" data-sortable="true">Name</th>
                        <th data-field="address" class="text-center" data-sortable="true">Address</th>
                        <th data-field="Phone" data-sortable="true">Phone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>
                            {{$customer->name}}
                        </td>
                        <td>
                            {{$customer->address}}
                        </td>
                        <td>
                            {{$customer->phone}}
                        </td>
                        <td>
                            <button class="btn btn-link" onclick="searchCustomer({{$customer->id}});">
                                select
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection
    @section('scripts')

    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var i=0;
        var uniqueItemKeys=[];
        var customers=[];
        @foreach($customers as $customer)
            customers[{{$customer->id}}]={!! $customer->toJson() !!};
        @endforeach
        console.log(customers);

        function mediaTypeChange(){

        }

        function addItem(){
            if($("#item_particular").val()=="" || $("#item_total").val()==0 ){
                alert("Please Enter Particular and Total amount");
                $("#item_particular").focus();
                return false;
            }
            html="<tr id='row-"+i+"'>";
            html+="<td>"+$("#item_particular").val()+"<input type='hidden' name='item_particular_"+i+"' value='"+$("#item_particular").val()+"'/></td>" ;
            html+="<td>"+(parseFloat($("#item_height").val()) + parseFloat($("#item_height_in1").val()))+" X "+(parseFloat($("#item_width").val()) + parseFloat($("#item_width_in1").val()))+"<input type='hidden' name='item_height_"+i+"' value='"+(parseFloat($("#item_height").val()) + parseFloat($("#item_height_in1").val()))+"'/><input type='hidden' name='item_width_"+i+"' value='"+(parseFloat($("#item_width").val()) + parseFloat($("#item_width_in1").val()))+"'/></td>";
            html+="<td>"+$("#item_qty").val()+"<input type='hidden' name='item_qty_"+i+"' value='"+$("#item_qty").val()+"'/></td>" ;

            html+="<td>"+$("#item_size").val()+"<input type='hidden' name='item_size_"+i+"' value='"+$("#item_size").val()+"'/></td>" ;

            html+="<td>"+$("#item_rate").val()+"<input type='hidden' name='item_rate_"+i+"' value='"+$("#item_rate").val()+"'/></td>" ;

            html+="<td>"+$("#item_total").val()+"<input type='hidden' name='item_total_"+i+"' id='item_total_"+i+"' value='"+$("#item_total").val()+"'/></td>" ;

            html+="<td>"+$("#item_remarks").val()+"<input type='hidden' name='item_remarks_"+i+"' id='item_remarks_"+i+"' value='"+$("#item_remarks").val()+"'/>"+"<input type='hidden' name='item_type_"+i+"' id='item_type_"+i+"' value='"+$("#item_type").children("option:selected").val()+"'/></td>" ;
            html+="<td><span class='btn btn-danger' onclick='removeRow("+i+")'>Del</span></td>"


            html+="</tr>";
            $("#item_table").append(html);

            $("#item_particular").val("");
            $("#item_height").val("0");
            $("#item_height_in").val("0");
            $("#item_width").val("0");
            $("#item_width_in").val("0");
            $("#item_qty").val("0");
            $("#item_size").val("");
            $("#item_total").val("0");
            $("#item_remarks").val("");
            $("#item_particular").focus();
            uniqueItemKeys.push(i);
            i+=1;
            suffle();
        }

        function removeRow(i){
            $('#row-'+i).remove();
            var index=$.inArray(i,uniqueItemKeys);
            console.log(index);
            if(index>-1){
                uniqueItemKeys.splice(index,1);
            }
            suffle();
        }

        function suffle(){
            console.log(uniqueItemKeys);
            $("#counter").val(uniqueItemKeys.join(","));
            calculateTotal();
        }

        function searchCustomer(val){
            var customer=customers[val];

                $("#c_id").val("");
                $("#c_name").val("");
                $("#c_address").val("");
                $("#c_email").val("");
            if(customers!=null){
                $("#c_id").val(customer.id);
                $("#c_name").val(customer.name);
                $("#c_phone").val(customer.phone);
                $("#c_address").val(customer.address);
                $("#c_email").val(customer.email);
                closeSearch();
            }


        }

        function calculateSize(){
            var hfeet = parseFloat($("#item_height").val());
            var wfeet = parseFloat($("#item_width").val());
            var hinch = parseFloat($("#item_height_in").val()/12);
            var winch = parseFloat($("#item_width_in").val()/12);

            var total = (hfeet + hinch) * (wfeet + winch);

            $("#item_size").val(total * $("#item_qty").val());
            $('#item_height_in1').val(hinch);
            $('#item_width_in1').val(winch);
        }
        function calculateItemSize(){
            var size = $("#item_size").val()
            if(size!=0){
            $("#item_total").val( $("#item_rate").val() * size);
            }else{
               $('#item_total').val( $('#item_qty').val()*$('#item_rate').val());
            }
        }

        function calculateTotal(){
            var total=0;
           for (let index = 0; index < uniqueItemKeys.length; index++) {
               const element = uniqueItemKeys[index];
               console.log($("#item_total_"+element));
               total+= parseInt($("#item_total_"+element).val());
           }
           $("#grandtotal").val(total);
           var discount=parseInt($("#discount").val());
           var nettotal=total-discount;
           var paid=parseInt($("#paid").val());
           var due=nettotal-paid;
           $("#due").val(due<0?0:due);
        }



    </script>
    <script>
        $(document).ready(function () {
            $("#customer_holder .form-control").prop("autocomplete","none");
        document.querySelectorAll('.dis').forEach(element => {
            element.disabled= true;
        });

    var availableTags = [
        @foreach($customers as $customer)
            "{{$customer->name}}",
        @endforeach
    ];
    $( "#c_name" ).autocomplete({
        source: availableTags
    });
       $('#nepali-date').nepaliDatePicker();
       $('#nepali-calendar1').nepaliDatePicker();
    });



    function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
    }


    function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
    }

    </script>
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