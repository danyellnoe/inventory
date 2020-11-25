@extends('layouts.app')

@section('content')
    <h1>Our Stores</h1>

    <div class="mb-5">
        We're looking to expand soon! But for now we only have one...
    </div>

    @foreach($stores as $store)
        <div class="card">
            <div class="card-header">
                <h2>{{ $store->name }}</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $store->location }}</h5>
                <p class="card-text">{{ $store->description }}</p>
                <a href="{{ route('inventory') }}" class="btn btn-primary">View Inventory</a>
            </div>
        </div>
    @endforeach

@endsection
