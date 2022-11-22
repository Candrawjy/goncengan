      <div class="page-content">
        <div class="profile-img mb-3 border p-3 text-center rounded-3 bg-light">
          <?php $namas = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array(); ?>
          <?php if ($namas['profile_picture'] == NULL) { ?>
            <img src="<?=base_url('')?>assets/images/profil/user.png" width="90" height="90" class="rounded-circle" alt="">
          <?php } else { ?>
            <img src="<?=base_url('')?>assets/images/profil/<?=$namas['profile_picture']?>" width="90" height="90" class="rounded-circle" alt="">
          <?php } ?>
          <h6 class="mb-0 fw-bold mt-3"><?=ucfirst($namas['nama'])?></h6>
          <?php if ($namas['role'] != NULL) { ?>
          <p class="mb-0 mt-2 text-muted small">(<?=ucfirst($namas['role'])?>)</p>
          <?php } ?>
        </div>

        <div class="mb-3">
          <a class="profile-item" href="<?=site_url('profil-saya')?>">
            <div class="card rounded-3">
              <div class="card-body py-2">
                <div class="d-flex align-items-center gap-3 fs-6">
                  <div><i class="bi bi-person"></i></div>
                  <div class="flex-grow-1">Profil Saya</div>
                  <div><i class="bi bi-chevron-right"></i></div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- <div class="mb-3">
          <a class="profile-item" href="javascript:;">
            <div class="card rounded-3">
              <div class="card-body py-2">
                <div class="d-flex align-items-center gap-3 fs-6">
                  <div><i class="bi bi-basket3"></i></div>
                  <div class="flex-grow-1">Pesanan Saya</div>
                  <div><i class="bi bi-chevron-right"></i></div>
                </div>
              </div>
            </div>
          </a>
        </div> -->

        <div class="mb-3">
          <a class="profile-item" href="<?=site_url('notifikasi')?>">
            <div class="card rounded-3">
              <div class="card-body py-2">
                <div class="d-flex align-items-center gap-3 fs-6">
                  <div><i class="bi bi-bell"></i></div>
                  <div class="flex-grow-1">Notifikasi</div>
                  <div><i class="bi bi-chevron-right"></i></div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <?php if ($namas['role'] == "driver") { ?>
        <div class="mb-3">
          <a class="profile-item" href="<?=site_url('keluar-driver-mode')?>" id="out-driver">
            <div class="card rounded-3">
              <div class="card-body py-2">
                <div class="d-flex align-items-center gap-3 fs-6">
                  <div><i class="bi bi-x-square"></i></div>
                  <div class="flex-grow-1">Keluar Mode Driver</div>
                  <div><i class="bi bi-chevron-right"></i></div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php } else if ($namas['role'] == "penumpang") { ?>
        <div class="mb-3">
          <a class="profile-item" href="<?=site_url('keluar-penumpang-mode')?>" id="out-penumpang">
            <div class="card rounded-3">
              <div class="card-body py-2">
                <div class="d-flex align-items-center gap-3 fs-6">
                  <div><i class="bi bi-x-square"></i></div>
                  <div class="flex-grow-1">Keluar Mode Penumpang</div>
                  <div><i class="bi bi-chevron-right"></i></div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>

        <div class="mb-3">
          <a class="profile-item" href="<?=site_url('logout')?>" id="btn-logout">
            <div class="card rounded-3">
              <div class="card-body py-2">
                <div class="d-flex align-items-center gap-3 fs-6">
                  <div><i class="bi bi-box-arrow-right"></i></div>
                  <div class="flex-grow-1">Keluar</div>
                  <div><i class="bi bi-chevron-right"></i></div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>