<?php

namespace App\Controllers;

use App\Models\MonitoringModel;

class Monitoring extends BaseController
{

    public function index()
    {
       $monitoring = new MonitoringModel();
       $data = [
           'monitoring' => $monitoring->findAll()
       ];
        return view('monitoring/index', $data);
    }

    public function email()
    {
        $email = \Config\Services::email();

        $email->setFrom('simoka.agroabadi@gmail.com', 'simoka agroabadi');
        $email->setTo('simoka.agroabadi@gmail.com');

        $email->setSubject('Notifikasi');
        $email->setMessage("<h1>Notifikasi</h1><p>Kadar Gas Amonia melebihi standar batas</p>" );

        $email->send();
    }
}
