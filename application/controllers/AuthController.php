<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function login()
	{
		$data['title'] = "Masuk";

		$this->load->view('partials/header', $data);
		$this->load->view('auth/login');
		$this->load->view('partials/footer');
	}

	public function register()
	{
		$data['title'] = "Daftar";

		$this->load->view('partials/header', $data);
		$this->load->view('auth/register');
		$this->load->view('partials/footer');
	}
}
