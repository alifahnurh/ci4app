<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Home | Latihan Web'
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'tittle' => 'About | Latihan Web'
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'tittle' => 'Contact',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. Kuncung',
                    'kota' => 'Semarang'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Banjar Sari',
                    'kota' => 'Bandung'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
