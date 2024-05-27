//Pengumuman
const toggleButtons = document.querySelectorAll('.toggle-button');
const cardBodies = document.querySelectorAll('.card-body-content');
toggleButtons.forEach((button, index) => {
  button.addEventListener('click', function() {
    cardBodies[index].style.display = cardBodies[index].style.display === 'none' ? 'block' : 'none';
    button.textContent = cardBodies[index].style.display === 'none' ? 'Baca Selengkapnya' : 'Sembunyikan';
  });
});
//profile picture
var file = document.getElementById("file-input");

var img = document.getElementById("profile-img");
var imgNav = document.getElementById("profile-img-nav");
file.addEventListener("change",(e)=>{
    img.src = URL.createObjectURL(e.target.files[0])
    imgNav.src = URL.createObjectURL(e.target.files[0])
});

//download CSV

function exportToCSV() {
  var table = document.getElementById("example3");
  var rows = table.getElementsByTagName("tr");

  var csv = [];
  for (var i = 0; i < rows.length; i++) {
      var row = [],
          cols = rows[i].querySelectorAll("td, th");

      for (var j = 0; j < cols.length; j++) {
          row.push(cols[j].innerText);
      }

      csv.push(row.join(","));
  }

  var csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
  var encodedUri = encodeURI(csvContent);

  var title = document.querySelector("title").innerText; // Mendapatkan judul dari elemen <title>
  var fileName = title.toLowerCase().replace(/ /g, "_") + ".csv"; // Modifikasi nama file sesuai judul

  var link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", fileName);
  document.body.appendChild(link); // Diperlukan untuk Firefox
  link.click();
  document.body.removeChild(link);
}

// Untuk text input other option
function checkOther() {
  var select = document.getElementById("capaian");
  var otherInput = document.getElementById("capaian-other");
  if (select.value === "Lainnya") {
      otherInput.classList.remove("hidden-other-option");
  } else {
      otherInput.classList.add("hidden-other-option");
  }
}

// Toggle filter
function toggleFilter() {
  var filterDiv = document.getElementById('advance-filter');
  if (filterDiv.style.display === 'none') {
      filterDiv.style.display = 'block';
  } else {
      filterDiv.style.display = 'none';
  }
}

// Advance Filter Laporan Akademik
