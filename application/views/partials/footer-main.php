      <footer class="page-footer fixed-bottom border-top d-flex align-items-center">
        <nav class="navbar navbar-expand p-0 flex-grow-1">
          <div class="navbar-nav align-items-center justify-content-between w-100">
            <a class="nav-link" href="<?=site_url('beranda')?>">
              <div class="d-flex flex-column align-items-center">
                <div class="icon"><i class="bi <?php if($this->uri->segment(1) == "beranda" || $this->uri->segment(1) == "driver"){echo 'bi-house-fill';}else{echo 'bi-house';}?>"></i></div>
                <div class="name">Beranda</div>
              </div>
            </a>
            <a class="nav-link" href="<?=site_url('notifikasi')?>">
              <div class="d-flex flex-column align-items-center">
                <div class="icon"><i class="bi <?php if($this->uri->segment(1) == "notifikasi"){echo 'bi-bell-fill';}else{echo 'bi-bell';}?>"></i></div>
                <div class="name">Notifikasi</div>
              </div>
            </a>
            <a class="nav-link" href="<?=site_url('profil')?>">
              <div class="d-flex flex-column align-items-center">
                <div class="icon"><i class="bi <?php if($this->uri->segment(1) == "profil"){echo 'bi-person-fill';}else{echo 'bi-person';}?>"></i></div>
                <div class="name">Profil</div>
              </div>
            </a>
            <a class="nav-link" href="<?=site_url('kontak')?>">
              <div class="d-flex flex-column align-items-center">
                <div class="icon"><i class="bi <?php if($this->uri->segment(1) == "kontak"){echo 'bi-telephone-fill';}else{echo 'bi-telephone';}?>"></i></div>
                <div class="name">Kontak</div>
              </div>
            </a>
          </div>
        </nav>
      </footer>