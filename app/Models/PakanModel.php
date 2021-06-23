<?php

namespace App\Models;

use CodeIgniter\Model;

class PakanModel extends Model
{
    protected $table         = 'tbl_pakan';
    protected $primaryKey = 'no';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_pakan', 'stok'];
}
