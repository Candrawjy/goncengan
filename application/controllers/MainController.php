<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('email') == NULL) {
            redirect('/');
        }
        $this->load->model('Main_M');
    }

	// public function index()
	// {
	// 	$data['title'] = "Mulai Sekarang";

	// 	$this->load->view('partials/header', $data);
	// 	$this->load->view('index');
	// 	$this->load->view('partials/footer');
	// }

	// public function menu()
	// {
	// 	$data['title'] = "Beranda";

	// 	$this->load->view('partials/header', $data);
	// 	$this->load->view('index2');
	// 	$this->load->view('partials/footer');
	// }

	public function beranda()
	{
		if ($this->session->userdata('role') == "driver") {
        	redirect('driver');
        } else {
			$data['title'] = "Beranda";

			$this->load->view('partials/header', $data);
			$this->load->view('partials/header-home');
			$this->load->view('home');
			$this->load->view('partials/footer-main');
			$this->load->view('partials/sidenav');
			$this->load->view('partials/footer');
		}
	}

	public function notifikasi()
	{
		$data['title'] = "Notifikasi";
		$data['notifikasi'] = $this->Main_M->getNotifikasi()->result();

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
		$data['title'] = "Kontak Kami";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('kontak');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function kirimpesan()
    {
    	$id = substr(md5(rand()),0,5);
        $id_user = $this->session->userdata('id');
        $pesan = $this->input->post('pesan');

        $data = array(
        	'id' => $id,
            'id_user'      => $id_user,
            'pesan'  	=> $pesan,
        );
 
        $this->Main_M->kirimpesan($data, 'pesan');
        if ($this->db->affected_rows() > 0) {
        	$this->session->set_flashdata('success', 'Pesan Anda berhasil dikirim');
        	echo "<script> history.go(-1); </script>";
        } else {
        	$this->session->set_flashdata('success', 'Gagal untuk mengirim pesan, mohon coba lagi.');
        	echo "<script> history.go(-1); </script>";
        }
    }

    public function tentang_kami()
	{
		$data['title'] = "Tentang Kami";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('tentang-kami');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function faq()
	{
		$data['title'] = "FAQ";

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('faq');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

}
