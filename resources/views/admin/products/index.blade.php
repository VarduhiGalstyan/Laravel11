@extends('layouts.admin_layouts.admin_ContainPage')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
<p></p>
<input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by Title..." onkeyup="filterProducts()">


<table class="table" id="productsTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Name</th>
            <th>Images</th>
            <th>Description</th>
            <th>Date of Birth</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td class="product-title">{{ $product->title }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" width="50">
                    @endforeach
                </td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->date_of_birth }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    function filterProducts() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#productsTable tbody tr");

        rows.forEach(row => {
            let title = row.querySelector(".product-title").textContent.toLowerCase();
            if (title.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
@endsection
