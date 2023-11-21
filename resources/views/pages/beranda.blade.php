@extends('layouts.main')
@section('title', 'Beranda')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3><span id="typed"></span></h3>
      </div>
    </div>
  </div>
  <section class="section">

    <div class="card">
      <div class="card-header">
        <h4>Capaian Sindikasi</h4>
      </div>
      <div class="card-body">
        <div id="bar"></div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Jatuh Tagih dan Jatuh Tempo</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover text-center">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <td>PT. Alfa Riung Jaya (Avantee)</td>
                <td><span class="badge bg-danger">Jatuh Tagih</span></td>
              </tr>
              <tr>
                <td>CV. Enggal Mulyo (Avantee)</td>
                <td><span class="badge bg-warning">Jatuh Tempo</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</div>
@endsection


@push('prepend-style')
@endpush
@push('addon-style')
  <script src="{{ url('assets/vendors/typed/typed.js') }}"></script>
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
<script>
  var typed = new Typed('#typed', {
    strings: [
      'Selamat Datang, ' + `{!! Str::before(auth()->user()->name, ' ') !!}` + '..!',
    ],
    startDelay: 500,
    typeSpeed: 20,
    showCursor: false,
    // backSpeed: 15,
    // backDelay: 3000,
    // loop: true,
    // loopCount: Infinity,
  });
</script>
<script src="{{ url('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ url('assets/scripts/beranda.js') }}"></script>
@endpush