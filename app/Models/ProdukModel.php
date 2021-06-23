<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tbl_produk';
    protected $primaryKey = 'no';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_produk', 'stok_produk'];
}
