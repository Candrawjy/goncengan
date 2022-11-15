<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_M');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			if ($this->session->userdata('email') != null) {
				$this->session->set_flashdata('error', 'Anda telah login, silahkan logout terlebih dahulu!');
				echo "<script> history.go(-1); </script>";
			} else {
				$data['title'] = "Masuk";

				$this->load->view('partials/header', $data);
				$this->load->view('auth/login');
				$this->load->view('partials/footer');
			}
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email', TRUE);
		$password = md5($this->input->post('password', TRUE));

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			if ($user['is_active'] == 1) {
				if ($user['password'] == $password) {
					$this->session->set_userdata($user);
					$this->session->set_flashdata('success', 'Selamat datang!');
					if ($this->session->userdata('role') == "driver") {
						redirect('driver');
					} else {
						redirect('beranda');
					}
				} else {
					$this->session->set_flashdata('error', 'Password yang Anda masukkan salah!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Email Anda belum teraktivasi!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', 'Email yang Anda masukkan tidak terdaftar!');
			redirect('login');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required|is_unique[user.nim]');
		$this->form_validation->set_rules('no_wa', 'No. Whatsapp', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));
		$this->form_validation->set_rules('check', 'Pernyataan', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			if ($this->session->userdata('email') != null) {
				$this->session->set_flashdata('error', 'Anda telah login, silahkan logout terlebih dahulu!');
				echo "<script> history.go(-1); </script>";
			} else {
				$data['title'] = "Daftar";

				$this->load->view('partials/header', $data);
				$this->load->view('auth/register');
				$this->load->view('partials/footer');
			}
		} else {
			$email = $this->input->post('email');
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'created_at' => time(),
			];

			$this->db->insert('user_token', $user_token);

			$post = $this->input->post(null, TRUE);
			$this->User_M->add($post);

			$this->_sendEmail($token, 'verify');

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil register, silakan cek email atau email spam Anda!');
				redirect('login');
			}
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'noreply.goncengan@gmail.com',
			'smtp_pass' => '!GoncenganIP8!',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'UTF-8',
			'newline' => "\r\n",
			'wordwrap' => TRUE
		];

		$this->load->library('email', $config);

		$this->email->from('noreply.goncengan@gmail.com', 'No Reply Goncengan');
		$this->email->to($this->input->post('email'));
		$this->email->set_mailtype('html');

		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'token' => $token,
			'title' => "Reset Password"
		);

		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun Anda');
			$this->email->message($this->load->view('auth/verif-email', $data, true));
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message($this->load->view('auth/reset-pass-email', $data, true));
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if(time() - $user_token['created_at'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('success', 'Email '.$email.' berhasil diaktivasi! Silakan login!');
					redirect('login');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('error', 'Gagal aktivasi, token telah kedaluarsa!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Gagal aktivasi, token invalid!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', 'Gagal aktivasi, email Anda tidak terdaftar!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		session_destroy();
		redirect('/');
	}

	function email_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE email = '$post[email]' AND id != '$post[id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('email_check', '{field} ini sudah dipakai, silakan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function nim_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE nim = '$post[nim]' AND id != '$post[id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('nim_check', '{field} ini sudah dipakai, silakan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function set_upload_options($newName)
	{
		$config = [
			'upload_path' 	=> './assets/images/profil/',
			'allowed_types' => 'jpg|png|jpeg|',
			'max_size'      => 1024*10,
			'file_name'		=> $newName,
			'overwrite'     => FALSE,
		];

		return $config;
	}

	public function profil_saya()
	{
		$user_id = $this->session->userdata('id');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('no_wa', 'No. Whatsapp', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

		if ($this->input->post('email')) {
			$this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
		}

		if ($this->input->post('nim')) {
			$this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required|callback_nim_check');
		}

		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		}

		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));
		}

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('max_length', '{field} maksimal 8 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Profil Saya";

			$this->load->view('partials/header', $data);
			$this->load->view('partials/header-main');
			$this->load->view('profil-saya');
			$this->load->view('partials/sidenav');
			$this->load->view('partials/footer');
		} else {
			$profile_picture = $_FILES['profile_picture']['name'] == "" ? "" : explode('.', $_FILES['profile_picture']['name']);
			$profile_picture = $profile_picture == '' ? $this->input->post('tmp_profile_picture') : str_replace(' ', '-', $profile_picture[0]) . "_" . $user_id . '.' . $profile_picture[1];

			foreach ($_FILES as $key => $value) {
				$oldName = explode('.', $_FILES[$key]['name']);
				if (!empty($value['tmp_name'])) {
					$newName =  str_replace(' ', '-', $oldName[0]) . "_" . $user_id . '.' . $oldName[1];

					$this->upload->initialize($this->set_upload_options($newName));

					if (!$this->upload->do_upload($key)) {
						echo $this->upload->display_errors();
						die();
					} else {
						$this->upload->data($key);
						if ($key == 'profile_picture') {
							if ($this->input->post('tmp_profile_picture') != "") {
								unlink(FCPATH . 'assets/images/profil/' . $this->input->post('tmp_profile_picture'));
							}
						}
					}
				}
			}

			if (!empty($this->input->post('password'))) {
				$data = [
					'nama' => $this->input->post('nama'),
					'nim' => $this->input->post('nim'),
					'no_wa' => $this->input->post('no_wa'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'profile_picture' => $profile_picture,
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
				];
			} else {
				$data = [
					'nama' => $this->input->post('nama'),
					'nim' => $this->input->post('nim'),
					'no_wa' => $this->input->post('no_wa'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'profile_picture' => $profile_picture,
					'email' => $this->input->post('email'),
				];
			}

			$where = $this->input->post('id');
			$this->User_M->updateProfil($where, $data);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Diedit');
				redirect('profil');
			} else {
				$this->session->set_flashdata('success', 'Tidak ada perubahan');
				redirect('profil');
			}
		}
	}
}
