
function test1(label,hasil){
    console.log(label+' = '+ hasil);
}
// document.addEventListener('DOMContentLoaded', function() {
//     var rows = document.querySelectorAll('table tbody tr');
//     document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + rows.length;
// });
// Status Filter 
function filterTableStatus(Class,statusTextValue) {
    var rows = document.querySelectorAll('table tbody tr');
    var displayedRowCount = 0;
    var classSpan=`span.${Class}`;
    rows.forEach(function(row) {
        var statusCell = row.querySelector(classSpan);
        if (statusCell && statusCell.textContent.trim() === statusTextValue) {
            row.style.display = 'table-row'; // Menampilkan baris
            displayedRowCount++;
        } else {
            row.style.display = 'none'; // Menyembunyikan baris
        }
    });

    // Update jumlah baris yang ditampilkan
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}

function FillterScoreSingle(low1Id,highId1,coloum){    
    var low1 = document.getElementById(low1Id).value;
    var high1 = document.getElementById(highId1).value;
    var varcoloum = parseInt(coloum, 10);
        var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        var CellValue= parseInt(row.cells[varcoloum].innerText);
       
        

        if (CellValue >=low1  &&
            CellValue <= high1) {
            row.style.display = ''; // Tampilkan baris jika memenuhi kriteria
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika tidak memenuhi kriteria
        }
    }
};
function FillterScoreDouble(low1Id,lowColoum,highId1,highColoum,type){    
    var low1 = document.getElementById(low1Id).value;
    var high1 = document.getElementById(highId1).value;
    if(type=='date'){
        test1('tgl1', low1);
        test1('tgl2', high1);
    }
    var low1 = document.getElementById(low1Id).value;
    var high1 = document.getElementById(highId1).value;
    var varlowColoum = parseInt(lowColoum, 10);
    var varhighColoum = parseInt(highColoum, 10);
        var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        var lowCellValue= parseInt(row.cells[varlowColoum].innerText);
        var highCellValue= parseInt(row.cells[varhighColoum].innerText);
       
        

        if (lowCellValue >=low1  &&
            highCellValue <= high1) {
            row.style.display = ''; // Tampilkan baris jika memenuhi kriteria
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika tidak memenuhi kriteria
        }
    }
};



function handleFilterAkademik() {
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const nextYear = currentYear + 1;
    var In_awalTahunLow = 0;
    var In_akhirTahunLow = 0;
    var In_awalTahunHigh = 0;
    var In_akhirTahunHigh = 0;



    // Ambil nilai dari input IPK rendah dan tinggi
    var lowIpk = parseFloat(document.getElementById('low-ipk').value);
    var highIpk = parseFloat(document.getElementById('high-ipk').value);
    var lowIpkLokal = parseFloat(document.getElementById('low-ipk-lokal').value);
    var highIpkLokal = parseFloat(document.getElementById('high-ipk-lokal').value);
    var lowIpkUU = parseFloat(document.getElementById('low-ipk-uu').value);
    var highIpkUU = parseFloat(document.getElementById('high-ipk-uu').value);
    var lowSemester = parseFloat(document.getElementById('low-semester').value);
    var highSemester = parseFloat(document.getElementById('high-semester').value);
    // var highAjaran = document.getElementById('high-ajaran').value;
    // var [kriteria_ajaran_high, String_ajaran_high] = highAjaran.split(' ', 2);
    // var lowAjaran = document.getElementById('low-ajaran').value;
    // var [kriteria_ajaran_low, String_ajaran_low] = lowAjaran.split(' ', 2);




    // if (lowAjaran === '') {
    //     In_awalTahunLow = 1982;
    //     In_akhirTahunLow = 1983;
    // } else {
    //     [In_awalTahunLow, In_akhirTahunLow] = String_ajaran_low.split('/');
    // }
    // if (highAjaran === '') {
    //     In_awalTahunHigh = currentYear;
    //     In_akhirTahunHigh = nextYear;
    // } else {
    //     [In_awalTahunHigh, In_akhirTahunHigh] = String_ajaran_high.split('/');
    // }

    // Loop melalui setiap baris tabel, mulai dari baris kedua (indeks 1) karena baris pertama adalah header
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        var semesterCell = parseInt(row.cells[5].innerText);
        // var AjaranCell = row.cells[6].innerText;
        var ipkCell = parseFloat(row.cells[7].innerText); // Mengambil nilai IPK dari sel yang ke-7
        var ipk_lokal_Cell = parseFloat(row.cells[8].innerText);
        var ipk_uu_Cell = parseFloat(row.cells[9].innerText);

        // var [kriteria_ajaran_Cell, String_ajaran_Cell] = AjaranCell.split(' ', 2);
        // var [Out_awalTahunCell, Out_akhirTahunCell] = String_ajaran_Cell.split('/');


        // Pisahkan bagian tahun berdasarkan karakter '/'


        if (ipkCell >= lowIpk &&
            ipkCell <= highIpk &&
            ipk_lokal_Cell >= lowIpkLokal &&
            ipk_lokal_Cell <= highIpkLokal &&
            ipk_uu_Cell >= lowIpkUU &&
            ipk_uu_Cell <= highIpkUU &&
            semesterCell >= lowSemester &&
            semesterCell <= highSemester 
            // &&
            // Out_awalTahunCell >= In_awalTahunLow &&
            // Out_akhirTahunCell <= In_akhirTahunHigh

        ) {
            row.style.display = ''; // Tampilkan baris jika memenuhi kriteria
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika tidak memenuhi kriteria
        }
    }

}

// Tambahkan event listener untuk memanggil fungsi handleFilterAkademik saat nilai input IPK berubah
document.getElementById('low-ipk-lokal').addEventListener('input', handleFilterAkademik);
document.getElementById('high-ipk-lokal').addEventListener('input', handleFilterAkademik);
document.getElementById('low-ipk-uu').addEventListener('input', handleFilterAkademik);
document.getElementById('high-ipk-uu').addEventListener('input', handleFilterAkademik);
document.getElementById('low-semester').addEventListener('input', handleFilterAkademik);
document.getElementById('high-semester').addEventListener('input', handleFilterAkademik);
document.getElementById('low-ipk').addEventListener('input', handleFilterAkademik);
document.getElementById('high-ipk').addEventListener('input', handleFilterAkademik);
// document.getElementById('low-ajaran').addEventListener('input', handleFilterAkademik);
// document.getElementById('high-ajaran').addEventListener('input', handleFilterAkademik);
