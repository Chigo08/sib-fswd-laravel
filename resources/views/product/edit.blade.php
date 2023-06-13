@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Update Product</h1>
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" aria-label="category" name="category" id="category">
                <option selected disabled>Choose Category</option>
                @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}</option>
                @endforeach
              </select>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
                  required>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}"
                  required>
              </div>
              <div class="mb-3">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input type="text" class="form-control" id="sale_price" name="sale_price"
                  value="{{ $product->sale_price }}" required>
              </div>
              <div class="mb-3">
                <label for="brands" class="form-label">Brand</label>
                <select class="form-select" aria-label="brands" name="brands" id="brands">
                  <option selected disabled>Choose Brand</option>
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->name }}"{{ $product->brand == $brand->name ? 'selected' : '' }}>
                      {{ $brand->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" name="image" id="image"
                  accept=".jpg, .jpeg, .png, .webp">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('product.index') }}" type="button" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
