      <div class="page-content">
        <div class="card rounded-3 mb-3">
          <div class="card-body">
            <form autocomplete="off" action="<?=site_url('kirim-pesan')?>" method="post">
              <div class="form-body">
                <h5 class="mb-0 fw-bold">Sampaikan Pesan</h5>
                <div class="my-3 border-bottom"></div>
                <div class="mb-3">
                  <label class="form-label">Nama Anda</label>
                  <input type="text" class="form-control rounded-3" value="<?=ucfirst($this->session->userdata('nama'))?>" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control rounded-3" value="<?=ucfirst($this->session->userdata('email'))?>" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">No. Handphone</label>
                  <input type="text" class="form-control rounded-3" value="<?=$this->session->userdata('no_wa')?>" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Pesan yang ingin disampaikan</label>
                  <textarea class="form-control rounded-3" rows="4" cols="4" name="pesan" required></textarea>
                </div>
                <div class="mb-3 col-lg-12">
                  <button type="submit" class="btn btn-ecomm rounded-3 btn-warning flex-fill"><i class="bi bi-send me-2"></i>Kirim</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card rounded-3">
          <div class="card-body">
            <div class="address mb-3">
              <h5 class="mb-0 fw-bold">Alamat</h5>
              <p class="mb-0 font-12">Gedung SB-IPB Kampus IPB Gunung Gede, Jl. Pajajaran, RT.03/RW.06, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128</p>
            </div>
            <hr>
            <div class="phone mb-3">
              <h5 class="mb-0 fw-bold">Kontak</h5>
              <p class="mb-0 font-13">Whatsapp : <a href="https://wa.me/6281325801694" target="_blank">0813-2580-1694</a></p>
            </div>
            <hr>
            <div class="email mb-3">
              <h5 class="mb-0 fw-bold">Email</h5>
              <p class="mb-0 font-13"><a href="mailto:goncengan@gmail.com">Goncengan@gmail.com</a></p>
            </div>
            <hr>
            <div class="working-days mb-0">
              <h5 class="mb-0 fw-bold">Hari kerja</h5>
              <p class="mb-0 font-13">Sen - Jum / 9:30 AM - 6:30 PM</p>
            </div>
          </div>
        </div>
      </div>