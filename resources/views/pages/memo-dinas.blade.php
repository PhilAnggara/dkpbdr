@extends('layouts.main')
@section('title', 'Memo Dinas')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6">
        <h3>Memo Dinas</h3>
      </div>
      <div class="col-12 col-md-6">
        <button class="btn icon icon-left btn-primary float-start float-lg-end" data-bs-toggle="modal" data-bs-target="#tambah">
          <i class="fa fa-fw fa-arrow-up-from-bracket"></i>
          Upload Memo Dinas
        </button>
      </div>
    </div>
  </div>
  <section class="section">

    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover text-center" id="table1">
          <thead>
            <tr>
              <th class="text-center">No. Memo Dinas</th>
              <th class="text-center">Memo Dinas</th>
              <th class="text-center">Tanggal Upload</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
              <tr>
                <td>
                  <button class="btn btn-sm icon icon-left btn-outline-secondary rounded-pill" onclick="copyToClipboard('{{ $item->no }}')">
                    <i class="fal fa-clipboard"></i>
                    {{ $item->no }}
                  </button>
                </td>
                <td>
                  <a href="{{ Storage::url($item->path) }}" target="_blank" class="btn btn-sm icon icon-left btn-light rounded-pill">
                    <i class="fal fa-print"></i>
                    Lihat Dokumen
                  </a>
                </td>
                <td>
                  <i class="fal fa-calendar-day text-danger"></i>
                  {{ $carbon::parse($item->created_at)->isoFormat('D MMMM YYYY') }}
                </td>
                <td>
                  <button type="button" class="btn btn-sm icon icon-left" onclick="hapusData({{ $item->id }}, 'Hapus Dokumen', 'Yakin ingin menghapus dokumen ini?')">
                    <i class="text-secondary fal fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"></i>
                  </button>
                  <form action="{{ route('hapus-dokumen', $item->id) }}" id="hapus-{{ $item->id }}" method="POST">
                    @method('delete')
                    @csrf
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </section>
</div>
@include('includes.modals.modal-dokumen', ['type' => 'memo dinas', 'modalTitle' => 'Memo Dinas'])
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
<script src="{{ url('assets/scripts/filepond-dokumen.js') }}"></script>
@endpush