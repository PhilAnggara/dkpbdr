{{--  --}}
{{-- Tambah --}}
{{--  --}}

<div class="modal fade text-left" id="korporasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Data Nasabah Korporasi <small class="text-muted">(Perusahaan/Lembaga/Yayasan/Instansi)</small></h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form action="{{ route('data-peminjam.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="korporasi">
        <div class="modal-body">

          <div class="divider my-3">
            <div class="divider-text fw-bold">Data Nasabah</div>
          </div>

          <fieldset class="form-group">
            <label for="fintech">Fintech</label>
            <select class="form-select" id="fintech" name="id_fintech" required>
              <option value="" selected disabled>-- Pilih Fintech --</option>
              @foreach ($fintech as $f)
                <option value="{{ $f->id }}" {{ old('id_fintech') == $f->id ? 'selected' : '' }}>{{ $f->fintech }}</option>
              @endforeach
            </select>
          </fieldset>

          <div class="form-group">
            <label for="nama">Nama Perusahaan</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Perusahaan" required autocomplete="off">
            @error('nama')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="grup">Group</label>
            <input type="text" class="form-control @error('grup') is-invalid @enderror" id="grup" name="grup" value="{{ old('grup') }}" placeholder="Group" autocomplete="off">
            @error('grup')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="plafond_all">Plafond All</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" class="form-control @error('plafond_all') is-invalid @enderror" id="plafond_all" name="plafond_all" value="{{ old('plafond_all') }}" required autocomplete="off">
              @error('plafond_all')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="plafond_bdr">Plafond BDR</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" class="form-control @error('plafond_bdr') is-invalid @enderror" id="plafond_bdr" name="plafond_bdr" value="{{ old('plafond_bdr') }}" required autocomplete="off">
              @error('plafond_bdr')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="tanggal_cair">Tanggal Cair</label>
            <input type="date" class="form-control @error('tanggal_cair') is-invalid @enderror" id="tanggal_cair" name="tanggal_cair" value="{{ old('tanggal_cair') }}" placeholder="Tanggal Cair" required autocomplete="off">
            @error('tanggal_cair')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jangka_waktu">Jangka Waktu <small class="text-secondary">(Bulan)</small></label>
            <input type="number" class="form-control @error('jangka_waktu') is-invalid @enderror" id="jangka_waktu" name="jangka_waktu" value="{{ old('jangka_waktu') }}" placeholder="Jangka Waktu" required autocomplete="off">
            @error('jangka_waktu')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <fieldset class="form-group">
            <label for="sistem_pembayaran">Sistem Pembayaran</label>
            <select class="form-select" id="sistem_pembayaran" name="sistem_pembayaran" required>
              <option value="" selected disabled>-- Pilih Sistem Pembayaran --</option>
              <option {{ old('sistem_pembayaran') == 'Balloon Payment' ? 'selected' : '' }}>Balloon Payment</option>
              <option {{ old('sistem_pembayaran') == 'Bullet Payment' ? 'selected' : '' }}>Bullet Payment</option>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="status_bh">Status Badan Hukum</label>
            <select class="form-select" id="status_bh" name="status_bh" required>
              <option value="" selected disabled>-- Pilih Status Badan Hukum --</option>
              <option {{ old('status_bh') == 'PT' ? 'selected' : '' }}>PT</option>
              <option {{ old('status_bh') == 'PD' ? 'selected' : '' }}>PD</option>
              <option {{ old('status_bh') == 'CV' ? 'selected' : '' }}>CV</option>
              <option {{ old('status_bh') == 'Firma' ? 'selected' : '' }}>Firma</option>
              <option {{ old('status_bh') == 'UD' ? 'selected' : '' }}>UD</option>
              <option {{ old('status_bh') == 'Koperasi' ? 'selected' : '' }}>Koperasi</option>
              <option {{ old('status_bh') == 'Lembaga' ? 'selected' : '' }}>Lembaga</option>
              <option {{ old('status_bh') == 'Instansi' ? 'selected' : '' }}>Instansi</option>
              <option {{ old('status_bh') == 'Perusahaan Umum' ? 'selected' : '' }}>Perusahaan Umum</option>
              <option {{ old('status_bh') == 'Yayasan' ? 'selected' : '' }}>Yayasan</option>
              <option {{ old('status_bh') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>
          
          <div class="form-group">
            <label for="no_npwp">Nomor NPWP</label>
            <input type="text" class="form-control @error('no_npwp') is-invalid @enderror" id="no_npwp" name="no_npwp" value="{{ old('no_npwp') }}" placeholder="Nomor NPWP" required autocomplete="off">
            @error('no_npwp')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="npwp">Upload NPWP</label>
            <input type="file" class="basic-filepond @error('npwp') is-invalid @enderror" id="npwp" name="npwp" value="{{ old('npwp') }}" required>
            @error('npwp')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <fieldset class="form-group">
            <label for="bidang_usaha">Bidang Usaha</label>
            <select class="form-select" id="bidang_usaha" name="bidang_usaha" required>
              <option value="" selected disabled>-- Pilih Bidang Usaha --</option>
              <option {{ old('bidang_usaha') == 'Perdagangan' ? 'selected' : '' }}>Perdagangan</option>
              <option {{ old('bidang_usaha') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
              <option {{ old('bidang_usaha') == 'Perkebunan' ? 'selected' : '' }}>Perkebunan</option>
              <option {{ old('bidang_usaha') == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
              <option {{ old('bidang_usaha') == 'Perikanan' ? 'selected' : '' }}>Perikanan</option>
              <option {{ old('bidang_usaha') == 'Bidang Produksi' ? 'selected' : '' }}>Bidang Produksi</option>
              <option {{ old('bidang_usaha') == 'Pertambangan' ? 'selected' : '' }}>Pertambangan</option>
              <option {{ old('bidang_usaha') == 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
              <option {{ old('bidang_usaha') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
              <option {{ old('bidang_usaha') == 'Pariwisata' ? 'selected' : '' }}>Pariwisata</option>
              <option {{ old('bidang_usaha') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
              <option {{ old('bidang_usaha') == 'Jasa Keuangan' ? 'selected' : '' }}>Jasa Keuangan</option>
              <option {{ old('bidang_usaha') == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
            </select>
          </fieldset>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <livewire:address-dropdown/>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Detail Lainnya (Cth: Nama Jalan, Gedung, No. Rumah, Patokan)" required autocomplete="off">
            @error('alamat')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="no_telp">Nomor Telepon</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="fal fa-fw fa-sm fa-phone"></i>
              </span>
              <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="off">
              @error('no_telp')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="no_hp">Nomor Handphone</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="fal fa-fw fa-sm fa-mobile"></i>
              </span>
              <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="off">
              @error('no_hp')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="fal fa-fw fa-sm fa-envelope"></i>
              </span>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="off">
              @error('email')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="divider my-3">
            <div class="divider-text fw-bold">Legalitas</div>
          </div>
          
          <div class="form-group">
            <label>Akta Pendirian dan Pengesahan DEPKUMHAM</label>
            <div class="row">
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_pendirian') is-invalid @enderror" id="akta_pendirian" name="akta_pendirian" value="{{ old('akta_pendirian') }}" required>
                @error('akta_pendirian')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_pengesahan') is-invalid @enderror" id="akta_pengesahan" name="akta_pengesahan" value="{{ old('akta_pengesahan') }}" required>
                @error('akta_pengesahan')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label>Akta Perubahan Terakhir dan Pengesahan DEPKUMHAM</label>
            <div class="row">
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_perubahan_terakhir') is-invalid @enderror" id="akta_perubahan_terakhir" name="akta_perubahan_terakhir" value="{{ old('akta_perubahan_terakhir') }}" required>
                @error('akta_perubahan_terakhir')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_pengesahan2') is-invalid @enderror" id="akta_pengesahan2" name="akta_pengesahan2" value="{{ old('akta_pengesahan2') }}" required>
                @error('akta_pengesahan2')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="siup">SIUP</label>
            <input type="file" class="basic-filepond @error('siup') is-invalid @enderror" id="siup" name="siup" value="{{ old('siup') }}" required>
            @error('siup')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="nib">NIB (Nomor Induk Berusaha)</label>
            <input type="file" class="basic-filepond @error('nib') is-invalid @enderror" id="nib" name="nib" value="{{ old('nib') }}" required>
            @error('nib')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="divider my-3">
            <div class="divider-text fw-bold">Data Pengurus</div>
          </div>

          @include('includes.form.pengurus', ['id_nama' => 'nama_1', 'id_jabatan' => 'jabatan_1', 'id_ktp' => 'ktp_1', 'id_npwp' => 'npwp_1'])
          <hr>
          @include('includes.form.pengurus', ['id_nama' => 'nama_2', 'id_jabatan' => 'jabatan_2', 'id_ktp' => 'ktp_2', 'id_npwp' => 'npwp_2'])
          <hr>
          @include('includes.form.pengurus', ['id_nama' => 'nama_3', 'id_jabatan' => 'jabatan_3', 'id_ktp' => 'ktp_3', 'id_npwp' => 'npwp_3'])
          <hr>
          @include('includes.form.pengurus', ['id_nama' => 'nama_4', 'id_jabatan' => 'jabatan_4', 'id_ktp' => 'ktp_4', 'id_npwp' => 'npwp_4'])
          <hr>
          @include('includes.form.pengurus', ['id_nama' => 'nama_5', 'id_jabatan' => 'jabatan_5', 'id_ktp' => 'ktp_5', 'id_npwp' => 'npwp_5'])

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">
            Batal
          </button>
          <button type="submit" class="btn btn-primary ms-1">
            Simpan
          </button>
        </div>
      </form>
      
    </div>
  </div>
</div>


@foreach ($debKorporasi as $dk)

{{--  --}}
{{-- Detail --}}
{{--  --}}

<div class="modal fade text-left" id="detail-{{ $dk->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">
          Detail Debitur
          <span class="badge bg-light-primary">
            <i class="fad fa-fw fa-sm fa-buildings"></i>
            Korporasi
          </span>
        </h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">

        <div class="divider my-3">
          <div class="divider-text fw-bold">Data Nasabah</div>
        </div>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>Fintech</th>
                <td>
                  <span class="badge bg-light-success">
                    {{ $item->fin->fintech }}
                  </span>
                </td>
              </tr>
              <tr>
                <th>Nama Perusahaan</th>
                <td>{{ $dk->nama }}</td>
              </tr>
              <tr>
                <th>Group</th>
                <td>{{ $dk->grup }}</td>
              </tr>
              <tr>
                <th>Plafond All</th>
                <td>{{ uang($dk->plafond_all) }}</td>
              </tr>
              <tr>
                <th>Plafond BDR</th>
                <td>{{ uang($dk->plafond_bdr) }}</td>
              </tr>
              <tr>
                <th>Tanggal Cair</th>
                <td>
                  <i class="fal fa-fw fa-calendar-day text-danger"></i>
                  {{ tgl($dk->tanggal_cair) }}
                </td>
              </tr>
              <tr>
                <th>Jangka Waktu</th>
                <td>{{ $dk->jangka_waktu }} <small class="text-secondary fst-italic">Bulan</small></td>
              </tr>
              <tr>
                <th>Sistem Pembayaran</th>
                <td>{{ $dk->sistem_pembayaran }}</td>
              </tr>
              <tr>
                <th>Status Badan Hukum</th>
                <td>{{ $dk->korporasi->status_bh }}</td>
              </tr>
              <tr>
                <th>NPWP</th>
                <td>
                  <a href="{{ Storage::url($dk->korporasi->npwp) }}" target="_blank" class="badge bg-light-primary">
                    <i class="fal fa-print"></i>
                    {{ $dk->korporasi->no_npwp }}
                  </a>
                </td>
              </tr>
              <tr>
                <th>Bidang Usaha</th>
                <td>{{ $dk->korporasi->bidang_usaha }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>
                  <i class="fad fa-fw fa-location-dot text-danger"></i>
                  {{ alamat($dk->id_kelurahan) }}
                </td>
              </tr>
              <tr>
                <th>Detail Alamat</th>
                <td>{{ $dk->alamat }}</td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td>
                  <i class="fal fa-fw fa-phone"></i>
                  {{ $dk->no_telp }}
                </td>
              </tr>
              <tr>
                <th>Nomor Handphone</th>
                <td>
                  <i class="fal fa-fw fa-mobile"></i>
                  {{ $dk->no_hp }}
                </td>
              </tr>
              <tr>
                <th>Email</th>
                <td>
                  <i class="fal fa-fw fa-envelope"></i>
                  {{ $dk->email }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="divider my-3">
          <div class="divider-text fw-bold">Legalitas</div>
        </div>

        <div class="container">
          <p class="fw-bold">Akta Pendirian dan Pengesahan DEPKUMHAM</p>
          <div class="row">
            <div class="col-md-6 col-12">
              @include('includes.component.file-card', ['file_path' => $dk->korporasi->akta_pendirian])
            </div>
            <div class="col-md-6 col-12">
              @include('includes.component.file-card', ['file_path' => $dk->korporasi->akta_pengesahan])
            </div>
          </div>
        </div>

        <div class="container">
          <p class="fw-bold">Akta Perubahan Terakhir dan Pengesahan DEPKUMHAM</p>
          <div class="row">
            <div class="col-md-6 col-12">
              @include('includes.component.file-card', ['file_path' => $dk->korporasi->akta_perubahan_terakhir])
            </div>
            <div class="col-md-6 col-12">
              @include('includes.component.file-card', ['file_path' => $dk->korporasi->akta_pengesahan2])
            </div>
          </div>
        </div>

        <div class="container">
          <p class="fw-bold">SIUP</p>
          @include('includes.component.file-card', ['file_path' => $dk->korporasi->siup])
        </div>

        <div class="container">
          <p class="fw-bold">NIB (Nomor Induk Berusaha)</p>
          @include('includes.component.file-card', ['file_path' => $dk->korporasi->nib])
        </div>

        <div class="divider my-3">
          <div class="divider-text fw-bold">Data Pengurus</div>
        </div>
        
        @include('includes.component.pengurus', ['nama' => $dk->korporasi->nama_1, 'jabatan' => $dk->korporasi->jabatan_1, 'ktp' => $dk->korporasi->ktp_1, 'npwp' => $dk->korporasi->npwp_1])
        <hr>
        @include('includes.component.pengurus', ['nama' => $dk->korporasi->nama_2, 'jabatan' => $dk->korporasi->jabatan_2, 'ktp' => $dk->korporasi->ktp_2, 'npwp' => $dk->korporasi->npwp_2])
        <hr>
        @include('includes.component.pengurus', ['nama' => $dk->korporasi->nama_3, 'jabatan' => $dk->korporasi->jabatan_3, 'ktp' => $dk->korporasi->ktp_3, 'npwp' => $dk->korporasi->npwp_3])
        <hr>
        @include('includes.component.pengurus', ['nama' => $dk->korporasi->nama_4, 'jabatan' => $dk->korporasi->jabatan_4, 'ktp' => $dk->korporasi->ktp_4, 'npwp' => $dk->korporasi->npwp_4])
        <hr>
        @include('includes.component.pengurus', ['nama' => $dk->korporasi->nama_5, 'jabatan' => $dk->korporasi->jabatan_5, 'ktp' => $dk->korporasi->ktp_5, 'npwp' => $dk->korporasi->npwp_5])

      </div>
    </div>
  </div>
</div>


{{--  --}}
{{-- Edit --}}
{{--  --}}

<div class="modal fade text-left" id="edit-{{ $dk->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">
          Edit Debitur
          <span class="badge bg-light-primary">
            <i class="fad fa-fw fa-sm fa-buildings"></i>
            Korporasi
          </span>
        </h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form action="{{ route('data-peminjam.update', $dk->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="type" value="korporasi">
        <div class="modal-body">

          <div class="divider my-3">
            <div class="divider-text fw-bold">Data Nasabah</div>
          </div>

          <fieldset class="form-group">
            <label for="fintech">Fintech</label>
            <select class="form-select" id="fintech" name="id_fintech" required>
              <option value="" selected disabled>-- Pilih Fintech --</option>
              @foreach ($fintech as $f)
                <option value="{{ $f->id }}" {{ $dk->id_fintech == $f->id ? 'selected' : '' }}>{{ $f->fintech }}</option>
              @endforeach
            </select>
          </fieldset>

          <div class="form-group">
            <label for="nama">Nama Perusahaan</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $dk->nama }}" placeholder="Nama Perusahaan" required autocomplete="off">
            @error('nama')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="grup">Group</label>
            <input type="text" class="form-control @error('grup') is-invalid @enderror" id="grup" name="grup" value="{{ old('grup') ?? $dk->grup }}" placeholder="Group" autocomplete="off">
            @error('grup')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="plafond_all">Plafond All</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" class="form-control @error('plafond_all') is-invalid @enderror" id="plafond_all" name="plafond_all" value="{{ old('plafond_all') ?? $dk->plafond_all }}" required autocomplete="off">
              @error('plafond_all')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="plafond_bdr">Plafond BDR</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" class="form-control @error('plafond_bdr') is-invalid @enderror" id="plafond_bdr" name="plafond_bdr" value="{{ old('plafond_bdr') ?? $dk->plafond_bdr }}" required autocomplete="off">
              @error('plafond_bdr')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="tanggal_cair">Tanggal Cair</label>
            <input type="date" class="form-control @error('tanggal_cair') is-invalid @enderror" id="tanggal_cair" name="tanggal_cair" value="{{ old('tanggal_cair') ?? $dk->tanggal_cair }}" placeholder="Tanggal Cair" required autocomplete="off">
            @error('tanggal_cair')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jangka_waktu">Jangka Waktu <small class="text-secondary">(Bulan)</small></label>
            <input type="number" class="form-control @error('jangka_waktu') is-invalid @enderror" id="jangka_waktu" name="jangka_waktu" value="{{ old('jangka_waktu') ?? $dk->jangka_waktu }}" placeholder="Jangka Waktu" required autocomplete="off">
            @error('jangka_waktu')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <fieldset class="form-group">
            <label for="sistem_pembayaran">Sistem Pembayaran</label>
            <select class="form-select" id="sistem_pembayaran" name="sistem_pembayaran" required>
              <option value="" selected disabled>-- Pilih Sistem Pembayaran --</option>
              <option {{ $dk->sistem_pembayaran == 'Balloon Payment' ? 'selected' : '' }}>Balloon Payment</option>
              <option {{ $dk->sistem_pembayaran == 'Bullet Payment' ? 'selected' : '' }}>Bullet Payment</option>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label for="status_bh">Status Badan Hukum</label>
            <select class="form-select" id="status_bh" name="status_bh" required>
              <option value="" selected disabled>-- Pilih Status Badan Hukum --</option>
              <option {{ $dk->korporasi->status_bh == 'PT' ? 'selected' : '' }}>PT</option>
              <option {{ $dk->korporasi->status_bh == 'PD' ? 'selected' : '' }}>PD</option>
              <option {{ $dk->korporasi->status_bh == 'CV' ? 'selected' : '' }}>CV</option>
              <option {{ $dk->korporasi->status_bh == 'Firma' ? 'selected' : '' }}>Firma</option>
              <option {{ $dk->korporasi->status_bh == 'UD' ? 'selected' : '' }}>UD</option>
              <option {{ $dk->korporasi->status_bh == 'Koperasi' ? 'selected' : '' }}>Koperasi</option>
              <option {{ $dk->korporasi->status_bh == 'Lembaga' ? 'selected' : '' }}>Lembaga</option>
              <option {{ $dk->korporasi->status_bh == 'Instansi' ? 'selected' : '' }}>Instansi</option>
              <option {{ $dk->korporasi->status_bh == 'Perusahaan Umum' ? 'selected' : '' }}>Perusahaan Umum</option>
              <option {{ $dk->korporasi->status_bh == 'Yayasan' ? 'selected' : '' }}>Yayasan</option>
              <option {{ $dk->korporasi->status_bh == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>
          
          <div class="form-group">
            <label for="no_npwp">Nomor NPWP</label>
            <input type="text" class="form-control @error('no_npwp') is-invalid @enderror" id="no_npwp" name="no_npwp" value="{{ old('no_npwp') ?? $dk->korporasi->no_npwp }}" placeholder="Nomor NPWP" required autocomplete="off">
            @error('no_npwp')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="npwp">Update NPWP</label>
            <input type="file" class="basic-filepond @error('npwp') is-invalid @enderror" id="npwp_e" name="npwp" value="{{ old('npwp') ?? $dk->korporasi->npwp }}" requiredsssssssss>
            @error('npwp')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <fieldset class="form-group">
            <label for="bidang_usaha">Bidang Usaha</label>
            <select class="form-select" id="bidang_usaha" name="bidang_usaha" required>
              <option value="" selected disabled>-- Pilih Bidang Usaha --</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Perdagangan' ? 'selected' : '' }}>Perdagangan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Perkebunan' ? 'selected' : '' }}>Perkebunan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Perikanan' ? 'selected' : '' }}>Perikanan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Bidang Produksi' ? 'selected' : '' }}>Bidang Produksi</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Pertambangan' ? 'selected' : '' }}>Pertambangan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Pariwisata' ? 'selected' : '' }}>Pariwisata</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Jasa Keuangan' ? 'selected' : '' }}>Jasa Keuangan</option>
              <option {{ $dk->korporasi->bidang_usaha == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
            </select>
          </fieldset>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <livewire:address-dropdown :kel="$dk->kelurahan"/>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $dk->alamat }}" placeholder="Detail Lainnya (Cth: Nama Jalan, Gedung, No. Rumah, Patokan)" required autocomplete="off">
            @error('alamat')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="no_telp">Nomor Telepon</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="fal fa-fw fa-sm fa-phone"></i>
              </span>
              <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') ?? $dk->no_telp }}" required autocomplete="off">
              @error('no_telp')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="no_hp">Nomor Handphone</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="fal fa-fw fa-sm fa-mobile"></i>
              </span>
              <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') ?? $dk->no_hp }}" required autocomplete="off">
              @error('no_hp')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="fal fa-fw fa-sm fa-envelope"></i>
              </span>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $dk->email }}" required autocomplete="off">
              @error('email')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="divider my-3">
            <div class="divider-text fw-bold">Legalitas</div>
          </div>
          
          <div class="form-group">
            <label>Akta Pendirian dan Pengesahan DEPKUMHAM</label>
            <div class="row">
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_pendirian') is-invalid @enderror" id="akta_pendirian_e" name="akta_pendirian" value="{{ old('akta_pendirian') ?? $dk->korporasi->akta_pendirian }}" requiredsssssssss>
                @error('akta_pendirian')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_pengesahan') is-invalid @enderror" id="akta_pengesahan_e" name="akta_pengesahan" value="{{ old('akta_pengesahan') ?? $dk->korporasi->akta_pengesahan }}" requiredsssssssss>
                @error('akta_pengesahan')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label>Akta Perubahan Terakhir dan Pengesahan DEPKUMHAM</label>
            <div class="row">
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_perubahan_terakhir') is-invalid @enderror" id="akta_perubahan_terakhir_e" name="akta_perubahan_terakhir" value="{{ old('akta_perubahan_terakhir') ?? $dk->korporasi->akta_perubahan_terakhir }}" requiredsssssssss>
                @error('akta_perubahan_terakhir')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="col-md-6 col-12">
                <input type="file" class="basic-filepond @error('akta_pengesahan2') is-invalid @enderror" id="akta_pengesahan2_e" name="akta_pengesahan2" value="{{ old('akta_pengesahan2') ?? $dk->korporasi->akta_pengesahan2 }}" requiredsssssssss>
                @error('akta_pengesahan2')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="siup">SIUP</label>
            <input type="file" class="basic-filepond @error('siup') is-invalid @enderror" id="siup_e" name="siup" value="{{ old('siup') ?? $dk->korporasi->siup }}" requiredsssssssss>
            @error('siup')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="nib">NIB (Nomor Induk Berusaha)</label>
            <input type="file" class="basic-filepond @error('nib') is-invalid @enderror" id="nib_e" name="nib" value="{{ old('nib') ?? $dk->korporasi->nib }}" requiredsssssssss>
            @error('nib')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="divider my-3">
            <div class="divider-text fw-bold">Data Pengurus</div>
          </div>

          @include('includes.form.pengurus-edit', ['id_nama' => 'nama_1', 'id_jabatan' => 'jabatan_1', 'id_ktp' => 'ktp_1', 'id_npwp' => 'npwp_1', 'nama' => $dk->korporasi->nama_1, 'jabatan' => $dk->korporasi->jabatan_1])
          <hr>
          @include('includes.form.pengurus-edit', ['id_nama' => 'nama_2', 'id_jabatan' => 'jabatan_2', 'id_ktp' => 'ktp_2', 'id_npwp' => 'npwp_2', 'nama' => $dk->korporasi->nama_2, 'jabatan' => $dk->korporasi->jabatan_2])
          <hr>
          @include('includes.form.pengurus-edit', ['id_nama' => 'nama_3', 'id_jabatan' => 'jabatan_3', 'id_ktp' => 'ktp_3', 'id_npwp' => 'npwp_3', 'nama' => $dk->korporasi->nama_3, 'jabatan' => $dk->korporasi->jabatan_3])
          <hr>
          @include('includes.form.pengurus-edit', ['id_nama' => 'nama_4', 'id_jabatan' => 'jabatan_4', 'id_ktp' => 'ktp_4', 'id_npwp' => 'npwp_4', 'nama' => $dk->korporasi->nama_4, 'jabatan' => $dk->korporasi->jabatan_4])
          <hr>
          @include('includes.form.pengurus-edit', ['id_nama' => 'nama_5', 'id_jabatan' => 'jabatan_5', 'id_ktp' => 'ktp_5', 'id_npwp' => 'npwp_5', 'nama' => $dk->korporasi->nama_5, 'jabatan' => $dk->korporasi->jabatan_5])

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">
            Batal
          </button>
          <button type="submit" class="btn btn-primary ms-1">
            Simpan
          </button>
        </div>
      </form>
      
    </div>
  </div>
</div>


@endforeach