@extends('layouts.main')
@section('title', 'Informasi Pribadi')
@inject('carbon', 'Carbon\Carbon')
@inject('myFunc', 'App\Helpers\MyFunction')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Informasi Pribadi</h3>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body p-5">
            <div class="d-flex justify-content-center align-items-center flex-column">
              <div class="avatar avatar-2xl">
                <img src="https://ui-avatars.com/api/?background=FF5154&color=fff&bold=true&name={{ auth()->user()->name }}" alt="Avatar">
              </div>

              <h3 class="mt-3">{{ auth()->user()->name }}</h3>
              {{-- <p class="text-small">{{ auth()->user()->role }}</p> --}}
              @if (auth()->user()->role == 'Super Admin')
                <span class="badge bg-light-danger">{{ auth()->user()->role }}</span>
              @elseif (auth()->user()->role == 'Admin')
                <span class="badge bg-light-primary">{{ auth()->user()->role }}</span>
              @else
                <span class="badge bg-light-secondary">{{ auth()->user()->role }}</span>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <form action="{{ route('informasi-pribadi.store') }}" method="POST">
              @csrf

              <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? auth()->user()->name }}" placeholder="Nama Lengkap" required autocomplete="off">
                @error('name')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                  value="{{ old('email') ?? auth()->user()->email }}" placeholder="Email" required autocomplete="off">
                  @error('email')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection


@push('prepend-style')
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
@endpush