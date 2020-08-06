@extends('layouts.back.index')
@section('title',"Sliders")
@section('brand',"Sliders")
@section('style')
@endsection
@section('content')
<div class="p-3">
    <div class="card p-4">
        <div id="form">
            <form method="POST" enctype="multipart/form-data" action="/slide/add">
                @csrf
                <input type="file" accept="image/*" name="image" class="form-input" required />
                <input type="submit" class="mt-2 btn btn-primary" value="add slider" />
            </form>
        </div>
    </div>
    <div class="mt-5">
        <div class="row">
            @foreach ($sliders as $slider)
            <div class="col-md-6">
                <div class=" card w-100 h-100 p-4">
                    <img src="{{$slider->image}}" class="w-100 pb-3" />
                    <a href="/slide/del/{{$slider->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
