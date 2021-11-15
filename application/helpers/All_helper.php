<?php

function timeline()
{
    $klepon = get_instance();
    $klepon->load->view('all/timeline');
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function infoview()
{
    $kelepon = get_instance();
    $kelepon->load->view('all/info');
}
