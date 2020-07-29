@extends('layouts.back.index')
@section('title',"Dashboard")
@section('brand',"Dashoard")
@section('content')
        <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-money-coins text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Total Salary Paid</p>
                                                <h5 class="card-title"><span class="text-warning" style="font-size:11px; font-weight:bold;">Rs.</span> {{$salary}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-warning"> <i class="fa fa-refresh"></i>Refresh Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-money-coins text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Expenses</p>
                                                <h5 class="card-title"><span class="text-success" style="font-size:11px; font-weight:bold;">Rs.</span> {{$exp}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-success"> <i class="fa fa-refresh"></i>Refresh Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-money-coins text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Customer Order</p>
                                                <h5 class="card-title"><span class="text-danger" style="font-size:11px; font-weight:bold;">Rs.</span> {{$totalorder}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-danger"> <i class="fa fa-refresh"></i>Refresh Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-money-coins text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Supplier Bills</p>
                                                <h5 class="card-title"><span class="text-primary" style="font-size:11px; font-weight:bold;">Rs.</span> {{$totalbill}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-primary"> <i class="fa fa-refresh"></i>Refresh Now</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                {{-- next panel --}}

                 <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-danger">
                                                <i class="nc-icon nc-circle-09 text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Staff Memeber</p>
                                                <h5 class="card-title"><span class="text-danger" style="font-size:11px; font-weight:bold;">Total.</span> {{$staff}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-danger"> <i class="fa fa-refresh"></i>Refresh Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-circle-09 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Customer</p>
                                                <h5 class="card-title"><span class="text-primary" style="font-size:11px; font-weight:bold;">Total.</span> {{$customer}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-primary"> <i class="fa fa-refresh"></i>Refresh Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-circle-09 text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Supplier</p>
                                                <h4 class="card-title"><span class="text-warning" style="font-size:11px; font-weight:bold;">Total.</span> {{$supplier}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-warning"> <i class="fa fa-refresh"></i>Refresh Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-money-coins text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Staff Advance pay</p>
                                                <h4 class="card-title"><span class="text-primary" style="font-size:11px; font-weight:bold;">Rs.</span> {{$totaladv}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                       <a href="{{url('/admin')}}" class="text-primary"> <i class="fa fa-refresh"></i>Refresh Now</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



@endsection
