<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table         = 'nilai';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'id_akademik_santri',
        'id_mapel_kelas',
        'id_komponen_nilai',
        'nilai'
    ];

    protected $useTimestamps = true;
}
