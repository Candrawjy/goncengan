      <div class="page-content">
        <h6 class="fw-bold mb-3 py-2 rounded-3 px-3 bg-light text-dark">Hasil Pencarian Driver</h6>
        <?php foreach ($pesanan as $data) : ?>
          <?php 
            $where = "gender='$data->jenis_kelamin' OR gender='keduanya'";
            $penawaran = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->like('lokasi_awal', $data->lokasi_akhir)->like('lokasi_tujuan', $data->lokasi_user)->where($where)->where('penawaran.is_active', '1')->where('penawaran.is_booked', '0')->order_by('penawaran.created_at','ASC')->get()->result(); ?>
          <?php foreach ($penawaran as $penawaran) : ?>
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
                      <h6><?=ucfirst($penawaran->nama)?></h6>
                      <h6><?=ucfirst($penawaran->nim)?></h6>
                    </label>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="d-flex justify-content-around">
                    <div class="col-lg-6">
                      <div class="mt-3 text-center">
                        <div class="alert alert-warning" role="alert">
                          <b><?php if($penawaran->type == "angle"){echo "Angel Driver";}elseif($penawaran->type == "bisnis"){echo "Business Driver";}?></b>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mt-4 text-center">
                        <a href="<?=site_url('detail-driver/').$penawaran->id?>" class="btn btn-ecomm rounded-3 btn-primary flex-fill">Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>