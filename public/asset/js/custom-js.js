const toggleButtons = document.querySelectorAll('.toggle-button');
const cardBodies = document.querySelectorAll('.card-body-content');

toggleButtons.forEach((button, index) => {
  button.addEventListener('click', function() {
    cardBodies[index].style.display = cardBodies[index].style.display === 'none' ? 'block' : 'none';
    button.textContent = cardBodies[index].style.display === 'none' ? 'Baca Selengkapnya' : 'Sembunyikan';
  });
});


//Delete ALert delete user
function deleteConfirmation_beasiswa(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Beasiswa akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d000fa',
        cancelButtonColor: '#EB823B',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect atau panggil fungsi deleteData() untuk menghapus data
            deleteData_beasiswa(id);
        }
    });
}
function deleteData_beasiswa(id) {
    // deletenya disini ul
    // window.location.href = "/backsite/user/delete/" + id;

}

function deleteConfirmation_penerima(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Penerima akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d000fa',
        cancelButtonColor: '#EB823B',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect atau panggil fungsi deleteData() untuk menghapus data
            deleteData_penerima(id);
        }
    });
}
function deleteData_penerima(id) {
    // deletenya disini ul
    // window.location.href = "/backsite/user/delete/" + id;

}
function deleteConfirmation_user(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "User akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d000fa',
        cancelButtonColor: '#EB823B',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect atau panggil fungsi deleteData() untuk menghapus data
            deleteData_user(id);
        }
    });
}
function deleteData_user(id) {
    // deletenya disini ul
    // window.location.href = "/admin/beasiswa/delete/" + id;

}





//Pencegahan user menginput file lain 



function readCSV(file) {
  return new Promise((resolve, reject) => {
      const reader = new FileReader();

      reader.onload = (event) => {
          const contents = event.target.result;
          resolve(contents);
      };

      reader.onerror = (event) => {
          reject(event.target.error);
      };

      reader.readAsText(file);
  });
}

const csvFileInput = document.getElementById('csv-file-input');
const csvTable = document.querySelector('.csv-table');
const csvHeaderRow = document.querySelector('.csv-header-row');
const csvBody = document.querySelector('.csv-body');

csvFileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];

  if (!file) {
      return; // Jika user membatalkan pilihan file
  }

  const allowedExtensions = /(\.csv)$/i;
  const isValidExtension = allowedExtensions.exec(file.name);

  if (!isValidExtension) {
      alert('Harap pilih file CSV saja!');
      return; // Membatalkan pembacaan file jika format tidak sesuai
  }

  readCSV(file)
      .then((contents) => {
          const rows = contents.split('\n');
          const headerCells = rows[0].split(',');

          // Generate table header
          headerCells.forEach((cell) => {
              const th = document.createElement('th');
              th.textContent = cell;
              csvHeaderRow.appendChild(th);
          });

          // Generate table rows
          for (let i = 1; i < rows.length; i++) {
              const rowCells = rows[i].split(',');
              const tr = document.createElement('tr');

              rowCells.forEach((cell) => {
                  const td = document.createElement('td');
                  td.textContent = cell;
                  tr.appendChild(td);
              });

              csvBody.appendChild(tr);
          }

          // Show the table
          csvTable.style.display = 'table';
      })
      .catch((error) => {
          console.error(error);
      });
});



// Read CSV and view




// function readCSV(file) {
//   return new Promise((resolve, reject) => {
//     const reader = new FileReader();

//     reader.onload = (event) => {
//       const contents = event.target.result;
//       resolve(contents);
//     };

//     reader.onerror = (event) => {
//       reject(event.target.error);
//     };

//     reader.readAsText(file);
//   });
// }


// const csvFileInput = document.getElementById('csv-file-input');
// const csvTable = document.querySelector('.csv-table');
// const csvHeaderRow = document.querySelector('.csv-header-row');
// const csvBody = document.querySelector('.csv-body');

// csvFileInput.addEventListener('change', (event) => {
//   const file = event.target.files[0];

//   readCSV(file)
//     .then((contents) => {
//       const rows = contents.split('\n');
//       const headerCells = rows[0].split(',');

//       // Generate table header
//       headerCells.forEach((cell) => {
//         const th = document.createElement('th');
//         th.textContent = cell;
//         csvHeaderRow.appendChild(th);
//       });

//       // Generate table rows
//       for (let i = 1; i < rows.length; i++) {
//         const rowCells = rows[i].split(',');
//         const tr = document.createElement('tr');

//         rowCells.forEach((cell) => {
//           const td = document.createElement('td');
//           td.textContent = cell;
//           tr.appendChild(td);
//         });

//         csvBody.appendChild(tr);
//       }

//       // Show the table
//       csvTable.style.display = 'table';
//     })
//     .catch((error) => {
//       console.error(error);
//     });
// });

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

//Input langsung menampilkan foto
