<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_model extends CI_Model
{
    public function aksespeserta()
    {
        $id = $this->session->userdata('id');
        if ($id) {
            $user = $this->db->get_where('user', ['id' => $id])->row_array();
            $role = $user['role'];
            return $role;
        }
    }

    public function session()
    {
        $id = $this->session->userdata('id');
        $user = $this->db->get_where('user', ['id' => $id])->row_array();
        return $user;
    }

    // ============================= Data Peserta Model =========================================
    public function getdatadiri()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('datadiri');
        $this->db->where('id_user', $id);
        $this->db->join('user', 'user.id = datadiri.id_user');
        $this->db->join('golongan', 'golongan.idgolongan = datadiri.id_golongan');
        $data = $this->db->get()->row_array();
        // $data = $this->db->get_where('datadiri', ['id_user' => $id])->row_array();
        return $data;
    }

    public function getdatapangkalan()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('datadiri');
        $this->db->where('id_user', $id);
        $this->db->join('datapangkalan', 'datapangkalan.id_pangkalan = datadiri.id_pangkalan');
        $data = $this->db->get()->row_array();
        // $data = $this->db->get_where('datadiri', ['id_user' => $id])->row_array();
        return $data;
    }
    public function cekdatadiri()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('datadiri', ['id_user' => $id])->row_array();
        return $data;
    }

    public function golongan()
    {
        $this->db->order_by('idgolongan', 'asc');
        $data = $this->db->get('golongan')->result_array();
        return $data;
    }

    public function inputdatadiri($data)
    {
        $this->db->insert('datadiri', $data);
    }

    public function editdatadiri($user)
    {
        $id = $this->session->userdata('id');
        $this->db->set($user);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function _editdatadiri($datadiri)
    {
        $id = $this->session->userdata('id');
        $this->db->set($datadiri);
        $this->db->where('id_user', $id);
        $this->db->update('datadiri');
    }

    public function inputdatapangkalan($data)
    {
        $id = $this->session->userdata('id');

        $this->db->set('id_pangkalan', $data['id_pangkalan']);
        $this->db->where('id_user', $id);
        $this->db->update('datadiri');

        $this->db->insert('datapangkalan', $data);
    }

    public function editdatapangkalan($post)
    {
        $this->db->set('nogudep', $post['gudep']);
        $this->db->set('namapangkalan', $post['nama']);
        $this->db->set('kotapangkalan', $post['kota']);
        $this->db->set('provinsipangkalan', $post['provinsi']);
        $this->db->where('id_pangkalan', $post['idpangkalan']);
        $this->db->update('datapangkalan');
    }

    public function uploadfoto($post)
    {
        $id = $this->session->userdata('id');
        $this->db->set('foto', $post);
        $this->db->where('id_user', $id);
        $this->db->update('datadiri');
    }
    public function uploadidentitas($post)
    {
        $id = $this->session->userdata('id');
        $this->db->set('kartu_identitas', $post);
        $this->db->where('id_user', $id);
        $this->db->update('datadiri');
    }

    public function uploadsuratmandat($post)
    {
        $id = $this->session->userdata('id');
        $this->db->set('suratmandat', $post);
        $this->db->where('id_user', $id);
        $this->db->update('datadiri');
    }
    // ============================= end Data Peserta Model =====================================
}
