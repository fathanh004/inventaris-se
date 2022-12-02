<?php

namespace App\Controllers;

use App\Models\user_model;
use App\Models\barang_model;
use App\Models\employee_lab_model;
use App\Models\employee_model;
use App\Models\history_barang_model;

class CrudController extends BaseController
{
    function __construct()
    {
        $this->user_model = new user_model();
        $this->barang_model = new barang_model();
        $this->employee_lab_model = new employee_lab_model();
        $this->employee_model = new employee_model();
        $this->history_barang_model = new history_barang_model();
    }

    function tampil_barang()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->where('user_id', $user_id)->first();
        $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();
        $barang = $this->barang_model->where('lab_id', $lab_id['lab_id'])->findAll();

        $data = [
            'title' => 'Tabel Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
        ];

        return view('table_page', $data);
    }


    function tambah_barang()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->where('user_id', $user_id)->first();
        $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();
        $barang = $this->barang_model->where('lab_id', $lab_id['lab_id'])->findAll();

        $data = [
            'title' => 'Tabel Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
        ];

        return view('tambah_page', $data);
    }

    function tambah_aksi()
    {
        $nama = $this->request->getPost('nama');
        $jumlah = $this->request->getPost('jumlah');

        if ($nama == null || $jumlah == null) {
            return redirect()->to('/tambah');
        } else {

            $user_id = session()->get('id');
            $nim = $this->employee_model->where('user_id', $user_id)->first();
            $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();

            $data = [
                'nama' => $nama,
                'jumlah' => $jumlah,
                'lab_id' => $lab_id['lab_id'],
            ];

            $this->barang_model->insert($data);
            $barang_id = $this->barang_model->insertID();
            if ($this->barang_model->affectedRows() > 0) {
                $db = \Config\Database::connect();
                $db->query("INSERT INTO history_barang (barang_id, keterangan, jumlah, tanggal) VALUES ('$barang_id', 'Barang Masuk', '$jumlah', NOW())");	
                return redirect()->route('barang');
            } else {
                return redirect()->route('tambah_barang');
            }
        }
    }

    function laporan_barang()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->where('user_id', $user_id)->first();
        $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();
        $barang = $this->barang_model->where('lab_id', $lab_id['lab_id'])->findAll();	
        $i = 0;
        foreach ($barang as $b) {
            $history = $this->history_barang_model->where('barang_id', $b['barang_id'])->findAll();
            if($history != null){
                $historyArr[$i] = $history[0];
            }
            $i++;
        }
        
        $data = [
            'title' => 'Laporan Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
            'historyArr' => $historyArr	
        ];

        return view('history_page', $data);
    }
}
