@extends('layouts.main')

@section('content')

<div class="container">

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->name }}">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $comic->name }}</h5>
                <p class="card-text">{{ $comic->description }}</p>
                <p class="card-text"><small class="text-body-secondary mb-4"><b>Sale date:</b> {{ $comic->sale_date }}</small></p>
                <a href="{{ route('comics.index') }}" class="btn btn-primary">Back</a>
            </div>
            </div>
        </div>
    </div>

</div>

@endsection