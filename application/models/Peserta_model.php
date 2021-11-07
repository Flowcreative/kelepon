<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_model extends CI_Model
{
    public function aksespeserta()
    {
        $id = $this->session->userdata('id');
        if ($id) {
            $user = $this->db->get_where('user', ['id' => $id])->row_array();
            $role = $user['role'];
            return $role;
        }
    }

    public function session()
    {
        $id = $this->session->userdata('id');
        $user = $this->db->get_where('user', ['id' => $id])->row_array();
        return $user;
    }
}
