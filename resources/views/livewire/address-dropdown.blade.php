<div>
  <div class="input-group mb-1">
    <select class="form-select" wire:model.live="selectedProvinsi" required>
      <option value="" selected disabled>-- Provinsi --</option>
      @foreach ($provinsi as $prov)
        <option value="{{ $prov->id }}">{{ Str::title($prov->nama) }}</option>
      @endforeach
    </select>
    <select class="form-select" wire:model.live="selectedKabupaten" {{ !$selectedProvinsi ? 'disabled' : '' }} required>
      <option value="" selected disabled>-- Kabupaten / Kota --</option>
      @foreach ($kabupaten as $kab)
        <option value="{{ $kab->id }}">{{ Str::title($kab->nama) }}</option>
      @endforeach
    </select>
  </div>
  <div class="input-group mb-1">
    <select class="form-select" wire:model.live="selectedKecamatan" {{ !$selectedKabupaten ? 'disabled' : '' }} required>
      <option value="" selected disabled>-- Kecamatan --</option>
      @foreach ($kecamatan as $kec)
        <option value="{{ $kec->id }}">{{ Str::title($kec->nama) }}</option>
      @endforeach
    </select>
    <select class="form-select" wire:model.live="selectedKelurahan" name="id_kelurahan" {{ !$selectedKecamatan ? 'disabled' : '' }} required>
      <option value="" selected disabled>-- Kelurahan --</option>
      @foreach ($kelurahan as $kel)
        <option value="{{ $kel->id }}">{{ Str::title($kel->nama) }}</option>
      @endforeach
    </select>
  </div>
</div>
