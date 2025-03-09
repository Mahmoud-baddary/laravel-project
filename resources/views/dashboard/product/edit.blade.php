@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <x-alerts.errors></x-alerts.errors>
        </div>
        <h2 class="mb-4">Edit product ({{ $product->name }})</h2>

        <!-- Form -->
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Token for Security -->
            @method('PUT')
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
                    required>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>
                {{ $product->description }}
            </textarea>
            </div>

             <!-- keywords -->
             <div class="mb-3">
                <label for="keyword-input">Search keywords:</label>
                <input type="text" id="keyword-input" autocomplete="off">
                <div id="autocomplete-dropdown"></div>
                <div id="selected-keywords"></div>
                <input type="hidden" name="keywords" id="keywords-hidden">

            </div>

            <!-- price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price (EGP)</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}"
                    required>
            </div>

            <!-- stock_quantity -->
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock quantity</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                    value="{{ $product->stock_quantity }}">
            </div>

            <!-- Thumbnail -->
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail Image</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                @if ($product->thumbnail)
                    <div class="m-2">
                        <img src="{{ asset($product->thumbnail) }}" alt="Current thumbnail" width="100px">
                    </div>
                @endif
            </div>

            <!-- Multiple Images -->
            <div class="mb-3">
                <label for="images" class="form-label">Product Images</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                <small class="text-muted">You can upload multiple images.</small>
                @if ($product->images)
                    <div class="m-2">
                        @foreach (json_decode($product->images, true) as $image)
                            <img src="{{ asset($image) }}" alt="Product image" width="100px" class="m-2">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Edit Product</button>
        </form>
    </div>
    <script>
        window.keywords = {!! json_encode($keywords) !!};
        window.selectedKeywords = {!! json_encode($product->keywords) !!};
    </script>
    <script src="{{ asset('style/js/dashboard/product/edit.js') }}"></script>
@endsection
