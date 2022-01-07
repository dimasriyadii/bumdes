const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {
    Swal.fire(
        'Selamat Data...',
        'Berhasil di ' + flashData,
        'success'
    );
}

// tombol-hapus
$('.tombol-hapus').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });