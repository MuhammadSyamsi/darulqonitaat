<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'totalSantri' => 120,
            'totalTagihan' => 35000000,
            'totalLunas' => 28000000,
        ];

        return view('pages/dashboard', $data);
    }
}
