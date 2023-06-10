@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Role</h1>
      <a href="{{ route('role.create') }}" type="button" class="btn btn-primary mb-2 mt-2">Add</a>
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
              @foreach ($roles as $role)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $role['name'] }}</td>
                  <td>
                    <form onsubmit="return confirm('Are you sure? ');" action="{{ route('role.destroy', $role->id) }}"
                      method="POST">
                      <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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
