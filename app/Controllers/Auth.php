<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $user = $this->db->table('user')
            ->where('username', $username)
            ->where('password', $password)
            ->get()
            ->getRowArray();

        if ($user) {

            session()->set([
                'id_user'   => $user['id_user'],
                'username'  => $user['username'],
                'nama_user' => $user['nama_user'],
                'login'     => true
            ]);

            return redirect()->to(base_url('/'));
        }

        return redirect()->back()->with(
            'error',
            'Username atau password salah'
        );
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}