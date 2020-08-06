@extends('layouts.back.index')
@section('title',"Services")
@section('brand',"Services")
@section('style')
@endsection
@section('content')
<div class="p-3">
    <div class="card p-4">
        <div id="form">
            <form method="POST" enctype="multipart/form-data" action="/service/add">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <input name="title" placeholder="title" required class="form-control" />
                    </div>
                    <div class="col-md-6">

                        <input type="file" accept="image/*" name="image" class="form-control" required />
                    </div>
                </div>

                <textarea name="description" placeholder="description" class="form-control pb-3"
                    style="min-height:100px;"></textarea>
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
                        {{$image->title}}
                    </p>
                    <p>
                        {{$image->description}}
                    </p>
                    <a href="/service/del/{{$image->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
