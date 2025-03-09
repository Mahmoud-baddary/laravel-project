<nav class="navbar navbar-light bg-white navbar-expand-xl bg-body-tertiary">
    <div class="container-fluid">
        <a style="color: black" class="navbar-brand" href="{{ route('shopping.index') }}">All products</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2"
            aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a style="color: black" class="nav-link active" aria-current="page"
                            href="{{ route('shopping.category', $category->id) }}">{{ $category->name }}</a>
                    </li>
                @endforeach

            </ul>
            <form class="d-flex" action="{{ route('shopping.search') }}">
                <input list="products" name="searchWord" class="form-control me-2" required type="search"
                    placeholder="Search" aria-label="Search" value="{{ $searchWord }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    {{ $slot }}
</div>
<datalist id="products">
    @foreach ($allProducts as $p)
        <option value="{{ $p->name }}"></option>
    @endforeach
</datalist>
