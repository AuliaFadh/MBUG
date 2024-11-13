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
document.querySelector("form").addEventListener("submit", function(e) {
    let jumlahDitagihkan = document.getElementById("jumlah_ditagihkan");
    let jumlahPotongan = document.getElementById("jumlah_potongan");

    // Mengubah inputan kembali ke nilai numerik saat form disubmit
    jumlahDitagihkan.value = getNumericalValue(jumlahDitagihkan);
    jumlahPotongan.value = getNumericalValue(jumlahPotongan);
});