<?php

function peserta_cek()
{
    $Peserta = get_instance();
    $role = $Peserta->Peserta_model->aksespeserta();
    if ($role != 2) {
        show_404();
    }
}

function sum()
{

    $kelepon = get_instance();

    $log = $kelepon->Peserta_model->getlogid();

    $sum = 0;
    foreach ($log as $biaya) {
        $sum += str_replace(',', '', $biaya['biaya']);
    }

    return $sum;
}

function cek_status()
{
    $kelepon = get_instance();

    $data = $kelepon->Peserta_model->get_pembayaran();
    if ($data) {
        $log = $data['status_payment'];
    } else {
        $log = 0;
    }

    return $log;
}
