<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function ceklogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            //jika valid
            $email =  $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->AuthModel->login($email, $password);
            if ($cek) {
               //jika data valid 
                session()->set('log', true);
                session()->set('name', $cek['name']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                //login sukses
                return redirect()->to(base_url('utama/index'));
           } else {
                //jika data tidak valid 
                session()->setFlashdata('pesan', 'Login Gagal !!');
                return redirect()->to(base_url('auth/login'));
           }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function saveregis()
    {
        if($this->validate([
            'name' =>  [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'conpas' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'matches' => '{field} tidak sama.'
                ]
                ],
            'level' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
        ])){
            //jika valid
            $data = [
                'name'=>$this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'level' =>  $this->request->getPost('level'),
                'password' => $this->request->getPost('password')
            ];
            $this->AuthModel->saveregis($data);
            session()->setFlashdata('pesan', 'Register berhasil');
            return redirect()->to(base_url('Auth/register'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('name');
        session()->remove('email');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Sukses !!');
        return redirect()->to(base_url('auth/login'));
    }
}
