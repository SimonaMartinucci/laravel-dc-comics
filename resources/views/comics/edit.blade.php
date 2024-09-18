@extends('layouts.main')

@section('content')

<div class="container">

    <h2 class="my-4">Modifica {{ $comic->name }}</h2>

    <form action="{{ route('comics.update', $comic) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $comic->name) }}">
            @error('name')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="textarea" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $comic->description) }}">
            @error('description')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Cover image (path)</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{ old('thumb', $comic->thumb) }}">
            @error('thumb')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $comic->price) }}">
            @error('price')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series name</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{ old('series', $comic->series) }}">
            @error('series')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}">
            @error('sale_date')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type', $comic->type) }}">
            @error('type')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <button type="submit" href="" class="btn btn-primary">Update</button>
        <a href="{{ route('comics.index') }}" class="btn btn-danger">Cancel</a>
    </form>

</div>

@endsection