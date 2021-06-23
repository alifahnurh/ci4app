<?php

namespace App\Models;

use CodeIgniter\Model;

class DamonModel extends Model
{
    protected $table = 'damon';
    protected $primaryKey = 'id';
    protected $allowedFields = ['suhu', 'kelembapan', 'amonia'];
}
