<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table         = 'tag';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name_tag'];

    protected $useTimestamps = true;
}
