@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Create Role</h1>
      <div class="card mb-4">
        <div class="card-body">

          <form action="{{ route('role.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Role Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary">Cancel</button>
          </form>

        </div>
      </div>
    </div>
  </main>
@endsection
