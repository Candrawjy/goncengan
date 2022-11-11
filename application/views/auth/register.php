      <header class="top-header fixed-top border-bottom d-flex align-items-center">
        <nav class="navbar navbar-expand w-100 p-0 gap-3 align-items-center">
          <div class="nav-button" onclick="history.back()"><a href="javascript:;"><i class="bi bi-arrow-left"></i></a></div>
          <div class="account-profile">
            <h6 class="mb-0 fw-bold text-dark"><?=$title?></h6>
          </div>
        </nav>
      </header>

      <div class="page-content">
        <div class="login-body">
          <h5 class="fw-bold">Daftar Sekarang</h5>
          <p class="mb-0">Daftar sekarang untuk menikmati layanan Goncengan</p>
          <form class="mt-4">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingInputNama" placeholder="Masukkan Nama">
              <label for="floatingInputNama">Nama Lengkap</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingInputNim" placeholder="Masukkan NIM">
              <label for="floatingInputNim">Nomor Induk Mahasiswa</label>
            </div>

            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-3" id="floatingInputNo" placeholder="Masukkan No Hp">
              <label for="floatingInputNo">No. Handphone</label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" class="form-control rounded-3" id="floatingInputEmail" placeholder="Masukkan Email">
              <label for="floatingInputEmail">Email</label>
            </div>

            <div class="input-group mb-3" id="show_hide_password">
              <div class="form-floating flex-grow-1">
                <input type="password" class="form-control rounded-3 rounded-end-0 border-end-0" id="floatingInputPassword" placeholder="Masukkan Password">
                <label for="floatingInputPassword">Password</label>
              </div>
              <span class="input-group-text bg-transparent rounded-start-0 rounded-3 eye"><i class="bi bi-eye-slash"></i></span>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">Saya setuju dengan <b>Syarat dan Ketentuan</b></label>
              </div>
            </div>

            <div class="mb-0 d-grid">
              <a href="<?=site_url('login')?>" class="btn btn-warning btn-ecomm rounded-3">Daftar</a>
            </div>

            <div class="separator my-4">
              <div class="line"></div>
              <p class="mb-0 fw-bold px-3">Atau</p>
              <div class="line"></div>
            </div>
            <div class="social-login d-flex flex-row gap-2 justify-content-center">
              <a href="javascript:;" class="bg-pinterest">
                <i class="bi bi-google"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <footer class="page-footer fixed-bottom border-top d-flex align-items-center justify-content-center">
        <p class="mb-0 rounded-0">Sudah punya akun? <a href="<?=site_url('login')?>" class="text-primary">Masuk</a></p>
      </footer>