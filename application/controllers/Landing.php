<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function index()
    {

        $data['tittle'] = 'KLEPON - Pramuka UNIB';
        $this->load->view('landing/head', $data);
        $this->load->view('landing/header');
        $this->load->view('landing/home');
        $this->load->view('landing/foot');
    }
}
