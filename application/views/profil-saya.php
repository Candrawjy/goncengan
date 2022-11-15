      <?php $users = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array(); ?>
      <form autocomplete="off" action="<?=site_url('profil-saya')?>" method="post" enctype="multipart/form-data" id="form">
        <div class="page-content">
          <div class="profile-img mb-3 border p-3 text-center rounded-3 bg-light">
            <?php if ($users['profile_picture'] == NULL) { ?>
              <img src="<?=base_url('')?>assets/images/profil/user.png" width="90" height="90" class="rounded-circle" alt="">
            <?php } else { ?>
              <img src="<?=base_url('')?>assets/images/profil/<?=$users['profile_picture']?>" width="90" height="90" class="rounded-circle" alt="">
            <?php } ?>
            <h6 class="mb-0 fw-bold mt-3 text-dark"><?=ucfirst($users['nama'])?></h6>
          </div>
          <div class="card rounded-3 border-0 bg-transparent">
            <div class="card-body p-0">
              <div class="row row-cols-1 g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="hidden" class="form-control rounded-3" name="id" value="<?=ucfirst($users['id'])?>" placeholder="<?=ucfirst($users['id'])?>">
                    <input type="text" class="form-control rounded-3" name="nama" value="<?=ucfirst($users['nama'])?>" placeholder="<?=ucfirst($users['nama'])?>">
                    <label>Nama Lengkap</label>
                    <small class="text-danger"><?=form_error('nama')?></small>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control rounded-3" name="nim" value="<?=ucfirst($users['nim'])?>" placeholder="<?=ucfirst($users['nim'])?>">
                    <label>Nomor Induk Mahasiswa</label>
                    <small class="text-danger"><?=form_error('nim')?></small>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control rounded-3" name="no_wa" value="<?=$users['no_wa']?>" placeholder="<?=$users['no_wa']?>">
                    <label>No. Whatsapp (contoh : 62852xxx)</label>
                    <small class="text-danger"><?=form_error('no_wa')?></small>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <div class="form-control rounded-3">
                      <label for="floatingInputEmail" class="small mb-1 text-secondary">Jenis Kelamin</label><br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" <?php if($users['jenis_kelamin'] == 'laki-laki'){echo "checked";}?>>
                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan" <?php if($users['jenis_kelamin'] == 'perempuan'){echo "checked";}?>>
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                      </div>
                    </div>
                    <small class="text-danger"><?=form_error('jenis_kelamin')?></small>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <div class="form-control rounded-3">
                      <label class="small mb-1 text-secondary">Upload Foto Profil</label>
                      <input type="file" class="form-control rounded-3" name="profile_picture">
                      <input type="hidden" name="tmp_profile_picture" value="<?=$users['profile_picture'] ?>">
                      <small class="text-danger"><?=form_error('profile_picture')?></small>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="email" class="form-control rounded-3" id="floatingInputEmail" value="<?=ucfirst($users['email'])?>" placeholder="<?=ucfirst($users['email'])?>" name="email" pattern="[a-z0-9._%+-]+@apps.ipb.ac.id" onkeydown="validation()">
                    <label>Email (apps.ipb.ac.id)</label>
                    <small id="text" class="text-danger"></small>
                    <small class="text-danger"><?=form_error('email')?></small>
                  </div>
                </div>
                <div class="col">
                  <div class="input-group" id="show_hide_password">
                    <div class="form-floating flex-grow-1">
                      <input type="password" class="form-control rounded-3 rounded-end-0 border-end-0" name="password" placeholder="Masukkan Password">
                      <label>Password</label>
                    </div>
                    <span class="input-group-text bg-transparent rounded-start-0 rounded-3 eye"><i class="bi bi-eye-slash"></i></span>
                    <small class="text-danger"><?=form_error('password')?></small>
                  </div>
                </div>
                <div class="col">
                  <div class="input-group" id="show_hide_password">
                    <div class="form-floating flex-grow-1">
                      <input type="password" class="form-control rounded-3 rounded-end-0 border-end-0" name="passconf" placeholder="Masukkan Konfirmasi Password">
                      <label>Konfirmasi Password</label>
                    </div>
                    <span class="input-group-text bg-transparent rounded-start-0 rounded-3 eye"><i class="bi bi-eye-slash"></i></span>
                    <small class="text-danger"><?=form_error('passconf')?></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="page-footer fixed-bottom border-top d-flex align-items-center justify-content-center gap-3">
          <button type="submit" class="btn btn-ecomm btn-outline-dark rounded-3 flex-fill">Simpan</button>
          <div class="vr"></div>
          <a href="javascript:;" class="btn btn-ecomm btn-warning rounded-3 flex-fill" onclick="history.back()">Batal</a>
        </footer>
      </form>