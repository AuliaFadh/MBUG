// document.addEventListener('DOMContentLoaded', function() {

//     const findProvinsi = document.getElementById('find-provinsi');
//     findProvinsi.addEventListener('input', function() {
//         findResult('find-provinsi');
//     });
//     findProvinsi.addEventListener('blur', function() {
//         hideResult('find-provinsi');
//     });

//     const findKabkot = document.getElementById('find-kabkot');
//     findKabkot.addEventListener('input', function() {
//         findResult('find-kabkot');
//     });
//     findKabkot.addEventListener('blur', function() {
//         hideResult('find-kabkot');
//     });

//     const findkecamatan = document.getElementById('find-kecamatan');
//     findkecamatan.addEventListener('input', function() {
//         findResult('find-kecamatan');
//     });
//     findkecamatan.addEventListener('blur', function() {
//         hideResult('find-kecamatan');
//     });

//     const findkelurahan = document.getElementById('find-kelurahan');
//     findkelurahan.addEventListener('input', function() {
//         findResult('find-kelurahan');
//     });
//     findkelurahan.addEventListener('blur', function() {
//         hideResult('find-kelurahan');
//     });

//     const findProvinsiSekolah = document.getElementById('find-provinsi-sekolah');
//     findProvinsiSekolah.addEventListener('input', function() {
//         findResult('find-provinsi-sekolah');
//     });
//     findProvinsiSekolah.addEventListener('blur', function() {
//         hideResult('find-provinsi-sekolah');
//     });

//     const findkotakab_sekolah = document.getElementById('find-kotakab_sekolah');
//     findkotakab_sekolah.addEventListener('input', function() {
//         findResult('find-kotakab_sekolah');
//     });
//     findkotakab_sekolah.addEventListener('blur', function() {
//         hideResult('find-kotakab_sekolah');
//     });
    
// });




// Do not modification, except in if condition
function findResult(inputId){
    let hasMatchingData = false;
    let count = 0;

    const findInput = document.getElementById(inputId);
    const inputValue = findInput.value.toLowerCase();
    
    const boxId = `box-${inputId}`;
    const boxData = document.getElementById(boxId);
    
    const dataId = `#data-${inputId}`;
    
    const listData = boxData.querySelectorAll(dataId);
    
    const noDataId= `no-data-${inputId}`;
    const noData = document.getElementById(noDataId);

    listData.forEach(function(span) {
        const spanValue = span.textContent.toLowerCase();
        if (spanValue.includes(inputValue)) { // Tambahkan kondisi contoh : count < 5
            // Jika nilai cocok dan countJB masih kurang dari 5, tampilkan elemen spanJB
            span.style.display = 'block';
            hasMatchingData = true;
            count++; // Tambahkan countJB
        } else {
            // Jika tidak cocok atau countJB sudah mencapai 5, sembunyikan elemen spanJB
            span.style.display = 'none';
        }
    });
    if (hasMatchingData) {
    boxData.style.display = 'block';
        noData.style.display = 'none';
    } else {
        noData.style.display = 'block';
    }
    return 0;
}

function hideResult(inputId){
    const boxId = `box-${inputId}`;
    const boxData = document.getElementById(boxId);
    setTimeout(function() {
        boxData.style.display = 'none';
    }, 300);
}
function fillFindInput(Id,result1) {
    const findInput = document.getElementById(Id);            
    findInput.value = result1;            
}

function fillFindInput(Id1,result1,Id2,result2,Id3,result3) {
    const findInput1 = document.getElementById(Id1);            
    const findInput2 = document.getElementById(Id2);
    const findInput3 = document.getElementById(Id3);
    findInput1.value = result1;           
        findInput2.value = result2;
        findInput3.value = result3;
}