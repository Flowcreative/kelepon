<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('All_model');
    }
}
