<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SantriModel;
use App\Models\NilaiModel;
use App\Models\MapelModel;
use App\Models\KelasModel;

class Akademik extends Controller
{
    protected $santriModel;
    protected $nilaiModel;
    protected $mapelModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->nilaiModel = new NilaiModel();
        $this->mapelModel = new MapelModel();
        $this->kelasModel = new KelasModel();
    }

    // =================== HALAMAN UTAMA ===================
    public function index()
    {
        return view('component/chat/akademik'); // file view chat akademik
    }

    // =================== GET MESSAGES ===================
    public function getMessages()
    {
        // Dummy messages, nanti bisa diganti ambil dari DB
        $messages = [
            ['id' => 1, 'from' => 'bot', 'text' => 'Selamat datang di Ruang Akademik!'],
            ['id' => 2, 'from' => 'bot', 'text' => 'Ketik "tambah nilai" atau "cek nilai".']
        ];

        return $this->response->setJSON($messages);
    }

    // =================== SEND MESSAGE ===================
    public function sendMessage()
    {
        $input = $this->request->getPost('input');

        $response = '';

        // Simple logic akademik
        if (stripos($input, 'tambah nilai') !== false) {
            $response = 'Silakan pilih santri untuk menambahkan nilai.';
        } elseif (stripos($input, 'cek nilai') !== false) {
            $response = 'Masukkan nama santri untuk melihat nilai.';
        } elseif (stripos($input, 'tambah mapel') !== false) {
            $response = 'Silakan masukkan nama mata pelajaran baru.';
        } elseif (stripos($input, 'tambah kelas') !== false) {
            $response = 'Silakan masukkan nama kelas baru.';
        } else {
            $response = 'Maaf, perintah tidak dikenali. Coba "tambah nilai" atau "cek nilai".';
        }

        return $this->response->setJSON([
            'id' => rand(100,999), // dummy id
            'from' => 'bot',
            'text' => $response
        ]);
    }

    // =================== TAMBAH DATA ===================
    public function addNilai()
    {
        $data = [
            'santri' => $this->santriModel->findAll(),
            'mapel' => $this->mapelModel->findAll(),
        ];
        return view('akademik/form-nilai', $data);
    }

    public function addMapel()
    {
        return view('akademik/form-mapel');
    }

    public function addKelas()
    {
        return view('akademik/form-kelas');
    }
}
