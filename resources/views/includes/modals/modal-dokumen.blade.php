<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Unggah {{ $modalTitle }}</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form action="{{ route('upload-dokumen') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        <div class="modal-body">

          @if ($type != 'memo dinas')
            <fieldset class="form-group">
              <label for="id_debitur">Debitur</label>
              <select class="form-select" id="id_debitur" name="id_debitur" required>
                <option value="" selected disabled>-- Pilih Debitur --</option>
                @foreach ($debitur as $d)
                  <option value="{{ $d->id }}" {{ old('id_debitur') == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                @endforeach
              </select>
            </fieldset>
          @endif

          <div class="form-group">
            <label for="no">Nomor {{ $modalTitle }}</label>
            <input type="text" class="form-control @error('no') is-invalid @enderror" id="no" name="no" value="{{ old('no') }}" placeholder="Nomor {{ $modalTitle }}" required autocomplete="off">
            @error('no')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="path">Upload {{ $modalTitle }}</label>
            <input type="file" class="basic-filepond @error('path') is-invalid @enderror" id="path" name="path" value="{{ old('path') }}" required>
            @error('path')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
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