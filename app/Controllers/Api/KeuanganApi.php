<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class KeuanganApi extends BaseController
{
    public function bayar()
    {
        $data = $this->request->getJSON(true);

        // contoh payload dari bubble chat
        // { santri_id, jenis, nominal }

        if ($data['nominal'] <= 0) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Nominal tidak valid'
            ]);
        }

        // simpan pembayaran (dummy)
        return $this->response->setJSON([
            'status' => true,
            'message' => 'Pembayaran berhasil dicatat'
        ]);
    }
}
