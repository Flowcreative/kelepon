<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peserta_model');
        peserta_cek();
    }

    // ================================= Dashboard Area =========================
    public function index()
    {
        $session = $this->_session();
        $data['judul'] = "Dashboard - KELEPON PRAMUKA UNIB";
        $this->load->view('peserta/header', $data);
        $this->load->view('peserta/navbar', $session);
        $this->load->view('peserta/sidebar');
        $this->load->view('peserta/dashboard');
        $this->load->view('peserta/footer');
    }
    // ================================= end Dashboard Area =========================

    private function _session()
    {
        $user = $this->Peserta_model->session();
        $data['user'] = array(
            'nama' => $user['nama'],
            'email' => $user['email'],
            'pp' => $user['foto_profile']
        );
        return $data;
    }
}
