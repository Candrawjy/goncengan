<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Goncengan adalah aplikasi ojek online yang dibuat oleh mahasiswa Sekolah Bisnis IPB University" />
    <meta name="keywords" content="Goncengan, Ojek Online, Ojek, Online, Ojol, IPB University, IPB, Sekolah Bisnis, SB IPB University" />
    <meta name="author" content="Goncengan" />
    <link rel="shortcut icon" href="<?=base_url('')?>assets/images/logo.png">
    <title>Goncengan - <?=$title?></title>

    <link rel="stylesheet" type="text/css" href="<?=base_url('')?>assets/plugins/metismenu/metisMenu.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('')?>assets/plugins/metismenu/mm-vertical.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('')?>assets/plugins/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('')?>assets/plugins/slick/slick-theme.css" />
    
    <link href="<?=base_url('')?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="<?=base_url('')?>assets/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet"/>
    <link href="<?=base_url('')?>assets/css/style.css" rel="stylesheet"/>
    <link href="<?=base_url('')?>assets/css/dark-theme.css" rel="stylesheet"/>
  </head>
  <body <?php if($this->uri->segment(1) == "menu"){echo 'class="splash-bg-2"';}?>>
    <div id="flash" data-flash="<?=$this->session->flashdata('success')?>"></div>
    <div id="flash-error" data-flash="<?=$this->session->flashdata('error')?>"></div>
    <div class="loader-wrapper">
      <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
        <div class="spinner-border text-white" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>

    <div class="wrapper">