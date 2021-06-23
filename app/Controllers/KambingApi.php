<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class KambingApi extends ResourceController
{
    protected $modelName = 'App\Models\KambingModel';
    protected $format    = 'json';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {

        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'createkambing');
        $errors = $this->validation->getError();

        if ($errors) {
            return $this->fail($errors);
        }

        if ($this->model->save($data)) {
            return $this->respondCreated($data, 'user created');
        }
    }
}
