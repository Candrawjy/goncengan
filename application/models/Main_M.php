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
        $query = $this->db->get();
        return $query;
    }

}