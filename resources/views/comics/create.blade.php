@extends('layouts.main')

@section('content')

<div class="container">

    <h2 class="my-4">ADD A NEW COMIC!</h2>

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('comics.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="textarea" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
            @error('description')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Cover image (path)</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{ old('thumb') }}">
            @error('thumb')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
            @error('price')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series name</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{ old('series') }}">
            @error('series')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{ old('sale_date') }}">
            @error('sale_date')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}">
            @error('type')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <button type="submit" href="" class="btn btn-primary">Submit</button>
        <button type="reset" href="" class="btn btn-danger">Cancel</button>
    </form>

</div>

@endsection