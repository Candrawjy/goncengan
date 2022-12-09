      <div class="page-content">
        <h2 class="text-center">Selamat datang</h2>
        <p class="text-center text-muted">Dapatkan kemudahan pergi ke kampus bersama Goncengan</p>
        <div class="banner-slider">
          <?php foreach ($banner as $data_banner) : ?>
            <div class="banner-item">
              <a href="javascript:;"><img src="https://admin.goncengan.com/assets/images/banner/<?=$data_banner->foto_banner?>" class="img-fluid rounded-3" alt=""></a>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="py-2"></div>

        <div class="features-section">
          <h4 class="my-3 text-center fw-bold section-title">Mau jadi apa kamu hari ini?</h4>
          <div class="row row-cols-2 row-cols-md-12 g-3">
            <a href="<?=site_url('driver-mode')?>" id="to-driver">
              <div class="col d-flex">
                <div class="card rounded-3 w-100">
                  <div class="card-body">
                    <div class="icon-wrapper text-center">
                      <div class="noti-box mb-1 mx-auto bg-primary">
                        <i class="bi bi-bicycle"></i>
                      </div>
                      <p class="fw-bold mb-0 text-dark">Driver</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <a href="<?=site_url('penumpang-mode')?>" id="to-penumpang">
              <div class="col d-flex">
                <div class="card rounded-3 w-100">
                  <div class="card-body">
                    <div class="icon-wrapper text-center">
                      <div class="noti-box mb-1 mx-auto bg-warning">
                        <i class="bi bi-person-hearts"></i>
                      </div>
                      <p class="fw-bold mb-0 text-dark">Penumpang</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>