<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SantriModel;

class SanrtiApi extends BaseController
{
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
