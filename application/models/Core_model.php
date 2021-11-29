<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Core_model extends CI_Model
{
    public function addmail($data){ 
    	$this->db->insert('emailtpm', $data);
    	return;
    }

    public function getmail(){
        $this->db->select('*');
      	$this->db->from('emailtpm');
      	$query = $this->db->get();
      	return $query;
    }
}
