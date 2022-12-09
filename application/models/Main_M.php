<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_M extends CI_Model {

	public function kirimpesan($data, $table)
    {
        $this->db->insert('pesan', $data);
    }

    public function getNotifikasi()
    {   
        $this->db->select('user.*, notifikasi.*');
        $this->db->from('notifikasi');
        $this->db->join('user', 'user.id = notifikasi.id_user');
        $this->db->order_by('notifikasi.created_at','DESC');
        $this->db->where('notifikasi.id_user', $this->session->userdata('id'));
        $this->db->where('notifikasi.type', $this->session->userdata('role'));
        $query = $this->db->get();
        return $query;
    }

  //   public function getBalance()
  //   {
  //   	$this->db->select('user.*, pesanan.*, penawaran.*, SUM(pesanan.harga) AS balance');
  //   	$this->db->from('pesanan');
  //   	$this->db->join('user', 'user.id = pesanan.id_user');
  //   	$this->db->join('penawaran', 'penawaran.id = pesanan.id_penawaran');
  //   	// $this->db->where('pesanan.is_active', '0');
  //   	$this->db->where('pesanan.is_acc', '1');
  //   	$this->db->where('pesanan.is_payment', '1');
  //   	$this->db->where('pesanan.is_done', '1');
  //   	$this->db->where('penawaran.id_user', $this->session->userdata('id'));
  //   	$this->db->where('penawaran.type', 'bisnis');
  //   	$sumbalance = $this->db->get();
  //   	if ($sumbalance->num_rows() > 0) {
		// 	return $sumbalance->result_array();
		// } else {
		// 	return false;
		// }
  //   }

    public function getBalance()
    {
		$this->db->select('user.*, balance.*, SUM(balance.total_balance) AS balance');
        $this->db->from('balance');
        $this->db->join('user', 'user.id = balance.id_user');
        $this->db->order_by('balance.created_at','DESC');
        $this->db->where('balance.id_user', $this->session->userdata('id'));
     	$sumbalance = $this->db->get();
    	if ($sumbalance->num_rows() > 0) {
			return $sumbalance->result_array();
		} else {
			return false;
		}
    }

    public function getBanner()
    {   
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get();
        return $query;
    }

}