<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table      = 'tbl_obat';
    protected $primaryKey = 'no';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_obat', 'stok_obat', 'keterangan'];
}
