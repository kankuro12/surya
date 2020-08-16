@extends('layouts.front.index')
@section('title','Home - Surya Advertising')
@section('content')

<div class="row">
    @foreach ($joborders as $item)
    <div class="col-md-4">
        <p>{{$item->id}}</p>
    </div>
    @endforeach
</div>

@endsection
