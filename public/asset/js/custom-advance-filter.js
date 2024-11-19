    
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
    t("lowTglMulai",lowTglMulai);
    t("highTglMulai",highTglMulai);
    
    lowTglMulai = lowTglMulai || "1 Januar,1982";
    highTglMulai = highTglMulai || "30 December,5000";
    lowTglSelesai = lowTglSelesai || "1 Januar,1982";
    highTglSelesai = highTglSelesai || "30 December,5000";
    t("lowTglMulai2",lowTglMulai);
    t("highTglMulai2",highTglMulai);
    
    

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];
        // Ambil nilai dari kolom yang relevan                  
        var JenisCell = row.cells[6].innerText;
        var TglMulaiCell = row.cells[10].innerText;
        var TglSelesaiCell = row.cells[11].innerText;                        
        var statusCell = row.cells[15].innerText;

        t("TglMulaiCell",TglMulaiCell);
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
