<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_M extends CI_Model {

	public function ModeDriver($where, $data)
    {
        $this->db->where('id', $where);
		$this->db->update('user', $data);
    }

}