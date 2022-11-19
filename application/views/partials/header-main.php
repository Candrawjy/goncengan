      <header class="top-header fixed-top border-bottom d-flex align-items-center">
        <nav class="navbar navbar-expand w-100 p-0 gap-3 align-items-center">
          <?php if($this->uri->segment(1) != "pasang-iklan" && $this->uri->segment(1) != "buat-pencarian") { ?>
          <div class="nav-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidenav"><a href="javascript:;"><i class="bi bi-list"></i></a></div>
          <div class="nav-button" onclick="history.back()"><a href="javascript:;"><i class="bi bi-arrow-left"></i></a></div>
          <?php } ?>
          <div class="account-notification">
            <h6 class="mb-0 fw-bold text-dark"><?=$title?></h6>
          </div>
          <ul class="navbar-nav ms-auto d-flex align-items-center top-right-menu">
            <li class="nav-item">
              <a class="nav-link" href="javascript:;" onClick="document.location.reload(true)"><i class="bi bi-arrow-clockwise"></i></a>
            </li>
          </ul>
        </nav>
      </header>