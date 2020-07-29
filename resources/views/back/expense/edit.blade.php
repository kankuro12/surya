@extends('layouts.back.index')
@section('title',"Customer Edit")
@section('brand',"Customer Edit")
@section('content')

                     <div class="row">
                        <div class="col-md-12">
                            <div class="card stacked-form">
                                <div class="card-header text-center ">
                                    <h4 class="card-title">Customer Edit</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="">
                                        @csrf

                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input name="name" type="text" placeholder="Enter customer name" class="form-control" value="{{$customer->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Coustomer Address</label>
                                            <input name="address" type="text" placeholder="Enter customer address" class="form-control" value="{{$customer->address}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Coustomer Phone No.</label>
                                            <input name="phone" type="number" placeholder="Enter customer pnone no." class="form-control" value="{{$customer->phone}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Coustomer Email</label>
                                            <input name="email" type="email" placeholder="Enter customer email" class="form-control" value="{{$customer->email}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Coustomer Due</label>
                                            <input name="due" type="number" placeholder="Enter customer due" class="form-control" value="{{$customer->due}}" required>
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
