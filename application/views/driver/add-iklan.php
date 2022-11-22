      <div class="page-content">
        <form autocomplete="off" action="<?=site_url('pasang-iklan')?>" method="post">
          <div class="card rounded-3 mb-3">
            <div class="card-body">
              <div class="form-body">
                <h6 class="mb-0 fw-bold">Masukkan Data Berikut</h6>
                <div class="my-3 border-bottom"></div>
                <div class="mb-3">
                  <label class="form-label">Fakultas Tujuan</label>
                  <select name="lokasi_awal" class="form-control rounded-3" id="lokasi_akhir">
                    <option value="">-- Pilih Fakultas Tujuan --</option>
                    <option value="sekolah-bisnis">Sekolah Bisnis IPB University</option>
                    <option value="sekolah-vokasi">Sekolah Vokasi IPB University</option>
                  </select>
                  <small class="text-danger"><?=form_error('lokasi_awal')?></small>
                </div>
                <!-- <div class="mb-3">
                  <label class="form-label">Lokasi Kamu</label>
                  <textarea class="form-control rounded-3" rows="4" cols="4" name="lokasi_tujuan"><?=set_value('lokasi_tujuan')?></textarea>
                  <small class="text-danger"><?=form_error('lokasi_tujuan')?></small>
                </div> -->
                <div class="mb-3">
                  <label class="form-label">Lokasi Kamu <small class="text-danger">(Pastikan kamu telah memilih Fakultas tujuan terlebih dahulu, lalu klik marker pada map untuk menentukan lokasi kamu)</small></label><br>
                  <div id="map" style="border-radius: 8px; width: 100%; height: 400px"></div><br>
                  <input type="hidden" class="form-control rounded-3" name="lokasi_tujuan" id="lokasi_user" readonly>
                  <small class="text-danger"><?=form_error('lokasi_tujuan')?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Target Waktu Tiba di Kampus</label>
                  <input type="time" class="form-control rounded-3" name="waktu_berangkat" value="<?=set_value('waktu_berangkat')?>">
                  <small class="text-danger"><?=form_error('waktu_berangkat')?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Waktu Pulang</label>
                  <input type="time" class="form-control rounded-3" name="waktu_pulang" value="<?=set_value('waktu_pulang')?>">
                  <small class="text-danger"><?=form_error('waktu_pulang')?></small>
                </div>
                <div class="mb-4">
                  <label class="form-label">Gender Penumpang</label>
                  <select class="form-control rounded-3" name="gender">
                    <option value="">-- Pilih Gender Penumpang --</option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                    <option value="keduanya">Keduanya</option>
                  </select>
                  <small class="text-danger"><?=form_error('gender')?></small>
                </div>
                <input type="hidden" name="harga" id="harga" readonly>
                <input type="hidden" id="type" name="type" value="">
                <div class="d-flex align-items-center justify-content-center gap-2">
                  <input type="submit" class="btn btn-ecomm rounded-3 btn-warning flex-fill" id="to-angle" value="Angel Driver" name="types">
                  <input type="submit" class="btn btn-ecomm rounded-3 btn-primary flex-fill" id="to-bisnis" value="Business Driver" name="types">
                </div>
              </div>
            </div>
          </div>
        </form>

          <!-- <div class="card rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="d-flex align-items-center justify-content-center gap-2">
                <div class="col-lg-6">
                  <input type="submit" class="btn btn-ecomm rounded-3 btn-warning flex-fill" id="to-angle" value="Angel Driver" name="type">
                </div>
                <div class="col-lg-6">
                  <input type="submit" class="btn btn-ecomm rounded-3 btn-primary flex-fill" id="to-bisnis" value="Business Driver" name="submit">
                </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- </form> -->

          <div class="page-footer fixed-bottom border-top d-flex align-items-center justify-content-center gap-3">
            <a href="javascript:;" class="btn btn-ecomm rounded-3 btn-success flex-fill" onclick="history.back()">Kembali</a>
          </div>
        </div>