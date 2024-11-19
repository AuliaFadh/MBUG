    
function t(text,value){
    console.log(text,"=",value)
}
function RpValue(rupiahString) {
    // Hapus karakter 'Rp' dan tanda titik (pemisar ribuan)
    let numericValue = rupiahString.replace('Rp ', '').replace(/\./g, '');
    
    // Mengubah hasilnya menjadi angka
    return Number(numericValue);
}

// Tahun Ajaran Filter
function TAQ(value) {
    let jenis = value.split(" ")[0] === "PTA" ? 0 : 1;
    let tahun = value.split(" ")[1].split("/");
    let tahunAwal = tahun[0];
    let tahunAkhir = tahun[1];
    let queue = tahunAwal + tahunAkhir + jenis;
    return queue;
}
function statusCheck(Value,TrueValue){
    if(Value.checked){
        return TrueValue;
    }
    return "False";
}
function parseDate(dateStr) {
    // Format tanggal pada TglMulaiCell dan lowTglMulai dalam format yang bisa diterima oleh konstruktor Date
    return new Date(dateStr);
}

function handleFilterAkademik() {    
    var lowIpk = parseFloat(document.getElementById('low-ipk').value);
    var highIpk = parseFloat(document.getElementById('high-ipk').value);
    var lowIpkLokal = parseFloat(document.getElementById('low-ipk-lokal').value);
    var highIpkLokal = parseFloat(document.getElementById('high-ipk-lokal').value);
    var lowIpkUU = parseFloat(document.getElementById('low-ipk-uu').value);
    var highIpkUU = parseFloat(document.getElementById('high-ipk-uu').value);
    var lowSemester = parseFloat(document.getElementById('low-semester').value);
    var highSemester = parseFloat(document.getElementById('high-semester').value);
    var checkDisetujui = document.getElementById('checkbox1');
    var checkDiproses = document.getElementById('checkbox2');
    var checkDitolak = document.getElementById('checkbox3');
    var lowTA = document.getElementById('find-ta-awal').value.trim().toUpperCase();
    var highTA = document.getElementById('find-ta-akhir').value.trim().toUpperCase();
    var displayedRowCount = 0;

    // Ambil semua baris tabel
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
        lowSemester = lowSemester || 0;
        highSemester = highSemester || 20;
        lowTA = lowTA || "PTA 0000/0000";
        highTA = highTA || "ATA 9999/9999";
        lowIpk = lowIpk || 0;
        highIpk = highIpk || 9;
        lowIpkLokal = lowIpkLokal || 0;
        highIpkLokal = highIpkLokal || 9;
        lowIpkUU = lowIpkUU || 0;
        highIpkUU = highIpkUU || 9;    
        

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        // Ambil nilai dari kolom yang relevan
        var semesterCell = parseInt(row.cells[5].innerText);
        var TACell = row.cells[6].innerText;
        var ipkCell = parseFloat(row.cells[7].innerText);
        var ipk_lokal_Cell = parseFloat(row.cells[8].innerText);
        var ipk_uu_Cell = parseFloat(row.cells[9].innerText);
        var statusCell = row.cells[11].innerText;

        
        var TAQueueCell = TAQ(TACell);
        var TAQueueAwal = TAQ(lowTA);
        var TAQueueAkhir = TAQ(highTA);
        var Disetujui = statusCheck(checkDisetujui,"Disetujui");
        var Diproses = statusCheck(checkDiproses,"Diproses");
        var Ditolak = statusCheck(checkDitolak,"Ditolak");
    
        if (ipkCell >= lowIpk &&
            ipkCell <= highIpk &&
            ipk_lokal_Cell >= lowIpkLokal &&
            ipk_lokal_Cell <= highIpkLokal &&
            ipk_uu_Cell >= lowIpkUU &&
            ipk_uu_Cell <= highIpkUU &&
            semesterCell >= lowSemester &&
            semesterCell <= highSemester &&
            TAQueueAwal <= TAQueueCell &&
            TAQueueAkhir >= TAQueueCell &&
            (statusCell==Disetujui|| statusCell==Diproses || statusCell==Ditolak )
            ) { // Menambahkan filter status
            row.style.display = '';
            displayedRowCount++;
        } else {
            row.style.display = 'none';
        }
    }
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}
function handleFilterKeaktifan() {    
    var lowDitagihkan = document.getElementById('low-ditagihkan').value;
    var highDitagihkan = document.getElementById('high-ditagihkan').value; 
    var lowPotongan = document.getElementById('low-potongan').value;
    var highPotongan = document.getElementById('high-potongan').value;        
    var lowSemester = parseFloat(document.getElementById('low-semester').value);
    var highSemester = parseFloat(document.getElementById('high-semester').value);
    var checkDisetujui = document.getElementById('checkbox1');
    var checkDiproses = document.getElementById('checkbox2');
    var checkDitolak = document.getElementById('checkbox3');
    var checkLulus = document.getElementById('checkbox4');
    var checkAktif = document.getElementById('checkbox5');
    var checkNoAktif = document.getElementById('checkbox6');
    var lowTA = document.getElementById('find-ta-awal').value.trim().toUpperCase();
    var highTA = document.getElementById('find-ta-akhir').value.trim().toUpperCase();
    var displayedRowCount = 0;
    
    // Ambil semua baris tabel
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    lowSemester = lowSemester || 0;
        highSemester = highSemester || 20;
        lowTA = lowTA || "PTA 0000/0000";
        highTA = highTA || "ATA 9999/9999";        
        lowDitagihkan = (lowDitagihkan && lowDitagihkan !== "Rp") ? lowDitagihkan : "Rp 0";
        highDitagihkan = (highDitagihkan && highDitagihkan !== "Rp") ? highDitagihkan : "Rp 999999999999";
        lowPotongan = (lowPotongan && lowPotongan !== "Rp") ? lowPotongan : "Rp 0";
        highPotongan = (highPotongan && highPotongan !== "Rp") ? highPotongan : "Rp 999999999999";

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        // Ambil nilai dari kolom yang relevan
        var semesterCell = parseInt(row.cells[5].innerText);
        var TACell = row.cells[6].innerText;        
        var DitagihkanCell = row.cells[8].innerText;
        var PotonganCell = parseFloat(row.cells[9].innerText);
        var statusMHSCell = row.cells[12].innerText;
        var statusCell = row.cells[13].innerText;
        
        
        

        var RpLowDitagihkan =  RpValue(lowDitagihkan);
        var RpHighDitagihkan =  RpValue(highDitagihkan);
        var RpLowPotongan =  RpValue(lowPotongan);
        var RpHighPotongan =  RpValue(highPotongan);
        var TAQueueCell = TAQ(TACell);
        var TAQueueAwal = TAQ(lowTA);
        var TAQueueAkhir = TAQ(highTA);
        var Disetujui = statusCheck(checkDisetujui,"Disetujui");
        var Diproses = statusCheck(checkDiproses,"Diproses");
        var Ditolak = statusCheck(checkDitolak,"Ditolak");
        var Lulus = statusCheck(checkLulus,"Lulus");
        var Aktif = statusCheck(checkAktif,"Aktif");
        var NoAktif = statusCheck(checkNoAktif,"Tidak Aktif");
    
    
        if (DitagihkanCell >= RpLowDitagihkan &&
            DitagihkanCell <= RpHighDitagihkan &&
            PotonganCell >= RpLowPotongan &&
            PotonganCell <= RpHighPotongan &&
            semesterCell >= lowSemester &&
            semesterCell <= highSemester &&
            TAQueueAwal <= TAQueueCell &&
            TAQueueAkhir >= TAQueueCell &&
            (statusCell==Disetujui|| statusCell==Diproses || statusCell==Ditolak ) &&
            (statusMHSCell==Lulus|| statusMHSCell==Aktif || statusMHSCell==NoAktif )
            ) { // Menambahkan filter status
            row.style.display = '';
            displayedRowCount++;
        } else {
            row.style.display = 'none';
        }
    }
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}
function handleFilterPrestasi() {    
    var lowTglMulai = document.getElementById('low-TglMulai').value;
    var highTglMulai = document.getElementById('high-TglMulai').value;    
    var lowTglSelesai = document.getElementById('low-TglSelesai').value;
    var highTglSelesai = document.getElementById('high-TglSelesai').value;            
    var checkDisetujui = document.getElementById('checkbox1');
    var checkDiproses = document.getElementById('checkbox2');
    var checkDitolak = document.getElementById('checkbox3');
    var checkTim = document.getElementById('checkbox4');
    var checkIndividu = document.getElementById('checkbox5');        
    var displayedRowCount = 0;        
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    
    
    lowTglMulai = lowTglMulai || "1 Januar,1982";
    highTglMulai = highTglMulai || "30 December,5000";
    lowTglSelesai = lowTglSelesai || "1 Januar,1982";
    highTglSelesai = highTglSelesai || "30 December,5000";
    
    
    

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];
        // Ambil nilai dari kolom yang relevan                  
        var JenisCell = row.cells[6].innerText;
        var TglMulaiCell = row.cells[10].innerText;
        var TglSelesaiCell = row.cells[11].innerText;                        
        var statusCell = row.cells[15].innerText;

        
        var Disetujui = statusCheck(checkDisetujui,"Disetujui");
        var Diproses = statusCheck(checkDiproses,"Diproses");
        var Ditolak = statusCheck(checkDitolak,"Ditolak");
        var Tim = statusCheck(checkTim,"Tim");
        var Individu = statusCheck(checkIndividu,"Individu");
        var lowTglMulaiDate = parseDate(lowTglMulai);
        var highTglMulaiDate = parseDate(highTglMulai);
        var TglMulaiCell = parseDate(TglMulaiCell);
        var lowTglSelesaiDate = parseDate(lowTglSelesai);
        var highTglSelesaiDate = parseDate(highTglSelesai);
        var TglSelesaiCell = parseDate(TglSelesaiCell);
       
        
        if (TglMulaiCell >= lowTglMulaiDate &&
            TglMulaiCell <= highTglMulaiDate &&
            TglSelesaiCell >= lowTglSelesaiDate &&
            TglSelesaiCell <= highTglSelesaiDate &&
            (statusCell==Disetujui|| statusCell==Diproses || statusCell==Ditolak ) &&
            (JenisCell==Tim|| JenisCell==Individu )
            ) { // Menambahkan filter status
            row.style.display = '';
            displayedRowCount++;
        } else {
            row.style.display = 'none';
        }
    }
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}
function handleFilterGform() {    
    var lowTglPembuatan = document.getElementById('low-TglPembuatan').value;
    var highTglPembuatan = document.getElementById('high-TglPembuatan').value;    

    var displayedRowCount = 0;     
    var tableRows = document.getElementById('example2').getElementsByTagName('tr');    
    
    lowTglPembuatan = lowTglPembuatan || "1 Januar,1982";
    highTglPembuatan = highTglPembuatan || "30 December,5000";

    

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];
        // Ambil nilai dari kolom yang relevan                          
        var TglPembuatanCell = row.cells[4].innerText;


        var lowTglPembuatanDate = parseDate(lowTglPembuatan);
        var highTglPembuatanDate = parseDate(highTglPembuatan);
        var TglPembuatanCell = parseDate(TglPembuatanCell);

       
        
        if (TglPembuatanCell >= lowTglPembuatanDate &&
            TglPembuatanCell <= highTglPembuatanDate
            ) { // Menambahkan filter status
            row.style.display = '';
            displayedRowCount++;
        } else {
            row.style.display = 'none';
        }
    }
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}
function handleFilterNews() {    
    var lowTglTerbit = document.getElementById('low-TglTerbit').value;
    var highTglTerbit = document.getElementById('high-TglTerbit').value;    
    var lowTglBatas = document.getElementById('low-TglBatas').value;
    var highTglBatas = document.getElementById('high-TglBatas').value;            
          
    var displayedRowCount = 0;        
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
    
    
    lowTglTerbit = lowTglTerbit || "1 Januar,1982";
    highTglTerbit = highTglTerbit || "30 December,5000";
    lowTglBatas = lowTglBatas || "1 Januar,1982";
    highTglBatas = highTglBatas || "30 December,5000";
    
    
    

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];
        // Ambil nilai dari kolom yang relevan                  
        
        var TglTerbitCell = row.cells[1].innerText;
        var TglBatasCell = row.cells[2].innerText;                        
        

        
        
        var lowTglTerbitDate = parseDate(lowTglTerbit);
        var highTglTerbitDate = parseDate(highTglTerbit);
        var TglTerbitCell = parseDate(TglTerbitCell);
        var lowTglBatasDate = parseDate(lowTglBatas);
        var highTglBatasDate = parseDate(highTglBatas);
        var TglBatasCell = parseDate(TglBatasCell);
       
        
        if (TglTerbitCell >= lowTglTerbitDate &&
            TglTerbitCell <= highTglTerbitDate &&
            TglBatasCell >= lowTglBatasDate &&
            TglBatasCell <= highTglBatasDate 
            ) { // Menambahkan filter status
            row.style.display = '';
            displayedRowCount++;
        } else {
            row.style.display = 'none';
        }
    }
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}
function handleFilterMBKM() {    

    var lowPeriode = parseFloat(document.getElementById('low-Periode').value);
    var highPeriode = parseFloat(document.getElementById('high-Periode').value);
    var checkDisetujui = document.getElementById('checkbox1');
    var checkDiproses = document.getElementById('checkbox2');
    var checkDitolak = document.getElementById('checkbox3');
    
    var displayedRowCount = 0;

    // Ambil semua baris tabel
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
        lowPeriode = lowPeriode || 1981;
        highPeriode = highPeriode || 5000;        

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        // Ambil nilai dari kolom yang relevan
        var PeriodeCell = parseInt(row.cells[7].innerText);        
        var statusCell = row.cells[9].innerText;

        var Disetujui = statusCheck(checkDisetujui,"Disetujui");
        var Diproses = statusCheck(checkDiproses,"Diproses");
        var Ditolak = statusCheck(checkDitolak,"Ditolak");
    
        if (
            PeriodeCell >= lowPeriode &&
            PeriodeCell <= highPeriode &&
            (statusCell==Disetujui|| statusCell==Diproses || statusCell==Ditolak )
            ) { // Menambahkan filter status
            row.style.display = '';
            displayedRowCount++;
        } else {
            row.style.display = 'none';
        }
    }
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}
function handleFilterPB() {    

    var lowTP = parseFloat(document.getElementById('low-TP').value);
    var highTP = parseFloat(document.getElementById('high-TP').value);
    var checkLulus = document.getElementById('checkbox1');
    var checkAktif = document.getElementById('checkbox2');
    var checkTAktif = document.getElementById('checkbox3');
    var checkCewe = document.getElementById('checkbox5');
    var checkCowo = document.getElementById('checkbox4');
    
    var displayedRowCount = 0;

    // Ambil semua baris tabel
    var tableRows = document.getElementById('example3').getElementsByTagName('tr');
        lowTP = lowTP || 1981;
        highTP = highTP || 5000;        

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        // Ambil nilai dari kolom yang relevan
        var GRCell = row.cells[6].innerText;
        var TPCell = parseInt(row.cells[7].innerText);        
        var statusCell = row.cells[8].innerText;
    


        var Lulus = statusCheck(checkLulus,"Lulus");
        var Aktif = statusCheck(checkAktif,"Aktif");
        var TAktif = statusCheck(checkTAktif,"Tidak Aktif");
        var Cewe = statusCheck(checkCewe,"Perempuan");
        var Cowo = statusCheck(checkCowo,"Laki-laki");
        
        
    
        if (
            TPCell >= lowTP &&
            TPCell <= highTP &&
            (statusCell==Lulus|| statusCell==Aktif || statusCell==TAktif )
            &&
            (GRCell==Cowo || GRCell==Cewe )
            ) { // Menambahkan filter status
            row.style.display = '';
            displayedRowCount++;
        } else {
            row.style.display = 'none';
        }
    }
    document.getElementById('rowCount').textContent = 'Jumlah baris yang ditampilkan: ' + displayedRowCount;
}