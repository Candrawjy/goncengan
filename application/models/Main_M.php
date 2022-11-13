<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_M extends CI_Model {

	public function kirimpesan($data, $table)
    {
        $this->db->insert('pesan', $data);
    }
}