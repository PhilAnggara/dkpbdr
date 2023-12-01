@extends('layouts.main')
@section('title', 'Jatuh Tagih & Jatuh Tempo')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Jatuh Tagih & Jatuh Tempo</h3>
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
              <th class="text-center">Plafond</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
              <tr>
                <td>{{ $item->debitur->nama }}</td>
                <td>
                  <span class="badge bg-light-success">
                    {{ $item->debitur->fin->fintech }}
                  </span>
                </td>
                <td>{{ uang($item->debitur->plafond_bdr) }}</td>
                <td>
                  <i class="fal fa-calendar-day text-danger"></i>
                  {{ tgl($item->tanggal) }}
                </td>
                <td>
                  @if ($item->type == 'jatuh tagih')
                    <span class="badge bg-light-warning">
                      <i class="fad fa-fw fa-sm fa-calendar-day"></i>
                      Jatuh Tagih
                    </span>
                  @else
                    <span class="badge bg-light-danger">
                      <i class="fa fa-fw fa-sm fa-calendar-day"></i>
                      Jatuh Tempo
                    </span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>

  </section>
</div>
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