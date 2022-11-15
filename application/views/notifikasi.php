      <div class="page-content">
        <h6 class="fw-bold mb-3 py-2 rounded-3 px-3 bg-light text-dark">Semua Notifikasi</h6>
        <?php foreach ($notifikasi as $data) : ?>
        <div class="card rounded-3 mb-3">
          <div class="card-body">
            <div class="d-flex flex-row gap-3 align-items-start">
              <!-- <div class="noti-box mb-1 bg-warning">
                <i class="bi bi-bell"></i>
              </div> -->
              <div class="">
                <h6 class="text-dark fw-bold"><?=ucfirst($data->title)?></h6>
                <small class="mb-1"><?= date('Y-m-d H:i', strtotime($data->created_at)) ?> WIB</small>
                <p class="mb-0 fw-bold"><?=ucfirst($data->message)?></p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>