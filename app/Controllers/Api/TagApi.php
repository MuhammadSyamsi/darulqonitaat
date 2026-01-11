<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table = 'tag';
    protected $allowedFields = ['name'];
    protected $useTimestamps = true;
}
