@extends('layouts.admin_layouts.admin_ContainPage')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $product->title) }}" required>
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="ckeditor" class="form-control"rows="3">{{ old('description', $product->description) }}</textarea>

    </div>

    <div class="form-group">
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $product->date_of_birth) }}">
    </div>

    <div class="form-group">
        <label for="images">Images</label>
        <input type="file" class="form-control" name="images[]" id="images" multiple>
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
</script>
@endsection
