<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SantriModel;

class SanrtiApi extends BaseController
{
    protected $santri;

    public function __construct()
    {
        $this->santri = new SantriModel();
    }

    public function store()
    {
        $data = $this->request->getJSON(true);

        if ($data['nama']) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Nama wajib diisi'
            ]);
        }

        $today = date('Y-m-d');
        $prefix = date('Ym'); // YYYYMM

        // hitung santri yang dibuat hari ini
        $countToday = $this->santri
            ->where('DATE(created_at)', $today)
            ->countAllResults();

        $urutan = str_pad($countToday + 1, 4, '0', STR_PAD_LEFT);
        $nis = $prefix . $urutan; // 10 digit

        $this->santri->insert([
            'nis'           => $nis,
            'nama'          => $data['nama'],
            'asal_sekolah'  => $data['asal_sekolah'] ?? null,
            'wali'          => $data['wali'] ?? null,
            'nomor_hp'      => $data['hp'] ?? null,
        ]);

        return $this->response->setJSON([
            'success' => true,
            'nis'     => $nis
        ]);
    }

    public function suggest()
    {
        $keyword = $this->request->getGet('q');

        if (!$keyword || strlen($keyword) < 2) {
            return $this->response->setJSON([]);
        }

        $model = new SantriModel();

        return $this->response->setJSON(
            $model->searchByName($keyword)
        );
    }

    public function check()
    {
        $nama = trim($this->request->getPost('nama'));

        $model = new SantriModel();

        return $this->response->setJSON([
            'valid' => $model->existsByName($nama)
        ]);
    }
}
