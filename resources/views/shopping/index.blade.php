@extends('layouts.app')
@section('content')
    <x-navbar-main :searchWord="$searchWord" :allProducts="$allProducts" :categories="$categories">
        <div class="d-flex justify-content-center">
            <x-alerts.errors></x-alerts.errors>
        </div>
        <div class="container my-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($products as $product)
                    <div class="col align-self-end">
                        <a href="{{ route('shopping.show', $product->id) }}" style="text-decoration: none; color: black;">
                            <div class="card h-100 shadow">
                                <img src="{{ asset($product->thumbnail) }}" class="card-img-top" alt="Product Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="text-muted">{{ $product->price }} EGP</p>
                                    <form class="d-flex justify-content-center" method="POST" action="{{ route('cart.store') }}">
                                        @csrf
                                        <input type="number" hidden name="product_id" value="{{ $product->id }}">
                                        <input type="number" hidden name="quantity" value="1" >
                                        <button type="submit" class="btn btn-warning">Add to cart</button>
                                    </form>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </x-navbar-main>
@endsection
