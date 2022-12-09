<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenumpangController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('email') == NULL) {
			redirect('/');
		} else {
			$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
			if ($role['role'] == 'driver') {
				$this->session->set_flashdata('error', 'Anda sedang memasuki mode driver.');
				echo "<script> history.go(-1); </script>";
			}
		}
		$this->load->model('Penumpang_M');
		$this->load->model('Main_M');
	}

	public function mode_penumpang()
	{
		$id = $this->session->userdata('id');
		$role = "penumpang";

		$data = array(
			'id' => $id,
			'role' => $role,
		);

		$where = $id;
		$this->session->set_userdata('role', 'penumpang');
		$this->Penumpang_M->ModePenumpang($where, $data);
		if ($this->db->affected_rows() > 0) {
			$id_notifikasi = substr(md5(rand()),0,5);
			$data_notifikasi = [
				'id' => $id_notifikasi,
				'id_user' => $this->session->userdata('id'),
				'title' => "Masuk Mode Penumpang",
				'message' => "Kamu memasuki mode penumpang!",
				'type' => $this->session->userdata('role')
			];
			$this->db->insert('notifikasi', $data_notifikasi);
			$this->session->set_flashdata('success', 'Anda sedang memasuki mode penumpang');
			redirect('penumpang');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk memasuki mode penumpang.');
			redirect('penumpang');
		}
	}

	public function keluar_mode_penumpang()
	{
		$pesanan_aktif = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->limit(1, 'DESC')->get()->num_rows();
		if($pesanan_aktif == 1) {
			$this->session->set_flashdata('error', 'Anda sedang memiliki pencarian yang aktif. Hapus terlebih dahulu untuk mengubah mode!');
			echo "<script> history.go(-1); </script>";
		} else {
			$id = $this->session->userdata('id');

			$data = array(
				'id' => $id,
				'role' => NULL,
			);

			$id_notifikasi = substr(md5(rand()),0,5);
			$data_notifikasi = [
				'id' => $id_notifikasi,
				'id_user' => $this->session->userdata('id'),
				'title' => "Keluar Mode Penumpang",
				'message' => "Kamu keluar dari mode penumpang!",
				'type' => $this->session->userdata('role')
			];
			$this->db->insert('notifikasi', $data_notifikasi);

			$where = $id;
			$this->session->unset_userdata('role');
			$this->Penumpang_M->ModePenumpang($where, $data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil keluar dari mode penumpang');
				redirect('/');
			} else {
				$this->session->set_flashdata('error', 'Gagal untuk keluar dari mode penumpang.');
				redirect('/');
			}
		}
	}

	public function buat_pencarian()
	{
		$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		if ($role['role'] == NULL) {
			$this->session->set_flashdata('error', 'Anda belum memilih mode.');
			redirect('/');
		} else {
			$pesanan_aktif = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->where('pesanan.is_acc', '0')->limit(1, 'DESC')->get()->num_rows();
			if($pesanan_aktif == 1) {
				$this->session->set_flashdata('error', 'Anda telah memiliki pencarian yang aktif. Hapus terlebih dahulu untuk mencari driver yang baru!');
				echo "<script> history.go(-1); </script>";
			} else {
				$this->form_validation->set_rules('lokasi_user', 'Lokasi Kamu', 'required');
				$this->form_validation->set_rules('lokasi_akhir', 'Fakultas Tujuan', 'required');
				// $this->form_validation->set_rules('jam_berangkat', 'Waktu Berangkat', 'required');
				// $this->form_validation->set_rules('jam_pulang', 'Waktu Pulang', 'required');
				$this->form_validation->set_rules('harga', 'Total Harga', 'required');
				$this->form_validation->set_rules('waktu', 'Waktu', 'required');

				$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

				$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$data['title'] = "Buat Pencarian";

					$this->load->view('partials/header', $data);
					$this->load->view('partials/header-main');
					$this->load->view('penumpang/buat-pencarian');
					$this->load->view('partials/footer');
				} else {
					$id = substr(md5(rand()),0,5);
					$data = [
						'id' => $id,
						'id_user' => $this->session->userdata('id'),
						'lokasi_user' => $this->input->post('lokasi_user'),
						'lokasi_akhir' => $this->input->post('lokasi_akhir'),
						// 'jam_berangkat' => $this->input->post('jam_berangkat'),
						// 'jam_pulang' => $this->input->post('jam_pulang'),
						'waktu' => $this->input->post('waktu'),
						'type_waktu' => $this->input->post('type_waktu'),
						'harga' => $this->input->post('harga'),
						'catatan' => $this->input->post('catatan'),
					];

					$id_notifikasi = substr(md5(rand()),0,5);
					$data_notifikasi = [
						'id' => $id_notifikasi,
						'id_user' => $this->session->userdata('id'),
						'title' => "Pencarian Driver Berhasil",
						'message' => "Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!",
						'type' => $this->session->userdata('role')
					];

					$this->db->insert('pesanan', $data);
					if ($this->db->affected_rows() > 0) {
						$this->db->insert('notifikasi', $data_notifikasi);
						$this->session->set_flashdata('success', 'Berhasil mencari driver!');
						redirect('penumpang');
					} else {
						$this->session->set_flashdata('error', 'Gagal untuk mencari driver, coba lagi!');
						echo "<script> history.go(-1); </script>";
					}
				}
			}
		}
	}

	public function home_penumpang()
	{
		$role = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		if ($role['role'] == NULL) {
			$this->session->set_flashdata('error', 'Anda belum memilih mode.');
			redirect('/');
		} else {
			$data['title'] = "Beranda";
			$data['pesanan'] = $this->Penumpang_M->penumpang_home()->result();
			$data['pesanan_done'] = $this->Penumpang_M->pesanan_done()->result();
			$data['jml_pesanan_aktif'] = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->where('pesanan.is_acc', '0')->where('pesanan.is_done', '0')->limit(1, 'DESC')->get()->num_rows();
			$data['jml_pesanan_aktif_booked'] = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->where('pesanan.is_acc', '1')->where('pesanan.is_done', '0')->limit(1, 'DESC')->get()->num_rows();
			$data['jml_pesanan_waiting'] = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->where('pesanan.is_acc', '0')->where('pesanan.is_done', '0')->where('pesanan.id_penawaran !=', NULL)->limit(1, 'DESC')->get()->num_rows();
			$data['jml_pesanan_acc'] = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->where('pesanan.is_acc', '1')->where('pesanan.id_penawaran !=', NULL)->where('pesanan.is_done', '0')->limit(1, 'DESC')->get()->num_rows();
			$data['jml_pesanan_done'] = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->where('pesanan.is_done', '1')->limit(1, 'DESC')->get()->num_rows();
			$data['jml_pesanan_tolak'] = $this->db->select('user.*, pesanan.*')->from('pesanan')->join('user', 'user.id = pesanan.id_user')->order_by('pesanan.created_at','DESC')->where('pesanan.id_user', $this->session->userdata('id'))->where('pesanan.is_active', '1')->where('pesanan.is_done', '0')->where('pesanan.is_acc', '2')->limit(1, 'DESC')->get()->num_rows();
			$data['banner'] = $this->Main_M->getBanner()->result();

			$this->load->view('partials/header', $data);
			$this->load->view('partials/header-home');
			$this->load->view('penumpang/home-penumpang');
			$this->load->view('partials/footer-main');
			$this->load->view('partials/sidenav');
			$this->load->view('partials/footer');
		}
	}

	public function change_status_pencarian($id)
	{
		$data = array(
			'id' => $id,
			'is_active' => "0",
		);

		$id_notifikasi = substr(md5(rand()),0,5);
		$data_notifikasi = [
			'id' => $id_notifikasi,
			'id_user' => $this->session->userdata('id'),
			'title' => "Pembatalan Pencarian Berhasil",
			'message' => "Kamu berhasil untuk membatalkan pencarian.",
			'type' => $this->session->userdata('role')
		];

		$where = $id;
		$this->Penumpang_M->change_status_pencarian($where, $data);
		if ($this->db->affected_rows() > 0) {
			$this->db->insert('notifikasi', $data_notifikasi);
			$this->session->set_flashdata('success', 'Berhasil membatalkan pencarian Anda!');
			redirect('/');
		} else {
			$this->session->set_flashdata('error', 'Gagal membatalkan pencarian Anda!');
			redirect('/');
		}
	}

	public function edit_pencarian($id)
	{
		if ($this->input->post('lokasi_user')) {
			$this->form_validation->set_rules('lokasi_user', 'Lokasi Kamu', 'required');
		}

		if ($this->input->post('lokasi_akhir')) {
			$this->form_validation->set_rules('lokasi_akhir', 'Fakultas Tujuan', 'required');
		}

		if ($this->input->post('jam_berangkat')) {
			$this->form_validation->set_rules('jam_berangkat', 'Waktu Berangkat', 'required');
		}

		if ($this->input->post('jam_pulang')) {
			$this->form_validation->set_rules('jam_pulang', 'Waktu Pulang', 'required');
		}

		if ($this->input->post('harga')) {
			$this->form_validation->set_rules('harga', 'Total Harga', 'required');
		}

		if ($this->input->post('waktu')) {
			$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		}

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Edit Pencarian";
			$data['pesanan'] = $this->db->get_where('pesanan', ['id' => $id])->row_array();

			$this->load->view('partials/header', $data);
			$this->load->view('partials/header-main');
			$this->load->view('penumpang/edit-pencarian');
			$this->load->view('partials/footer');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Penumpang_M->edit_pencarian($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Diedit');
				redirect('/');
			} else {
				$this->session->set_flashdata('success', 'Tidak ada perubahan');
				redirect('/');
			}
		}
	}

	public function cari_driver($id)
	{
		$data['title'] = "Cari Driver";
		$data['pesanan'] = $this->Penumpang_M->penumpang_home()->result();

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('penumpang/cari-driver');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function detail_driver($id)
	{
		$data['title'] = "Detail Driver";
		$data['detail'] = $this->db->select('user.*, penawaran.*')->from('penawaran')->join('user', 'user.id = penawaran.id_user')->where('penawaran.id', $id)->get()->result();

		$this->load->view('partials/header', $data);
		$this->load->view('partials/header-main');
		$this->load->view('penumpang/detail-driver');
		$this->load->view('partials/footer-main');
		$this->load->view('partials/sidenav');
		$this->load->view('partials/footer');
	}

	public function pesan_driver($id)
	{
		$data_penawaran = array(
			'id' => $id,
			'is_booked' => '1',
		);

		$data_pesanan = array(
			'id_penawaran' => $id,
		);

		$id_notifikasi = substr(md5(rand()),0,5);
		$data_notifikasi = [
			'id' => $id_notifikasi,
			'id_user' => $this->session->userdata('id'),
			'title' => "Memesan Driver",
			'message' => "Kamu berhasil menemukan driver yang diinginkan!",
			'type' => $this->session->userdata('role')
		];

		$this->Penumpang_M->pesan_driver_penawaran($id, $data_penawaran);
		$this->Penumpang_M->pesan_driver_pesanan($id, $data_pesanan);
		if ($this->db->affected_rows() > 0) {
			$this->db->insert('notifikasi', $data_notifikasi);
			$this->session->set_flashdata('success', 'Berhasil untuk memesan driver ini! Silakan menunggu beberapa saat sampai pesanan Anda dikonfirmasi.');
			redirect('penumpang');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk memesan driver ini, coba lagi.');
			redirect('penumpang');
		}
	}

	public function batal_pesan_driver($id)
	{
		$data_penawaran = array(
			'id' => $id,
			'is_booked' => '0',
		);

		$data_pesanan = array(
			'id_penawaran' => NULL,
		);

		$id_notifikasi = substr(md5(rand()),0,5);
		$data_notifikasi = [
			'id' => $id_notifikasi,
			'id_user' => $this->session->userdata('id'),
			'title' => "Membatalkan Driver",
			'message' => "Kamu telah membatalkan pesanan untuk driver!",
			'type' => $this->session->userdata('role')
		];

		$this->Penumpang_M->pesan_driver_penawaran($id, $data_penawaran);
		$this->Penumpang_M->pesan_driver_pesanan($id, $data_pesanan);
		if ($this->db->affected_rows() > 0) {
			$this->db->insert('notifikasi', $data_notifikasi);
			$this->session->set_flashdata('success', 'Berhasil untuk membatalkan pesanan driver ini!');
			redirect('penumpang');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk membatalkan pesanan driver ini, coba lagi.');
			redirect('penumpang');
		}
	}

	public function konfirmasi_selesai($id)
	{
		$data = array(
			'is_active' => '0'
		);

		$id_notifikasi = substr(md5(rand()),0,5);
		$data_notifikasi = [
			'id' => $id_notifikasi,
			'id_user' => $this->session->userdata('id'),
			'title' => "Transaksi Selesai",
			'message' => "Kamu telah menyelesaikan transaksi bersama driver. Terima kasih telah menggunakan layanan Goncengan!",
			'type' => $this->session->userdata('role')
		];

		$this->Penumpang_M->change_status_pencarian($id, $data);
		if ($this->db->affected_rows() > 0) {
			$this->db->insert('notifikasi', $data_notifikasi);
			$this->session->set_flashdata('success', 'Transaksi telah selesai! Terimakasih!');
			redirect('penumpang');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk konfirmasi transaksi, coba lagi.');
			redirect('penumpang');
		}
	}

	public function konfirmasi_tolak($id)
	{
		$data = array(
			'id_penawaran' => NULL,
			'is_acc' => '0'
		);

		$this->Penumpang_M->change_status_pencarian($id, $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Silakan lanjutkan pencarian driver yang lain!');
			redirect('penumpang');
		} else {
			$this->session->set_flashdata('error', 'Gagal untuk konfirmasi penolakan, coba lagi.');
			redirect('penumpang');
		}
	}

}
