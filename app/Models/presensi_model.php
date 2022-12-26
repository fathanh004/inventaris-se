<?php

namespace App\Models;

use CodeIgniter\Model;

class presensi_model extends Model
{
    protected $table = 'presensi';
    protected $primaryKey = 'presensi_id';
    protected $allowedFields = [
        'presensi_id', 'nim', 'tanggal', 'waktu_tiba',
        'waktu_pulang', 'keterangan'
    ];
    
}