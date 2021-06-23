<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DamonModel;


class Damon extends ResourceController
{
    // protected $modelName = 'App\Models\DamonModel';
    // protected $format    = 'json';
    use ResponseTrait;

    // get all data
    public function index()
    {
        $model = new DamonModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    //get single monitoring
    public function show($id = null)
    {
        $model = new DamonModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id ' .$id);
        }
    }

    //create data
    public function create()
    {
        $model = new DamonModel();
        $data = [
            'suhu' => $this->request->getPost('suhu'),
            'kelembapan' => $this->request->getPost('kelembapan'),
            'amonia' => $this->request->getPost('amonia'),
        ];
        // $data = json_decode(file_get_contents('php://input'));
        $data = $this->request->getPost();
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];

        return $this->respondCreated($response);
    }
    
    //update data
    public function update($id = null)
    {
        $model = new DamonModel();
        $json = $this->request->getJSON();
        if($json){
            $data = [
                'suhu' => $json->suhu,
                'kelembapan' => $json->kelembapan,
                'amonia' => $json->amonia
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'suhu' => $input['suhu'],
                'kelembapan' => $input['kelembapan'],
                'amonia' => $input['amonia']
            ];
        }
        //insert to Database
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
            ];
            return $this->respond($response);
    }

    //delete data
    public function delete($id = null)
    {
        $model = new DamonModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
                ];
                return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No Data Found with id '. $id);
        }
    }
}
