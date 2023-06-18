@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Slider</h1>
      <a href="{{ route('slider.create') }}" type="button" class="btn btn-primary mb-2 mt-2">Add</a>
      <div class="card mb-4">
        <div class="card-body text-center">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Caption</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sliders as $slider)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $slider->title }}</td>
                  <td>{{ Str::limit($slider->caption, 20) }}</td>
                  <td><img src="{{ asset('storage/slider/' . $slider->image) }}" class="img-fluid" style="max-width: 100px;"
                      alt="{{ $slider->image }}"></td>
                  <td>
                    @if ($slider->approve)
                      <small class="badge bg-success">Approved</small>
                    @else
                      <small class="badge bg-danger">Rejected</small>
                    @endif
                  </td>
                  @if (Auth::user()->role->name == 'Admin')
                    <td>
                      @if ($slider->approve)
                        <form onsubmit="return confirm('Are you sure? ');"
                          action="{{ route('slider.reject', $slider->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                        </form>
                      @else
                        <form onsubmit="return confirm('Are you sure? ');"
                          action="{{ route('slider.approve', $slider->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>
                      @endif
                    </td>
                  @else
                    <td>
                      <form onsubmit="return confirm('Are you sure? ');"
                        action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
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
