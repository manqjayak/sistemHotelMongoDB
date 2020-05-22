</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= BASEURL ?>public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= BASEURL ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= BASEURL ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= BASEURL ?>public/dist/js/adminlte.js"></script>



<script>
    // // toogle active
    // $('a.active').removeClass('active');

    // // edit untuk kamar
    let editKamar = false;
    $(document).on('click', '#editButton', function() {
        if (!editKamar) {
            editKamar = true
            let noKamar = $(this).data('kamar')
            let jenisKamar = $('#j' + noKamar).html()
            let hargaKamar = $('#h' + noKamar).html()
            console.log(jenisKamar)
            let katajenis = ''
            katajenis += ` <select class="form-control" id="jeniskamar" name="jeniskamar">
                                 <option value="${jenisKamar}" selected="selected" class="text-capitalize" >${jenisKamar}</option>`
            if (jenisKamar == "Standar room") {
                katajenis += `<option value="Superior room">Superior Room</option>
                        </select>`
            } else {
                katajenis += `<option value="Standar room">Standar Room</option>
            </select>`
            }
            $('#n' + noKamar).html(`<input  type = "number" name="nokamar" value='${noKamar}'>`)
            $('#j' + noKamar).html(katajenis)
            $('#h' + noKamar).html(`<input  type = "number" name="harga" value='${hargaKamar}'>`)
            $('#o' + noKamar).append(`<span id="batalButton" data-kamar='${noKamar}' class="badge-danger w-25 px-2 mr-1" style="cursor:pointer">Batal</span>`)
            $('#o' + noKamar).append(`<span  id="simpanButton" data-kamar='${noKamar}' class="badge-success " style="cursor:pointer">Simpan</span>`)
        }


    })
    $(document).on('click', '#batalButton', function() {

        let noKamar = $(this).data('kamar')
        let jenisKamar = $('#j' + noKamar).children().val();
        let hargaKamar = $('#h' + noKamar).children().val();

        $('#n' + noKamar).text(noKamar)
        $('#j' + noKamar).text(jenisKamar)
        $('#h' + noKamar).text(hargaKamar)
        $(this).remove();
        $(`#simpanButton[data-kamar = '${noKamar}']`).remove()
        editKamar = false;
    })
    $(document).on('click', '#simpanButton', function() {

        let noKamar = $(this).data('kamar')
        let jenisKamar = $('#j' + noKamar).children().val();
        let hargaKamar = $('#h' + noKamar).children().val();

        $('#n' + noKamar).text(noKamar)
        $('#j' + noKamar).text(jenisKamar)
        $('#h' + noKamar).text(hargaKamar)
        $(this).remove();
        $(`#batalButton[data-kamar = '${noKamar}']`).remove()
        editKamar = false;
        ubahData(noKamar, jenisKamar, hargaKamar)
    })

    function ubahData(nokamar, jeniskamar, harga) {
        $.ajax({
            url: "<?= BASEURL ?>kamar/ubah",
            type: "POST",
            data: {
                nokamar: nokamar,
                jeniskamar: jeniskamar,
                harga: harga
            },
            dataType: "text",
            success: function(data) {
                $('#flasher').html(data)
            },

        })
    }
    //end edit untuk karyawan
    let edit = false;


    $(document).on('click', '#editButtonKar', function() {
        if (!edit) {
            edit = true
            let id = $(this).data('karyawan')
            let nama = $('#n' + id).html()
            let jeniskelamin = $('#j' + id).html()
            let alamat = $('#a' + id).html()
            let notlp = $('#hp' + id).html()

            let katajenis = ''
            katajenis += ` <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                             <option value="${jeniskelamin}" selected="selected" class="text-capitalize" >${jeniskelamin}</option>`
            if (jeniskelamin == "laki-laki") {
                katajenis += `<option value="perempuan">Perempuan</option>
                    </select>`
            } else {
                katajenis += `<option value="laki-laki">Laki-laki</option>
        </select>`
            }
            $('#n' + id).html(`<input  type = "text" name="idkaryawan" value='${nama}'>`)
            $('#j' + id).html(katajenis)
            $('#a' + id).html(`<input  type = "text" name="alamat" value='${alamat}'>`)
            $('#hp' + id).html(`<input  type = "text" name="notlp" value='${notlp}'>`)

            $('#o' + id).append(`<span id="batalButtonKar" data-karyawan='${id}' class="badge-danger w-25 px-2 mr-1" style="cursor:pointer">Batal</span>`)
            $('#o' + id).append(`<span  id="simpanButtonKar" data-karyawan='${id}' class="badge-success " style="cursor:pointer">Simpan</span>`)
        }

    })


    $(document).on('click', '#batalButtonKar', function() {

        let id = $(this).data('karyawan')
        let nama = $('#n' + id).children().val();
        let jeniskelamin = $('#j' + id).children().val();
        let alamat = $('#a' + id).children().val();
        let notlp = $('#hp' + id).children().val();

        $('#n' + id).text(nama)
        $('#j' + id).text(jeniskelamin)
        $('#a' + id).text(alamat)
        $('#hp' + id).text(notlp)

        $(this).remove();
        $(`#simpanButtonKar[data-karyawan = '${id}']`).remove()
        edit = false;

    })
    $(document).on('click', '#simpanButtonKar', function() {
        let id = $(this).data('karyawan')
        let nama = $('#n' + id).children().val();
        let jeniskelamin = $('#j' + id).children().val();
        let alamat = $('#a' + id).children().val();
        let notlp = $('#hp' + id).children().val();

        $('#n' + id).text(nama)
        $('#j' + id).text(jeniskelamin)
        $('#a' + id).text(alamat)
        $('#hp' + id).text(notlp)

        $(this).remove();
        $(`#batalButtonKar[data-karyawan = '${id}']`).remove()
        edit = false;
        ubahDataKar(id, nama, jeniskelamin, alamat, notlp)
    })

    function ubahDataKar(id_karyawan, nama, jk, alamat, no_hp) {
        $.ajax({
            url: "<?= BASEURL ?>karyawan/ubah",
            type: "POST",
            data: {
                id_karyawan: id_karyawan,
                nama: nama,
                jk: jk,
                alamat: alamat,
                no_hp: no_hp
            },
            dataType: "text",
            success: function(data) {
                $('#flasher').html(data)
            },

        })
    }
    //edit end karyawan


    // transaksi lihat kamar
    function lihatDetail(id) {
        $.ajax({
            url: "<?= BASEURL ?>transaksi/lihatKamar",
            type: "POST",
            data: {
                id: id
            },
            dataType: "text",
            success: function(data) {
                $('#modal-body').html(data);
            },

        })
    }
    $(document).on('click', '#lihatKamar', function() {
        let id = $(this).data('id')
        lihatDetail(id)

    })
    // end transakasi lihat kamar

    // transaksi
    $(document).on('click', '#cekButton', function() {
        let noktp = $(this).parent().siblings('#noktp').val()
        cekktp(noktp)
    })

    function cekktp(noktp) {
        $.ajax({
            url: "<?= BASEURL ?>transaksi/cekKTP",
            type: "POST",
            data: {
                noktp: noktp
            },
            success: function(data) {
                $('#tempatktp').html(data);
            }
        })
    }

    // end transaksi


    // cek harga
    $(document).on('click', '#nokamaropsi', function() {
        let nokamar = $(this).val();
        getHarga(nokamar)
    })

    function getHarga(nokamar) {
        $.ajax({
            url: "<?= BASEURL ?>transaksi/getHarga",
            type: "POST",
            dataType: 'text',
            data: {
                nokamar: nokamar
            },
            success: function(data) {

                $('#harga').val(data)
            }
        })
    }

    // cek harga
</script>
</body>

</html>