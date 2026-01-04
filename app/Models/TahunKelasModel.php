<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunKelasModel extends Model
{
    protected $table         = 'tahun_kelas';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'id_kelas',
        'id_tahun_ajaran',
        'id_guru'
    ];

    protected $useTimestamps = true;
}
