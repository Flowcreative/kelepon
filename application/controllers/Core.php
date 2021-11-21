<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Core extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Core_model');
        $data['page'] = $this->uri->segment('2');
        admin_cek();
    }

    // ===================================Dashboard Area ============================================
    public function mail()
    {
        $data = $this->_session();
        $data['judul'] = 'Dashboard Admin - KLEPON PRAMUKA UNIB';
        $data['maillist'] = $this->Core_model->getmail()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/mail',$data);
        $this->load->view('admin/footer');
    }
    // ===================================end Dashboard Area ============================================


    public function addmail(){
        $data = array(
            'subjek' => $this->input->post('subjek'), 
            'pesan' => $this->input->post('pesan'),
            'status' => 'I'
        );
        $this->Core_model->addmail($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            </div>');
        redirect('core/mail');
    }

    public function praedit(){
        $a = $this->input->post('iddata');
        echo $a;
    }

    

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
