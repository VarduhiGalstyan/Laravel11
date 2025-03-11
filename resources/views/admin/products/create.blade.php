@extends('layouts.admin_layouts.admin_ContainPage')

@section('content')
<h1>Add Product</h1>
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Title:</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Description:</label>
        <textarea name="description" id="ckeditor" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth" class="form-control">
    </div>
    <div class="mb-3">
        <label>Images:</label>
        <input type="file" name="images[]" class="form-control" multiple>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
</script>
@endsection
