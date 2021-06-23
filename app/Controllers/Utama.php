<?php

namespace App\Controllers;

use App\Models\UtamaModel;

class utama extends BaseController
{
    public function index()
    {
      $utama = new UtamaModel();
      $data = [
        'utama' => $utama->findAll()
      ];
      return view ('utama/index', $data);
    }
}
