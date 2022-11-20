      <div class="page-content">
        <div class="card rounded-3 mb-3">
          <div class="card-body">
            <form>
              <div class="form-body">
                <h6 class="mb-0 fw-bold">Data Pesanan</h6>
                <div class="my-3 border-bottom"></div>
                <div class="mb-3">
                  <label class="form-label">Nama Pelanggan</label>
                  <input type="text" class="form-control rounded-3" value="<?=ucfirst($pesanan['nama'])?>" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Fakultas Tujuan</label>
                  <input type="text" class="form-control rounded-3" value="<?php if($pesanan['lokasi_akhir'] == "sekolah-bisnis"){echo "Sekolah Bisnis";}elseif($pesanan['lokasi_akhir'] == "sekolah-vokasi"){echo "Sekolah Vokasi";}?>" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Lokasi Jemput</label><br>
                  <!-- <textarea class="form-control rounded-3" rows="4" cols="4" readonly><?=ucfirst($pesanan['lokasi_user'])?></textarea> -->
                  <a href="https://www.google.com/maps/search/?api=1&query=<?=$pesanan['lokasi_user']?>" class="btn btn-sm btn-primary mt-2" target="_blank">Lihat Lokasi</a>
                </div>
                <div class="mb-3">
                  <label class="form-label">Jenis Kelamin</label>
                  <input type="text" class="form-control rounded-3" value="<?=ucfirst($pesanan['jenis_kelamin'])?>" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Catatan</label>
                  <textarea class="form-control rounded-3" rows="4" cols="4" readonly><?=ucfirst($pesanan['catatan'])?></textarea>
                </div>
                <!-- <div class="mb-3">
                  <label class="form-label">Predikat</label><br>
                  <span class="badge text-bg-warning">Ramah</span>
                  <span class="badge text-bg-warning">Banyak Bicara</span>
                  <span class="badge text-bg-warning">Lucu</span>
                  <span class="badge text-bg-warning">Bijaksana</span>
                </div> -->
              </div>
            </form>
          </div>
        </div>

        <!-- <div class="card rounded-3">
          <div class="card-body">
            <div class="col-lg-12">
              <p><b>Biaya Antar :</b></p>
              <div class="alert alert-primary text-center" role="alert">
                <b>Rp5.000</b>
              </div>
            </div>
          </div>
        </div> -->
        <div class="page-footer fixed-bottom border-top d-flex align-items-center justify-content-center gap-3">
          <a href="<?=site_url('tolak-pesanan/'.$pesanan['id_penawaran'])?>" id="tolak-pesanan" class="btn btn-ecomm rounded-3 btn-danger flex-fill">Tolak</a>
          <a href="<?=site_url('terima-pesanan/'.$pesanan['id'])?>" id="terima-pesanan" class="btn btn-ecomm rounded-3 btn-success flex-fill">Ambil</a>
        </div>
      </div>