function formatRupiah(element) {
    let value = element.value.replace(/[^\d]/g, ''); // Hapus karakter non-digit
    let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format dengan titik sebagai pemisah ribuan
    element.value = 'Rp ' + formattedValue;
}

// Fungsi untuk mendapatkan nilai numerik saat pengiriman form (misalnya ke database)
function getNumericalValue(element) {
    let value = element.value.replace(/[^\d]/g, ''); // Hapus simbol dan non-digit
    return value; // Kembalikan angka murni
}

// Jika Anda ingin menghapus format saat form disubmit, Anda bisa menggunakan event "submit" atau button "click"
