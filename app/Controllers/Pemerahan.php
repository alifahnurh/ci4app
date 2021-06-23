<?php

namespace App\Controllers;

use App\Models\PemerahanModel;

use CodeIgniter\Validation\Rules;

class Pemerahan extends BaseController
{
    public function index()
    {
        return view('pemerahan/index');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'pemerahan' => $this->pemerahan->findAll()
            ];
            $msg = [
                'data' => view('pemerahan/dataperah', $data)
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
                'data' => view('pemerahan/modaltambah')
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
                'nama_kambing' => [
                    'label' => 'Nama kambing',
                    'rules' => 'required[tbl_pemerahan.nama_kambing]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'hsl_pemerahan' => [
                    'label' => 'Hasil pemerahan',
                    'rules' => 'required[tbl_pemerahan.hsl_pemerahan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tgl_pemerahan' => [
                    'label' => 'Tanggal pemerahan',
                    'rules' => 'required[tbl_pemerahan.tgl_pemerahan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'wkt_pemerahan' => [
                    'label' => 'Waktu pemerahan',
                    'rules' => 'required[tbl_pemerahan.wkt_pemerahan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kambing' => $validation->getError('nama_kambing'),
                        'hsl_pemerahan' => $validation->getError('hsl_pemerahan'),
                        'tgl_pemerahan' => $validation->getError('tgl_pemerahan'),
                        'wkt_pemerahan' => $validation->getError('wkt_pemerahan')
                    ]
                ];
            } else {
                $save = [
                    'nama_kambing' => $this->request->getVar('nama_kambing'),
                    'hsl_pemerahan' => $this->request->getVar('hsl_pemerahan'),
                    'tgl_pemerahan' => $this->request->getVar('tgl_pemerahan'),
                    'wkt_pemerahan' => $this->request->getVar('wkt_pemerahan')
                ];
                $this->pemerahan->insert($save);

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

            $perah = $this->pemerahan->find($no);

            $data = [
                'no' => $perah['no'],
                'nama_kambing' => $perah['nama_kambing'],
                'hsl_pemerahan' => $perah['hsl_pemerahan'],
                'tgl_pemerahan' => $perah['tgl_pemerahan'],
                'wkt_pemerahan' => $perah['wkt_pemerahan']
            ];
            $msg = [
                'sukses' => view('pemerahan/modaledit', $data)
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
                'nama_kambing' => [
                    'label' => 'Nama kambing',
                    'rules' => 'required[tbl_pemerahan.nama_kambing]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'hsl_pemerahan' => [
                    'label' => 'Hasil pemerahan',
                    'rules' => 'required[tbl_pemerahan.hsl_pemerahan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tgl_pemerahan' => [
                    'label' => 'Tanggal pemerahan',
                    'rules' => 'required[tbl_pemerahan.tgl_pemerahan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'wkt_pemerahan' => [
                    'label' => 'Waktu pemerahan',
                    'rules' => 'required[tbl_pemerahan.wkt_pemerahan]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kambing' => $validation->getError('nama_kambing'),
                        'hsl_pemerahan' => $validation->getError('hsl_pemerahan'),
                        'tgl_pemerahan' => $validation->getError('tgl_pemerahan'),
                        'wkt_pemerahan' => $validation->getError('wkt_pemerahan')
                    ]
                ];
            } else {
                $save = [
                    'nama_kambing' => $this->request->getVar('nama_kambing'),
                    'hsl_pemerahan' => $this->request->getVar('hsl_pemerahan'),
                    'tgl_pemerahan' => $this->request->getVar('tgl_pemerahan'),
                    'wkt_pemerahan' => $this->request->getVar('wkt_pemerahan')
                ];
                $no = $this->request->getVar('no');

                $this->pemerahan->update($no, $save);

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

            $this->pemerahan->delete($no);

            $msg = [
                'sukses' => "Data obat dengan id $no berhasil dihapus."
            ];
            echo json_encode($msg);
        }
    }
}
