function keluar() {
  Swal.fire({
    title: 'Keluar?',
    text: "Tekan tombol Keluar di bawah ini untuk mengakhiri sesi anda!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#00008C',
    cancelButtonColor: '#FF5154',
    confirmButtonText: 'Keluar!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('keluar').submit();
    }
  })
}