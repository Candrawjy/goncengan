<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	// public function index()
	// {
	// 	$data['title'] = "Mulai Sekarang";

	// 	$this->load->view('partials/header', $data);
	// 	$this->load->view('index');
	// 	$this->load->view('partials/footer');
	// }

	public function index()
	{
		$data['title'] = "Beranda";

		$this->load->view('partials/header', $data);
		$this->load->view('index2');
		$this->load->view('partials/footer');
	}

	public function beranda()
	{
		$data['title'] = "Home";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-home');
		$this->load->view('home');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function notifikasi()
	{
		$data['title'] = "Notifikasi";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('notifikasi');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function profil()
	{
		$data['title'] = "Profil";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('profil');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function kontak()
	{
		$data['title'] = "Kontak";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('kontak');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}
}
