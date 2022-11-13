<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_M extends CI_Model {

	public function cek_user($data) {
		$query = $this->db->get_where('user', $data);
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['id'] = substr(md5(rand()),0,5);
		$params['nama'] = $post['nama'];
		$params['nim'] = $post['nim'];
		$params['no_wa'] = $post['no_wa'];
		$params['jenis_kelamin'] = $post['jenis_kelamin'];
		$params['email'] = $post['email'];
		$params['password'] = md5($post['password']);

		$this->db->insert('user', $params);
	}

	public function del($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}

	public function edit($post)
	{
		$params['nama'] = $post['nama'];
		$params['email'] = $post['email'];
		if (!empty($post['password'])) {
			$params['password'] = md5($post['password']);
		}
		$params['nohp_user'] = $post['nohp_user'];
		$params['id_role'] = $post['id_role'];

		$this->db->where('id_user', $post['id_user']);
		$this->db->update('user', $params);
	}
}