<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $data['page'] = $this->uri->segment('2');
        admin_cek();
    }

    // ===================================Dashboard Area ============================================
    public function index()
    {
        $data = $this->_session();
        $data['judul'] = 'Dashboard Admin - KLEPON PRAMUKA UNIB';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
    // ===================================end Dashboard Area ============================================

    // ===================================User list Area ============================================

    public function userlist()
    {
        $data = $this->_session();
        $data['userlist'] = $this->Admin_model->getuser();
        $data['judul'] = 'User Management - KLEPON PRAMUKA UNIB';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('admin/footer');
    }

    public function adduser()
    {
        $post = $this->input->post();

        if ($post['role'] == 1) {
            $id = random_int(3, 20);
        } else if ($post['role'] == 2) {
            $charset = "abcdefghijklmnopqrstuvwxyzABCDEFHIJKLMNOPQRSTUVWXYZ123456789";
            $id = substr(str_shuffle($charset), 0, 9);
        }

        $token = random_int(100000, 999999);
        $url = base64_encode(random_bytes(32));

        $data = array(
            'id' => $id,
            'nama' => $post['nama'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'foto_profile' => 'default.png',
            'tgl_reg' => date('Y-m-d'),
            'time_reg' => time(),
            'role' => $post['role'],
            'status' => $post['status'],
            'token' => $token,
            'url' => $url
        );

        $this->Admin_model->adduser($data);
        $this->session->set_flashdata('flash', '<div class="alert alert-success">User berhasil ditambahkan!!</div>');
        redirect(base_url('admin/userlist'));
    }

    public function userdetail()
    {
        $id = $this->uri->segment('3');
        $detail = $this->Admin_model->userdetail($id);
        $session = $this->_session();
        $data['judul'] = 'Detail User - KLEPON PRAMUKA UNIB';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $session);
        $this->load->view('admin/sidebar', $session);
        $this->load->view('admin/userdetail', $detail);
        $this->load->view('admin/footer');
    }

    public function edituser()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        if ($this->form_validation->run() == false) {
            $id = $this->uri->segment('3');
            $detail = $this->Admin_model->userdetail($id);
            $session = $this->_session();
            $data['judul'] = 'edit User - KLEPON PRAMUKA UNIB';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $session);
            $this->load->view('admin/sidebar', $session);
            $this->load->view('admin/useredit', $detail);
            $this->load->view('admin/footer');
        } else {
            $post = $this->input->post();
            $this->Admin_model->edituser($post);
            redirect('admin/userlist');
        }
    }

    public function deleteuser()
    {
        $id = $this->uri->segment('3');
        $this->Admin_model->deleteuser($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success">User berhasil dihapus!!</div>');
        redirect('admin/userlist');
    }
    // ===================================end User list Area ============================================

    // ===================================data Diri Peserta Area ============================================
    public function datadiripeserta()
    {
        $data = $this->_session();
        $data['userlist'] = $this->Admin_model->getdatadiri();
        $data['judul'] = 'Data Diri Peserta - KLEPON PRAMUKA UNIB';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/datadiripeserta', $data);
        $this->load->view('admin/footer');
    }
    // ===================================end data Diri Peserta Area ============================================

    private function _session()
    {
        $user = $this->Admin_model->session();
        $data['user'] = array(
            'nama' => $user['nama'],
            'email' => $user['email'],
            'pp' => $user['foto_profile']
        );
        return $data;
    }
}
