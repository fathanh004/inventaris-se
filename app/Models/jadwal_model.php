<?php

namespace App\Models;

use CodeIgniter\Model;

class jadwal_model extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'jadwal_id';
    protected $allowedFields = ['matkul', 'kelas', 'hari', 'waktu_mulai', 'waktu_selesai','dosen', 'lab_id'];
}
