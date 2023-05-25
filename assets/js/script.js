// Sweet Alert
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire(
        'Sukses',
        'Data Berhasil ' + flashData,
        'success'
    )
}

// Sweet Alert
const flashGagal = $('.flash-data-gagal').data('flashdata');

if (flashGagal) {
    Swal.fire(
        'Failed',
        'Data Gagal ' + flashGagal,
        'error'
    )
}

const pembayaran = $('.pembayaran-berhasil').data('flashdata');

if (pembayaran) {
    Swal.fire(
        'Sukses',
        'Pembayaran Berhasil',
        'success'
    )
}

const pembayaranGagal = $('.pembayaran-gagal').data('flashdata');

if (pembayaranGagal) {
    Swal.fire(
        'Gagal',
        'Pembayaran Gagal',
        'error'
    )
}


// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

