<?php

namespace App\Controllers;

use App\Models\ObatModel;

use CodeIgniter\Validation\Rules;

class Obat extends BaseController
{
    public function index()
    {
        return view('obat/index');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            // $obat = new ObatModel;
            $data = [
                'obat' => $this->obat->findAll()
            ];
            $msg = [
                'data' => view('obat/dataobat', $data)
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
                'data' => view('obat/modaltambah')
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
                'nama_obat' => [
                    'label' => 'Nama Obat',
                    'rules' => 'required[tbl_obat.nama_obat]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'stok_obat' => [
                    'label' => 'Stok Obat',
                    'rules' => 'required[tbl_obat.stok_obat]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_obat' => $validation->getError('nama_obat'),
                        'stok_obat' => $validation->getError('stok_obat')
                    ]
                ];
            } else {
                $save = [
                    'nama_obat' => $this->request->getVar('nama_obat'),
                    'stok_obat' => $this->request->getVar('stok_obat'),
                    'keterangan' => $this->request->getVar('keterangan')
                ];
                $obat = new ObatModel;

                $obat->insert($save);

                $msg = [
                    'sukses' => 'data berhasil ditambahkan'
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

            $row = $this->obat->find($no);

            $data = [
                'no' => $row['no'],
                'nama_obat' => $row['nama_obat'],
                'stok_obat' => $row['stok_obat'],
                'keterangan' => $row['keterangan'],
            ];
            $msg = [
                'sukses' => view('obat/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }

    //update
    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nama_obat' => [
                    'label' => 'Nama Obat',
                    'rules' => 'required[tbl_obat.nama_obat]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'stok_obat' => [
                    'label' => 'Stok Obat',
                    'rules' => 'required[tbl_obat.stok_obat]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_obat' => $validation->getError('nama_obat'),
                        'stok_obat' => $validation->getError('stok_obat')
                    ]
                ];
            } else {
                $save = [
                    'nama_obat' => $this->request->getVar('nama_obat'),
                    'stok_obat' => $this->request->getVar('stok_obat'),
                    'keterangan' => $this->request->getVar('keterangan')
                ];
                $no = $this->request->getVar('no');

                $this->obat->update($no, $save);

                $msg = [
                    'sukses' => 'Data obat berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $no = $this->request->getVar('no');

            // $obat = new ObatModel;

            $this->obat->delete($no);

            $msg = [
                'sukses' => "Data obat dengan id $no berhasil dihapus."
            ];
            echo json_encode($msg);
        }
    }
}
