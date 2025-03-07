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
        <label>Existing Images</label>
        <div class="image-container">
            @foreach ($product->images as $image)
                <div class="image-box" data-image-id="{{ $image->id }}">
                    <img src="{{ asset('storage/' . $image->image_path) }}" width="100">
                    <button type="button" class="delete-image-btn">❌</button>
                </div>
            @endforeach
        </div>
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

    document.querySelectorAll('.delete-image-btn').forEach(button => {
        button.addEventListener('click', function () {
            let imageBox = this.parentElement;
            let imageId = imageBox.getAttribute('data-image-id');

            fetch(`/products/image-delete/${imageId}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    imageBox.remove(); // Ջնջում ենք HTML-ից
                } else {
                    console.error("Error:", data.message);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
</script>
@endsection
