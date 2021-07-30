@extends('master')

@section('title', $title)

@section('content')
<div class="row">
<div class="col-6">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Url</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach($result as $value)
                <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->product_name }}</td>
                    <td><a href="{{ route('detail', ['id' => $value->id]) }}">{{ $value->product_name }}</a></td>
                    <td><a href="{{ $value->url }}">{{ $value->url }}</a></td>
                </tr>
                @endforeach    
            </tbody>
        </table>
    </div>
</div>
@endsection