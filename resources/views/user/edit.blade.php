@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Update User</h1>
      <div class="card mb-4">
        <div class="card-body">

          <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select class="form-select" aria-label="Role" name="role" id="role">
              <option selected disabled>Choose Role</option>
              @foreach ($roles as $role)
                <option value="{{ $role->id }}"{{ $user->role == $role->name ? 'selected' : '' }}>{{ $role->name }}
                </option>
              @endforeach
            </select>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('user.index') }}" type="button" class="btn btn-secondary">Cancel</a>
          </form>

        </div>
      </div>
    </div>
  </main>
@endsection
