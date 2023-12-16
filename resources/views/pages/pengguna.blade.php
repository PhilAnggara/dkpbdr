@extends('layouts.main')
@section('title', 'Kelola Pengguna')
@inject('carbon', 'Carbon\Carbon')
@inject('myFunc', 'App\Helpers\MyFunction')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Kelola Pengguna</h3>
      </div>
    </div>
  </div>
  <section class="section">

    
    @if ($items->count() == 0)
      <div class="alert alert-secondary">
        <i class="fal fa-circle-info"></i>
        Belum ada pengguna didaftarkan
      </div>
    @endif
    
    <div class="row row-cols-12 row-cols-md-4">
      <div class="col">
        <div class="card card-plus h-card h-100 shadow-sm h-fix">
          <div class="card-body d-flex justify-content-center align-items-center">
            <i class="fas fa-user-plus fa-5x"></i>
            <a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="stretched-link"></a>
          </div>
        </div>
      </div>
      @foreach ($items as $item)
        <div class="col">
          <div class="card h-card-img h-100 shadow-sm h-fix">
            <div class="card-body position-relative">
              <div class="d-flex justify-content-center align-items-center flex-column">
                <div class="avatar avatar-2xl">
                  <img src="https://ui-avatars.com/api/?background=FF5154&color=fff&bold=true&name={{ $item->name }}" alt="Avatar">
                </div>
                <h3 class="mt-3 text-center">{{ $item->name }}</h3>
                <p class="text-small">{{ $item->email }}</p>
              </div>
              {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#detail-{{ $item->id }}" class="stretched-link"></a> --}}
            </div>
            <div class="card-footer text-center py-1">
              <button type="button" class="btn icon icon-left" onclick="hapusData({{ $item->id }}, 'Hapus Pengguna', 'Yakin ingin menghapus {{ $item->name }}?')">
                <i class="fal fa-trash-alt"></i>
                Hapus Pengguna
              </button>
              <form action="{{ route('kelola-pengguna.destroy', $item->id) }}" id="hapus-{{ $item->id }}" method="POST">
                @method('delete')
                @csrf
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    
  </section>
</div>
@include('includes.modals.modal-pengguna')
@endsection


@push('prepend-style')
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
@endpush