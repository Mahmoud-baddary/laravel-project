@extends('layouts.app')
@section('content')
    <x-dashboard.layout title="Your products">
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Add new Product</a>
        </div>
        <div class="d-flex justify-content-center">
            <x-alerts.errors></x-alerts.errors>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Stock Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->created_at->toDateString() }}</td>
                            <td>{{ number_format($product->price, 2) }} EGP</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
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
    </x-dashboard.layout>
@endsection
