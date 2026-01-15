<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class System extends Controller
{
    public function ping()
    {
        try {
            Database::connect()->query('SELECT 1');
            return $this->response->setJSON([
                'status' => 'online'
            ]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'offline'
            ]);
        }
    }
}
