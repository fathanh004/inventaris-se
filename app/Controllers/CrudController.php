<?php

namespace App\Controllers;

use App\Models\user_model;
use App\Models\barang_model;

class CrudController extends BaseController
{
    function __construct()
    {
        $this->user_model = new user_model();
        $this->barang_model = new barang_model();
    }

    function tampil_barang()
    {
        $barang = $this->barang_model->findAll();
        $data = [
            'title' => 'Tabel Barang',
            'barang' => $barang
        ];

        return view('table_page', $data);
    }
}
