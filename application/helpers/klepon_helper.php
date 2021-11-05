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

function smtpemail()
{

    // $klepon = get_instance();
    // $klepon->load->helper('email');

    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.hostinger.com',
        'smtp_user' => 'admin@kelepon.online',
        'smtp_pass' => 'Acouster02',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
    ];
    return $config;
}

function timeline()
{
    $klepon = get_instance();
    $klepon->load->view('admin/header');
    $klepon->load->view('admin/timeline');
}
