<?php

namespace App\Controllers;

class Pakan extends BaseController
{
    public function index()
    {
        return view('pakan/index');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'pakan' => $this->pakan->findAll()
            ];
            $msg = [
                'data' => view('pakan/datapakan', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('pakan/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nama_pakan' => [
                    'label' => 'Nama pakan',
                    'rules' => 'required[tbl_pakan.nama_pakan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'stok' => [
                    'label' => 'Stok pakan',
                    'rules' => 'required[tbl_pakan.stok]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pakan' => $validation->getError('nama_pakan'),
                        'stok' => $validation->getError('stok')
                    ]
                ];
            } else {
                $save = [
                    'nama_pakan' => $this->request->getVar('nama_pakan'),
                    'stok' => $this->request->getVar('stok')
                ];
                $this->pakan->insert($save);

                $msg = [
                    'sukses' => 'data berhasil diubah'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }




    //edit
    public function edit()
    {
        if ($this->request->isAJAX()) {
            $no = $this->request->getVar('no');

            $row = $this->pakan->find($no);

            $data = [
                'no' => $row['no'],
                'nama_pakan' => $row['nama_pakan'],
                'stok' => $row['stok']
            ];
            $msg = [
                'sukses' => view('pakan/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }

    // update
    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nama_pakan' => [
                    'label' => 'Nama pakan',
                    'rules' => 'required[tbl_pakan.nama_pakan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'stok' => [
                    'label' => 'Stok pakan',
                    'rules' => 'required[tbl_pakan.stok]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pakan' => $validation->getError('nama_pakan'),
                        'stok' => $validation->getError('stok')
                    ]
                ];
            } else {
                $save = [
                    'nama_pakan' => $this->request->getVar('nama_pakan'),
                    'stok' => $this->request->getVar('stok')
                ];
                $no = $this->request->getVar('no');
                $this->pakan->Update($no, $save);
                // $this->pakan->update($no, [
                //     'nama_pakan' => $this->request->getVar('nama_pakan'),
                //     'stok' => $this->request->getVar('stok')
                // ]);

                $msg = [
                    'sukses' => 'data berhasil diubah'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses.');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $no = $this->request->getVar('no');
            $this->pakan->delete($no);
            $msg = [
                'sukses' => "Data pakan dengan id $no berhasil dihapus."
            ];
            echo json_encode($msg);
        }
    }
}
