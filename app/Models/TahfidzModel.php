<?php

namespace App\Models;

use CodeIgniter\Model;

class TahfidzModel extends Model
{
    protected $table         = 'tahfidz';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'id_akademik_santri',
        'tanggal',
        'surat',
        'ayat_dari',
        'ayat_sampai',
        'halaman',
        'juz',
        'keterangan'
    ];

    protected $useTimestamps = true;
}
