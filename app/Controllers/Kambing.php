<?php

namespace App\Controllers;

class Kambing extends BaseController
{
    public function index()
    {
        return view('kambing/index');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'kambing' => $this->kambing->findAll()
            ];
            $msg = [
                'data' => view('kambing/datakambing', $data)
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
                'data' => view('kambing/modaltambah')
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
                    'rules' => 'required|is_unique[tbl_kambing.nama_kambing]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'jns_kelamin' => [
                    'label' => 'Jenis kelamin kambing',
                    'rules' => 'required[tbl_kambing.jns_kelamin]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal lahir kambing',
                    'rules' => 'required[tbl_kambing.tgl_lahir]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'panjang' => [
                    'label' => 'data panjang kambing',
                    'rules' => 'required[tbl_kambing.panjang]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
                'tinggi' => [
                    'label' => 'data tinggi  kambing',
                    'rules' => 'required[tbl_kambing.tinggi]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
                'berat' => [
                    'label' => 'data tinggi kambing',
                    'rules' => 'required[tbl_kambing.berat]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
                'lingkar_dada' => [
                    'label' => 'data lingkar dada kambing',
                    'rules' => 'required[tbl_kambing.lingkar_dada]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kambing' => $validation->getError('nama_kambing'),
                        'jns_kelamin' => $validation->getError('jns_kelamin'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'panjang' => $validation->getError('panjang'),
                        'tinggi' => $validation->getError('tinggi'),
                        'berat' => $validation->getError('berat'),
                        'lingkar_dada' => $validation->getError('lingkar_dada')
                    ]
                ];
            } else {
                $save = [
                    'nama_kambing' => $this->request->getVar('nama_kambing'),
                    'jns_kelamin' => $this->request->getVar('jns_kelamin'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'panjang' => $this->request->getVar('panjang'),
                    'tinggi' => $this->request->getVar('tinggi'),
                    'berat' => $this->request->getVar('berat'),
                    'lingkar_dada' => $this->request->getVar('lingkar_dada')
                ];

                $this->kambing->insert($save);

                $msg = [
                    'sukses' => 'data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $no = $this->request->getVar('no');

            $row = $this->kambing->find($no);

            $data = [
                'no' => $row['no'],
                'nama_kambing' => $row['nama_kambing'],
                'jns_kelamin' => $row['jns_kelamin'],
                'tgl_lahir' => $row['tgl_lahir'],
                'panjang' => $row['panjang'],
                'tinggi' => $row['tinggi'],
                'berat' => $row['berat'],
                'lingkar_dada' => $row['lingkar_dada']
            ];
            $msg = [
                'sukses' => view('kambing/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nama_kambing' => [
                    'label' => 'Nama kambing',
                    'rules' => 'required[tbl_kambing.nama_kambing]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                    ]
                ],
                'jns_kelamin' => [
                    'label' => 'Jenis kelamin kambing',
                    'rules' => 'required[tbl_kambing.jns_kelamin]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'tanggal lahir kambing',
                    'rules' => 'required[tbl_kambing.tgl_lahir]',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'panjang' => [
                    'label' => 'data panjang kambing',
                    'rules' => 'required[tbl_kambing.panjang]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
                'tinggi' => [
                    'label' => 'data tinggi  kambing',
                    'rules' => 'required[tbl_kambing.tinggi]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
                'berat' => [
                    'label' => 'Data tinggi kambing',
                    'rules' => 'required[tbl_kambing.berat]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
                'lingkar_dada' => [
                    'label' => 'Data lingkar dada kambing',
                    'rules' => 'required[tbl_kambing.lingkar_dada]',
                    'errors' => [
                        'required' => 'Nilai {field} harus diisi.'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kambing' => $validation->getError('nama_kambing'),
                        'jns_kelamin' => $validation->getError('jns_kelamin'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'panjang' => $validation->getError('panjang'),
                        'tinggi' => $validation->getError('tinggi'),
                        'berat' => $validation->getError('berat'),
                        'lingkar_dada' => $validation->getError('lingkar_dada')
                    ]
                ];
            } else {
                $save = [
                    'nama_kambing' => $this->request->getVar('nama_kambing'),
                    'jns_kelamin' => $this->request->getVar('jns_kelamin'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'panjang' => $this->request->getVar('panjang'),
                    'tinggi' => $this->request->getVar('tinggi'),
                    'berat' => $this->request->getVar('berat'),
                    'lingkar_dada' => $this->request->getVar('lingkar_dada')
                ];
                $no = $this->request->getVar('no');

                $this->kambing->update($no, $save);

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

            $this->kambing->delete($no);

            $msg = [
                'sukses' => "Data kambing dengan id $no berhasil dihapus."
            ];
            echo json_encode($msg);
        }
    }
}
