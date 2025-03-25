<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FileController extends Controller
{
    public function profile_picture($filename)
    {
        if (!session()->has('logged_in')|| session()->get('hak_akses') !== '0') {
            return redirect()->to(base_url('/login'))->with('error', 'Silakan login terlebih dahulu.');
        }
        $path = WRITEPATH . 'uploads/profile_pictures/' . $filename;

        if (!file_exists($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->response->setHeader('Content-Type', mime_content_type($path))
                              ->setBody(file_get_contents($path));
    }
    
    public function rangkuman_nilai($filename)
{
    $path = WRITEPATH . 'uploads/documents/akademik/rangkuman_nilai/' . $filename;

    if (!file_exists($path)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return $this->response
        ->setHeader('Content-Type', 'application/pdf')
        ->setHeader('Content-Disposition', 'inline; filename="' . basename($path) . '"')
        ->setBody(file_get_contents($path));
}


    // public function payment_proof($filename)
    // {
    //     $path = WRITEPATH . 'uploads/payment_proofs/' . $filename;

    //     if (!file_exists($path)) {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //     }

    //     return $this->response->setHeader('Content-Type', mime_content_type($path))
    //                           ->setBody(file_get_contents($path));
    // }

    // public function download_file($filename)
    // {
    //     $path = WRITEPATH . 'uploads/documents/' . $filename;

    //     if (!file_exists($path)) {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //     }

    //     return $this->response->download($path, null);
    // }
}
