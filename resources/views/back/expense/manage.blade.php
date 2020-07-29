@extends('layouts.back.index')
@section('title',"Expense Add")
@section('brand',"Expense Add")
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
                                    <label>Expense Title</label>
                                    <input name="name" type="text" placeholder="Enter expense title" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Expense Amount</label>
                                    <input name="amount" type="number" placeholder="Enter amout" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input name="date" id="nepali-calendar" type="text" class="form-control" placeholder="Date Enter Here" required/>
                                </div>

                            <input type="hidden" name="expcategory_id" value="{{$expense->id}}">

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
