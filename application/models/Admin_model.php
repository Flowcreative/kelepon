<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function aksesadmin()
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

    // ==================User list Area ===========================
    public function getuser()
    {
        $this->db->order_by('role', 'asc');
        $this->db->order_by('tgl_reg', 'asc');
        $this->db->order_by('time_reg', 'asc');
        return $this->db->get('user')->result_array();
    }

    public function adduser($data)
    {
        $this->db->insert('user', $data);
    }

    public function userdetail($id)
    {
        $detail = $this->db->get_where('user', ['id' => $id])->row_array();
        return $detail;
    }

    public function edituser($post)
    {
        $data = array(
            'id' => $post['id'],
            'nama' => $post['nama'],
            'telepon' => $post['telepon'],
            'email' => $post['email'],
            'role' => $post['role'],
            'status' => $post['status']
        );

        $this->db->set($data);
        $this->db->where('id', $post['id']);
        $this->db->update('user');
    }

    public function deleteuser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    // ==================end User list Area ===========================

    // ==================Data diri peserta Area ===========================
    public function getdatadiri()
    {
        $this->db->select('*');
        $this->db->from('datadiri');
        $this->db->order_by('id_golongan', 'asc');
        $this->db->join('user', 'user.id = datadiri.id_user');
        $this->db->join('golongan', 'golongan.idgolongan = datadiri.id_golongan');
        $this->db->join('datapangkalan', 'datapangkalan.id_pangkalan = datadiri.id_pangkalan');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getdetaildatadiri($uri)
    {
        $this->db->select('*');
        $this->db->from('datadiri');
        $this->db->order_by('id_golongan', 'asc');
        $this->db->join('user', 'user.id = datadiri.id_user');
        $this->db->join('golongan', 'golongan.idgolongan = datadiri.id_golongan');
        $this->db->join('datapangkalan', 'datapangkalan.id_pangkalan = datadiri.id_pangkalan');
        $this->db->where('id_user', $uri);
        $data = $this->db->get()->row_array();
        return $data;
    }
    // ================== end Data diri peserta Area ===========================

    // ================== Input Mata Lomba Area ===============================

    public function inputlomba($data)
    {
        $this->db->insert('lomba', $data);
    }

    public function editlomba($id, $data)
    {


        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('lomba');
    }

    public function deletelomba($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('lomba');
    }

    public function getlistlomba()
    {
        $this->db->select('*');
        $this->db->from('lomba');
        $this->db->order_by('id_golongan', 'asc');
        $this->db->join('golongan', 'golongan.idgolongan = lomba.id_golongan');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getlomba($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('lomba');
        $this->db->order_by('id_golongan', 'asc');
        $this->db->join('golongan', 'golongan.idgolongan = lomba.id_golongan');
        $data = $this->db->get()->row_array();
        return $data;
    }
    // ================== end Input Mata Lomba Area ===========================

    // ======================= Pendaftar Lomba peserta =================================
    public function pesertasiaga()
    {
    }

    // ======================= end Pendaftar Lomba peserta =============================


    public function getallgolongan()
    {
        $golongan = $this->db->get('golongan')->result_array();
        return $golongan;
    }
}
