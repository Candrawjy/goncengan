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

        <?php if($this->session->userdata('is_banned') == 1) { ?>
          <div class="features-section">
            <div class="row row-cols-md-12 g-3">
              <div class="col d-flex">
                <div class="card rounded-3 w-100">
                  <div class="card-body">
                    <div class="alert alert-danger text-center" role="alert">
                      <b>Mohon maaf, akun kamu kami bekukan dari mode driver selama 3 hari karena menolak pesanan!<br>
                      <a href="javascript:;">Hubungi kami</a> jika ini adalah kesalahan.</b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else { ?>

          <?php if($jml_penawaran_aktif_booked != 0) { ?>
            <?php foreach ($penawaran as $data) : ?>
              <?php $jml_pesanan_acc = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.is_active', '1')->where('pesanan.is_acc', '1')->where('pesanan.id_penawaran', $data->id)->limit(1, 'DESC')->get()->num_rows(); ?>

              <?php if($jml_pesanan_acc == 0) { ?>
                <?php $pesanan = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.is_active', '1')->where('pesanan.id_penawaran', $data->id)->limit(1, 'DESC')->get()->result(); ?>
                <?php foreach ($pesanan as $data_pesanan) : ?>
                  <div class="features-section">
                    <div class="row row-cols-md-12 g-3">
                      <div class="col d-flex">
                        <div class="card rounded-3 w-100">
                          <div class="card-body text-center">
                            <div class="alert alert-primary text-center" role="alert">
                              <b>Yey, seorang penumpang memilihmu!</b>
                            </div>
                            <p><b>Berikanlah pengalaman terbaik</b> untuk penumpangmu ya! <br>Jangan kecewakan mereka!</p>
                            <div class="icon-wrapper text-center">
                              <a href="<?=site_url('detail-pesanan/'.$data->id)?>" class="btn btn-ecomm rounded-3 btn-primary flex-fill">Detail Pesanan</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php } else { ?>
                <?php $pesanan = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.is_active', '1')->where('pesanan.id_penawaran', $data->id)->limit(1, 'DESC')->get()->result(); ?>
                <?php foreach ($pesanan as $data_pesanan) : ?>
                  <div class="card rounded-3 mb-3">
                    <div class="card-body">
                      <div class="d-flex flex-row gap-3">
                        <div class="d-grid gap-2 align-self-start align-self-center">
                          <?php if ($data_pesanan->profile_picture == NULL) { ?>
                            <img src="<?=base_url('')?>assets/images/profil/user.png" width="45" class="rounded-3 p-1 bg-white" alt="">
                          <?php } else { ?>
                            <img src="<?=base_url('')?>assets/images/profil/<?=$data_pesanan->profile_picture?>" width="45" class="rounded-3 p-1 bg-white" alt="">
                          <?php } ?>
                        </div>
                        <div class="vr"></div>
                        <div class="address-info">
                          <label class="form-check-label">
                            <h6><?=ucfirst($data_pesanan->nama)?></h6>
                            <h6><?=ucfirst($data_pesanan->nim)?></h6>
                            <h6><?php if($data_pesanan->lokasi_akhir == "sekolah-bisnis"){echo "Sekolah Bisnis";}elseif($data_pesanan->lokasi_akhir == "sekolah-vokasi"){echo "Sekolah Vokasi";}?></h6>
                            <h6>Total Harga : Rp<?=number_format($data->harga)?></h6>
                          </label>
                        </div>
                      </div>
                      <div class="container">
                        <div class="row text-center mt-3">
                          <div class="alert alert-primary text-center" role="alert">
                            <b>Yey! Kamu sedang bersama <?=ucfirst($data_pesanan->nama)?> sebagai penumpangmu!</b>
                          </div>
                          <p>Sekarang kamu bisa berkomunikasi dengannya! Jangan lupa hargai dia yang telah memilihmu!</p>
                          <a href="https://wa.me/<?=$data_pesanan->no_wa?>?text=Halo,%20<?=$data_pesanan->nama?>,%20saya%20<?=$data->nama?>." class="btn btn-ecomm rounded-3 btn-success flex-fill" target="_blank">Whatsapp</a>
                          <a href="<?=site_url('selesai-pesanan/'.$data->id)?>" class="btn btn-ecomm rounded-3 btn-primary flex-fill mt-3" id="selesai-pesanan">Selesai</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php } ?>
            <?php endforeach; ?>
          <?php } else { ?>
            <?php if($jml_penawaran_aktif == 0) { ?>
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
                        <!-- <span>Lokasi Tujuan : <b><?=ucfirst($data->lokasi_tujuan)?></b></span><br> -->
                        <span>Waktu Operasional : <b><?= date('H:i', strtotime($data->waktu_berangkat)) ?> - <?= date('H:i', strtotime($data->waktu_pulang)) ?> WIB</b></span><br>
                        <span>Gender Penumpang : <b><?=ucfirst($data->gender)?></b></span><br>
                        <span>Tipe Penawaran : <b><?php if($data->type == "angle"){echo "Angel Driver";}elseif($data->type == "bisnis"){echo "Business Driver";}?></b></span><br>
                        <span>Total Harga : <b>Rp<?=number_format($data->harga)?></b></span><br>
                      </label>
                    </div>
                    <div class="alert alert-warning text-center mt-3" role="alert">
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
          <?php } ?>

        <?php } ?>

      </div>