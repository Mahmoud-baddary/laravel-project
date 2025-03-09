@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Your Cart</h1>
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price(EGP)</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total(EGP)</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td id="price{{ $product->id }}">{{ $product->price }}</td>
                            <td>
                                <input type="number" class="form-control" disabled
                                    value="{{ $product->quantity }}" min="1" max="{{ $product->stock_quantity }}">
                            </td>
                            <td>@php
                                echo $product->price * $product->quantity
                            @endphp</td>
                            <td>
                                <form action="{{ route('cart.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <a href="{{ route('shopping.index') }}" class="btn btn-secondary">Continue Shopping</a>
            </div>
            <div class="col-md-6 text-end">
                <h4 id="total">Total: @php
                    $sum = 0;
                    foreach($products as $product){
                        $sum+= $product->price * $product->quantity;
                    }
                    echo $sum;
                @endphp EGP</h4>
                @if ($products->isNotEmpty())
                <a href="{{ route(name: 'order.create') }}" class="btn btn-primary">Proceed to Checkout</a>
                @endif
            </div>
        </div>
    </div>
@endsection
