@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
          <h1><b>Welcome, </b> {{ Auth::user()->name }}</h1>
          <h6>Please enjoy!</h6>
          <form action="{{ route('landing') }}" method="GET">
            @csrf
            <div class="row g-3 my-5">
              <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Min" name="min" value="{{ old('min') }}">
              </div>
              <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Max" name="max" value={{ old('max') }}>
              </div>
              <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Terapkan</button>
              </div>
            </div>
          </form>
          <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @forelse ($products as $product)
              <div class="col mb-5">
                <div class="card h-100">
                  @if ($product['sale_price'] != 0)
                    <!-- Sale badge-->
                    <div class="badge bg-success text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                  @endif

                  <!-- Product image-->
                  <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}"
                    alt="{{ $product->name }}" />

                  <!-- Product details-->
                  <div class="card-body p-4">
                    <div class="text-center">
                      <!-- Product name-->
                      <a href="#" style="text-decoration: none" class="text-dark">
                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                      </a>
                      <!-- Product reviews-->
                      <div class="d-flex justify-content-center small text-warning mb-2">
                        @for ($i = 0; $i < $product->rating; $i++)
                          <div class="bi-star-fill"></div>
                        @endfor
                      </div>
                      <!-- Product price-->
                      @if ($product['sale_price'] != 0)
                        <span
                          class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                        Rp.{{ number_format($product->sale_price, 0) }}
                      @else
                        Rp.{{ number_format($product->price, 0) }}
                      @endif
                    </div>
                  </div>
                  <!-- Product actions-->
                  <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                  </div>
                </div>
              </div>
            @empty
              <div class="alert alert-secondary w-100 text-center" role="alert">
                <h4>Produk belum tersedia</h4>
              </div>
            @endforelse
          </div>
        </div>
      </section>
    </div>
  </main>
@endsection
