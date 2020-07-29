@extends('layouts.back.index')
@section('title',"Add Expenses")
@section('brand',"Add Expenses")
@section('content')
     <div class="row">
        <div class="col-md-12">
            <div class="card stacked-form">
                <div class="card-header text-center ">
                    <h4 class="card-title">Add Expenses</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="">
                        @csrf

                        <div class="form-group">
                            <label>Category Name</label>
                            <input name="name" type="text" placeholder="Enter customer name" class="form-control" required>
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
