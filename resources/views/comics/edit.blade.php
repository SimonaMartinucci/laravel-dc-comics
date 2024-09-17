@extends('layouts.main')

@section('content')

<div class="container">

    <h2 class="my-4">Modifica {{ $comic->name }}</h2>

    <form action="{{ route('comics.update', $comic) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $comic->name }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="textarea" class="form-control" id="description" name="description" value="{{ $comic->description }}">
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Cover image (path)</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series name</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
        </div>
        <button type="submit" href="" class="btn btn-primary">Update</button>
        <a href="{{ route('comics.index') }}" class="btn btn-danger">Cancel</a>
    </form>

</div>

@endsection