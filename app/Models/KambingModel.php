<?php

namespace App\Models;

use CodeIgniter\Model;

class KambingModel extends Model
{
    protected $table      = 'tbl_kambing';
    protected $primaryKey = 'no';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kambing', 'jns_kelamin', 'tgl_lahir', 'panjang', 'tinggi', 'tinggi', 'berat', 'lingkar_dada'];
}
