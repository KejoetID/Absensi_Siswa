
$(function() {
    $('tombolTambahData').on('click', function() {

        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');


    })


    $('.tampilModalUbah').on('click', function() {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/Mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nirm').val(data.nirm);
                $('#kelas').val(data.kelas);
                $('#Jurusan').val(data.Jurusan);
                $('#id').val(data.id);
            }
        });

    });
    
});