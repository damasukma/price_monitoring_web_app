@extends('master')

@section('title', $title)

@section('content')
<div class="row">
    <div class="col-6">

        @if(session('message'))
        <div class="alert alert-{{ session('message')['class'] }} alert-dismissible fade show" role="alert">
            <strong>{{ session('message')['status'] }} !, </strong> {{ session('message')['message'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                {{ $product->id }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{ $product->product_name }} <cite title="{{ $product->price }}"> Rp. {{ $product->price }}</cite></p>
                    <footer class="blockquote-footer">{{ $product->description }}</footer>
                </blockquote>

            <div class="row">  
                @foreach($images as $value)  
                <div class="col-3">
                    <img src="{{ $value }}" class="img-thumbnail" >
                </div>
                @endforeach
            </div>

            </div>
            </div>

        </div>
        <div class="col-6">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                   History Price
                </button>
                @foreach($prices as $value)
                <button type="button" class="list-group-item list-group-item-action">Rp.{{ $value->price }} - @ {{ $value->created_at }}</button>
                @endforeach
                </div>
            </div>
        </div>
</div>
@endsection