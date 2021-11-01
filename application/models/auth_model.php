<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{
    public function register($post)
    {
        $cek['email'] = $this->db->get_where('user', ['email' => $post['email']])->row_array();
        $cek['telepon'] = $this->db->get_where('user', ['telepon' => $post['telepon']])->row_array();
        return $cek;
    }

    public function dataregister($data)
    {
        $this->db->insert('user', $data['user']);
    }

    public function activatecode($token)
    {

        $this->db->insert('user_activation', $token);
    }

    public function aktivasi()
    {
        $data = $this->idsession();
        $id = $data['id'];
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function updatetoken()
    {
    }

    public function cekemail($email)
    {
        $data = $this->db->get_where('user', ['email' => $email])->row_array();
        return $data;
    }

    public function idsession()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('user', ['id' => $id])->row_array();
        return $data;
    }

    public function login($post)
    {

        $email = $post['email'];
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        return $user;
    }
}
