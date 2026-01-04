<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunAjaranModel extends Model
{
    protected $table         = 'tahun_ajaran';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'aktif'
    ];

    protected $useTimestamps = true;
}
