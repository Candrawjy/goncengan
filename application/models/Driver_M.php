<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_M extends CI_Model {

	public function ModeDriver($where, $data)
    {
        $this->db->where('id', $where);
		$this->db->update('user', $data);
    }

    public function penawaran_home()
    {   
        $this->db->select('user.*, penawaran.*');
        $this->db->from('penawaran');
        $this->db->join('user', 'user.id = penawaran.id_user');
        $this->db->order_by('penawaran.created_at','DESC');
        $this->db->where('penawaran.id_user', $this->session->userdata('id'));
        $this->db->where('penawaran.is_active', '1');
        $this->db->limit(1, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function change_status_penawaran($where, $data)
    {
        $this->db->where('id', $where);
		$this->db->update('penawaran', $data);
    }

    public function ubah_pesanan($where, $data)
    {
        $this->db->where('id', $where);
		$this->db->update('pesanan', $data);
    }

    public function selesai_pesanan($where, $data)
    {
        $this->db->where('id_penawaran', $where);
		$this->db->update('pesanan', $data);
    }

    public function tolak_pesanan($where, $data)
    {
        // $this->db->where('id', $where);
        $this->db->where('id_user', $this->session->userdata('id'));
        $this->db->order_by('created_at','DESC');
        $this->db->limit(1, 'DESC');
        $this->db->update('pesanan', $data);
    }

    public function tolak_pesanan_user($where, $data)
    {
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('user', $data);
    }

}