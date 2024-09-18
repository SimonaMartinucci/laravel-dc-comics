@extends('layouts.main')

@section('content')

<div class="container">

    @if(session('deleted'))
    <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
    </div>
    @endif

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
            <td>
                <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary me-3"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning me-3"><i class="fa-solid fa-pencil"></i></a>
                <form action="{{ route('comics.destroy', $comic) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

</div>

@endsection