<?php

namespace App\Controllers;

use App\Models\SantriModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $santriModel = new SantriModel();

        $data = [
            'title'       => 'Dashboard',
            'santri' => $santriModel, // TRUE jika belum ada data
        ];

        return view('component/chat/santri', $data);
    }
}
