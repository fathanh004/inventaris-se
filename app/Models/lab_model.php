<?php

namespace App\Models;

use CodeIgniter\Model;

class lab_model extends Model
{
    protected $table = 'lab';
    protected $primaryKey = 'lab_id';
    protected $allowedFields = ['nama', 'gedung', 'koordinator'];
}
