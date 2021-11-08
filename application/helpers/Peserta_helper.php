<?php

function peserta_cek()
{
    $Peserta = get_instance();
    $role = $Peserta->Peserta_model->aksespeserta();
    if ($role != 2) {
        show_404();
    }
}
