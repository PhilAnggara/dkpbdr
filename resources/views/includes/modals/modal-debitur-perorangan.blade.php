{{--  --}}
{{-- Tambah --}}
{{--  --}}

<div class="modal fade text-left" id="perorangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Data Nasabah Perorangan</span></h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form action="{{ route('data-peminjam.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="perorangan">
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
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" required autocomplete="off">
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

          <div class="form-group">
            <label>Tempat Tanggal Lahir</label>
            <div class="input-group">
              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required autocomplete="off">
              @error('tempat_lahir')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" required autocomplete="off">
              @error('tanggal_lahir')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          
          <fieldset class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
              <option {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </fieldset>
          
          <fieldset class="form-group">
            <label for="agama">Agama</label>
            <select class="form-select" id="agama" name="agama" required>
              <option value="" selected disabled>-- Pilih Agama --</option>
              <option {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
              <option {{ old('agama') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
              <option {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
              <option {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
              <option {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
              <option {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
              <option {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>
          
          <fieldset class="form-group">
            <label for="status_perkawinan">Status Perkawinan</label>
            <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
              <option value="" selected disabled>-- Pilih Status Perkawinan --</option>
              <option {{ old('status_perkawinan') == 'Lajang' ? 'selected' : '' }}>Lajang</option>
              <option {{ old('status_perkawinan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
              <option {{ old('status_perkawinan') == 'Janda/Duda' ? 'selected' : '' }}>Janda/Duda</option>
            </select>
          </fieldset>

          <div class="row">
            <div class="col-md-6 col-12">
              
              <div class="form-group">
                <label for="no_ktp">Nomor KTP</label>
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}" placeholder="Nomor KTP" required autocomplete="off">
                @error('no_ktp')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="b_ktp">Upload KTP</label>
                <input type="file" class="basic-filepond @error('ktp') is-invalid @enderror" id="b_ktp" name="ktp" value="{{ old('ktp') }}" required>
                @error('ktp')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
            </div>
            <div class="col-md-6 col-12">

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
                <label for="b_npwp">Upload NPWP</label>
                <input type="file" class="basic-filepond @error('npwp') is-invalid @enderror" id="b_npwp" name="npwp" value="{{ old('npwp') }}" required>
                @error('npwp')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>

            </div>
          </div>
          
          <div class="form-group">
            <label for="nama_ibu">Nama Gadis Ibu Kandung</label>
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Nama Gadis Ibu Kandung" required autocomplete="off">
            @error('nama_ibu')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Tempat Tinggal</label>
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
            <div class="divider-text fw-bold">Data Pekerjaan</div>
          </div>
          
          <fieldset class="form-group">
            <label for="pekerjaan">Jenis Pekerjaan</label>
            <select class="form-select" id="pekerjaan" name="pekerjaan" required>
              <option value="" selected disabled>-- Pilih Jenis Pekerjaan --</option>
              <option {{ old('pekerjaan') == 'PNS' ? 'selected' : '' }}>PNS</option>
              <option {{ old('pekerjaan') == 'TNI/POLRI' ? 'selected' : '' }}>TNI/POLRI</option>
              <option {{ old('pekerjaan') == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
              <option {{ old('pekerjaan') == 'Dokter' ? 'selected' : '' }}>Dokter</option>
              <option {{ old('pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
              <option {{ old('pekerjaan') == 'Pejabat Negara' ? 'selected' : '' }}>Pejabat Negara</option>
              <option {{ old('pekerjaan') == 'Pengacara' ? 'selected' : '' }}>Pengacara</option>
              <option {{ old('pekerjaan') == 'Mahasiswa/Pelajar' ? 'selected' : '' }}>Mahasiswa/Pelajar</option>
              <option {{ old('pekerjaan') == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
              <option {{ old('pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>

          <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan / Instansi</label>
            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" placeholder="Nama Perusahaan / Instansi" required autocomplete="off">
            @error('nama_perusahaan')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="biidang_usaha">Bidang Usaha</label>
            <input type="text" class="form-control @error('biidang_usaha') is-invalid @enderror" id="biidang_usaha" name="biidang_usaha" value="{{ old('biidang_usaha') }}" placeholder="Bidang Usaha" required autocomplete="off">
            @error('biidang_usaha')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" placeholder="Jabatan" required autocomplete="off">
            @error('jabatan')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="alamat_perusahaan">Alamat Perusahaan / Instansi</label>
            <input type="text" class="form-control @error('alamat_perusahaan') is-invalid @enderror" id="alamat_perusahaan" name="alamat_perusahaan" value="{{ old('alamat_perusahaan') }}" placeholder="Alamat Perusahaan / Instansi" required autocomplete="off">
            @error('alamat_perusahaan')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <fieldset class="form-group">
            <label for="pendapatan">Pendapatan Rata-rata / Bulan</label>
            <select class="form-select" id="pendapatan" name="pendapatan" required>
              <option value="" selected disabled>-- Pilih Pendapatan Rata-rata --</option>
              <option {{ old('pendapatan') == '<2,5 juta' ? 'selected' : '' }}>{{ '<2,5 juta' }}</option>
              <option {{ old('pendapatan') == '2,5 juta s/d 5 juta' ? 'selected' : '' }}>2,5 juta s/d 5 juta</option>
              <option {{ old('pendapatan') == '5 juta s/d 10 juta' ? 'selected' : '' }}>5 juta s/d 10 juta</option>
              <option {{ old('pendapatan') == '10 juta s/d 50 juta' ? 'selected' : '' }}>10 juta s/d 50 juta</option>
              <option {{ old('pendapatan') == '>50 juta' ? 'selected' : '' }}>{{ '>50 juta' }}</option>
            </select>
          </fieldset>
          
          <fieldset class="form-group">
            <label for="sumber_penghasilan">Sumber Penghasilan</label>
            <select class="form-select" id="sumber_penghasilan" name="sumber_penghasilan" required>
              <option value="" selected disabled>-- Pilih Sumber Penghasilan --</option>
              <option {{ old('sumber_penghasilan') == 'Hasil Usaha' ? 'selected' : '' }}>Hasil Usaha</option>
              <option {{ old('sumber_penghasilan') == 'Gaji' ? 'selected' : '' }}>Gaji</option>
              <option {{ old('sumber_penghasilan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>

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


@foreach ($debPerorangan as $dp)

{{--  --}}
{{-- Detail --}}
{{--  --}}

<div class="modal fade text-left" id="detail-{{ $dp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">
          Detail Debitur
          <span class="badge bg-light-secondary">
            <i class="fad fa-fw fa-sm fa-user"></i>
            Perorangan
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
                    {{ $dp->fin->fintech }}
                  </span>
                </td>
              </tr>
              <tr>
                <th>Nama Lengkap</th>
                <td>{{ $dp->nama }}</td>
              </tr>
              <tr>
                <th>Group</th>
                <td>{{ $dp->grup }}</td>
              </tr>
              <tr>
                <th>Plafond All</th>
                <td>{{ uang($dp->plafond_all) }}</td>
              </tr>
              <tr>
                <th>Plafond BDR</th>
                <td>{{ uang($dp->plafond_bdr) }}</td>
              </tr>
              <tr>
                <th>Tanggal Cair</th>
                <td>
                  <i class="fal fa-fw fa-calendar-day text-danger"></i>
                  {{ tgl($dp->tanggal_cair) }}
                </td>
              </tr>
              <tr>
                <th>Jangka Waktu</th>
                <td>{{ $dp->jangka_waktu }} <small class="text-secondary fst-italic">Bulan</small></td>
              </tr>
              <tr>
                <th>Sistem Pembayaran</th>
                <td>{{ $dp->sistem_pembayaran }}</td>
              </tr>
              <tr>
                <th>Tempat Tanggal Lahir</th>
                <td>{{ $dp->perorangan->tempat_lahir }}, {{ tgl($dp->perorangan->tanggal_lahir) }}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>
                  <i class="fal fa-fw fa-{{ $dp->perorangan->jenis_kelamin === "Laki-laki" ? "mars text-primary" : "venus text-danger" }}"></i>
                  {{ $dp->perorangan->jenis_kelamin }}
                </td>
              </tr>
              <tr>
                <th>Agama</th>
                <td>{{ $dp->perorangan->agama }}</td>
              </tr>
              <tr>
                <th>Status Perkawinan</th>
                <td>{{ $dp->perorangan->status_perkawinan }}</td>
              </tr>
              <tr>
                <th>KTP</th>
                <td>
                  <a href="{{ Storage::url($dp->perorangan->ktp) }}" target="_blank" class="badge bg-light-primary">
                    <i class="fal fa-print"></i>
                    {{ $dp->perorangan->no_ktp }}
                  </a>
                </td>
              </tr>
              <tr>
                <th>NPWP</th>
                <td>
                  <a href="{{ Storage::url($dp->perorangan->npwp) }}" target="_blank" class="badge bg-light-primary">
                    <i class="fal fa-print"></i>
                    {{ $dp->perorangan->no_npwp }}
                  </a>
                </td>
              </tr>
              <tr>
                <th>Nama Gadis Ibu Kandung</th>
                <td>{{ $dp->perorangan->nama_ibu }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>
                  <i class="fad fa-fw fa-location-dot text-danger"></i>
                  {{ alamat($dp->id_kelurahan) }}
                </td>
              </tr>
              <tr>
                <th>Detail Alamat</th>
                <td>{{ $dp->alamat }}</td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td>
                  <i class="fal fa-fw fa-phone"></i>
                  {{ $dp->no_telp }}
                </td>
              </tr>
              <tr>
                <th>Nomor Handphone</th>
                <td>
                  <i class="fal fa-fw fa-mobile"></i>
                  {{ $dp->no_hp }}
                </td>
              </tr>
              <tr>
                <th>Email</th>
                <td>
                  <i class="fal fa-fw fa-envelope"></i>
                  {{ $dp->email }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="divider my-3">
          <div class="divider-text fw-bold">Data Pekerjaan</div>
        </div>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>Jenis Pekerjaan</th>
                <td>{{ $dp->perorangan->pekerjaan }}</td>
              </tr>
              <tr>
                <th>Nama Perusahaan / Instansi</th>
                <td>{{ $dp->perorangan->nama_perusahaan }}</td>
              </tr>
              <tr>
                <th>Bidang Usaha</th>
                <td>{{ $dp->perorangan->biidang_usaha }}</td>
              </tr>
              <tr>
                <th>Jabatan</th>
                <td>{{ $dp->perorangan->jabatan }}</td>
              </tr>
              <tr>
                <th>Alamat Perusahaan / Instansi</th>
                <td>
                  <i class="fad fa-fw fa-location-dot text-danger"></i>
                  {{ $dp->perorangan->alamat_perusahaan }}
                </td>
              </tr>
              <tr>
                <th>Pendapatan Rata-rata / Bulan</th>
                <td>{{ $dp->perorangan->pendapatan }}</td>
              </tr>
              <tr>
                <th>Sumber Penghasilan</th>
                <td>{{ $dp->perorangan->sumber_penghasilan }}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>


{{--  --}}
{{-- Edit --}}
{{--  --}}

<div class="modal fade text-left" id="edit-{{ $dp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">
          Edit Debitur
          <span class="badge bg-light-secondary">
            <i class="fad fa-fw fa-sm fa-user"></i>
            Perorangan
          </span>
        </h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form action="{{ route('data-peminjam.update', $dp->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="type" value="perorangan">
        <div class="modal-body">

          <div class="divider my-3">
            <div class="divider-text fw-bold">Data Nasabah</div>
          </div>

          <fieldset class="form-group">
            <label for="fintech">Fintech</label>
            <select class="form-select" id="fintech" name="id_fintech" required>
              <option value="" selected disabled>-- Pilih Fintech --</option>
              @foreach ($fintech as $f)
                <option value="{{ $f->id }}" {{ $dp->id_fintech == $f->id ? 'selected' : '' }}>{{ $f->fintech }}</option>
              @endforeach
            </select>
          </fieldset>

          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $dp->nama }}" placeholder="Nama Perusahaan" required autocomplete="off">
            @error('nama')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="grup">Group</label>
            <input type="text" class="form-control @error('grup') is-invalid @enderror" id="grup" name="grup" value="{{ old('grup') ?? $dp->grup }}" placeholder="Group" autocomplete="off">
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
              <input type="number" class="form-control @error('plafond_all') is-invalid @enderror" id="plafond_all" name="plafond_all" value="{{ old('plafond_all') ?? $dp->plafond_all }}" required autocomplete="off">
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
              <input type="number" class="form-control @error('plafond_bdr') is-invalid @enderror" id="plafond_bdr" name="plafond_bdr" value="{{ old('plafond_bdr') ?? $dp->plafond_bdr }}" required autocomplete="off">
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
            <input type="date" class="form-control @error('tanggal_cair') is-invalid @enderror" id="tanggal_cair" name="tanggal_cair" value="{{ old('tanggal_cair') ?? $dp->tanggal_cair }}" placeholder="Tanggal Cair" required autocomplete="off">
            @error('tanggal_cair')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jangka_waktu">Jangka Waktu <small class="text-secondary">(Bulan)</small></label>
            <input type="number" class="form-control @error('jangka_waktu') is-invalid @enderror" id="jangka_waktu" name="jangka_waktu" value="{{ old('jangka_waktu') ?? $dp->jangka_waktu }}" placeholder="Jangka Waktu" required autocomplete="off">
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
              <option {{ $dp->sistem_pembayaran == 'Balloon Payment' ? 'selected' : '' }}>Balloon Payment</option>
              <option {{ $dp->sistem_pembayaran == 'Bullet Payment' ? 'selected' : '' }}>Bullet Payment</option>
            </select>
          </fieldset>

          <div class="form-group">
            <label>Tempat Tanggal Lahir</label>
            <div class="input-group">
              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $dp->perorangan->tempat_lahir }}" placeholder="Tempat Lahir" required autocomplete="off">
              @error('tempat_lahir')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $dp->perorangan->tanggal_lahir }}" placeholder="Tanggal Lahir" required autocomplete="off">
              @error('tanggal_lahir')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          
          <fieldset class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
              <option {{ $dp->perorangan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option {{ $dp->perorangan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </fieldset>
          
          <fieldset class="form-group">
            <label for="agama">Agama</label>
            <select class="form-select" id="agama" name="agama" required>
              <option value="" selected disabled>-- Pilih Agama --</option>
              <option {{ $dp->perorangan->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
              <option {{ $dp->perorangan->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
              <option {{ $dp->perorangan->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
              <option {{ $dp->perorangan->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
              <option {{ $dp->perorangan->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
              <option {{ $dp->perorangan->agama == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
              <option {{ $dp->perorangan->agama == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>
          
          <fieldset class="form-group">
            <label for="status_perkawinan">Status Perkawinan</label>
            <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
              <option value="" selected disabled>-- Pilih Status Perkawinan --</option>
              <option {{ $dp->perorangan->status_perkawinan == 'Lajang' ? 'selected' : '' }}>Lajang</option>
              <option {{ $dp->perorangan->status_perkawinan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
              <option {{ $dp->perorangan->status_perkawinan == 'Janda/Duda' ? 'selected' : '' }}>Janda/Duda</option>
            </select>
          </fieldset>

          <div class="row">
            <div class="col-md-6 col-12">
              
              <div class="form-group">
                <label for="no_ktp">Nomor KTP</label>
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') ?? $dp->perorangan->no_ktp }}" placeholder="Nomor KTP" required autocomplete="off">
                @error('no_ktp')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="b_ktp">Update KTP</label>
                <input type="file" class="basic-filepond @error('ktp') is-invalid @enderror" id="b_ktp_e" name="ktp" value="{{ old('ktp') ?? $dp->perorangan->ktp }}" requiredsssssssss>
                @error('ktp')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
            </div>
            <div class="col-md-6 col-12">

              <div class="form-group">
                <label for="no_npwp">Nomor NPWP</label>
                <input type="text" class="form-control @error('no_npwp') is-invalid @enderror" id="no_npwp" name="no_npwp" value="{{ old('no_npwp') ?? $dp->perorangan->no_npwp }}" placeholder="Nomor NPWP" required autocomplete="off">
                @error('no_npwp')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="b_npwp">Update NPWP</label>
                <input type="file" class="basic-filepond @error('npwp') is-invalid @enderror" id="b_npwp_e" name="npwp" value="{{ old('npwp') ?? $dp->perorangan->npwp }}" requiredsssssssss>
                @error('npwp')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>

            </div>
          </div>
          
          <div class="form-group">
            <label for="nama_ibu">Nama Gadis Ibu Kandung</label>
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') ?? $dp->perorangan->nama_ibu }}" placeholder="Nama Gadis Ibu Kandung" required autocomplete="off">
            @error('nama_ibu')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Tempat Tinggal</label>
            <livewire:address-dropdown :kel="$dp->kelurahan"/>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $dp->alamat }}" placeholder="Detail Lainnya (Cth: Nama Jalan, Gedung, No. Rumah, Patokan)" required autocomplete="off">
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
              <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') ?? $dp->no_telp }}" required autocomplete="off">
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
              <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') ?? $dp->no_hp }}" required autocomplete="off">
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
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $dp->email }}" required autocomplete="off">
              @error('email')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="divider my-3">
            <div class="divider-text fw-bold">Data Pekerjaan</div>
          </div>
          
          <fieldset class="form-group">
            <label for="pekerjaan">Jenis Pekerjaan</label>
            <select class="form-select" id="pekerjaan" name="pekerjaan" required>
              <option value="" selected disabled>-- Pilih Jenis Pekerjaan --</option>
              <option {{ $dp->perorangan->pekerjaan == 'PNS' ? 'selected' : '' }}>PNS</option>
              <option {{ $dp->perorangan->pekerjaan == 'TNI/POLRI' ? 'selected' : '' }}>TNI/POLRI</option>
              <option {{ $dp->perorangan->pekerjaan == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
              <option {{ $dp->perorangan->pekerjaan == 'Dokter' ? 'selected' : '' }}>Dokter</option>
              <option {{ $dp->perorangan->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
              <option {{ $dp->perorangan->pekerjaan == 'Pejabat Negara' ? 'selected' : '' }}>Pejabat Negara</option>
              <option {{ $dp->perorangan->pekerjaan == 'Pengacara' ? 'selected' : '' }}>Pengacara</option>
              <option {{ $dp->perorangan->pekerjaan == 'Mahasiswa/Pelajar' ? 'selected' : '' }}>Mahasiswa/Pelajar</option>
              <option {{ $dp->perorangan->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
              <option {{ $dp->perorangan->pekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>

          <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan / Instansi</label>
            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') ?? $dp->perorangan->nama_perusahaan }}" placeholder="Nama Perusahaan / Instansi" required autocomplete="off">
            @error('nama_perusahaan')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="biidang_usaha">Bidang Usaha</label>
            <input type="text" class="form-control @error('biidang_usaha') is-invalid @enderror" id="biidang_usaha" name="biidang_usaha" value="{{ old('biidang_usaha') ?? $dp->perorangan->biidang_usaha }}" placeholder="Bidang Usaha" required autocomplete="off">
            @error('biidang_usaha')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') ?? $dp->perorangan->jabatan }}" placeholder="Jabatan" required autocomplete="off">
            @error('jabatan')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="alamat_perusahaan">Alamat Perusahaan / Instansi</label>
            <input type="text" class="form-control @error('alamat_perusahaan') is-invalid @enderror" id="alamat_perusahaan" name="alamat_perusahaan" value="{{ old('alamat_perusahaan') ?? $dp->perorangan->alamat_perusahaan }}" placeholder="Alamat Perusahaan / Instansi" required autocomplete="off">
            @error('alamat_perusahaan')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <fieldset class="form-group">
            <label for="pendapatan">Pendapatan Rata-rata / Bulan</label>
            <select class="form-select" id="pendapatan" name="pendapatan" required>
              <option value="" selected disabled>-- Pilih Pendapatan Rata-rata --</option>
              <option {{ $dp->perorangan->pendapatan == '<2,5 juta' ? 'selected' : '' }}>{{ '<2,5 juta' }}</option>
              <option {{ $dp->perorangan->pendapatan == '2,5 juta s/d 5 juta' ? 'selected' : '' }}>2,5 juta s/d 5 juta</option>
              <option {{ $dp->perorangan->pendapatan == '5 juta s/d 10 juta' ? 'selected' : '' }}>5 juta s/d 10 juta</option>
              <option {{ $dp->perorangan->pendapatan == '10 juta s/d 50 juta' ? 'selected' : '' }}>10 juta s/d 50 juta</option>
              <option {{ $dp->perorangan->pendapatan == '>50 juta' ? 'selected' : '' }}>{{ '>50 juta' }}</option>
            </select>
          </fieldset>
          
          <fieldset class="form-group">
            <label for="sumber_penghasilan">Sumber Penghasilan</label>
            <select class="form-select" id="sumber_penghasilan" name="sumber_penghasilan" required>
              <option value="" selected disabled>-- Pilih Sumber Penghasilan --</option>
              <option {{ $dp->perorangan->sumber_penghasilan == 'Hasil Usaha' ? 'selected' : '' }}>Hasil Usaha</option>
              <option {{ $dp->perorangan->sumber_penghasilan == 'Gaji' ? 'selected' : '' }}>Gaji</option>
              <option {{ $dp->perorangan->sumber_penghasilan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </fieldset>

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