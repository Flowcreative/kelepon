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
        $sum += str_replace(',', '', $biaya['biaya'] * $biaya['peserta']);
    }

    return $sum;
}

function cek_status()
{
    $kelepon = get_instance();

    $data = $kelepon->Peserta_model->get_pembayaran();
    if (!empty($data)) {
        $log = $data['status_payment'];
    } else {
        $log = 0;
    }

    return $log;
}


// function cek_bayar()
// {
//     $kelepon = get_instance();
//     $data =  $kelepon->Peserta_model->get_pembayaran();

//     if (empty($data)) {
//         // redirect('peserta/matalombadipilih');
//     } else {
//         if ($data['status_payment'] == 1) {
//             redirect('peserta/paymentstatus');
//         } elseif ($data['status_paymet'] == 2) {
//             redirect('peserta/paymentstatus');
//         } elseif ($data['status_paymet'] == 3) {
//             redirect('peserta/paymentstatus');
//         } else {
//             redirect('peserta/invoice');
//         }
//     }
// }

function get_bayar()
{
    $kelepon = get_instance();
    $data =  $kelepon->Peserta_model->get_bayar();

    return $data;
}
