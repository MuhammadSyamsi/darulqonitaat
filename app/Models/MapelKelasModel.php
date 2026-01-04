<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelKelasModel extends Model
{
    protected $table         = 'mapel_kelas';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'id_tahun_kelas',
        'id_mapel',
        'id_guru'
    ];

    protected $useTimestamps = true;
}
