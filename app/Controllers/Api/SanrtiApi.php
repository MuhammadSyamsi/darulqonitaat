<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SantriModel;

class SantriApi extends BaseController
{
    protected $santriModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
    }

    public function store()
    {
        $data = $this->request->getJSON(true);

        $rules = [
            'nama' => 'required|min_length[3]',
            'nis'  => 'required|is_unique[santri.nis]',
        ];

        if (! $this->validateData($data, $rules)) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }

        $this->santriModel->insert([
            'nis' => $data['nis'],
            'nama' => $data['nama'],
            'alamat' => $data['alamat'] ?? null,
            'wali' => $data['wali'] ?? null,
        ]);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Santri berhasil ditambahkan'
        ]);
    }

    public function validateBubble()
    {
        $step = $this->request->getPost('step');

        return $this->response->setJSON([
            'next_step' => match ($step) {
                'nama' => 'nis',
                'nis' => 'alamat',
                default => 'done'
            }
        ]);
    }
}
