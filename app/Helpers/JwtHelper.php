<?php

namespace App\Helpers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper {
    
    // Buat JWT Token
    public static function generateToken($data, $expire = 3600) {
        $secretKey = env('JWT_SECRET_KEY'); // Ambil dari file .env
        $issuedAt = time();
        $payload = [
            'iat' => $issuedAt, // Waktu token dibuat
            'exp' => $issuedAt + $expire, // Waktu token kedaluwarsa
            'data' => $data
        ];  
        return JWT::encode($payload, $secretKey, 'HS256');
    }

    // Verifikasi & Dekode Token
    public static function verifyToken($jwt) {
        $secretKey = env('JWT_SECRET_KEY'); // Ambil dari file .env
        try {
            $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
            return (array) $decoded->data;
        } catch (\Exception $e) {
            return null; // Jika token tidak valid atau expired
        }
    }
}
