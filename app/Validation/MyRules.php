<?php
namespace App\Validation;

class MyRules
{
    // ✅ Validasi Huruf Kapital
    public function uppercase(string $str, ?string $fields = null, array $data = []): bool
    {
        return preg_match('/[A-Z]/', $str) === 1;
    }

    // ✅ Validasi Minimal 1 Angka
    public function contains_digit(string $str, ?string $fields = null, array $data = []): bool
    {
        return preg_match('/\d/', $str) === 1;
    }

    // ✅ Validasi Minimal 1 Simbol (@$!%*?&)
    public function contains_symbol(string $str, ?string $fields = null, array $data = []): bool
    {
        return preg_match('/[@$!%*?&]/', $str) === 1;
    }
}
?>