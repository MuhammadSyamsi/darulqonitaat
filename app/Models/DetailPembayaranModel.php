<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPembayaranModel extends Model
{
    protected $table         = 'detail_pembayaran';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'id_pembayaran',
        'id_kewajiban',
        'nominal'
    ];
}
