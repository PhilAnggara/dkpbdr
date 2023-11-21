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

          <div class="divider my-0">
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
            <label for="nama">Nama Debitur</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Debitur" required autocomplete="off">
            @error('nama')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="grup">Group</label>
            <input type="text" class="form-control @error('grup') is-invalid @enderror" id="grup" name="grup" placeholder="Group" required autocomplete="off">
            @error('grup')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="plafond_all">Plafond All</label>
            <input type="number" class="form-control @error('plafond_all') is-invalid @enderror" id="plafond_all" name="plafond_all" placeholder="Plafond All" required autocomplete="off">
            @error('plafond_all')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="plafond_bdr">Plafond BDR</label>
            <input type="number" class="form-control @error('plafond_bdr') is-invalid @enderror" id="plafond_bdr" name="plafond_bdr" placeholder="Plafond BDR" required autocomplete="off">
            @error('plafond_bdr')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="tanggal_cair">Tanggal Cair</label>
            <input type="date" class="form-control @error('tanggal_cair') is-invalid @enderror" id="tanggal_cair" name="tanggal_cair" placeholder="Tanggal Cair" required autocomplete="off">
            @error('tanggal_cair')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jangka_waktu">Jangka Waktu</label>
            <input type="number" class="form-control @error('jangka_waktu') is-invalid @enderror" id="jangka_waktu" name="jangka_waktu" placeholder="Jangka Waktu" required autocomplete="off">
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