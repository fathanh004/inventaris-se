<?php

namespace App\Models;

use CodeIgniter\Model;

class history_barang_model extends Model
{
    protected $table = 'history_barang';
    protected $primaryKey = 'history_id';
    protected $allowedFields = ['barang_id', 'keterangan', 'jumlah', 'tanggal'];

    function insertAuto($barang_id, $keterangan, $jumlah, $tanggal){
        $db = \Config\Database::connect();
        $builder = $db->table('history_barang');
        $builder->join('barang', 'barang.barang_id = history_barang.barang_id');
        $builder->insert([
            'barang_id' => $barang_id,
            'keterangan' => $keterangan,
            'jumlah' => $jumlah,    
            'tanggal' => $tanggal
        ]);
    }
}


