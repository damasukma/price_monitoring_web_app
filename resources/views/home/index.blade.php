@extends('master')

@section('title', $title)

@section('content')
<div class="col-6">

    @if(session('message'))
    <div class="alert alert-{{ session('message')['class'] }} alert-dismissible fade show" role="alert">
        <strong>{{ session('message')['status'] }} !, </strong> {{ session('message')['message'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form class="row" method="POST" action="{{ route('added')}}">
    @csrf()  
    <div class="col-12">
        <div class="input-group mb-3">
            <label class="input-group-text" for="url">URL</label>
            <input type="text" class="form-control" name="urlProduct" aria-label="Text input with segmented dropdown button">
            <button class="btn btn-outline-primary" type="submit">Submit</button>
        </div>
    </div>
    </form>
</div>
@endsection