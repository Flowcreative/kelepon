<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function register($post)
    {
        $cek['email'] = $this->db->get_where('user', ['email' => $post['email']])->row_array();
        $cek['telepon'] = $this->db->get_where('user', ['telepon' => $post['telepon']])->row_array();
        return $cek;
    }

    public function dataregister($data)
    {
        $this->db->insert('user', $data);
    }

    public function activatecode($tokenect)
    {

        $this->db->insert('user_activation', $tokenect);
    }

    public function aktivasi()
    {
        $data = $this->idsession();
        $id = $data['id'];
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('user');

        $this->db->where('id_user', $id);
        $this->db->delete('user_activation');
    }

    public function urlregist($get)
    {

        $verify = $get['verify'];
        $user = $get['user'];
        $data = $this->db->get_where('user_activation', ['url' => $verify])->row_array();

        if ($data) {
            $this->db->set('status', 1);
            $this->db->where('email', $user);
            $this->db->update('user');

            $this->db->where('id_user', $user);
            $this->db->delete('user_activation');
        } else {
            redirect('auth');
        }
    }

    public function resendemailregist($data)
    {
        $id = $this->session->userdata('id');
        $this->db->set('url', $data['url']);
        $this->db->set('token', $data['token']);
        $this->db->where('id_user', $id);
        $this->db->update('user_activation');
    }

    public function cekemail($email)
    {
        $data = $this->db->get_where('user', ['email' => $email])->row_array();
        return $data;
    }

    public function cekrequest()
    {
        $user = $this->idsession();
        $req = $this->db->get_where('emailrequest', ['email' => $user['email']])->row_array();
        return $req;
    }

    public function setemailrequest($user)
    {
        $this->db->insert('emailrequest', ['email' => $user['email']]);
    }

    public function deleterequest()
    {
        $user = $this->idsession();
        $this->db->where('email', $user['email']);
        $this->db->delete('emailrequest');
    }

    public function resendemaillupa($data, $email)
    {
        $this->db->set('url', $data['url']);
        $this->db->set('token', $data['token']);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function cekreqlupa($mail)
    {
        $req = $this->db->get_where('emailrequest', ['email' => $mail])->row_array();
        return $req;
    }

    public function setemailrequestlupa($cekemail)
    {
        $this->db->insert('emailrequest', ['email' => $cekemail['email']]);
    }

    public function luparequestdelete($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('emailrequest');
    }

    public function lupapassword($data, $user)
    {
        $this->db->set('token', $data['token']);
        $this->db->set('url', $data['url']);
        $this->db->where('id', $user['id']);
        $this->db->update('user');
    }

    public function checkrecovery($kode)
    {
        $hasil = $this->db->get_where('user', array('token' => $kode['kode'], 'email' => $kode['email']))->row_array();
        return $hasil;
    }

    public function gantipassword($post)
    {
        $email = $post['email'];
        $password = password_hash($post['password2'], PASSWORD_DEFAULT);

        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
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