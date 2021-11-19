<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    public function api()
    {
        // Ambil data JSON
        $json = file_get_contents('php://input');

        // Ambil callback signature
        $callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE'])
            ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE']
            : '';

        // Isi dengan private merchant key anda
        $privateKey = 'Dsut2-rCiAR-6kwMu-9uBB2-MZEXz';

        // Generate signature untuk dicocokkan dengan X-Callback-Signature
        $signature = hash_hmac('sha256', $json, $privateKey);

        // Validasi signature
        if ($callbackSignature !== $signature) {
            die('Invalid signature'); // signature tidak valid, hentikan proses
        }

        $data = json_decode($json);

        // Hentikan proses jika callback event-nya bukan payent_status
        if ('payment_status' !== $_SERVER['HTTP_X_CALLBACK_EVENT']) {
            die('Invalid callback event, no action was taken');
        }

        $merchantRef = 'REFF';
        $totalAmount = 'PEMBAYARAN';

        switch ($data->status) {
                // Pembayaran sukses, lanjutkan proses di sistem anda dengan
                // mengupdate status transaksi di database menjadi sukses, contoh:
            case 'PAID':
                //    
                echo json_encode(['success' => true]);
                break;

            case 'EXPIRED':
                // alurnya disini
                echo json_encode(['success' => true]);
                break;

            case 'FAILED':
                // alurnya disini
                echo json_encode(['success' => true]);
                break;

            default:
                die('Unrecognized payment status');
                break;
        }
    }
}
