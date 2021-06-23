<?php

namespace App\Controllers;

class Produk extends BaseController
{
    public function index()
    {
        return view('produk/index');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'produk' => $this->produk->findAll()
            ];
            $msg = [
                'data' => view('produk/dataproduk', $data)
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
                'data' => view('produk/modaltambah')
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
                'nama_produk' => [
                    'label' => 'Nama produk',
                    'rules' => 'required[tbl_produk.nama_produk]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'stok_produk' => [
                    'label' => 'Stok produk',
                    'rules' => 'required[tbl_produk.stok_produk]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_produk' => $validation->getError('nama_produk'),
                        'stok_produk' => $validation->getError('stok_produk')
                    ]
                ];
            } else {
                $save = [
                    'nama_produk' => $this->request->getVar('nama_produk'),
                    'stok_produk' => $this->request->getVar('stok_produk')
                ];

                $this->produk->insert($save);

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

            $row = $this->produk->find($no);

            $data = [
                'no' => $row['no'],
                'nama_produk' => $row['nama_produk'],
                'stok_produk' => $row['stok_produk']
            ];
            $msg = [
                'sukses' => view('produk/modaledit', $data)
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
                'nama_produk' => [
                    'label' => 'Nama produk',
                    'rules' => 'required[tbl_produk.nama_produk]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'stok_produk' => [
                    'label' => 'Stok produk',
                    'rules' => 'required[tbl_produk.stok_produk]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_produk' => $validation->getError('nama_produk'),
                        'stok_produk' => $validation->getError('stok_produk')
                    ]
                ];
            } else {
                $save = [
                    'nama_produk' => $this->request->getVar('nama_produk'),
                    'stok_produk' => $this->request->getVar('stok_produk')
                ];
                $no = $this->request->getVar('no');

                $this->produk->update($no, $save);

                $msg = [
                    'sukses' => 'data berhasil ditambahkan'
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

            $this->produk->delete($no);

            $msg = [
                'sukses' => "Data obat dengan id $no berhasil dihapus."
            ];
            echo json_encode($msg);
        }
    }
}
