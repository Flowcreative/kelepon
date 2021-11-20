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
    public function getmatalomba()
    {
        $data = $this->getdatadiri();
        $this->db->where('id_golongan', $data['id_golongan']);
        $lomba = $this->db->get('lomba')->result_array();
        return $lomba;
    }

    public function pilihlomba($idlomba)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'id' => time(),
            'id_user' => $id,
            'id_lomba' => $idlomba
        );
        $this->db->insert('log_activity', $data);
        $this->_updatelomba();
    }

    public function matalombapeserta($post)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'id_user' => $id,
            'id_lomba' => $post['idlomba'],
        );

        $this->db->set('peserta', $post['peserta']);
        $this->db->where($data);
        $this->db->update('log_activity');
        $this->_updatelomba();
    }

    public function uploadkarya($post)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'id_user' => $id,
            'id_lomba' => $post['idlomba'],
        );

        $this->db->set('karya', $post['karya']);
        $this->db->where($data);
        $this->db->update('log_activity');
    }

    public function batallomba($idlomba)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'id_user' => $id,
            'id_lomba' => $idlomba
        );
        $this->db->where($data);
        $this->db->delete('log_activity');
        $this->_updatelomba();
    }

    private function _updatelomba()
    {
        $get = $this->get_pembayaran();
        $id = $this->session->userdata('id');
        if ($get) {
            $this->db->where('id_user', $id);
            $this->db->delete('payment');
            $this->_updateurl($id);
        } else {
            $this->_updateurl($id);
        }
    }

    private function _updateurl($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('paymenturl');
    }

    public function uploadpeserta($newimage, $data)
    {
        $id = $this->session->userdata('id');
        $this->db->set('identitas', $newimage);
        $this->db->where('id_user', $id);
        $this->db->where('id_lomba', $data);
        $this->db->update('log_activity');
    }
    // ================================ end Peserta pilih Lomba=====================================

    public function getlog($lom)
    {
        $id = $this->session->userdata('id');
        $this->db->where('id_lomba', $lom);
        $this->db->where('id_user', $id);
        $data = $this->db->get('log_activity')->row_array();

        return $data;
    }

    public function getlogid()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('log_activity');
        $this->db->where('id_user', $id);
        $this->db->join('lomba', 'lomba.id = log_activity.id_lomba');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function countbiaya()
    {
        $id = $this->session->userdata('id');

        $this->db->select_sum('biaya');
        $this->db->from('log_activity');
        $this->db->where('id_user', $id);
        $this->db->join('lomba', 'lomba.id = log_activity.id_lomba');
        $data = $this->db->get()->result_array();

        // $a = $data);
        return $data;
    }

    public function inputtotal($post)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'id' => random_int(1111111, 9999988),
            'id_user' => $id,
            'total' => $post['total'],
            'status_payment' => 0
        );
        $this->db->insert('payment', $data);
    }

    public function get_pembayaran()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('id_user', $id);
        $data = $this->db->get()->row_array();

        return $data;
    }

    public function get_chanel()
    {
        $this->db->order_by('chane', 'asc');
        $data = $this->db->get('paymentmethod')->result_array();
        return $data;
    }

    public function inputchanel($chanel)
    {
        $id = $this->session->userdata('id');
        $chan = $this->db->get_where('paymentmethod', ['id' => $chanel])->row_array();

        $data = array(
            'chanel' => $chan['chanel'],
            'admin' => $chan['admin'],
            'kode_chanel' => $chan['kode']
        );

        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('payment');
    }

    public function paymenturl($url)
    {
        $id = $this->session->userdata('id');

        $data = array(
            'id_user' => $id,
            'url' => $url
        );

        $this->db->insert('paymenturl', $data);
    }

    public function get_bayar()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('paymenturl', ['id_user' => $id])->row_array();

        return $data;
    }
}
