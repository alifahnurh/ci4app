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

    public function getData(){
      try {
        $utama = (new UtamaModel())->findAll();
        $this->request->setHeader('Accept', 'application/json');
        return $this->response->setJSON([
          'success' => true,
          'message' => 'Sukses Mendapatkan Data',
          'data' => $utama
        ]);
      } catch (Exception $e) {
        $this->request->setHeader('Accept', 'application/json');
        return $this->response->setJSON([
          'success' => false,
          'message' => $e->getMessage(),
          'data' => null
        ]);
      }
    }
}
