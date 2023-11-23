<div class="row">
  <div class="col-md-6 col-12">
    <div class="form-group">
      <label for="{{ $id_nama }}">Nama Lengkap</label>
      <input type="text" class="form-control @error($id_nama) is-invalid @enderror" id="{{ $id_nama }}" name="{{ $id_nama }}" value="{{ old($id_nama) }}" placeholder="Nama Lengkap" required autocomplete="off">
      @error($id_nama)
        <div class="invalid-feedback">
          <i class="bx bx-radio-circle"></i>
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group">
      <label for="{{ $id_jabatan }}">Jabatan</label>
      <input type="text" class="form-control @error($id_jabatan) is-invalid @enderror" id="{{ $id_jabatan }}" name="{{ $id_jabatan }}" value="{{ old($id_jabatan) }}" placeholder="Jabatan" required autocomplete="off">
      @error($id_jabatan)
        <div class="invalid-feedback">
          <i class="bx bx-radio-circle"></i>
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group">
      <label for="{{ $id_ktp }}">KTP</label>
      <input type="file" class="basic-filepond @error('ktp_1') is-invalid @enderror" id="{{ $id_ktp }}" name="{{ $id_ktp }}" value="{{ old('ktp_1') }}" requiredssssss>
      @error('ktp_1')
        <div class="invalid-feedback">
          <i class="bx bx-radio-circle"></i>
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group">
      <label for="{{ $id_npwp }}">NPWP</label>
      <input type="file" class="basic-filepond @error($id_npwp) is-invalid @enderror" id="{{ $id_npwp }}" name="{{ $id_npwp }}" value="{{ old($id_npwp) }}" requiredssssss>
      @error($id_npwp)
        <div class="invalid-feedback">
          <i class="bx bx-radio-circle"></i>
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
</div>