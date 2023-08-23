

const csvFileInput = document.getElementById('csv-file-input');
const csvTable = document.querySelector('.csv-table');
const csvHeaderRow = document.querySelector('.csv-header-row');
const csvBody = document.querySelector('.csv-body');
//Read CSV
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
  
  
