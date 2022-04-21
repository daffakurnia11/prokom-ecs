const flashdata = $('#flash-data').data('flashdata');

if (flashdata) {
  // Account verified
  if (flashdata == 'Account verified') {
    Swal.fire({
      icon: 'success',
      title: flashdata,
      text: 'Akun sudah berhasil di verifikasi!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Announcement created
  if (flashdata == 'Announcement created') {
    Swal.fire({
      icon: 'success',
      title: flashdata,
      text: 'Pengumuman berhasil dibuat!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Announcement updated
  if (flashdata == 'Announcement updated') {
    Swal.fire({
      icon: 'success',
      title: flashdata,
      text: 'Pengumuman berhasil diubah!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Schedule created
  if (flashdata == 'Schedule created') {
    Swal.fire({
      icon: 'success',
      title: flashdata,
      text: 'Jadwal berhasil dibuat!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Schedule updated
  if (flashdata == 'Schedule updated') {
    Swal.fire({
      icon: 'success',
      title: flashdata,
      text: 'Jadwal berhasil diubah!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Code regenerated
  if (flashdata == 'Code regenerated') {
    Swal.fire({
      icon: 'success',
      title: flashdata,
      text: 'Kode Presensi berhasil diubah!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Kode Presensi salah!
  if (flashdata == 'Kode Presensi salah!') {
    Swal.fire({
      icon: 'error',
      title: flashdata,
      text: 'Silakan masukkan kode presensi kembali.',
      confirmButtonColor: '#c6384d',
    })
  }
  // Kehadiran tercatat!
  if (flashdata == 'Kehadiran tercatat!') {
    Swal.fire({
      icon: 'success',
      title: flashdata,
      text: 'Terima kasih sudah hadir.',
      confirmButtonColor: '#c6384d',
    })
  }
}

$(function () {
  $('#deleteButton').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Deleting data?',
      text: "The deleted data cannot be restored.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $(this).parent('form').submit();
      }
    })
  })
})