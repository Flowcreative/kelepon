<?php

function admin_cek()
{
    $Admin = get_instance();
    $role = $Admin->Admin_model->aksesadmin();
    if ($role != 1) {
        show_404();
    }
}
