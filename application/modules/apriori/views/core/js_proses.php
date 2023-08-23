<!-- css -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


<!-- js -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">



<!-- Control -->
<script>
    $(document).ready(function() {
        const form = $('.modal-body').html();
        $('#tambah').click(function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">';
            $('#add').html(aksi);
            $('#modal').find('h5').html('Tambah')
            $('#modal').find('#btn').html('Tambah')
            $('#aksi').val('tambah');
            $('#modal').modal('show');
        });
        $('#data').on('click', '.edit', function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">' +
                '<input type="hidden" name="id" id="id">';
            $('#add').html(aksi);
            $('#modal').find('h5').html('Edit')
            $('#modal').find('#btn').html('Edit')
            id = $(this).data('id_role');
            role = $(this).data('role');
            $('#aksi').val('edit');
            $('#id').val(id);
            $('#role').val(role);
            $('#modal').modal('show');
        });
        $('#data').on('click', '.hapus', function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">' +
                '<input type="hidden" name="id" id="id">' +
                '<h3>Apakah Anda Yakin ?</h3>';
            $('.modal-body').html(aksi);
            $('#modal').find('h5').html('Hapus')
            $('#modal').find('#btn').html('Hapus')
            id = $(this).data('id_role');
            $('#aksi').val('hapus');
            $('#id').val(id);
            $('#modal').modal('show');
        });
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('role/aksi') ?>',
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                async: false,
                success: function(result) {
                    if (result.status == true) {
                        toastr["success"](result.pesan);
                    } else {
                        toastr["error"](result.pesan);
                    }
                    $('#myData').DataTable().ajax.reload();
                    $('#modal').modal('hide');
                }
                // Toast Manual
                // success: function(data) {
                //     var pesan = data;
                //     $(document).Toasts('create', {
                //         title: 'Success',
                //         body: pesan,
                //         class: 'bg-success mt-4 mr-4'
                //     });
                //     $('#myData').DataTable().ajax.reload();
                //     $('#modal').modal('hide');
                // }
            })
        });
        $('#uploaddata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('apriori/upload_proses') ?>',
                type: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                processData: false,
                async: false,
                success: function(hasil) {
                    if (hasil.status == true) {
                        toastr["success"](hasil.pesan);
                    } else {
                        toastr["error"](hasil.pesan);
                    }
                    $('#myData').DataTable().ajax.reload();
                    // $('[name="gambar"]').val('');
                    // $.ajax({
                    //     url: '<?= site_url('settings/getProfile') ?>',
                    //     type: 'POST',
                    //     dataType: 'json',
                    //     success: function(result) {
                    //         $('[name="nama"]').val(result.nama);
                    //         $('[name="gambarLama"]').val(result.logo);
                    //         $('[name="no"]').val(result.nohp);
                    //         $('[name="alamat"]').val(result.alamat);
                    //         $('#reset').html('<img src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah" id="output" width="200px" height="200px">');
                    //         $('.LOGO').html('<img class="user-image" src="<?= base_url() ?>assets/img/profile/' + result.logo +
                    //             '" width="40px" height="40px" alt="Logo">');
                    //         var med = '';
                    //         var sub = '';
                    //         $.ajax({
                    //             url: '<?= site_url('settings/getMedsos') ?>',
                    //             type: 'POST',
                    //             dataType: 'json',
                    //             success: function(medsos) {
                    //                 for (var i = 0; i < medsos.length; i++) {
                    //                     med += '<a href="' + medsos[i].link + '" class="btn btn-social-icon ' + medsos[i].warna + '"><i class="' + medsos[i].icon + '"></i></a> ';
                    //                 }
                    //                 sub = med;
                    //                 html = '<div class="card card-primary card-outline">' +
                    //                     '<div class="card-body box-profile">' +
                    //                     '<div class="text-center">' +
                    //                     '<img class="profile-user-img img-fluid img-circle logo" id="logo" src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah">' +
                    //                     '</div>' +
                    //                     '<h3 class="profile-username text-center">' + result.nama + '</h3>' +
                    //                     '<p class="text-muted text-center">' + result.alamat + '</p>' +
                    //                     '<div class="text-center" id="sosial">' +
                    //                     sub +
                    //                     '</div>';
                    //                 $('#pro').html(html);
                    //             }
                    //         })
                    //     }
                    // })
                }
            })
        });


    });
    showtable();

    const showtable = (start_date, end_date) => {
        var mytable = $('#myData').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('apriori/getLists'); ?>",
                "type": "POST",
                "data": {
                    start_date: start_date,
                    end_date: end_date
                }
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });
    }
    // const applysearch = () =>{}
</script>