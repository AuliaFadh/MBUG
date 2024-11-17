    
function t(text,value){
    console.log(text,"=",value)
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

    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];

        // Ambil nilai dari kolom yang relevan
        var semesterCell = parseInt(row.cells[5].innerText);
        var TACell = row.cells[6].innerText;
        var ipkCell = parseFloat(row.cells[7].innerText);
        var ipk_lokal_Cell = parseFloat(row.cells[8].innerText);
        var ipk_uu_Cell = parseFloat(row.cells[9].innerText);
        var statusCell = row.cells[11].innerText;

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