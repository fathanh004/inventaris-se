<?php

namespace App\Controllers;

use App\Models\user_model;
use App\Models\barang_model;
use App\Models\employee_lab_model;
use App\Models\employee_model;
use App\Models\history_barang_model;
use App\Models\pinjam_model;
use App\Models\jadwal_model;
use App\Models\lab_model;

class CrudController extends BaseController
{
    function __construct()
    {
        $this->user_model = new user_model();
        $this->barang_model = new barang_model();
        $this->employee_lab_model = new employee_lab_model();
        $this->employee_model = new employee_model();
        $this->history_barang_model = new history_barang_model();
        $this->pinjam_model = new pinjam_model();
        $this->jadwal_model = new jadwal_model();
        $this->lab_model = new lab_model();
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

    function dashboard()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->where('user_id', $user_id)->first();
        $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();
        $lab = $this->lab_model->find($lab_id['lab_id']);
        $jadwal = $this->jadwal_model->where('lab_id', $lab_id['lab_id'])->findAll();

        $data = [
            'title' => 'Tabel Barang',
            'lab' => $lab,
            'barang' => $jadwal,
            'nama' => $user['nama'],
        ];

        return view('dashboard_page', $data);
    }

    function tambah_barang()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);

        $data = [
            'title' => 'Tambah Barang',
            'nama' => $user['nama'],
        ];

        return view('tambah_page', $data);
    }



    function tambah_aksi()
    {
        $nama = $this->request->getPost('nama');
        $jumlah = $this->request->getPost('jumlah');
        $satuan = $this->request->getPost('satuan');

        if ($nama == null || $jumlah == null || $satuan == null) {
            return redirect()->to('/tambah');
        } else {

            $user_id = session()->get('id');
            $nim = $this->employee_model->where('user_id', $user_id)->first();
            $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();

            $data = [
                'nama' => $nama,
                'jumlah' => $jumlah,
                'satuan' => $satuan,
                'lab_id' => $lab_id['lab_id'],
            ];

            $this->barang_model->insert($data);
            $barang_id = $this->barang_model->insertID();
            if ($this->barang_model->affectedRows() > 0) {
                $db = \Config\Database::connect();
                $db->query("INSERT INTO history_barang (barang_id, keterangan, jumlah, tanggal) VALUES ('$barang_id', 'Stok Awal', '$jumlah', NOW())");
                return redirect()->route('barang');
            } else {
                return redirect()->route('tambah_barang');
            }
        }
    }

    function edit_aksi()
    {
        $barang_id = $this->request->getPost('barang_id');
        $nama = $this->request->getPost('nama');
        $satuan = $this->request->getPost('satuan');
        if ($nama == null || $satuan == null) {
            return redirect()->to('/edit/' . $barang_id);
        } else {
            $data = [
                'barang_id' => $barang_id,
                'nama' => $nama,
                'satuan' => $satuan,
            ];
            $this->barang_model->save($data);
        }
        return redirect()->route('barang');
    }

    function edit_jumlah_aksi()
    {
        $barang_id = $this->request->getPost('barang_id');
        $jumlah = $this->request->getPost('jumlah');
        $jumlah_awal = $this->request->getPost('jumlah_awal');
        $keterangan = $this->request->getPost('keterangan');

        if ($jumlah == null || $keterangan == null) {
            return redirect()->to('/edit/' . $barang_id);
        } else {
            if ($keterangan == "option1") {
                $keterangan = "Barang Masuk";
                $jumlah_akhir = $jumlah_awal + $jumlah;
            } else if ($keterangan == "option2") {
                $keterangan = "Barang Rusak";
                $jumlah_akhir = $jumlah_awal - $jumlah;
            } else if ($keterangan == "option3") {
                $keterangan = "Barang Hilang";
                $jumlah_akhir = $jumlah_awal - $jumlah;
            }

            $data = [
                'barang_id' => $barang_id,
                'jumlah' => $jumlah_akhir,
            ];
            $this->barang_model->save($data);
            if ($this->barang_model->affectedRows() > 0) {
                $data = [
                    'barang_id' => $barang_id,
                    'keterangan' => $keterangan,
                    'jumlah' => $jumlah,
                    'tanggal' => date("Y-m-d H:i:s"),
                ];
                $this->history_barang_model->save($data);
                return redirect()->route('barang');
            } else {
                return redirect()->route('tambah_barang');
            }
        }
        return redirect()->route('barang');
    }


    function edit_jumlah($num)
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $barang = $this->barang_model->where('barang_id', $num)->first();

        $data = [
            'title' => 'Kelola Jumlah Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
        ];

        return view('edit_jumlah_page', $data);
    }

    function edit_barang($num)
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $barang = $this->barang_model->where('barang_id', $num)->first();

        $data = [
            'title' => 'Edit Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
        ];

        return view('edit_page', $data);
    }

    function hapus_barang($num)
    {

        $this->barang_model->delete($num);
        if ($this->barang_model->affectedRows() > 0) {
            return redirect()->route('barang');
        } else {
            return redirect()->route('barang');
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
            if ($history != null) {
                foreach ($history as $h) {
                    $historyArr[$i] = $h;
                    $i++;
                }
            }
        }
        $data = [
            'title' => 'Laporan Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
            'historyArr' => $historyArr
        ];

        return view('history_page', $data);
    }

    //pinjam

    function tampil_pinjam()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->where('user_id', $user_id)->first();
        $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();
        $barang = $this->barang_model->where('lab_id', $lab_id['lab_id'])->findAll();	
        //$i = 0;
        $pinjamArr = [];

        foreach ($barang as $b) {
            $pinjam = $this->pinjam_model->where('barang_id', $b['barang_id'])->findAll();
            if($pinjam != null){
                $pinjamArr[] = $pinjam[0];
            }
            //$i++;
            //$pinjamArr++;
        }
       //dd($pinjamArr);
        $data = [
            'title' => 'Laporan Peminjaman Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
            'pinjamArr' => $pinjamArr	
        ];

        return view('table_pinjam', $data);
    }
}
