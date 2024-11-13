const searchInput = document.getElementById('search-input');
    const searchResult = document.getElementById('search-box');
    const searchnoData = document.getElementById('search-noData');

    searchInput.addEventListener('input', function() {
        // Ambil nilai yang sedang diketik oleh user
        const inputValue = searchInput.value.toLowerCase();

        // Ambil semua elemen spanJB dengan id npmdi dalam div result
        const listResults = searchResult.querySelectorAll('#search-data');

        // Cek apakah jbInput ada yang sama dengan spanJB-spannya
        let hasMatchingData = false;
        let count = 0; // Tambahkan variabel countJB untuk menghitung jumlah spanJB yang ditampilkan

        // Loop melalui setiap elemen spanJB dan tentukan apakah nilainya cocok dengan inputan user
        listResults.forEach(function(span) {
            const spanValue = span.textContent.toLowerCase();
            if (spanValue.includes(inputValue) && count < 5) { // Tambahkan kondisi countJB < 5
                // Jika nilai cocok dan countJB masih kurang dari 5, tampilkan elemen spanJB
                span.style.display = 'block';
                hasMatchingData = true;
                count++; // Tambahkan countJB
            } else {
                // Jika tidak cocok atau countJB sudah mencapai 5, sembunyikan elemen spanJB
                span.style.display = 'none';
            }
        });

        // Tentukan apakah div result harus ditampilkan atau disembunyikan berdasarkan apakah ada elemen spanJB yang ditampilkan
        if (hasMatchingData) {
            searchResult.style.display = 'block';
            searchnoDataJB.style.display = 'none';
        } else {
            searchnoDataJB.style.display = 'block';
        }

        // Jika jbInput tidak diisi, sembunyikan div result dan spanJB "data tidak ada"
        if (inputValue === '') {
            searchjbResult.style.display = 'none';
            searchnoDataJB.style.display = 'none';
        }

    });
    searchInput.addEventListener('blur', function() {
        // Menyembunyikan elemen hasil

        setTimeout(function() {
            searchResult.style.display = 'none';
        }, 500);
    });

    function fillInputSearch(JB) {
        searchInput.value = JB;

    }