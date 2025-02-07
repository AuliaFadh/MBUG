<?php

namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Helpers\JwtHelper;

class JWTAuth implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        $jwt = $request->getCookie('token'); // Ambil token dari cookie
        
        if (!$jwt) {
            session()->setFlashdata('no_data', 'Sesi tidak ditemukan');
            return redirect()->to(base_url('/user/login'))->with('error', 'Token tidak ditemukan');
        }

        $userData = JwtHelper::verifyToken($jwt);
        if (!$userData) {
            return redirect()->to(base_url('/user/login'))->with('error', 'Token tidak valid atau telah expired');
        }

        // Simpan data user di request global agar bisa diakses controller
        $request->userData = $userData;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // Tidak perlu melakukan apa-apa setelah response dikirim
    }
}
