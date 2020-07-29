@extends('layouts.back.index')
@section('title',"Sup_Advance Add")
@section('brand',"Sup_Advance Add")
@section('content')
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Supplier Advance Add</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="">
                                        @csrf

                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input name="amount" type="number" placeholder="Enter advance amount" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input name="date" id="nepali-calendar" type="text" placeholder="Enter date" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Issed By</label>
                                            <input name="issued_by" type="text" placeholder="Enter issuer name" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Advance TO</label>
                                            <select name="supplier_id" id="" data-role="select" class="form-control">
                                                <option value="">---Choose Supplier---</option>
                                                @foreach ($suppliers as $supplier)
                                                   <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
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
<script>
        $(document).ready(function () {
            $('#nepali-calendar').nepaliDatePicker();
        });
    </script>
@endsection
