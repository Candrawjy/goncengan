      <div class="sidenav">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidenav">
          <div class="offcanvas-header bg-secondary border-bottom border-light">
            <div class="hstack gap-3">
              <div class="">
                <img src="https://via.placeholder.com/110X110" width="45" class="rounded-3 p-1 bg-white" alt=""/>
              </div>
              <div class="details">
                <h6 class="mb-0 text-white">Hi! Candra</h6>
              </div>
            </div>
            <div data-bs-dismiss="offcanvas"><i class="bi bi-x-lg fs-5 text-white"></i></div>
          </div>

          <div class="offcanvas-body p-0">
            <nav class="sidebar-nav">
              <ul class="metismenu" id="sidenav">
                <li>
                  <a href="<?=site_url('beranda')?>">
                    <i class="bi bi-house-door me-2"></i>
                    Beranda
                  </a>
                </li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <i class="bi bi-person-circle me-2"></i>
                    Akun
                  </a>
                  <ul>
                    <li><a href="<?=site_url('profil')?>">Profil Saya</a></li>
                    <li><a href="javascript:;">Pesanan Saya</a></li>
                    <li><a href="<?=site_url('notifikasi')?>">Notifikasi</a></li>
                  </ul>
                </li>
                <li>
                  <a href="javascript:;">
                    <i class="bi bi-emoji-smile me-2"></i>
                    Tentang Kami
                  </a>
                </li>
                <li>
                  <a href="<?=site_url('kontak')?>">
                    <i class="bi bi-headphones me-2"></i>
                    Kontak Kami
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="offcanvas-footer border-top p-3">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="DarkMode" onchange="toggleTheme()">
              <label class="form-check-label" for="DarkMode">Dark Mode</label>
            </div>
          </div>
        </div>
      </div>