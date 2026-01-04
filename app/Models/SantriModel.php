<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $table            = 'santri';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nis','nisn','nama','alamat','asal_sekolah',
        'tempat_lahir','tanggal_lahir','wali','nomor_hp'
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'modified_at';
}
