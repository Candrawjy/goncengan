<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DriverController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('email') == NULL) {
			redirect('/');
		} else {
			$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
			if ($role['role'] == 'penumpang') {
				$this->session->set_flashdata('error', 'Anda sedang memasuki mode penumpang.');
				echo "<script> history.go(-1); </script>";
			}
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
		$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		if ($role['role'] == NULL) {
			$this->session->set_flashdata('error', 'Anda belum memilih mode.');
			redirect('/');
		} else {
			$this->form_validation->set_rules('lokasi_awal', 'Fakultas Tujuan', 'required');
			$this->form_validation->set_rules('lokasi_tujuan', 'Lokasi Kamu', 'required');
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
					'harga' => $this->input->post('harga'),
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
	}

	public function home_driver()
	{
		$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		if ($role['role'] == NULL) {
			$this->session->set_flashdata('error', 'Anda belum memilih mode.');
			redirect('/');
		} else {
			$data['title'] = "Beranda";
			$data['penawaran'] = $this->Driver_M->penawaran_home()->result();
			$data['jml_penawaran_aktif'] = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->order_by('penawaran.created_at','DESC')->where('penawaran.id_user', $this->session->userdata('id'))->where('penawaran.is_active', '1')->where('penawaran.is_booked', '0')->limit(1, 'DESC')->get()->num_rows();
			$data['jml_penawaran_aktif_booked'] = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->order_by('penawaran.created_at','DESC')->where('penawaran.id_user', $this->session->userdata('id'))->where('penawaran.is_active', '1')->where('penawaran.is_booked', '1')->limit(1, 'DESC')->get()->num_rows();

			$this->load->view('partials/header', $data);
			$this->load->view('partials/header-home');
			$this->load->view('driver/home-driver');
			$this->load->view('partials/footer-main');
			$this->load->view('partials/sidenav');
			$this->load->view('partials/footer');
		}
	}

	public function detail_pesanan($id)
	{
		$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		if ($role['role'] == NULL) {
			$this->session->set_flashdata('error', 'Anda belum memilih mode.');
			redirect('/');
		} else {
			$data['title'] = "Detail Pesanan";
			$data['pesanan'] = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->where('pesanan.id_penawaran', $id)->get()->row_array();

			$this->load->view('partials/header', $data);
			$this->load->view('partials/header-main');
			$this->load->view('driver/detail-pesanan');
			$this->load->view('partials/sidenav');
			$this->load->view('partials/footer');
		}
	}

	public function change_status_penawaran($id)
	{
		$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		if ($role['role'] == NULL) {
			$this->session->set_flashdata('error', 'Anda belum memilih mode.');
			redirect('/');
		} else {
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
				redirect('driver');
			} else {
				$this->session->set_flashdata('error', 'Gagal membatalkan penawaran Anda!');
				redirect('driver');
			}
		}
	}

	public function terima_pesanan($id)
	{
		$data = array(
			'is_acc' => '1',
		);

		$this->Driver_M->ubah_pesanan($id, $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil untuk menerima pesanan! Silakan hubungi penumpang dan jangan biarkan mereka menunggu!');
			redirect('driver');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk menerima pesanan, coba lagi.');
			redirect('driver');
		}
	}

	public function tolak_pesanan($id)
	{
		$data_penawaran = array(
			'is_booked' => '0',
		);

		$data_pesanan = array(
			'is_acc' => '2',
		);

		$data_user = array(
			'is_banned' => '1',
		);

		$this->Driver_M->change_status_penawaran($id, $data_penawaran);
		$this->Driver_M->selesai_pesanan($id, $data_pesanan);
		$this->Driver_M->tolak_pesanan_user($id, $data_user);
		$this->session->set_userdata('is_banned', '1');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil untuk menolak pesanan ini!');
			redirect('driver');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk menolak pesanan ini, coba lagi.');
			redirect('driver');
		}
	}

	public function selesai_pesanan($id)
	{
		$data = array(
			'is_done' => '1'
		);

		$data_penawaran = array(
			'is_active' => '0',
		);

		$this->Driver_M->selesai_pesanan($id, $data);
		$this->Driver_M->change_status_penawaran($id, $data_penawaran);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Transaksi telah selesai! Terimakasih atas jasamu karena telah membantu mahasiswa Indonesia untuk berangkat/pulang dari kampus tepat waktu!');
			redirect('driver');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk menyelesaikan transaksi, coba lagi.');
			redirect('driver');
		}
	}

}
