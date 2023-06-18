@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Product</h1>
      <a href="{{ route('product.create') }}" type="button" class="btn btn-primary mb-2 mt-2">Add</a>
      <div class="card mb-4">
        <div class="card-body text-center">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Sale Price</th>
                <th>Brand</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    @if ($product->image == null)
                      <span class="badge bg-primary">No Image</span>
                    @else
                      <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}"
                        style="max-width: 50px">
                    @endif
                  </td>
                  <td>{{ $product->category->name }}</td>
                  <td>{{ $product->name }}</td>
                  <td>Rp. {{ number_format($product->price, 0, 2) }}</td>
                  <td>Rp. {{ number_format($product->sale_price, 0, 2) }}</td>
                  <td>{{ $product->brands }}</td>
                  <td>
                    @if ($product->approve)
                      <small class="badge bg-success">Approved</small>
                    @else
                      <small class="badge bg-danger">Rejected</small>
                    @endif
                  </td>
                  @if (Auth::user()->role->name == 'Admin')
                    <td>
                      @if ($product->approve)
                        <form onsubmit="return confirm('Are you sure? ');"
                          action="{{ route('product.reject', $product->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                        </form>
                      @else
                        <form onsubmit="return confirm('Are you sure? ');"
                          action="{{ route('product.approve', $product->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>
                      @endif
                    </td>
                  @else
                    <td>
                      <form onsubmit="return confirm('Are you sure? ');"
                        action="{{ route('product.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
@endsection
