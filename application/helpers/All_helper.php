<?php

function timeline()
{
    $klepon = get_instance();
    $klepon->load->view('all/timeline');
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function infoview()
{
    $kelepon = get_instance();
    $kelepon->load->view('all/info');
}



function hitung($get)
{
    $apiKey = 'DEV-VJFfhlihKIfBEjCi4S9wn2M6EkUuQhFsfqQoVB0t';

    $payload = [
        'code'    => $get['kode_chanel'],
        'amount'    => $get['total']
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/fee-calculator?' . http_build_query($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
        CURLOPT_FAILONERROR    => false
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    // echo empty($error) ? $response : $error;

    // $biaya = $response['data'];
    $aa = json_decode($response);
    if (empty($error)) {
        $pes = $aa->data[0]->total_fee->merchant;
    } else {
        $pes = 'error min ' . $error;
    }
    return $pes;
}


function regTripay($post, $log)
{
    $apiKey       = 'DEV-VJFfhlihKIfBEjCi4S9wn2M6EkUuQhFsfqQoVB0t';
    $privateKey   = 'Dsut2-rCiAR-6kwMu-9uBB2-MZEXz';
    $merchantCode = 'T7825';
    $merchantRef  = $post['id'];
    $amount       = $post['total'];

    $data = [
        'method'         => $post['kode_chanel'],
        'merchant_ref'   => $merchantRef,
        'amount'         => $amount,
        'customer_name'  => $post['nama'],
        'customer_email' => $post['email'],
        'customer_phone' => $post['telepon'],
        'order_items'    => [
            [
                'sku'         => 'KELEPON',
                'name'        => 'Pramuka Universitas Bengkulu',
                'price'       => $post['total'],
                'quantity'    => 1,
                'product_url' => 'https://tokokamu.com/product/nama-produk-1',
                'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
            ],
        ],
        'return_url'   => 'http://192.168.0.114/kelepon/peserta/paymentstatus',
        'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
        'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
        CURLOPT_FAILONERROR    => false,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($data)
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    $aa = json_decode($response);
    if (empty($error)) {
        $url = $aa->data->checkout_url;
    } else {
        $url = 'error min ' . $error;
    }
    return $url;
}
