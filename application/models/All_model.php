<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_model extends CI_Model
{
    public function invoice($data)
    {
        $invoice = array(
            'reference' => $data->reference,
            'merchant_ref' => $data->merchant_ref,
            'payment_method' => $data->payment_method,
            'payment_method_code' => $data->payment_method_code,
            'total_amount' => $data->total_amount,
            'fee_merchant' => $data->fee_merchant,
            'fee_customer' => $data->fee_customer,
            'total_fee' => $data->total_fee,
            'amount_received' => $data->amount_received,
            'is_closed_payment' => $data->is_closed_payment,
            'status' => $data->status,
            'paid_at' => $data->paid_at,
            'note' => $data->note
        );
        $merchant_ref = $data->merchant_ref;
        $data = $this->db->get_where('invoice', ['merchant_ref' => $merchant_ref])->row_array();

        if (isset($data)) {
            $this->_invoiceupdate($invoice, $merchant_ref);
        } else {
            $this->_invoicecreate($invoice);
        }
    }

    public function invoiceadmin($data)
    {
        $invoice = array(
            'reference' => 'Admin Kestari Prabu',
            'merchant_ref' => $data['iduser'],
            'payment_method' => 'Offline sama Si POPON',
            'payment_method_code' => 'KELEPON',
            'total_amount' => $data['total'],
            'fee_merchant' => 'free',
            'fee_customer' => 'free',
            'total_fee' => 'free',
            'amount_received' => $data['total'],
            'is_closed_payment' => 1,
            'status' => $data['status'],
            'paid_at' => time(),
            'note' => 'Terimakasih 😁'
        );
        $merchant_ref = $data['iduser'];
        $data = $this->db->get_where('invoice', ['merchant_ref' => $merchant_ref])->row_array();

        if (isset($data)) {
            $this->_invoiceupdate($invoice, $merchant_ref);
        } else {
            $this->_invoicecreate($invoice);
        }
    }


    private function _invoicecreate($invoice)
    {
        $this->db->insert('invoice', $invoice);
    }

    private function _invoiceupdate($invoice, $id)
    {
        $this->db->set($invoice);
        $this->db->where('merchant_ref', $id);
        $this->db->update('invoice');
    }

    public function switchstatus($data, $status)
    {
        $this->db->set('status_payment', $status);
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('payment');
    }

    public function deleteurl($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('paymenturl');
    }
}
