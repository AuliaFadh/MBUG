
function deleteData_news(id) {
    window.location.href = "/admin/pengumuman/delete/" + id;
  }

function deleteData_user(id) {
    window.location.href = "/admin/manajemen/delete/" + id;
  }
function deleteData_beasiswa(id) {
    window.location.href = "/admin/beasiswa/delete/" + id;
  }
function deleteData_penerima(id) {
    window.location.href = "/admin/penerima/delete/" + id;
}
function deleteData_gform(id) {
    window.location.href = "/admin/gform/delete/" + id;
}

function deleteConfirmation_news(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Pengumuman akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d000fa',
        cancelButtonColor: '#EB823B',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteData_news(id);
        }
    });
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
            deleteData_penerima(id);
        }
    });
  }

  function deleteConfirmation_gform(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Tautan akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d000fa',
        cancelButtonColor: '#EB823B',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteData_gform(id);
        }
    });
  }


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
  