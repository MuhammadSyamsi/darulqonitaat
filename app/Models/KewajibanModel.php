<?php

namespace App\Models;

use CodeIgniter\Model;

class KewajibanModel extends Model
{
    protected $table         = 'kewajiban';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'id_santri',
        'jenis',
        'periode',
        'nominal',
        'jatuh_tempo'
    ];

    protected $useTimestamps = true;
}
