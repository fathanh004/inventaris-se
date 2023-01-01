<?php

namespace App\Controllers;

use App\Models\user_model;
use App\Models\employee_model;

class Home extends BaseController
{
    function __construct()
    {
        $this->user_model = new user_model();
        $this->employee_model = new employee_model();
    }

    public function index()
    {
        $data = [
            'title' => 'Login Page',
        ];
        return view('login_page', $data);
    }

    function profil()
    {
        // Ambil data employee dari session
        $employee_id = session()->get('id');
        $employee = $this->employee_model->where('user_id', $employee_id)->first();

        // Ambil data user dari tabel user
        $user = $this->user_model->where('user_id', $employee['user_id'])->first();

        // Buat array dengan data yang akan ditampilkan
        $data = [
            'title' => 'Profil Student Employee',
            'username' => $user['username'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'telpon' => $user['telpon'],
            'nim' => $employee['nim'],
            'prodi' => $employee['prodi'],
            'angkatan' => $employee['angkatan'],
        ];

        // Tampilkan halaman profil employee
        return view('profil_page', $data);
    }

    function auth()
    {

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $array = array('username' => $username, 'password' => $password, 'role' => 'admin');
        $cek_admin = $this->user_model->where($array)->first();

        if ($cek_admin != null) {
            session()->set('id', $cek_admin['user_id']);
            return redirect()->route('admin');

            // $this->session->set_userdata('masuk', TRUE);
            // $this->session->set_userdata('ses_id', $data['user_id']);
            // redirect('pageAdmin');
        } else {
            $array1 = array('username' => $username, 'password' => $password, 'role' => 'employee');
            $cek_employee = $this->user_model->where($array1)->first();
            if ($cek_employee != null) {
                session()->set('id', $cek_employee['user_id']);
                return redirect()->route('dashboard');
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
        session()->destroy();
        return redirect()->route('');
    }
}
