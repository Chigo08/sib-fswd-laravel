@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">User</h1>
      <a href="{{ route('user.create') }}" type="button" class="btn btn-primary mb-2 mt-2">Add</a>
      <div class="card mb-4">
        <div class="card-body text-center">
          <table id="datatablesSimple" class="table table-hover">
            <thead class="table-secondary">
              <tr>
                <th>#</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    <img src="https://placehold.co/50x50" alt="Dummy Image">
                  </td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <span
                      class="badge {{ $user->role->name == 'admin' ? 'bg-success' : 'bg-primary' }}">{{ $user->role->name }}
                    </span>
                  </td>
                  <td>{{ $user->phone }}</td>
                  <td>
                    <form onsubmit="return confirm('Are you sure? ')" action="{{ route('user.destroy', $user->id) }}"
                      method="POST">
                      <a href="{{ route('user.edit', $user->id) }}" type="button" class="btn btn-warning">Edit</a>
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
