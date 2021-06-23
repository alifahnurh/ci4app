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
}
