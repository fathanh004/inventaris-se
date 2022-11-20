<?php

namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    function auth_admin($username, $password)
    {
        return $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' AND role='admin' LIMIT 1");
    }
    function auth_employee($username, $password)
    {
        return $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' AND role='employee' LIMIT 1");
    }
}
