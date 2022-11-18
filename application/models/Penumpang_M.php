<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang_M extends CI_Model {

	public function ModePenumpang($where, $data)
    {
        $this->db->where('id', $where);
		$this->db->update('user', $data);
    }

    public function penumpang_home()
    {   
        $this->db->select('user.*, pesanan.*');
        $this->db->from('pesanan');
        $this->db->join('user', 'user.id = pesanan.id_user');
        $this->db->order_by('pesanan.created_at','DESC');
        $this->db->where('pesanan.id_user', $this->session->userdata('id'));
        $this->db->where('pesanan.is_active', '1');
        $this->db->limit(1, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function change_status_pencarian($where, $data)
    {
        $this->db->where('id', $where);
		$this->db->update('pesanan', $data);
    }

    public function edit_pencarian($post)
    {
        if (!empty($post['lokasi_user'])) {
            $params['lokasi_user'] = $post['lokasi_user'];
        }

        if (!empty($post['lokasi_akhir'])) {
            $params['lokasi_akhir'] = $post['lokasi_akhir'];
        }

        if (!empty($post['jam_berangkat'])) {
            $params['jam_berangkat'] = $post['jam_berangkat'];
        }
        if (!empty($post['jam_pulang'])) {
            $params['jam_pulang'] = $post['jam_pulang'];
        }

        $this->db->where('id', $post['id']);
        $this->db->update('pesanan', $params);
    }

    public function pesan_driver_penawaran($where, $data)
    {
        $this->db->where('id', $where);
        $this->db->update('penawaran', $data);
    }

    public function pesan_driver_pesanan($where, $data)
    {
        // $this->db->where('id', $where);
        $this->db->where('id_user', $this->session->userdata('id'));
        $this->db->order_by('created_at','DESC');
        $this->db->limit(1, 'DESC');
        $this->db->update('pesanan', $data);
    }

    public function pesanan_done()
    {   
        $this->db->select('user.*, pesanan.*');
        $this->db->from('pesanan');
        $this->db->join('user', 'user.id = pesanan.id_user');
        $this->db->order_by('pesanan.created_at','DESC');
        $this->db->where('pesanan.id_user', $this->session->userdata('id'));
        $this->db->where('pesanan.is_acc', '1');
        $this->db->where('pesanan.is_done', '1');
        $this->db->limit(1, 'DESC');
        $query = $this->db->get();
        return $query;
    }

}