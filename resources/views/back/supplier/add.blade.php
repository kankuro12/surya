@extends('layouts.back.index')
@section('title',"Supplier Add")
@section('brand',"Supplier Add")
@section('content')
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Supplier Add</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="">
                                        @csrf
                                       
                                        <div class="form-group">
                                            <label>Supplier Name</label>
                                            <input name="name" type="text" placeholder="Enter supplier name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier Address</label>
                                            <input name="address" type="text" placeholder="Enter supplier address" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Supplier Phone No.</label>
                                            <input name="phone" type="number" placeholder="Enter supplier pnone no." class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Supplier Email</label>
                                            <input name="email" type="email" placeholder="Enter supplier email" class="form-control" required>
                                        </div>

                                      
                                         <div class="form-group">
                                            <label>Supplier PAN</label>
                                            <input name="pan" type="text" placeholder="Enter supplier pan" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label>Supplier VAT</label>
                                            <input name="vat" type="text" placeholder="Enter supplier vat" class="form-control" >
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