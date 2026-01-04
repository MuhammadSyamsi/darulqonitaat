<?php

namespace App\Models;

use CodeIgniter\Model;

class AkademikSantriModel extends Model
{
    protected $table         = 'akademik_santri';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'id_santri',
        'id_tahun_kelas',
        'status',
        'tanggal_masuk',
        'tanggal_keluar'
    ];

    protected $useTimestamps = true;
}
