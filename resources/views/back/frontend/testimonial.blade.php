@extends('layouts.back.index')
@section('title',"Testimonials")
@section('brand',"Testimonials")
@section('style')
@endsection
@section('content')
<div class="p-3">
    <div class="card p-4">
        <div id="form">
            <form method="POST" enctype="multipart/form-data" action="/testimonial/add">
                @csrf
                <input name="name" placeholder="name" required class="form-control mb-3" />
                <textarea name="description" placeholder="description" class="form-control pb-3"
                    style="min-height:100px;"></textarea>
                <input type="submit" class="mt-2 btn btn-primary" value="add testimonial" />
            </form>
        </div>
    </div>
    <div class="mt-5">
        <div class="row">
            @foreach ($images as $image)
            <div class="col-md-6">
                <div class=" card w-100 h-100 p-4">
                    <p>
                        {{$image->name}}
                    </p>
                    <p>
                        {{$image->description}}
                    </p>
                    <a href="/testimonial/del/{{$image->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
