<div class="modal fade text-left" id="perusahaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Input Data Perusahaan/Instansi</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form action="{{ route('data-peminjam.store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="peruusahaan">
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
            <input type="file" class="basic-filepond" id="npwp" name="npwp" value="{{ old('npwp') }}" required>
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