@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Category</h1>
      <a href="{{ route('category.create') }}" type="button" class="btn btn-primary mb-2 mt-2">Add</a>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category['name'] }}</td>
                  <td>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
@endsection
