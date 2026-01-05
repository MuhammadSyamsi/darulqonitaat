<?php

namespace App\Controllers;

use App\Models\SantriModel;

class Santri extends BaseController
{
    protected $santriModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Santri',
            'santri' => $this->santriModel->findAll()
        ];

        return view('component/chat/santri', $data);
    }
}
