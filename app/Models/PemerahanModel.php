<?php

namespace App\Models;

use CodeIgniter\Model;

class PemerahanModel extends Model
{
    protected $table      = 'tbl_pemerahan';
    protected $primaryKey = 'no';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kambing', 'hsl_pemerahan', 'tgl_pemerahan', 'wkt_pemerahan'];
}
