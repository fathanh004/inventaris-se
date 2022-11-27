<?php

namespace App\Models;

use CodeIgniter\Model;

class barang_model extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = ['nama', 'jumlah', 'lab_id'];
}
