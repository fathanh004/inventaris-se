<?php

namespace App\Controllers;

use App\Models\user_model;

class Home extends BaseController
{
    function __construct()
    {
        $this->user_model = new user_model();
    }

    public function index()
    {
        $data = [
            'title' => 'Login Page',
        ];
        return view('login_page', $data);
    }

    function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $array = array('username' => $username, 'password' => $password, 'role' => 'admin');
        $cek_admin = $this->user_model->where($array)->findAll();

        if ($cek_admin != null) {
            redirect('/crudcontroller/tampil_barang');
            // $this->session->set_userdata('masuk', TRUE);
            // $this->session->set_userdata('ses_id', $data['user_id']);
            // redirect('pageAdmin');
        } else {
            $array1 = array('username' => $username, 'password' => $password, 'role' => 'employee');
            $cek_employee = $this->user_model->where($array1)->findAll();
            if ($cek_employee != null) {
                redirect('/crudcontroller/tampil_barang');
                // $this->session->set_userdata('masuk', TRUE);
                // $this->session->set_userdata('ses_id', $data['user_id']);
                // redirect('pageEmployee');
            } else {
                $data = [
                    'title' => 'Login Page',
                    'eror' => 'Username atau Password anda salah!'
                ];
                return view('login_page', $data);
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}
