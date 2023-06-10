@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Update Brand</h1>
      <div class="card mb-4">
        <div class="card-body">

          <form action="{{ route('brand.update', $brand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Brand Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}"
                required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('brand.index') }}" type="button" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
