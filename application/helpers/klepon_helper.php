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
