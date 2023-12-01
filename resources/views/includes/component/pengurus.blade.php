<div class="table-responsive">
  <table class="table table-hover">
    <tbody>
      <tr>
        <th>Nama Lengkap</th>
        <td>{{ $nama }}</td>
      </tr>
      <tr>
        <th>Jabatan</th>
        <td>{{ $jabatan }}</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-12">
      <p class="fw-bold">KTP</p>
      @include('includes.component.file-card', ['file_path' => $ktp])
    </div>
    <div class="col-md-6 col-12">
      <p class="fw-bold">NPWP</p>
      @include('includes.component.file-card', ['file_path' => $npwp])
    </div>
  </div>
</div>