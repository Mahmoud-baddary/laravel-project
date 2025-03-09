@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Thumbnail -->
            <img src="{{ asset( $product->thumbnail) }}" class="img-fluid rounded" alt="{{ $product->name }}">
            <!-- Additional Images -->
            <div class="row mt-3">
                @foreach (json_decode($product->images, true) as $image)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset( $image) }}" class="img-fluid rounded" alt="Product Image">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <!-- Product Details -->
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">Category: {{ $product->category->name }}</p>
            <p class="lead">{{ $product->description }}</p>
            <p>
                <strong>Keywords:</strong>
                @foreach ($product->keywords as $keyword )
                    {{ $keyword->content }} &nbsp;&nbsp;

                @endforeach
            </p>
            <p><strong>Stock Quantity:</strong> {{ $product->stock_quantity }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Created At:</strong> {{ $product->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>Last Updated:</strong> {{ $product->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
</div>
@endsection