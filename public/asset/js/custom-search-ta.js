const TAInput = document.getElementById('find-ta');
const TAResult = document.getElementById('box-find-ta');
const noDataTA = document.getElementById('no-data-find-ta');


TAInput.addEventListener('input', function() {
    // Ambil nilai yang sedang diketik oleh user
    const inputValueTA = TAInput.value.toLowerCase();

    // Ambil semua elemen spanTA dengan id TAdi dalam div result
    const listResultsTA = TAResult.querySelectorAll('#ta-data');

    // Cek apakah TAInput ada yang sama dengan spanTA-spannya
    let hasMatchingDataTA = false;
    let countTA = 0; // Tambahkan variabel countTA untuk menghitung jumlah spanTA yang ditampilkan

    // Loop melalui setiap elemen spanTA dan tentukan apakah nilainya cocok dengan inputan user
    listResultsTA.forEach(function(spanTA) {
        const spanValueTA = spanTA.textContent.toLowerCase();
        if (spanValueTA.includes(inputValueTA) && countTA < 5) { // Tambahkan kondisi countTA < 5
            // Jika nilai cocok dan countTA masih kurang dari 5, tampilkan elemen spanTA
            spanTA.style.display = 'block';
            hasMatchingDataTA = true;
            countTA++; // Tambahkan countTA
        } else {
            // Jika tidak cocok atau countTA sudah mencapai 5, sembunyikan elemen spanTA
            spanTA.style.display = 'none';
        }
    });

    // Tentukan apakah div result harus ditampilkan atau disembunyikan berdasarkan apakah ada elemen spanTA yang ditampilkan
    if (hasMatchingDataTA) {
        TAResult.style.display = 'block';
        noDataTA.style.display = 'none';
    } else {
        noDataTA.style.display = 'block';
    }

    // Jika TAInput tidak diisi, sembunyikan div result dan spanTA "data tidak ada"
    if (inputValueTA === '') {
        TAResult.style.display = 'none';
        noDataTA.style.display = 'none';
    }
    
});
TAInput.addEventListener('blur', function() {
    setTimeout(function() {
        TAResult.style.display = 'none';
      },500); // 2000 milidetik atau 2 detik
    
});
function fillInputTA(TA) {
    TAInput.value = TA;
    
}
