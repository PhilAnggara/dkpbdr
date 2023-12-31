@extends('layouts.main')
@section('title', 'Data Peminjam')
@inject('carbon', 'Carbon\Carbon')
@inject('myFunc', 'App\Helpers\MyFunction')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6">
        <h3>Data Peminjam</h3>
      </div>
      <div class="col-12 col-md-6">
        <div class="dropdown float-start float-lg-end">
          <button class="btn icon icon-left btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-file-pen"></i>
            Input Data
          </button>
          <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#korporasi">
              <i class="fad fa-fw fa-buildings text-secondary"></i>
              Input Data Nasabah Korporasi
            </a>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#perorangan">
              <i class="fa fa-fw fa-user text-secondary"></i>
              Input Data Nasabah Perorangan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section">

    @if (session('success'))
      <div class="alert alert-light-success color-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-striped table-hover text-center" id="table1">
          <thead>
            <tr>
              <th class="text-center">Nama Debitur</th>
              <th class="text-center">Fintech</th>
              <th class="text-center">Group</th>
              <th class="text-center">Tanggal Cair</th>
              <th class="text-center">Kategori</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>
                  <span class="badge bg-light-success">
                    {{ $item->fin->fintech }}
                  </span>
                </td>
                <td>{{ $item->grup }}</td>
                <td>
                  <i class="fal fa-fw fa-calendar-day text-danger"></i>
                  {{ tgl($item->tanggal_cair) }}
                </td>
                <td>
                  @if ($item->type == 'korporasi')
                    <span class="badge bg-light-primary">
                      <i class="fad fa-fw fa-sm fa-buildings"></i>
                      Korporasi
                    </span>
                  @else
                    <span class="badge bg-light-secondary">
                      <i class="fad fa-fw fa-sm fa-user"></i>
                      Perorangan
                    </span>
                  @endif
                </td>
                <td>
                  <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn icon" data-bs-toggle="modal" data-bs-target="#detail-{{ $item->id }}">
                      <i class="text-primary fal fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></i>
                    </button>
                    <button type="button" class="btn icon" data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}">
                      <i class="text-primary fal fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn icon" onclick="hapusData({{ $item->id }}, 'Hapus Debitur', 'Yakin ingin menghapus {{ $item->nama }}?')">
                      <i class="text-secondary fal fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"></i>
                    </button>
                    <form action="{{ route('data-peminjam.destroy', $item->id) }}" id="hapus-{{ $item->id }}" method="POST">
                      @method('delete')
                      @csrf
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </section>
</div>
@include('includes.modals.modal-debitur-korporasi')
@include('includes.modals.modal-debitur-perorangan')
@endsection


@push('prepend-style')
<link rel="stylesheet" href="{{ url('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ url('assets/compiled/css/table-datatable.css') }}">

<link rel="stylesheet" href="{{ url('assets/extensions/filepond/filepond.css') }}">
<link rel="stylesheet" href="{{ url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
<link rel="stylesheet" href="{{ url('assets/extensions/toastify-js/src/toastify.css') }}">
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
<script src="{{ url('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ url('assets/scripts/simple-datatables.js') }}"></script>

<script src="{{ url('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
<script src="{{ url('assets/extensions/filepond/filepond.js') }}"></script>
<script src="{{ url('assets/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ url('assets/scripts/filepond.js') }}"></script>


  @if (session('success'))
    <script>
      Swal.fire({
        title: "{{ session('success') }}",
        icon: "success",
        confirmButtonColor: '#FF5154',
        confirmButtonText: 'OKE',
        width: 32rem,
        timer: 6000,
      });
    </script>
  @endif
@endpush