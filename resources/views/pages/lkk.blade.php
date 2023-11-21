@extends('layouts.main')
@section('title', 'Lembar Keputusan Kredit')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6">
        <h3>Lembar Keputusan Kredit</h3>
      </div>
      <div class="col-12 col-md-6">
        <button class="btn icon icon-left btn-primary float-start float-lg-end" data-bs-toggle="modal" data-bs-target="#tambah">
          <i class="fa fa-fw fa-arrow-up-from-bracket"></i>
          Upload LKK
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
              <th class="text-center">Data</th>
              <th class="text-center">Data</th>
              <th class="text-center">Data</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Data</td>
              <td>Data</td>
              <td>Data</td>
            </tr>
            <tr>
              <td>Data</td>
              <td>Data</td>
              <td>Data</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </section>
</div>
@include('includes.modals.modal-lkk')
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