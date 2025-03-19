<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilterAdmin implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('islogin')) {
            session()->setFlashdata('belum_login', 'Kamu belum login! Silakan login terlebih dahulu.');
            return redirect()->to('user/login');
        }
        if(!session()->get('hak_akses')!="1"){
            session()->setFlashdata('belum_login', 'Kamu belum login! Silakan login terlebih dahulu.');
            return redirect()->to('user/login');
        }
    }

    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
