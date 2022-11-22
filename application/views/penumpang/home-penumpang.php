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

        <?php if($jml_pesanan_waiting != 0) { ?>
          <?php foreach ($pesanan as $data) : ?>
            <?php $detail_driver = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->where('penawaran.id', $data->id_penawaran)->get()->result(); ?>
            <?php foreach ($detail_driver as $data_driver) : ?>
              <div class="card rounded-3 mb-3">
                <div class="card-body">
                  <div class="d-flex flex-row gap-3">
                    <div class="d-grid gap-2 align-self-start align-self-center">
                      <?php if ($data_driver->profile_picture == NULL) { ?>
                        <img src="<?=base_url('')?>assets/images/profil/user.png" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } else { ?>
                        <img src="<?=base_url('')?>assets/images/profil/<?=$data_driver->profile_picture?>" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } ?>
                    </div>
                    <div class="vr"></div>
                    <div class="address-info">
                      <label class="form-check-label">
                        <h6><?=ucfirst($data_driver->nama)?></h6>
                        <h6><?=ucfirst($data_driver->nim)?></h6>
                        <h6><?php if($data_driver->lokasi_awal == "sekolah-bisnis"){echo "Sekolah Bisnis";}elseif($data_driver->lokasi_awal == "sekolah-vokasi"){echo "Sekolah Vokasi";}?></h6>
                      </label>
                    </div>
                  </div>
                  <?php if($data->is_acc == '0') { ?>
                    <div class="row text-center mt-3">
                      <?php if($data_driver->type == 'angle') { ?>
                        <center>
                          <img src="<?=base_url('')?>assets/images/illust/angel.svg" style="width: 80% !important;" class="p-5" alt="">
                        </center>
                        <p class="h6">Yey! Kamu menemukan <b>seorang malaikat</b> yang mau mengantarmu dengan imbalan hanya sebesar <b>Rp<?php $potongan=(20/100)*$data->harga; $totalharga=$data->harga-$potongan; echo number_format($totalharga)?></b> dari Rp<?=number_format($data->harga)?>!</p>
                      <?php } else { ?>
                        <center>
                          <img src="<?=base_url('')?>assets/images/illust/business.svg" style="width: 80% !important;" class="p-5" alt="">
                        </center>
                        <p class="h6">Kamu menemukan <b>seorang driver bisnis</b> yang mau mengantarmu dengan imbalan sebesar Rp<?=number_format($data->harga)?></p>
                      <?php } ?>
                      <div class="container mt-3">
                        <?php if($data->is_acc == '0') { ?>
                          <div class="alert alert-warning text-center" role="alert">
                            <b>Menunggu Konfirmasi!</b>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  <?php } else { ?>
                    <div class="container">
                      <div class="row text-center mt-3">
                        <div class="alert alert-primary text-center" role="alert">
                          <b>Yey! <?=ucfirst($data_driver->nama)?> menerima pesananmu!</b>
                        </div>
                        <p>Sekarang kamu bisa berkomunikasi dengannya! Jangan lupa hargai dia yang telah menerimamu!</p>
                        <a href="https://wa.me/62<?=$data_driver->no_wa?>?text=Halo,%20<?=$data_driver->nama?>,%20saya%20<?=$data->nama?>." class="btn btn-ecomm rounded-3 btn-success flex-fill" target="_blank">Whatsapp</a>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <?php if($data->is_acc == '0') { ?>
                <div class="card rounded-3">
                  <div class="card-body">
                    <div class="container">
                      <div class="row text-center">
                        <a href="<?=site_url('batalkan-driver/').$data_driver->id?>" id="batal-pilih-driver" class="btn btn-ecomm rounded-3 btn-danger flex-fill">Batalkan</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php endforeach; ?>
          <?php endforeach; ?>
        <?php } else if($jml_pesanan_acc != 0) { ?>
          <?php foreach ($pesanan as $data) : ?>
            <?php $detail_driver = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->where('penawaran.id', $data->id_penawaran)->get()->result(); ?>
            <?php foreach ($detail_driver as $data_driver) : ?>
              <div class="card rounded-3 mb-3">
                <div class="card-body">
                  <div class="d-flex flex-row gap-3">
                    <div class="d-grid gap-2 align-self-start align-self-center">
                      <?php if ($data_driver->profile_picture == NULL) { ?>
                        <img src="<?=base_url('')?>assets/images/profil/user.png" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } else { ?>
                        <img src="<?=base_url('')?>assets/images/profil/<?=$data_driver->profile_picture?>" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } ?>
                    </div>
                    <div class="vr"></div>
                    <div class="address-info">
                      <label class="form-check-label">
                        <h6><?=ucfirst($data_driver->nama)?></h6>
                        <h6><?=ucfirst($data_driver->nim)?></h6>
                        <h6><?php if($data_driver->lokasi_awal == "sekolah-bisnis"){echo "Sekolah Bisnis";}elseif($data_driver->lokasi_awal == "sekolah-vokasi"){echo "Sekolah Vokasi";}?></h6>
                        <?php if($data_driver->type == 'angle') { ?>
                        <h6>Total Harga : Rp<?php $potongan=(20/100)*$data->harga; $totalharga=$data->harga-$potongan; echo number_format($totalharga)?></h6>
                        <?php } else { ?>
                        <h6>Total Harga : Rp<?=number_format($data->harga)?></h6>
                        <?php } ?>
                      </label>
                    </div>
                  </div>
                  <?php if($data->is_acc == '0') { ?>
                    <div class="row text-center mt-3">
                      <?php if($data_driver->type == 'angle') { ?>
                        <center>
                          <img src="<?=base_url('')?>assets/images/illust/angel.svg" style="width: 80% !important;" class="p-5" alt="">
                        </center>
                        <p class="h6">Yey! Kamu menemukan <b>seorang malaikat</b> yang mau mengantarmu dengan tulus!</p>
                      <?php } else { ?>
                        <center>
                          <img src="<?=base_url('')?>assets/images/illust/business.svg" style="width: 80% !important;" class="p-5" alt="">
                        </center>
                        <p class="h6">Kamu menemukan <b>seorang driver bisnis</b> yang mau mengantarmu dengan imbalan sebesar Rp-</p>
                      <?php } ?>
                      <div class="container mt-3">
                        <?php if($data->is_acc == '0') { ?>
                          <div class="alert alert-warning text-center" role="alert">
                            <b>Menunggu Konfirmasi!</b>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  <?php } else { ?>
                    <div class="container">
                      <div class="row text-center mt-3">
                        <div class="alert alert-primary text-center" role="alert">
                          <b>Yey! <?=ucfirst($data_driver->nama)?> menerima pesananmu!</b>
                        </div>
                        <p>Sekarang kamu bisa berkomunikasi dengannya! Jangan lupa hargai dia yang telah menerimamu!</p>
                        <a href="https://wa.me/62<?=$data_driver->no_wa?>?text=Halo,%20<?=$data_driver->nama?>,%20saya%20<?=$data->nama?>." class="btn btn-ecomm rounded-3 btn-success flex-fill" target="_blank">Whatsapp</a>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <?php if($data->is_acc == '0') { ?>
                <div class="card rounded-3">
                  <div class="card-body">
                    <div class="container">
                      <div class="row text-center">
                        <a href="<?=site_url('batalkan-driver/').$data_driver->id?>" id="batal-pilih-driver" class="btn btn-ecomm rounded-3 btn-danger flex-fill">Batalkan</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php endforeach; ?>
          <?php endforeach; ?>
        <?php } else if($jml_pesanan_done != 0) { ?>
          <?php foreach ($pesanan_done as $data) : ?>
            <?php $detail_driver = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->where('penawaran.id', $data->id_penawaran)->get()->result(); ?>
            <?php foreach ($detail_driver as $data_driver) : ?>
              <h6 class="fw-bold mb-3 py-2 rounded-3 px-3 bg-light text-dark">Transaksi Selesai</h6>
              <div class="card rounded-3 mb-3">
                <div class="card-body">
                  <div class="d-flex flex-row gap-3">
                    <div class="d-grid gap-2 align-self-start align-self-center">
                      <?php if ($data_driver->profile_picture == NULL) { ?>
                        <img src="<?=base_url('')?>assets/images/profil/user.png" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } else { ?>
                        <img src="<?=base_url('')?>assets/images/profil/<?=$data_driver->profile_picture?>" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } ?>
                    </div>
                    <div class="vr"></div>
                    <div class="address-info">
                      <label class="form-check-label">
                        <h6><?=ucfirst($data_driver->nama)?></h6>
                        <h6><?=ucfirst($data_driver->nim)?></h6>
                      </label>
                    </div>
                  </div>
                  <div class="row text-center mt-3">
                    <center>
                      <img src="<?=base_url('')?>assets/images/illust/paid.svg" style="width: 80% !important;" class="p-4" alt="">
                    </center>
                    <p class="h6"><b>Yey! <?=ucfirst($data_driver->nama)?> sukses mengantarmu!</b></p>
                    <p>Terima kasih telah menggunakan Goncengan! <b>Goncengan siap goncengin kamu</b>!</p>
                  </div>
                  <div class="container">
                    <div class="row text-center">
                      <a href="<?=site_url('konfirmasi-selesai/').$data->id?>" class="btn btn-ecomm rounded-3 btn-success flex-fill">Lanjutkan</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endforeach; ?>
        <?php } else if($jml_pesanan_tolak != 0) { ?>
          <?php foreach ($pesanan as $data) : ?>
            <?php $detail_driver = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->where('penawaran.id', $data->id_penawaran)->get()->result(); ?>
            <?php foreach ($detail_driver as $data_driver) : ?>
              <h6 class="fw-bold mb-3 py-2 rounded-3 px-3 bg-light text-dark">Transaksi Ditolak</h6>
              <div class="card rounded-3 mb-3">
                <div class="card-body">
                  <div class="d-flex flex-row gap-3">
                    <div class="d-grid gap-2 align-self-start align-self-center">
                      <?php if ($data_driver->profile_picture == NULL) { ?>
                        <img src="<?=base_url('')?>assets/images/profil/user.png" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } else { ?>
                        <img src="<?=base_url('')?>assets/images/profil/<?=$data_driver->profile_picture?>" width="45" class="rounded-3 p-1 bg-white" alt="">
                      <?php } ?>
                    </div>
                    <div class="vr"></div>
                    <div class="address-info">
                      <label class="form-check-label">
                        <h6><?=ucfirst($data_driver->nama)?></h6>
                        <h6><?=ucfirst($data_driver->nim)?></h6>
                      </label>
                    </div>
                  </div>
                  <div class="row text-center mt-3">
                    <center>
                      <img src="<?=base_url('')?>assets/images/illust/rejected.svg" style="width: 70% !important;" class="p-4" alt="">
                    </center>
                    <p class="h6"><b>Mohon maaf, driver <?=ucfirst($data_driver->nama)?> menolak untuk mengantarmu!</b></p>
                    <p>Jangan sedih, kamu bisa mencari driver yang lainnya kok!</p>
                  </div>
                  <div class="container">
                    <div class="row text-center">
                      <a href="<?=site_url('konfirmasi-tolak/').$data->id?>" class="btn btn-ecomm rounded-3 btn-warning flex-fill">Lanjutkan</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endforeach; ?>
        <?php } else { ?>
          <?php if($jml_pesanan_aktif != 1) { ?>
            <?php if($jml_pesanan_aktif_booked == 0) { ?>
              <div class="features-section">
                <div class="row row-cols-md-12 g-3">
                  <div class="col d-flex">
                    <div class="card rounded-3 w-100">
                      <div class="card-body">
                        <div class="alert alert-warning text-center" role="alert">
                          <b>Belum ada pesanan atau pencarian yang Anda buat!</b>
                        </div>
                        <div class="icon-wrapper text-center">
                          <a href="<?=site_url('buat-pencarian')?>" class="btn btn-ecomm rounded-3 btn-primary flex-fill">Buat Pencarian</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } else { ?>
            <h6 class="my-3 text-center fw-bold">Pencarian Kamu Berhasil Dibuat!</h6>
            <h6 class="fw-bold mb-3 py-2 rounded-3 px-3 bg-light text-dark">Detail Pencarian</h6>
            <?php foreach ($pesanan as $data) : ?>
              <div class="card rounded-3 mb-3">
                <div class="card-body">
                  <div class="d-flex flex-row gap-3">
                    <div class="address-info">
                      <label class="form-check-label" for="flexRadioDefaultAddress1">
                        <!-- <span>Lokasi Kamu : <b><?=ucfirst($data->lokasi_user)?></b></span><br> -->
                        <span>Fakultas Tujuan : <b><?php if($data->lokasi_akhir == "sekolah-bisnis"){echo "Sekolah Bisnis";}elseif($data->lokasi_akhir == "sekolah-vokasi"){echo "Sekolah Vokasi";}?></b></span><br>
                        <span>Waktu <?=ucfirst($data->type_waktu)?> : <b><?= date('H:i', strtotime($data->waktu)) ?> WIB</b></span><br>
                        <span>Total Harga : <b>Rp<?=number_format($data->harga)?></b></span>
                      </label>
                    </div>
                    <div class="vr"></div>
                    <div class="d-grid gap-2 align-self-start align-self-center">
                      <a href="<?=site_url('edit-pencarian/').$data->id?>" class="btn btn-sm rounded-3"><i class="bi bi-pencil"></i></a>
                      <a href="<?=site_url('change-status-pencarian/').$data->id?>" id="change-status-pencarian" class="btn btn-sm rounded-3"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                  <div class="mt-3 text-center">
                    <a href="<?=site_url('cari-driver/').$data->id?>" class="btn btn-ecomm rounded-3 btn-warning flex-fill">Cari Driver</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php } ?>
        <?php } ?>

      </div>