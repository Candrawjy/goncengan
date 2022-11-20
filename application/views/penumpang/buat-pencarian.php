      <div class="page-content">
        <form autocomplete="off" action="<?=site_url('buat-pencarian')?>" method="post">
          <div class="card rounded-3 mb-3">
            <div class="card-body">
              <div class="form-body">
                <h6 class="mb-0 fw-bold">Masukkan Data Berikut</h6>
                <div class="my-3 border-bottom"></div>
                <div class="mb-3">
                  <label class="form-label">Fakultas Tujuan</label>
                  <select name="lokasi_akhir" class="form-control rounded-3" id="lokasi_akhir">
                    <option value="">-- Pilih Fakultas Tujuan --</option>
                    <option value="sekolah-bisnis">Sekolah Bisnis IPB University</option>
                    <option value="sekolah-vokasi">Sekolah Vokasi IPB University</option>
                  </select>
                  <small class="text-danger"><?=form_error('lokasi_akhir')?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Lokasi Kamu <small class="text-danger">(Pastikan kamu telah memilih Fakultas tujuan terlebih dahulu)</small></label><br>
                  <div id="map" style="border-radius: 8px; width: 100%; height: 400px"></div><br>
                  <input type="hidden" class="form-control rounded-3" name="lokasi_user" id="lokasi_user" readonly>
                  <small class="text-danger"><?=form_error('lokasi_user')?></small>
                  <!-- <textarea class="form-control rounded-3" rows="4" cols="4" name="lokasi_user" id="lokasi_user"><?=set_value('lokasi_user')?></textarea> -->
                </div>
                <div class="mb-3">
                  <label class="form-label">Waktu Berangkat</label>
                  <input type="time" class="form-control rounded-3" name="jam_berangkat" value="<?=set_value('jam_berangkat')?>">
                  <small class="text-danger"><?=form_error('jam_berangkat')?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Waktu Pulang</label>
                  <input type="time" class="form-control rounded-3" name="jam_pulang" value="<?=set_value('jam_pulang')?>">
                  <small class="text-danger"><?=form_error('jam_pulang')?></small>
                </div>
                <!-- <div class="mb-3">
                  <label class="form-label">Total Harga</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text rounded-3 rounded-end-0">Rp</span>
                    <input type="number" class="form-control rounded-3 rounded-start-0" placeholder="0" name="harga" id="harga" readonly>
                  </div>
                </div> -->
                <div class="mb-3">
                  <label class="form-label">Catatan</label><br>
                  <textarea class="form-control rounded-3" rows="4" cols="4" name="catatan"></textarea>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-2">
                  <input type="submit" class="btn btn-ecomm rounded-3 btn-primary flex-fill" id="cari-driver" value="Buat Pencarian" name="types">
                </div>
              </div>
            </div>
          </div>
        </form>

        <div class="page-footer fixed-bottom border-top d-flex align-items-center justify-content-center gap-3">
          <a href="javascript:;" class="btn btn-ecomm rounded-3 btn-success flex-fill" onclick="history.back()">Kembali</a>
        </div>
      </div>