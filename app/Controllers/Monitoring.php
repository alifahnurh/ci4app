<?php

namespace App\Controllers;

use App\Models\MonitoringModel;

use Dompdf\Dompdf;

class Monitoring extends BaseController
{

    public function index()
    {
       $monitoring = new MonitoringModel();
       $data = [
           'monitoring' => $monitoring->findAll(),
            'db' => $monitoring->autodelete() 
       ];
        return view('monitoring/index', $data);
    }

    // public function autodelete()
    // {
    //     $monitoring = new MonitoringModel();
    //     $data = [
    //         'db' => $monitoring->autodelete() 
    //     ];
    //     return view('monitoring/index', $data);
    // }

    public function exportpdf()
    {
        $monitoring = new MonitoringModel();
        $data = [
            'monitoring' => $monitoring->findAll()
        ];
        $html = view('monitoring/exportpdf', $data);

        // $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);

        // //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $pdf->SetMargins(10, 3, 10);

        // // set auto page breaks
        // // $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // $pdf->SetAutoPageBreak(TRUE, 15);


        // // add a page
        // $pdf->AddPage();

        // // output the HTML content
        // $pdf->writeHTML($html);

        // $this->response->setContentType('application/pdf');

        // //Close and output PDF document
        // $pdf->Output('example_006.pdf', 'I');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Laporan Simoka.pdf');
    }

    public function getData()
    {
        try {
            $utama = (new MonitoringModel())->findAll();
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

    public function email()
    {
        $email = \Config\Services::email();

        $email->setFrom('simoka.agroabadi@gmail.com', 'simoka agroabadi');
        $email->setTo('simoka.agroabadi@gmail.com');

        $email->setSubject('Notifikasi');
        $email->setMessage("<h1>Notifikasi</h1><p>Kadar Gas Amonia melebihi standar batas</p>");

        $email->send();
       
       
    }

}