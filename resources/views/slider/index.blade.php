@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Slider</h1>
      <a href="{{ route('slider.create') }}" type="button" class="btn btn-primary mb-2 mt-2">Add</a>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Caption</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sliders as $slider)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $slider->title }}</td>
                  <td>{{ $slider->caption }}</td>
                  <td><img src="{{ asset('storage/slider/' . $slider->image) }}" class="img-fluid" style="max-width: 100px;"
                      alt="{{ $slider->image }}"></td>
                  <td>
                    <form onsubmit="return confirm('Are you sure? ');" action="{{ route('slider.destroy', $slider->id) }}"
                      method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
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
