<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table         = 'absensi';
    protected $primaryKey    = null;
    protected $allowedFields = [
        'id_akademik_santri',
        'id_mapel_kelas',
        'tanggal',
        'status'
    ];

    public $incrementing     = false;
}
