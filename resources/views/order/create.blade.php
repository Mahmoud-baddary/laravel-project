@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <x-alerts.errors></x-alerts.errors>
        </div>
        <h1 class="text-center mb-4">Checkout</h1>
        <div class="row">
            <!-- Billing Details Form -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Billing Details</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form with action and method -->
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf <!-- CSRF token for security -->
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName"
                                    placeholder="John Doe" disabled value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="john@example.com" disabled value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="123 Main St" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="+1 123 456 7890" required>
                            </div>
                            <!-- Payment Options -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Payment Options</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="creditCard"
                                            value="creditCard" >
                                        <label class="form-check-label" for="creditCard">
                                            Credit Card
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="paypal"
                                            value="paypal">
                                        <label class="form-check-label" for="paypal">
                                            PayPal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="cashOnDelivery" value="cashOnDelivery" checked>
                                        <label class="form-check-label" for="cashOnDelivery">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @php
                                $sum = 5; // shipping cost
                            @endphp
                            @foreach ($products as $product )
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $product->name }}
                                <span>@php
                                    $sum += $product->price * $product->quantity;
                                echo $product->price * $product->quantity;
                                @endphp EGP</span>
                            </li>
                            @endforeach

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Shipping
                                <span>5.00 EGP</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                                Total
                                <span>{{ $sum }} EGP</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
