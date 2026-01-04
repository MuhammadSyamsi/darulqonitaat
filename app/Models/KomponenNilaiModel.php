<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenNilaiModel extends Model
{
    protected $table         = 'komponen_nilai';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nama', 'bobot'];

    protected $useTimestamps = true;
}
