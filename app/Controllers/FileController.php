<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FileController extends BaseController
{
    public function serveFile($type, $filename)
    {
        // 1. Pastikan pengguna sudah login
        if (!session()->get('username')) {
            return $this->response->setStatusCode(401)->setBody('Silakan login terlebih dahulu.');
        }

        $hakAkses = session()->get('hak_akses');
        $username = session()->get('username'); // NPM mahasiswa yang login

        // Tipe berkas yang diperbolehkan
        $allowedTypes = ['krs', 'blanko_pembayaran', 'bukti_pembayaran', 'rangkuman_nilai', 'bukti_prestasi', 'picture'];
        if (!in_array($type, $allowedTypes)) {
            return $this->response->setStatusCode(404)->setBody('Tipe file tidak valid.');
        }

        $filePath = WRITEPATH . 'uploads/' . $type . '/' . $filename;
        if (!file_exists($filePath)) {
            return $this->response->setStatusCode(404)->setBody('File tidak ditemukan.');
        }

        // 2. Cek Otorisasi (Hanya Admin [1] ATAU pemilik dokumen [0] yang boleh mengakses)
        if ($hakAkses !== '1') {
            $db = \Config\Database::connect();
            $isOwner = false;

            // Cari id_penerima mahasiswa yang sedang login
            $student = $db->table('penerima_beasiswa')->where('npm', $username)->get()->getRowArray();
            
            if ($student) {
                $idPenerima = $student['id_penerima'];

                if ($type === 'krs' || $type === 'blanko_pembayaran' || $type === 'bukti_pembayaran') {
                    // Cari di tabel laporan_keaktifan
                    $record = $db->table('laporan_keaktifan')
                        ->where('krs', $filename)
                        ->orWhere('blanko_pembayaran', $filename)
                        ->orWhere('bukti_pembayaran', $filename)
                        ->get()->getRowArray();

                    if ($record && $record['id_penerima'] == $idPenerima) {
                        $isOwner = true;
                    }
                } elseif ($type === 'rangkuman_nilai') {
                    // Cari di tabel laporan_akademik
                    $record = $db->table('laporan_akademik')->where('rangkuman_nilai', $filename)->get()->getRowArray();
                    if ($record && $record['id_penerima'] == $idPenerima) {
                        $isOwner = true;
                    }
                } elseif ($type === 'bukti_prestasi') {
                    // Cari di tabel laporan_prestasi
                    $record = $db->table('laporan_prestasi')->where('bukti_prestasi', $filename)->get()->getRowArray();
                    if ($record && $record['id_penerima'] == $idPenerima) {
                        $isOwner = true;
                    }
                } elseif ($type === 'picture') {
                    // Foto profil pada tabel penerima_beasiswa
                    if ($student['ppicture'] === $filename) {
                        $isOwner = true;
                    }
                }
            }

            // Jika bukan pemilik dokumen dan bukan admin, tolak akses (HTTP 403 Forbidden)
            if (!$isOwner) {
                return $this->response->setStatusCode(403)->setBody('Anda tidak memiliki akses ke dokumen ini.');
            }
        }

        // 3. Kirim berkas dengan MIME type yang sesuai
        $mimeType = mime_content_type($filePath);
        return $this->response
            ->setHeader('Content-Type', $mimeType)
            ->setBody(file_get_contents($filePath));
    }
}
