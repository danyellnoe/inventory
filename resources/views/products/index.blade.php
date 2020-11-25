@extends('layouts.app')

@section('content')

    <h1>Current Inventory for {{ $store->name }}</h1>

    <div>
        There are currently <strong>{{ $counts['total'] }}</strong> items in this store's inventory,
        with <strong>{{ $counts['layaway'] }}</strong> products on layaway.
    </div>

    <add-product-form :store-id="{{ $store->id }}"></add-product-form>

    @if(empty($products))
        <div class="alert alert-warning" role="alert">
            <strong>No products found!</strong> Click the "Add a Product" button above to add one.
        </div>
    @else
        @include('products.partials.addCommentModal')
        @include('products.partials.productTable')
    @endif

@endsection
