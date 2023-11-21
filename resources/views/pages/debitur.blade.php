@extends('layouts.main')
@section('title', 'Data Peminjam')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6">
        <h3>Data Peminjam</h3>
      </div>
      <div class="col-12 col-md-6">
        {{-- <button class="btn icon icon-left btn-primary float-start float-lg-end" data-bs-toggle="modal" data-bs-target="#tambah">
          <i class="fa fa-fw fa-file-pen"></i>
          Input Data
        </button> --}}
        <div class="dropdown float-start float-lg-end">
          <button class="btn icon icon-left btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-file-pen"></i>
            Input Data
          </button>
          <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#perusahaan">
              <i class="fad fa-fw fa-buildings text-secondary"></i>
              Input Data Perusahaan/Instansi
            </a>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#perorangan">
              <i class="fa fa-fw fa-user text-secondary"></i>
              Input Data Perorangan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section">

    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover text-center" id="table1">
          <thead>
            <tr>
              <th class="text-center">Nama Debitur</th>
              <th class="text-center">Fintech</th>
              <th class="text-center">Group</th>
              <th class="text-center">Tanggal Cair</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            {{-- <tr>
              <td>Elisabet</td>
              <td>Aktivaku</td>
              <td>JDT</td>
              <td>
                <i class="fal fa-calendar-day text-danger"></i>
                26 September 2023
              </td>
            </tr>
            <tr>
              <td>PT Jaya Dirga Tama</td>
              <td>Aktivaku</td>
              <td>JDT</td>
              <td>
                <i class="fal fa-calendar-day text-danger"></i>
                26 September 2023
              </td>
              <td>
                <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn icon">
                    <i class="text-primary fal fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></i>
                  </button>
                  <button type="button" class="btn icon">
                    <i class="text-primary fal fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                  </button>
                  <button type="button" class="btn icon">
                    <i class="text-secondary fal fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"></i>
                  </button>
                </div>
              </td>
            </tr> --}}
            @foreach ($items as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->fin->fintech }}</td>
                <td>{{ $item->grup }}</td>
                <td>
                  <i class="fal fa-calendar-day text-danger"></i>
                  {{ $carbon::parse($item->tanggal_cair)->isoFormat('D MMMM YYYY') }}
                </td>
                <td>
                  <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn icon">
                      <i class="text-primary fal fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></i>
                    </button>
                    <button type="button" class="btn icon">
                      <i class="text-primary fal fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn icon">
                      <i class="text-secondary fal fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"></i>
                    </button>
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
@include('includes.modals.modal-debitur-perusahaan')
@include('includes.modals.modal-debitur-perorangan')
@endsection


@push('prepend-style')
<link rel="stylesheet" href="{{ url('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ url('assets/compiled/css/table-datatable.css') }}">
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
<script src="{{ url('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ url('assets/scripts/simple-datatables.js') }}"></script>
@endpush