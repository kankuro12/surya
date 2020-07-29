@extends('layouts.back.index')
@section('title',"Customer Add")
@section('brand',"Customer Add")
@section('content')
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Customer Add</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="">
                                        @csrf

                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input name="name" type="text" placeholder="Enter customer name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Customer Address</label>
                                            <input name="address" type="text" placeholder="Enter customer address" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Customer Phone No.</label>
                                            <input name="phone" type="number" placeholder="Enter customer pnone no." class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Customer Email</label>
                                            <input name="email" type="email" placeholder="Enter customer email" class="form-control" required>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label>Advance</label>
                                            <input name="advance" type="number" placeholder="Enter advance" class="form-control" required>
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Customer Due</label>
                                            <input name="due" type="number" placeholder="Enter customer due" class="form-control" required>
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
