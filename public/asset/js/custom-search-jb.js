const jbInput = document.getElementById('jb-input');
const jbResult = document.getElementById('jb-search');
const noDataJB = document.getElementById('jb-noData');

jbInput.addEventListener('input', function() {
    // Ambil nilai yang sedang diketik oleh user
    const inputValueJB = jbInput.value.toLowerCase();

    // Ambil semua elemen spanJB dengan id npmdi dalam div result
    const listResultsJB = jbResult.querySelectorAll('#jb-data');

    // Cek apakah jbInput ada yang sama dengan spanJB-spannya
    let hasMatchingDataJB = false;
    let countJB = 0; // Tambahkan variabel countJB untuk menghitung jumlah spanJB yang ditampilkan

    // Loop melalui setiap elemen spanJB dan tentukan apakah nilainya cocok dengan inputan user
    listResultsJB.forEach(function(spanJB) {
        const spanValueJB = spanJB.textContent.toLowerCase();
        if (spanValueJB.includes(inputValueJB) && countJB < 5) { // Tambahkan kondisi countJB < 5
            // Jika nilai cocok dan countJB masih kurang dari 5, tampilkan elemen spanJB
            spanJB.style.display = 'block';
            hasMatchingDataJB = true;
            countJB++; // Tambahkan countJB
        } else {
            // Jika tidak cocok atau countJB sudah mencapai 5, sembunyikan elemen spanJB
            spanJB.style.display = 'none';
        }
    });

    // Tentukan apakah div result harus ditampilkan atau disembunyikan berdasarkan apakah ada elemen spanJB yang ditampilkan
    if (hasMatchingDataJB) {
        jbResult.style.display = 'block';
        noDataJB.style.display = 'none';
    } else {
        noDataJB.style.display = 'block';
    }

    // Jika jbInput tidak diisi, sembunyikan div result dan spanJB "data tidak ada"
    if (inputValueJB === '') {
        jbResult.style.display = 'none';
        noDataJB.style.display = 'none';
    }
    
});
jbInput.addEventListener('blur', function() {
    // Menyembunyikan elemen hasil
   
    setTimeout(function() {
        jbResult.style.display = 'none';
      },500);
});
function fillInputJB(JB) {
    jbInput.value = JB;
    
}


