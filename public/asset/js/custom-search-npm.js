
// const npmInput = document.getElementById('find-npm');
// const npmName = document.getElementById('nama');
// const npmPs = document.getElementById('prodi');
// const npmResult = document.getElementById('box-find-npm');
// const noDataNPM = document.getElementById('no-data-find-npm');


// npmInput.addEventListener('input', function() {
//     // Ambil nilai yang sedang diketik oleh user
//     const inputValueNPM = npmInput.value.toLowerCase();

//     // Ambil semua elemen spanNPM dengan id npmdi dalam div result
//     const listResultsNPM = npmResult.querySelectorAll('#npm-data');

//     // Cek apakah npmInput ada yang sama dengan spanNPM-spannya
//     let hasMatchingDataNPM = false;
//     let countNPM = 0; // Tambahkan variabel countNPM untuk menghitung jumlah spanNPM yang ditampilkan

//     // Loop melalui setiap elemen spanNPM dan tentukan apakah nilainya cocok dengan inputan user
//     listResultsNPM.forEach(function(spanNPM) {
//         const spanValueNPM = spanNPM.textContent.toLowerCase();
//         if (spanValueNPM.includes(inputValueNPM) && countNPM < 5) { // Tambahkan kondisi countNPM < 5
//             // Jika nilai cocok dan countNPM masih kurang dari 5, tampilkan elemen spanNPM
//             spanNPM.style.display = 'block';
//             hasMatchingDataNPM = true;
//             countNPM++; // Tambahkan countNPM
//         } else {
//             // Jika tidak cocok atau countNPM sudah mencapai 5, sembunyikan elemen spanNPM
//             spanNPM.style.display = 'none';
//         }
//     });

//     // Tentukan apakah div result harus ditampilkan atau disembunyikan berdasarkan apakah ada elemen spanNPM yang ditampilkan
//     if (hasMatchingDataNPM) {
//         npmResult.style.display = 'block';
//         noDataNPM.style.display = 'none';
//     } else {
//         noDataNPM.style.display = 'block';
//     }

//     // Jika npmInput tidak diisi, sembunyikan div result dan spanNPM "data tidak ada"
//     if (inputValueNPM === '') {
//         npmResult.style.display = 'none';
//         noDataNPM.style.display = 'none';
//     }
    
// });
// npmInput.addEventListener('blur', function() {
//     setTimeout(function() {
//         npmResult.style.display = 'none';
//       },500); // 2000 milidetik atau 2 detik
    
// });

// function fillInputNPM(npm,name,major) {
//     console.log(npm,name,major);
//     npmInput.value = npm;
//     npmName.value = name;
//     npmPs.value = major;
// }
    
