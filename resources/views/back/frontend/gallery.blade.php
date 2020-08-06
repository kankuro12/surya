@extends('layouts.back.index')
@section('title',"Gallery")
@section('brand',"Gallery")
@section('style')
@endsection
@section('content')
<div class="p-3">
    <div class="card p-4">
        <div id="form">
            <form method="POST" enctype="multipart/form-data" action="/gallery/add">
                @csrf
                <input name="category" placeholder="Category" required />
                <input type="file" accept="image/*" name="image" class="form-input" required />
                <input type="submit" class="mt-2 btn btn-primary" value="add image" />
            </form>
        </div>
    </div>
    <div class="mt-5">
        <div class="row">
            @foreach ($images as $image)
            <div class="col-md-6">
                <div class=" card w-100 h-100 p-4">
                    <img src="{{$image->image}}" class="w-100 pb-3" />
                    <p>
                        {{$image->category}}
                        <a href="/gallery/del/{{$image->id}}" class="btn btn-danger">Delete</a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
