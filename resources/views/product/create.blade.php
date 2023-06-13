@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Product</h1>
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select @error('category') is-invalid @enderror" aria-label="category" name="category"
                id="category">
                <option selected disabled>Choose Category</option>
                @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}</option>
                @endforeach
              </select>
              @error('category')
                <small class="text-danger">{{ $message }}</small>
              @enderror
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                  value="{{ old('name') }}" name="name" required>
                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                  value="{{ old('price') }}" name="price" required>
                @error('price')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input type="text" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price"
                  value="{{ old('sale_price') }}" name="sale_price" required>
                @error('sale_price')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="brands" class="form-label">Brand</label>
                <select class="form-select @error('brands') is-invalid @enderror" aria-label="brands" name="brands"
                  id="brands">
                  <option selected disabled>Choose Brand</option>
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->name }}" {{ old('brands') == $brand->name ? 'selected' : '' }}>
                      {{ $brand->name }}</option>
                  @endforeach
                </select>
                @error('brands')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
                <input class="form-control" type="file" name="image" id="image"
                  accept=".jpg, .jpeg, .png, .webp">
              </div>
              @error('image')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('product.index') }}" type="button" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
