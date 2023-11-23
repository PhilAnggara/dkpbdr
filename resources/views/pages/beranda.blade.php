@extends('layouts.main')
@section('title', 'Beranda')
@inject('carbon', 'Carbon\Carbon')

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
        <h4 class="card-title">Jatuh Tagih dan Jatuh Tempo <small class="text-muted">({{ $carbon::now()->isoFormat('MMMM YYYY') }})</small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover text-center">
            <thead>
              <tr>
                <th class="text-center">Nama Debitur</th>
                <th class="text-center">Fintech</th>
                <th class="text-center">Plafond</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @forelse ($pembayaran as $p)
                <tr>
                  <td>{{ $p->debitur->nama }}</td>
                  <td>
                    <span class="badge bg-light-success">
                      {{ $p->debitur->fin->fintech }}
                    </span>
                  </td>
                  <td>{{ $p->debitur->plafond_bdr }}</td>
                  <td>
                    <i class="fal fa-calendar-day text-danger"></i>
                    {{ $carbon::parse($p->tanggal)->isoFormat('D MMMM YYYY') }}
                  </td>
                  <td>
                    @if ($p->type == 'jatuh tagih')
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
              @empty
                <tr>
                  <td colspan="10">Tidak ada data yang ditemukan</td>
                </tr>
              @endforelse
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