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
        dd($barang);
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

        $senin = [
            '1' => " ",
            '2' => " ",
            '3' => " ",
            '4' => " ",
            '5' => " ",
            '6' => " ",
            '7' => " ",
            '8' => " ",
            '9' => " ",
            '10' => " ",
            '11' => " ",
            '12' => " ",
        ];
        $selasa = [
            '1' => " ",
            '2' => " ",
            '3' => " ",
            '4' => " ",
            '5' => " ",
            '6' => " ",
            '7' => " ",
            '8' => " ",
            '9' => " ",
            '10' => " ",
            '11' => " ",
            '12' => " ",
        ];
        $rabu = [
            '1' => " ",
            '2' => " ",
            '3' => " ",
            '4' => " ",
            '5' => " ",
            '6' => " ",
            '7' => " ",
            '8' => " ",
            '9' => " ",
            '10' => " ",
            '11' => " ",
            '12' => " ",
        ];
        $kamis = [
            '1' => " ",
            '2' => " ",
            '3' => " ",
            '4' => " ",
            '5' => " ",
            '6' => " ",
            '7' => " ",
            '8' => " ",
            '9' => " ",
            '10' => " ",
            '11' => " ",
            '12' => " ",
        ];
        $jumat = [
            '1' => " ",
            '2' => " ",
            '3' => " ",
            '4' => " ",
            '5' => " ",
            '6' => " ",
            '7' => " ",
            '8' => " ",
            '9' => " ",
            '10' => " ",
            '11' => " ",
            '12' => " ",
        ];
        $sabtu = [
            '1' => " ",
            '2' => " ",
            '3' => " ",
            '4' => " ",
            '5' => " ",
            '6' => " ",
            '7' => " ",
            '8' => " ",
            '9' => " ",
            '10' => " ",
            '11' => " ",
            '12' => " ",
        ];


        foreach ($jadwal as $j) {
            if ($j['hari'] == "Senin") {
                switch ($j['waktu_mulai']) {
                    case "07:30:00":
                        $startIndex = 1;
                        break;
                    case "08:20:00":
                        $startIndex = 2;
                        break;
                    case "09:10:00":
                        $startIndex = 3;
                        break;
                    case "10:00:00":
                        $startIndex = 4;
                        break;
                    case "10:50:00":
                        $startIndex = 5;
                        break;
                    case "11:40:00":
                        $startIndex = 6;
                        break;
                    case "12:30:00":
                        $startIndex = 7;
                        break;
                    case "13:20:00":
                        $startIndex = 8;
                        break;
                    case "14:10:00":
                        $startIndex = 9;
                        break;
                    default:
                        $startIndex = null;
                }

                if ($startIndex !== null) {
                    $endIndex = $startIndex + $j['scope'] - 1;
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $senin[$i] = $j['matkul'];
                    }
                }

            } else if ($j['hari'] == "Selasa") {
               switch ($j['waktu_mulai']) {
                    case "07:30:00":
                        $startIndex = 1;
                        break;
                    case "08:20:00":
                        $startIndex = 2;
                        break;
                    case "09:10:00":
                        $startIndex = 3;
                        break;
                    case "10:00:00":
                        $startIndex = 4;
                        break;
                    case "10:50:00":
                        $startIndex = 5;
                        break;
                    case "11:40:00":
                        $startIndex = 6;
                        break;
                    case "12:30:00":
                        $startIndex = 7;
                        break;
                    case "13:20:00":
                        $startIndex = 8;
                        break;
                    case "14:10:00":
                        $startIndex = 9;
                        break;
                    default:
                        $startIndex = null;
                }

                if ($startIndex !== null) {
                    $endIndex = $startIndex + $j['scope'] - 1;
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $selasa[$i] = $j['matkul'];
                    }
                }

            } else if ($j['hari'] == "Rabu") {
               switch ($j['waktu_mulai']) {
                    case "07:30:00":
                        $startIndex = 1;
                        break;
                    case "08:20:00":
                        $startIndex = 2;
                        break;
                    case "09:10:00":
                        $startIndex = 3;
                        break;
                    case "10:00:00":
                        $startIndex = 4;
                        break;
                    case "10:50:00":
                        $startIndex = 5;
                        break;
                    case "11:40:00":
                        $startIndex = 6;
                        break;
                    case "12:30:00":
                        $startIndex = 7;
                        break;
                    case "13:20:00":
                        $startIndex = 8;
                        break;
                    case "14:10:00":
                        $startIndex = 9;
                        break;
                    default:
                        $startIndex = null;
                }

                if ($startIndex !== null) {
                    $endIndex = $startIndex + $j['scope'] - 1;
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $rabu[$i] = $j['matkul'];
                    }
                }
            } else if ($j['hari'] == "Kamis") {
                switch ($j['waktu_mulai']) {
                    case "07:30:00":
                        $startIndex = 1;
                        break;
                    case "08:20:00":
                        $startIndex = 2;
                        break;
                    case "09:10:00":
                        $startIndex = 3;
                        break;
                    case "10:00:00":
                        $startIndex = 4;
                        break;
                    case "10:50:00":
                        $startIndex = 5;
                        break;
                    case "11:40:00":
                        $startIndex = 6;
                        break;
                    case "12:30:00":
                        $startIndex = 7;
                        break;
                    case "13:20:00":
                        $startIndex = 8;
                        break;
                    case "14:10:00":
                        $startIndex = 9;
                        break;
                    default:
                        $startIndex = null;
                }

                if ($startIndex !== null) {
                    $endIndex = $startIndex + $j['scope'] - 1;
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $kamis[$i] = $j['matkul'];
                    }
                }
            } else if ($j['hari'] == "Jum'at") {
                switch ($j['waktu_mulai']) {
                    case "07:30:00":
                        $startIndex = 1;
                        break;
                    case "08:20:00":
                        $startIndex = 2;
                        break;
                    case "09:10:00":
                        $startIndex = 3;
                        break;
                    case "10:00:00":
                        $startIndex = 4;
                        break;
                    case "10:50:00":
                        $startIndex = 5;
                        break;
                    case "11:40:00":
                        $startIndex = 6;
                        break;
                    case "12:30:00":
                        $startIndex = 7;
                        break;
                    case "13:20:00":
                        $startIndex = 8;
                        break;
                    case "14:10:00":
                        $startIndex = 9;
                        break;
                    default:
                        $startIndex = null;
                }
                if ($startIndex !== null) {
                    $endIndex = $startIndex + $j['scope'] - 1;
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $jumat[$i] = $j['matkul'];
                    }
                }
            } else if ($j['hari'] == "Sabtu") {
                switch ($j['waktu_mulai']) {
                    case "07:30:00":
                        $startIndex = 1;
                        break;
                    case "08:20:00":
                        $startIndex = 2;
                        break;
                    case "09:10:00":
                        $startIndex = 3;
                        break;
                    case "10:00:00":
                        $startIndex = 4;
                        break;
                    case "10:50:00":
                        $startIndex = 5;
                        break;
                    case "11:40:00":
                        $startIndex = 6;
                        break;
                    case "12:30:00":
                        $startIndex = 7;
                        break;
                    case "13:20:00":
                        $startIndex = 8;
                        break;
                    case "14:10:00":
                        $startIndex = 9;
                        break;
                    default:
                        $startIndex = null;
                }
                if ($startIndex !== null) {
                    $endIndex = $startIndex + $j['scope'] - 1;
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $sabtu[$i] = $j['matkul'];
                    }
                }
            }
        }

        $seminggu = [
            '0' => $senin,
            '1' => $selasa,
            '2' => $rabu,
            '3' => $kamis,
            '4' => $jumat,
            '5' => $sabtu,
        ];

        $data = [
            'title' => 'Tabel Barang',
            'lab' => $lab,
            'jadwal' => $seminggu,
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

    function tampil_pinjam(){
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->where('user_id', $user_id)->first();
        $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();
        $barang = $this->barang_model->where('lab_id', $lab_id['lab_id'])->findAll();  
        //$i = 0;
        $pinjamArr = [];
      
        // cari semua data pinjam yang terkait dengan barang di lab terkait
        foreach ($barang as $b) {
          $pinjam = $this->pinjam_model->where('barang_id', $b['barang_id'])->findAll();
          // simpan data pinjam yang terkait dengan barang di lab terkait ke dalam array
          if($pinjam != null){
            foreach ($pinjam as $p) {
              $pinjamArr[] = $p;
            }
          }
        }
      
        $data = [
          'title' => 'Laporan Peminjaman Barang',
          'barang' => $barang,
          'nama' => $user['nama'],
          'pinjamArr' => $pinjamArr    
        ];
      
        return view('table_pinjam', $data);
      }
      

    function tambah_pinjam()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->where('user_id', $user_id)->first();
        $lab_id = $this->employee_lab_model->where('nim', $nim['nim'])->first();
        $barang = $this->barang_model->where('lab_id', $lab_id['lab_id'])->findAll();
        $barang = $this->barang_model->where('lab_id', $lab_id['lab_id'])->findAll();  
        //$i = 0;
        $pinjamArr = [];
      
        // cari semua data pinjam yang terkait dengan barang di lab terkait
        foreach ($barang as $b) {
            $pinjam = $this->pinjam_model->where('barang_id', $b['barang_id'])->findAll();
            if ($pinjam != null) {
                $pinjamArr[] = $pinjam[0];
          $pinjam = $this->pinjam_model->where('barang_id', $b['barang_id'])->findAll();
          // simpan data pinjam yang terkait dengan barang di lab terkait ke dalam array
          if($pinjam != null){
            foreach ($pinjam as $p) {
              $pinjamArr[] = $p;
            }
          }
        }
        //dd($pinjamArr);
      
        $data = [
            'title' => 'Tambah Peminjaman Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
            'pinjamArr' => $pinjamArr
        ];

        return view('tambah_pinjam', $data);
    }

    function tambah_aksi_pinjam()
{
    // Ambil data yang dikirim dari form
    $barang_id = $this->request->getPost('barang_id');
    $jumlah_pinjam = $this->request->getPost('jumlah_pinjam');
    $tanggal_pinjam = $this->request->getPost('tanggal_pinjam');
    $tanggal_kembali = $this->request->getPost('tanggal_kembali');
    $nama_peminjam = $this->request->getPost('nama_peminjam');
    $alasan = $this->request->getPost('alasan');
    $status = $this->request->getPost('status');

    // Cek apakah jumlah pinjam melebihi stok barang
    $barang = $this->barang_model->find($barang_id);
    if ($jumlah_pinjam > $barang['jumlah']) {
        return redirect()->to('/tambah-aksi-pinjam/' . $barang_id);
    }

    // Kurangi stok barang di tabel barang
    $barang['jumlah'] -= $jumlah_pinjam;
    $this->barang_model->save($barang);

    // Simpan data pinjam ke tabel pinjam
    $data_pinjam = [
        'barang_id' => $barang_id,
        'jumlah_pinjam' => $jumlah_pinjam,
        'tanggal_pinjam' => $tanggal_pinjam,
        'tanggal_kembali' => $tanggal_kembali,
        'nama_peminjam' => $nama_peminjam,
        'alasan' => $alasan,
        'status' => $status,
    ];
    $this->pinjam_model->save($data_pinjam);

    // Arahkan ke halaman pinjam
    return redirect()->route('pinjam');
}
}
