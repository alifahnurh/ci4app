<?php

namespace App\Controllers;

use App\Models\GrafikModel;

class Grafik extends BaseController
{
    public function index()
    {
        $grafik = new GrafikModel;
        $data = [
            'grafik' => $grafik->findAll()
        ];
        return view('grafik/index', $data);
    }
    public function getData(){
      try {
        $grafik = (new GrafikModel())->findAll();
        $this->request->setHeader('Accept', 'application/json');
        return $this->response->setJSON([
          'success' => true,
          'message' => 'Sukses Mendapatkan Data',
          'data' => $grafik
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
