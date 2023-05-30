@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Product</h1>
      <div class="card mb-4">
        <div class="card-body">
          <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" aria-label="category" name="category" id="category">
                <option selected disabled>Choose Category</option>
                @foreach ($categories as $cat)
                  <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                @endforeach
              </select>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
              </div>
              <div class="mb-3">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input type="text" class="form-control" id="sale_price" name="sale_price" required>
              </div>
              <div class="mb-3">
                <label for="brands" class="form-label">Brand</label>
                <select class="form-select" aria-label="brands" name="brands" id="brands">
                  <option selected disabled>Choose Brand</option>
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
