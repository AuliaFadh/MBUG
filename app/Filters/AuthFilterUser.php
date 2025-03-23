<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilterUser implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        

        $session = session();

        // 🚀 **Cek apakah user sudah login**
        if (!$session->get('islogin')) {
            $session->setFlashdata('belum_login', 'Kamu belum login! Silakan login terlebih dahulu.');
            return redirect()->to('user/login');
        }

        // 🚀 **Cek hak akses**
        if ($session->get('hak_akses') !== "0") {
            $session->destroy(); // Hapus session jika bukan user biasa
            return redirect()->to('user/login')->with('error', 'Akses ditolak.');
        }

        // 🚀 **Cek apakah session sudah dibajak (Session Hijacking)**
        $request = service('request');
        if ($session->get('ip_address') !== $request->getIPAddress() || 
            $session->get('user_agent') !== $request->getUserAgent()) {
            $session->destroy();
            return redirect()->to('user/login')->with('error', 'Sesi tidak valid.');
        }

        // 🚀 **Cek apakah user masih aktif**
        if ($session->get('status_user') !== 'aktif') {
            $session->destroy();
            return redirect()->to('user/login')->with('error', 'Akun kamu telah dinonaktifkan.');
        }


    }

    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
