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
use App\Models\presensi_model;

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
        $this->presensi_model = new presensi_model();
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
        
        //dd($barang);
        $data = [
            'title' => 'Tambah Peminjaman Barang',
            'barang' => $barang,
            'nama' => $user['nama'],
        ];

        return view('tambah_pinjam', $data);
    }

    function tambah_aksi_pinjam(){
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

        // simpan data ke table history barang
        $data_history = [
            'barang_id' => $barang_id,
            'jumlah' => $jumlah_pinjam,
            'tanggal' => $tanggal_pinjam,
            'keterangan' => 'Barang Dipinjam',
        ];
        $this->history_barang_model->save($data_history);

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

    function edit_pinjam($num){
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $pinjam = $this->pinjam_model->find($num);
        $barang = $this->barang_model->find($pinjam['barang_id']);
        $data = [
            'title' => 'Edit Peminjaman Barang',
            'barang' => $barang,
            'pinjam' => $pinjam,
            'nama' => $user['nama'],
        ];

        return view('edit_pinjam', $data);
    }

    function edit_aksi_pinjam()
    {
        $pinjam_id = $this->request->getPost('pinjam_id');
        $barang_id = $this->request->getPost('barang_id');
        $jumlah_pinjam = $this->request->getPost('jumlah_pinjam');
        $tanggal_kembali = $this->request->getPost('tanggal_kembali');
        $status = $this->request->getPost('status');

        if ($tanggal_kembali == null) {
            return redirect()->to('/edit-pinjam/' . $pinjam_id);
        } else {
            $data = [
                'pinjam_id' => $pinjam_id,
                'barang_id' => $barang_id,
                'jumlah_pinjam' => $jumlah_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
                'status' => $status,                
            ];
            $this->pinjam_model->save($data);
        }
        return redirect()->route('pinjam');
    }

    function edit_aksi_pinjama(){
        // Ambil data yang dikirim dari form   
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $pinjam_id = $this->request->getPost('pinjam_id');
        $barang_id = $this->request->getPost('barang_id');
        $nama = $this->request->getPost('nama');
        $jumlah_pinjam = $this->request->getPost('jumlah_pinjam');
        $tanggal_kembali = $this->request->getPost('tanggal_kembali');
        $status = $this->request->getPost('status');

        $barang = $this->barang_model->find($barang_id);
        $pinjam = $this->pinjam_model->where('pinjam_id', $pinjam_id)->first();

        if ($nama == NULL || $jumlah_pinjam == NULL || $tanggal_kembali == NULL || $status == NULL) {
            return redirect()->to('/edit-pinjam/' . $pinjam);
        }        
        // tambah stok barang di tabel barang
        $barang['jumlah'] += $jumlah_pinjam;
        $this->barang_model->save($barang);

        // simpan data ke table history barang
        $data_history = [
            'barang_id' => $barang_id,
            'jumlah' => $jumlah_pinjam,
            'tanggal' => $tanggal_kembali,
            'keterangan' => 'Barang Kembali',
        ];
        $this->history_barang_model->save($data_history);

        // Simpan data pinjam ke tabel pinjam
        $data_pinjam = [
            'pinjam_id' => $pinjam_id,
            'barang_id' => $barang_id,
            'jumlah_pinjam' => $jumlah_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'status' => $status,
        ];
        $this->pinjam_model->save($data_pinjam);

        // Arahkan ke halaman pinjam
        return redirect()->route('pinjam');
    }

    //admin
    function admin_dashboard()
    {
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $lab = $this->lab_model->findAll();
        $jadwal = $this->jadwal_model->findAll();
        $barang = $this->barang_model->findAll();
        $pinjam = $this->pinjam_model->findAll();
        $history = $this->history_barang_model->findAll();

        $data = [
            'title' => 'Dashboard',
            'lab' => $lab,
            'barang' => $barang,
            'pinjam' => $pinjam,
            'history' => $history,
            'nama' => $user['nama'],
        ];

        return view('admin_dashboard_page', $data);
    }

    //presensi
    function tampil_presensi(){
        $user_id = session()->get('id');
        $user = $this->user_model->find($user_id);
        $nim = $this->employee_model->findAll();
        $employee = $this->employee_model->findAll();
        $users = $this->user_model->findAll();
        //$i = 0;
        $presensiArr = [];
      
        foreach ($nim as $n) {
          $presensi = $this->presensi_model->where('nim', $n['nim'])->findAll();
          if($presensi != null){
            foreach ($presensi as $p) {
              $presensiArr[] = $p;
            }
          }
        }
      
        $data = [
            'title' => 'Laporan Presensi',
            'presensi' => $presensi,   
            'nama' => $user['nama'],
            'presensiArr' => $presensiArr,
            'employee' => $employee,
            'users' => $users,
        ];
      
        return view('table_presensi', $data);
      }
}
