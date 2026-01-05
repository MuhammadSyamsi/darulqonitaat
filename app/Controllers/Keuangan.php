<?php

namespace App\Controllers;

class Keuangan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Keuangan Santri'
        ];

        return view('keuangan/index', $data);
    }

    public function pembayaran()
    {
        return view('keuangan/pembayaran', [
            'title' => 'Pembayaran'
        ]);
    }
}
