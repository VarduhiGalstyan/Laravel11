@extends('layouts.admin_layouts.admin_ContainPage')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
<table class="table">
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
                <td>{{ $product->title }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" width="50">
                    @endforeach
                </td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->date_of_birth }}</td>
                <td>
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
@endsection
