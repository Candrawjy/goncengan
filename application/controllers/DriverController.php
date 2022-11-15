<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DriverController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('email') == NULL) {
			redirect('/');
		}
		$this->load->model('Driver_M');
	}

	public function mode_driver()
	{
		$id = $this->session->userdata('id');
		$role = "driver";

		$data = array(
			'id' => $id,
			'role' => $role,
		);

		$where = $id;
		$this->session->set_userdata('role', 'driver');
		$this->Driver_M->ModeDriver($where, $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Anda sedang memasuki mode driver');
			redirect('driver');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk memasuki mode driver.');
			redirect('driver');
		}
	}

	public function keluar_mode_driver()
	{
		$id = $this->session->userdata('id');

		$data = array(
			'id' => $id,
			'role' => NULL,
		);

		$where = $id;
		$this->session->unset_userdata('role');
		$this->Driver_M->ModeDriver($where, $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil keluar dari mode driver');
			redirect('/');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk keluar dari mode driver.');
			redirect('/');
		}
	}

	public function pasang_iklan()
	{
		$this->form_validation->set_rules('lokasi_awal', 'Lokasi Awal', 'required');
		$this->form_validation->set_rules('lokasi_tujuan', 'Lokasi Tujuan', 'required');
		$this->form_validation->set_rules('waktu_berangkat', 'Waktu Berangkat', 'required');
		$this->form_validation->set_rules('waktu_pulang', 'Waktu Pulang', 'required');
		$this->form_validation->set_rules('gender', 'Gender Penumpang', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Buat Penawaran";

			$this->load->view('partials/header', $data);
			$this->load->view('partials/header-main');
			$this->load->view('driver/add-iklan');
			$this->load->view('partials/footer');
		} else {
			$id = substr(md5(rand()),0,5);
			$data = [
				'id' => $id,
				'id_user' => $this->session->userdata('id'),
				'lokasi_awal' => $this->input->post('lokasi_awal'),
				'lokasi_tujuan' => $this->input->post('lokasi_tujuan'),
				'waktu_berangkat' => $this->input->post('waktu_berangkat'),
				'waktu_pulang' => $this->input->post('waktu_pulang'),
				'gender' => $this->input->post('gender'),
				'type' => $this->input->post('type'),
			];

			$id_notifikasi = substr(md5(rand()),0,5);
			$data_notifikasi = [
				'id' => $id_notifikasi,
				'id_user' => $this->session->userdata('id'),
				'title' => "Buat Penawaran Berhasil",
				'message' => "Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!",
			];

			$this->db->insert('penawaran', $data);
			if ($this->db->affected_rows() > 0) {
				$this->db->insert('notifikasi', $data_notifikasi);
				$this->session->set_flashdata('success', 'Berhasil untuk membuat penawaran Anda!');
				redirect('driver');
			} else {
				$this->session->set_flashdata('error', 'Gagal untuk membuat penawaran Anda, coba lagi!');
				echo "<script> history.go(-1); </script>";
			}
		}
	}

	public function home_driver()
	{
		$data['title'] = "Beranda";
		$data['penawaran'] = $this->Driver_M->penawaran_home()->result();
		$data['jml_penawaran'] = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->order_by('penawaran.created_at','DESC')->where('penawaran.id_user', $this->session->userdata('id'))->where('penawaran.is_active', '1')->limit(1, 'DESC')->get()->num_rows();

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

	public function change_status_penawaran($id)
	{
		$data = array(
			'id' => $id,
			'is_active' => "0",
		);

		$id_notifikasi = substr(md5(rand()),0,5);
		$data_notifikasi = [
			'id' => $id_notifikasi,
			'id_user' => $this->session->userdata('id'),
			'title' => "Pembatalan Penawaran Berhasil",
			'message' => "Kamu berhasil untuk membatalkan penawaran.",
		];

		$where = $id;
		$this->Driver_M->change_status_penawaran($where, $data);
		if ($this->db->affected_rows() > 0) {
			$this->db->insert('notifikasi', $data_notifikasi);
			$this->session->set_flashdata('success', 'Berhasil membatalkan penawaran Anda!');
			redirect('/');
		} else {
			$this->session->set_flashdata('error', 'Gagal membatalkan penawaran Anda!');
			redirect('/');
		}
	}

}
