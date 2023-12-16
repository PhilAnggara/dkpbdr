<header>
  <nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
      <a href="#" class="burger-btn d-block">
        <i class="bi bi-justify fs-3"></i>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="dropdown ms-auto">
          <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex">
              <div class="user-name text-end me-3">
                <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->role }}</p>
              </div>
              <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md">
                  <img src="https://ui-avatars.com/api/?background=FF5154&color=fff&bold=true&name={{ auth()->user()->name }}">
                </div>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton"
            style="min-width: 11rem;">
            <li>
              <h6 class="dropdown-header">Halo, {{ Str::before(auth()->user()->name, ' ') }}!</h6>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('informasi-pribadi.index') }}">
                <i class="icon-mid bi bi-person me-2"></i>
                Profil Saya
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPassword">
                <i class="icon-mid bi bi-shield-lock me-2"></i>
                Ganti Password
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#" onclick="keluar()">
                <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                Keluar
              </a>
              <form action="{{ route('logout') }}" id="keluar" method="POST">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>


<div class="modal fade text-left" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Ganti Password</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="{{ route('change.password') }}" method="POST">
        @csrf
        <div class="modal-body">

          <div class="form-group">
            <label for="current_password">Kata Sandi Saat Ini</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Kata Sandi Saat Ini" required autocomplete="off">
            @error('current_password')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="new_password">Kata Sandi Baru</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="Kata Sandi Baru" required autocomplete="off">
            @error('new_password')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="new_password_confirmation">Konfirmasi Kata Sandi Baru</label>
            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" placeholder="Konfirmasi Kata Sandi Baru" required autocomplete="off">
            @error('new_password_confirmation')
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