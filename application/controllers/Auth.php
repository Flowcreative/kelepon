<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
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
        $cek = $this->Auth_model->register($post);

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
                $this->Auth_model->dataregister($user);
                $this->Auth_model->activatecode($tokenect);
                $this->session->set_userdata('id', $data['id']);
                redirect('auth/login');
            }
        }
    }


    public function _sendemailregist($user, $tokenect)
    {
        $config = smtpemail();

        $this->email->initialize($config);



        $isi = $this->_emailsend($user, $tokenect);

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
        $user = $this->Auth_model->idsession();
        $data['token'] = random_int(100000, 999999);
        $data['url'] = base64_encode(random_bytes(32));
        $this->Auth_model->resendemailregist($data);
        $this->Auth_model->setemailrequest($user);
        $this->_resendemailregist($data, $user);
        redirect('auth/aktivasi');
    }

    private function _resendemailregist($data, $user)
    {


        $config = smtpemail();

        $this->email->initialize($config);

        $isi = $this->_emailsend($user, $data);


        $this->email->from('contact@klepon.online', 'Klepon Pramuka Unib');
        $this->email->to($user['email']);
        $this->email->subject('Account Verification');
        $this->email->message($isi);

        if ($this->email->send()) {
            return true;
        }
    }



    public function verifikasi()
    {
        $get = $this->input->get();
        $this->Auth_model->urlregist($get);
        redirect('auth/login');
    }

    public function aktivasi()
    {
        aktif_cek();
        $this->form_validation->set_rules('token', 'Token', 'required|trim');
        if ($this->form_validation->run() == false) {
            // view activation page
            $data['req'] = $this->Auth_model->cekrequest();
            $data['judul'] = 'Aktivasi Akun - KLEPON PRAMUKA UNIB';
            $this->load->view('auth/head', $data);
            $this->load->view('auth/aktivasi', $data);
            $this->load->view('auth/foot');
        } else {
            $post = $this->input->post();
            $data = $this->Auth_model->idsession();
            if ($data['token'] == $post['token']) {
                $this->Auth_model->aktivasi();
                login_cek();
            } else {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-red" role="alert">Token yang anda masukan salah.</div>');
                login_cek();
            }
        }
    }

    public function aktivasiemailrequestdelete()
    {
        $this->Auth_model->deleterequest();
        redirect('auth/aktivasi');
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
            $user = $this->Auth_model->login($post);

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
        $data['judul'] = 'Lupa Password - KLEPON PRAMUKA UNIB';
        $this->load->view('auth/head', $data);
        $this->load->view('auth/lupapassword');
        $this->load->view('auth/foot');
    }

    public function carilupapassword()
    {
        $email = $this->input->post('email');
        $cekemail = $this->Auth_model->cekemail($email);
        $data['token'] = random_int(100000, 999999);
        $data['url'] = base64_encode(random_bytes(32));
        if ($cekemail) {
            $this->Auth_model->lupapassword($data, $cekemail);
            $this->_sendemaillupapassword($data, $cekemail);
            redirect('auth/konfirmasilupa/?mail=' . $cekemail['email']);
        } else {
            $this->session->set_flashdata('pesan_error', '<div class="alert alert-red text-center" role="alert">Yaaah emailnya ga ada.</div>');
            redirect('auth/carilupapassword');
        }
    }

    public function konfirmasilupa()
    {
        $mail = $this->input->get('mail');
        $data['email'] = $mail;
        $data['req']   = $this->Auth_model->cekreqlupa($mail);
        $data['judul'] = 'Konfirmasi Lupa Password - KLEPON PRAMUKA UNIB';
        $this->load->view('auth/head', $data);
        $this->load->view('auth/lupapasswordkonfirmasi', $data);
        $this->load->view('auth/foot');
    }

    private function _sendemaillupapassword($data, $cekemail)
    {
        $config = smtpemail();

        $this->email->initialize($config);


        $isi = $this->_emailsendforgot($data, $cekemail);

        $this->email->from('contact@klepon.online', 'Klepon Pramuka Unib');
        $this->email->to($cekemail['email']);
        $this->email->subject('Password Recovery');
        $this->email->message($isi);

        if ($this->email->send()) {
            return true;
        }
    }

    public function konfirmasilupapassword()
    {
        $kode = $this->input->post();
        $hasil = $this->Auth_model->checkrecovery($kode);
        if ($hasil) {
            $data['judul'] = 'Ganti Password - KLEPON PRAMUKA UNIB';
            $this->load->view('auth/head', $data);
            $this->load->view('auth/lupapasswordganti', $kode);
            $this->load->view('auth/foot');
        } else {
            $this->session->set_flashdata('pesan_error', '<div class="alert alert-red text-center" role="alert">Kok salah kodenya.</div>');
            redirect('auth/konfirmasilupapassword');
        }
    }

    public function lupapasswordganti()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $kode = $this->input->post();
            $data['judul'] = 'Ganti Password - KLEPON PRAMUKA UNIB';
            $this->load->view('auth/head', $data);
            $this->load->view('auth/lupapasswordganti', $kode);
            $this->load->view('auth/foot');
        } else {
            $post = $this->input->post();
            $this->Auth_model->gantipassword($post);
            redirect('auth/login');
        }
    }
    public function resendemaillupa()
    {
        $email = $this->input->get('mail');
        $cekemail = $this->Auth_model->cekemail($email);

        $data['token'] = random_int(100000, 999999);
        $data['url'] = base64_encode(random_bytes(32));
        $this->Auth_model->resendemaillupa($data, $email);
        $this->Auth_model->setemailrequestlupa($cekemail);
        $this->_resendemaillupa($data, $cekemail);
        redirect('auth/konfirmasilupa/?mail=' . $email);
    }

    private function _resendemaillupa($data, $cekemail)
    {
        $config = smtpemail();

        $this->email->initialize($config);


        $isi = $this->_emailsendforgot($data, $cekemail);

        $this->email->from('contact@klepon.online', 'Klepon Pramuka Unib');
        $this->email->to($cekemail['email']);
        $this->email->subject('Password Recovery');
        $this->email->message($isi);

        if ($this->email->send()) {
            return true;
        }
    }

    public function lupaemailrequestdelete()
    {
        $email = $this->input->get('email');
        $this->Auth_model->luparequestdelete($email);
        redirect('auth/konfirmasilupa/?mail=' . $email);
    }

    private function _emailsend($user, $data)
    {
        header("Content-type: text/plain");
        echo "Halo " . $user['nama'] . ", silahkan masukan kode di bawah ini untuk mengaktifkan akun anda.";
        echo  "\r\n";
        echo "Kode verifikasi: " . $data['token'];
    }

    private function _emailsendforgot($data, $cekemail)
    {
        header("Content-type: text/plain");
        echo "Halo " . $cekemail['nama'] . ", silahkan masukan kode di bawah ini untuk mengganti password anda.";
        echo  "\r\n";
        echo "Kode verifikasi: " . $data['token'];
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
        redirect('landing');
    }
}
