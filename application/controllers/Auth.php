<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index()
    {
        login_cek();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            //Registrasi view,
            $data['judul'] = 'Registrasi - KLEPON PRAMUKA UNIB';
            $this->load->view('auth/head', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('auth/foot');
        } else {
            $post = $this->input->post();
            $this->_registrasi($post);
        }
    }


    private function _registrasi($post)
    {
        $cek = $this->auth_model->register($post);

        if ($cek['email']) {
            $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert">Email sudah terdaftar!</div>');
            redirect('auth');
        } else {
            if ($cek['telepon']) {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert">Nomor telepon sudah terdaftar!</div>');
                redirect('auth');
            } else {
                $charset = "abcdefghijklmnopqrstuvwxyzABCDEFHIJKLMNOPQRSTUVWXYZ123456789";

                $data['id'] = substr(str_shuffle($charset), 0, 9);
                $data['nama'] = $post['nama'];
                $data['email'] = $post['email'];
                $data['telepon'] = $post['telepon'];
                $data['password'] = $post['password2'];
                $data['token'] = random_int(100000, 999999);
                $data['url'] = base64_encode(random_bytes(32));
                $pass = password_hash($data['password'], PASSWORD_DEFAULT);

                $user = array(
                    'id' => $data['id'],
                    'nama' => htmlspecialchars($data['nama'], true),
                    'email' => htmlspecialchars($data['email'], true),
                    'telepon' => $data['telepon'],
                    'password' => $pass,
                    'foto_profile' => 'default.png',
                    'time_reg' => date("h:i:sa"),
                    'tgl_reg' => date('Y-m-d'),
                    'role' => 2,
                    'status' => 2,
                    'token' => $data['token'],
                    'url' => $data['url']
                );

                $tokenect = array(
                    'id_user' => $data['id'],
                    'token' => $data['token'],
                    'url' => $data['url'],
                    'date' => date('Y-m-d'),
                    'time' => date("h:i:sa")
                );

                $this->_sendemailregist($user, $tokenect);
                $this->auth_model->dataregister($user);
                $this->auth_model->activatecode($tokenect);
                $this->session->set_userdata('id', $data['id']);
                redirect('auth');
            }
        }
    }


    public function _sendemailregist($user, $tokenect)
    {
        $config = $this->_emailparam();

        $this->email->initialize($config);

        // var_dump($isiemail['url']);
        // die;
        $isiemail = array(
            'url' => $tokenect['url'],
            'token' => $tokenect['token'],
            'nama' => $user['nama'],
            'id' => $user['id']
        );

        // $data['link'] = base_url() . 'auth/verify?email=' . $user['id'] . '&token=' . urlencode($tokenect['url']);
        $isi = $this->load->view('auth/emailregist', $isiemail, TRUE);

        // $code = $this->load->view('auth/emailregist', $isiemail);

        $this->email->from('contact@klepon.online', 'Klepon Pramuka Unib');
        $this->email->to($user['email']);
        $this->email->subject('Account Verification');
        $this->email->message($isi);

        if ($this->email->send()) {
            return true;
        }
    }

    public function resendemailregist()
    {
        aktif_cek();
        $user = $this->auth_model->idsession();
        $data['token'] = random_int(100000, 999999);
        $data['url'] = base64_encode(random_bytes(32));
        $this->auth_model->resendemailregist($data);
        $this->_resendemailregist($data, $user);
        redirect('auth/aktivasi');
    }

    private function _resendemailregist($data, $user)
    {
        $config = $this->_emailparam();

        $this->email->initialize($config);

        // var_dump($isiemail['url']);
        // die;
        $isiemail = array(
            'url' => $data['url'],
            'token' => $data['token'],
            'nama' => $user['nama'],
            'id' => $user['email']
        );

        // $data['link'] = base_url() . 'auth/verify?email=' . $user['id'] . '&token=' . urlencode($tokenect['url']);
        $isi = $this->load->view('auth/emailregist', $isiemail, TRUE);

        // $code = $this->load->view('auth/emailregist', $isiemail);

        $this->email->from('contact@klepon.online', 'Klepon Pramuka Unib');
        $this->email->to($user['email']);
        $this->email->subject('Account Verification');
        $this->email->message($isi);

        if ($this->email->send()) {
            return true;
        }
    }

    private function _emailparam()
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'sipoponprabu@gmail.com',
            'smtp_pass' => '0200102002',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        return $config;
    }

    public function verifikasi()
    {
        $get = $this->input->get();
        $this->auth_model->urlregist($get);
        redirect('auth');
    }

    public function aktivasi()
    {
        aktif_cek();
        $this->form_validation->set_rules('token', 'Token', 'required|trim');

        if ($this->form_validation->run() == false) {
            // view activation page
            $data['judul'] = 'Aktivasi Akun - KLEPON PRAMUKA UNIB';
            $this->load->view('auth/head', $data);
            $this->load->view('auth/aktivasi');
            $this->load->view('auth/foot');
        } else {
            $post = $this->input->post();
            $data = $this->auth_model->idsession();
            if ($data['token'] == $post['token']) {
                $this->auth_model->aktivasi();
                login_cek();
            } else {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-red" role="alert">Token yang anda masukan salah.</div>');
                login_cek();
            }
        }
    }

    public function login()
    {

        login_cek();
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login - KLEPON PRAMUKA UNIB';
            $this->load->view('auth/head', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/foot');
        } else {
            $post = $this->input->post();
            $user = $this->auth_model->login($post);

            if ($user) {
                if (password_verify($post['password'], $user['password'])) {
                    if ($user['status'] == 1) {
                        if ($user['role'] == 1) {
                            $this->session->set_userdata('id', $user['id']);
                            redirect('Admin');
                        } else if ($user['role'] == 2) {
                            $this->session->set_userdata('id', $user['id']);
                            redirect('Peserta');
                        }
                    } else if ($user['status'] == 2) {
                        $this->session->set_userdata('id', $user['id']);
                        redirect('auth/login');
                    }
                } else {
                    $this->session->set_flashdata('pesan_error', '<div class="alert alert-red text-center" role="alert">Email atau password salah.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-red text-center" role="alert">Email atau password salah.</div>');
                redirect('auth/login');
            }
        }
    }

    public function lupapassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Lupa Password - KLEPON PRAMUKA UNIB';
            $this->load->view('auth/head', $data);
            $this->load->view('auth/lupapassword');
            $this->load->view('auth/foot');
        } else {
            $email = $this->input->post('email');
            $cekemail = $this->auth_model->cekemail($email);
            if ($cekemail) {
            } else {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-red text-center" role="alert">Yaaah emailnya ga ada.</div>');
                redirect('auth/luppassword');
            }
        }
    }

    public function error_404()
    {
        $this->load->view('auth/404');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('telepon');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id');
        redirect('auth/login');
    }
}
