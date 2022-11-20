      <div class="page-content">
        <?php foreach ($detail as $data) : ?>
          <div class="card rounded-3 mb-3">
            <div class="card-body">
              <div class="d-flex flex-row gap-3">
                <div class="d-grid gap-2 align-self-start align-self-center">
                  <?php if ($data->profile_picture == NULL) { ?>
                    <img src="<?=base_url('')?>assets/images/profil/user.png" width="45" class="rounded-3 p-1 bg-white" alt="">
                  <?php } else { ?>
                    <img src="<?=base_url('')?>assets/images/profil/<?=$data->profile_picture?>" width="45" class="rounded-3 p-1 bg-white" alt="">
                  <?php } ?>
                </div>
                <div class="vr"></div>
                <div class="address-info">
                  <label class="form-check-label">
                    <h6><?=ucfirst($data->nama)?></h6>
                    <h6><?=ucfirst($data->nim)?></h6>
                    <h6><?php if($data->lokasi_awal == "sekolah-bisnis"){echo "Sekolah Bisnis";}elseif($data->lokasi_awal == "sekolah-vokasi"){echo "Sekolah Vokasi";}?></h6>
                  </label>
                </div>
              </div>
              <div class="row text-center mt-3">
                <?php if($data->type == 'angle') { ?>
                  <center>
                    <img src="<?=base_url('')?>assets/images/illust/angel.svg" style="width: 80% !important;" class="p-5" alt="">
                  </center>
                  <p class="h6">Yey! Kamu menemukan <b>seorang malaikat</b> yang mau mengantarmu dengan tulus!</p>
                <?php } else { ?>
                  <center>
                    <img src="<?=base_url('')?>assets/images/illust/business.svg" style="width: 80% !important;" class="p-5" alt="">
                  </center>
                  <p class="h6">Kamu menemukan <b>seorang driver bisnis</b> yang mau mengantarmu dengan imbalan sebesar Rp<?=number_format($data->harga)?></p>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card rounded-3">
            <div class="card-body">
              <div class="row text-center">
                <div class="d-flex justify-content-around">
                  <div class="col-lg-6">
                    <div class="text-center">
                      <a href="#" class="btn btn-ecomm rounded-3 btn-warning flex-fill" onclick="history.back()">Cari yang lain</a>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="text-center">
                      <a href="<?=site_url('pesan-driver/').$data->id?>" class="btn btn-ecomm rounded-3 btn-primary flex-fill" id="pilih-driver">Pesan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>