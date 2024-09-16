@extends('layouts.main')

@section('content')

<div class="container">

    <table class="table">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Series</th>
        <th scope="col">Price</th>
        <th scope="col">Type</th>
        <th scope="col">Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comics as $comic)
        <tr>
            <th scope="row">{{ $comic->name }}</th>
            <td>{{ $comic->series }}</td>
            <td>${{ $comic->price }}</td>
            <td>{{ $comic->type }}</td>
            <td><a href="{{ route('comics.show', $comic) }}" class="btn btn-primary">Go</td>
        </tr>
        @endforeach
    </tbody>
    </table>

</div>

@endsection