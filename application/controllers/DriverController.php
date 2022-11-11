<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DriverController extends CI_Controller {

	public function pasang_iklan()
	{
		$data['title'] = "Pasang Iklan";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('driver/add-iklan');
		$this->load->view('partials/footer');
	}

	public function home_driver()
	{
		$data['title'] = "Beranda";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-home');
		$this->load->view('driver/home-driver');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function detail_pesanan()
	{
		$data['title'] = "Detail Pesanan";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('driver/detail-pesanan');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

}
