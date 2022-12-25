<?php

namespace App\Models;

use CodeIgniter\Model;

class pinjam_model extends Model
{
    protected $table = 'pinjam';
    protected $primaryKey = 'pinjam_id';
    protected $allowedFields = [
        'barang_id', 'jumlah_pinjam', 'tanggal_pinjam', 'tanggal_kembali',
        'nama_peminjam', 'alasan', 'status'
    ];
    

}