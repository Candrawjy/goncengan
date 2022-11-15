      <div class="page-content">
        <h2 class="text-center">Selamat datang</h2>
        <p class="text-center text-muted">Dapatkan kemudahan pergi ke kampus bersama Goncengan</p>
        <div class="banner-slider">
          <div class="banner-item">
            <a href="javascript:;"><img src="https://via.placeholder.com/1200X675" class="img-fluid rounded-3" alt=""></a>
          </div>
          <div class="banner-item">
            <a href="javascript:;"><img src="https://via.placeholder.com/1200X675" class="img-fluid rounded-3" alt=""></a>
          </div>
          <div class="banner-item">
            <a href="javascript:;"><img src="https://via.placeholder.com/1200X675" class="img-fluid rounded-3" alt=""></a>
          </div>
          <div class="banner-item">
            <a href="javascript:;"><img src="https://via.placeholder.com/1200X675" class="img-fluid rounded-3" alt=""></a>
          </div>
          <div class="banner-item">
            <a href="javascript:;"><img src="https://via.placeholder.com/1200X675" class="img-fluid rounded-3" alt=""></a>
          </div>
          <div class="banner-item">
            <a href="javascript:;"><img src="https://via.placeholder.com/1200X675" class="img-fluid rounded-3" alt=""></a>
          </div>
        </div>

        <div class="py-2"></div>

        <?php if($jml_penawaran != 1) { ?>
        <div class="features-section">
          <div class="row row-cols-md-12 g-3">
            <div class="col d-flex">
              <div class="card rounded-3 w-100">
                <div class="card-body">
                  <div class="alert alert-warning text-center" role="alert">
                    <b>Belum ada penawaran yang Anda buat!</b>
                  </div>
                  <div class="icon-wrapper text-center">
                    <a href="<?=site_url('pasang-iklan')?>" class="btn btn-ecomm rounded-3 btn-primary flex-fill">Buat Sekarang</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } else { ?>
        <h6 class="my-3 text-center fw-bold">Penawaran Kamu Sudah Kami Sampaikan!</h6>
        <h6 class="fw-bold mb-3 py-2 rounded-3 px-3 bg-light text-dark">Detail Penawaran</h6>
        <?php foreach ($penawaran as $data) : ?>
          <div class="card rounded-3 mb-3">
            <div class="card-body">
              <div class="address-info">
                <label class="form-check-label" for="flexRadioDefaultAddress1">
                  <span class="fw-bold mb-0 h6"><?=ucfirst($data->nama)?></span><br>
                  <span>Lokasi Awal : <b><?php if($data->lokasi_awal == "sekolah-bisnis"){echo "Sekolah Bisnis";}elseif($data->lokasi_awal == "sekolah-vokasi"){echo "Sekolah Vokasi";}?></b></span><br>
                  <span>Lokasi Tujuan : <b><?=ucfirst($data->lokasi_tujuan)?></b></span><br>
                  <span>Waktu Operasional : <b><?= date('H:i', strtotime($data->waktu_berangkat)) ?> - <?= date('H:i', strtotime($data->waktu_pulang)) ?> WIB</b></span><br>
                  <span>Gender Penumpang : <b><?=ucfirst($data->gender)?></b></span><br>
                  <span>Tipe Penawaran : <b><?php if($data->type == "angle"){echo "Angel Driver";}elseif($data->type == "bisnis"){echo "Business Driver";}?></b></span><br>
                </label>
              </div>
              <div class="alert alert-primary text-center mt-3" role="alert">
                <b>Menunggu Penumpang</b>
              </div>
            </div>
          </div>

          <div class="features-section mt-3">
            <div class="row row-cols-md-12 g-3">
              <div class="col d-flex">
                <div class="card rounded-3 w-100">
                  <div class="card-body">
                    <div class="icon-wrapper text-center">
                      <a href="<?=site_url('change-status-penawaran/').$data->id?>" id="change-status-penawaran" class="btn btn-ecomm rounded-3 btn-danger flex-fill">Batalkan Penawaran</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php } ?>

        <!-- <div class="features-section">
          <div class="row row-cols-md-12 g-3">
            <div class="col d-flex">
              <div class="card rounded-3 w-100">
                <div class="card-body text-center">
                  <div class="alert alert-primary text-center" role="alert">
                    <b>Yey, seorang penumpang memilihmu!</b>
                  </div>
                  <p><b>Berikanlah pengalaman terbaik</b> untuk penumpangmu ya! <br>Jangan kecewakan mereka!</p>
                  <div class="icon-wrapper text-center">
                    <a href="<?=site_url('detail-pesanan')?>" class="btn btn-ecomm rounded-3 btn-primary flex-fill">Detail Pesanan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

      </div>