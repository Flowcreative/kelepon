<?php
function login_cek()
{
    $klepon = get_instance();
    $id = $klepon->session->userdata('id');
    $user = $klepon->db->get_where('user', ['id' => $id])->row_array();
    if ($user) {
        if ($user['status'] == 1) {
            if ($user['role'] == 1) {
                redirect('admin');
            } else if ($user['role'] == 2) {
                redirect('Peserta');
            }
        } else {
            redirect('auth/aktivasi');
        }
    }
}

function aktif_cek()
{
    $klepon = get_instance();
    $id = $klepon->session->userdata('id');
    $user = $klepon->db->get_where('user', ['id' => $id])->row_array();
    if ($user) {
        if ($user['status'] == 1) {
            if ($user['role'] == 1) {
                redirect('admin');
            } else if ($user['role'] == 2) {
                redirect('Peserta');
            }
        } else {
        }
    } else {
        redirect('auth');
    }
}

function smtp_email()
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
