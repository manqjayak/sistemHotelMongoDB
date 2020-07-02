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
            if (jenisKamar == "superior") {
                katajenis += `<option value="normal">normal</option>
                        </select>`
            } else {
                katajenis += `<option value="superior">superior</option>
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
            dataType: 'json',
            data: {
                nokamar: nokamar
            },
            success: function(data) {
                let hargaKamar = parseInt(data['harga']);
                let lama =parseInt($('#lamamenginap').val())
                if(isNaN(lama)){
                    $('#harga').val(hargaKamar)
                }else{
                    $('#harga').val(hargaKamar*lama)
                }
                
                $('#kamar').html('<input type="hidden" id="jenis_kamar" value="'+data['jenis_kamar']+'"><input type="hidden" id="harga_kamar" value="'+data['harga']+'">')
            }
        })
    }
    //tambah pemesanan kamar ke transaksi
    $(document).on('click','#submit_transaksi',function(){
        //kamar
       let jenis_kamar= ($('#jenis_kamar').val());
       let no_kamar= ($('#nokamaropsi').val());
       let harga_kamar =($('#harga_kamar').val());
       //karyawan
       let id_karyawan = ($('#idkaryawan').val());
       //pengunjung
       let no_ktp =($('#noktp').val());
       let no_hp =($('#no_hp').val());
       let nama =($('#nama').val());
       //umum
       let harga = ($('#harga').val());
       let tanggal_masuk = ($('#tanggalmasuk').val());
       let tanggal_keluar = ($('#tanggalkeluar').val());
       let lama_menginap = $('#lamamenginap').val();
       if(!no_ktp || !id_karyawan || !lama_menginap){
        $('#tempatktp').html('<small class="text-danger ml-2" id="tempatktp2">terdapat field yang kosong</small>')
       }else{
        tambahTransaksi(jenis_kamar,no_kamar,harga_kamar,id_karyawan,no_ktp,no_hp,nama,harga,tanggal_masuk,tanggal_keluar,lama_menginap)
       }
       
    })
    //ajax tambah transaksi
    function tambahTransaksi(jenis_kamar,no_kamar,harga_kamar,id_karyawan,no_ktp,no_hp,nama,harga,tanggal_masuk,tanggal_keluar,lama_menginap){
        $.ajax({
            url : "<?= BASEURL ?>transaksi/tambahTransaksi",
            method: "post",
            dataType: 'text',
            data: {
                jenis_kamar :jenis_kamar,
                no_kamar:no_kamar,
                harga_kamar:harga_kamar,
                id_karyawan:id_karyawan,
                no_ktp:no_ktp,
                no_hp:no_hp,
                nama: nama,
                harga: harga,
                tanggal_masuk: tanggal_masuk,
                tanggal_keluar:tanggal_keluar,
                lama_menginap:lama_menginap
            },
            success: function(data){
                w = window.open("", "_self")
                w.document.open()
           
                    w.document.write(data);
                    w.document.close();
              
            
            }
        })
    }
    //menghilangkan keterangan ktp ataupun field yang kosong
    setInterval(function(){
            setTimeout(function(){
            $('#tempatktp2').remove()
        },2000);
    },4000)
 //end transaksi


 //riwayat transaksi
        //detail untuk mengunjung
    $(document).on('click','#pDetail',function(){
       let id = $(this).val()
       pDetail(id)
    })
    //ajax detail pengjung
    function pDetail(id){
        $.ajax({
            url:"<?= BASEURL ?>transaksi/pDetail",
            method: "post",
            dataType: "text",
            data:{
                id:id
            },
            success:function(data){
                $('#pModal').html(data)
            }
        })
    }

    //detail untuk kamar beserta status kunci
    $(document).on('click','#kDetail',function(){
        let id = $(this).val()
        let kata = `<table class="table">
                <thead>
                    <th>no kamar</th>
                    <th>jenis kamar</th>
                    <th>kunci</th>
                    <th>harga</th>
                </thead>
                <tbody>
                    <tr>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>    <select class="form-control" id="kunci" name="kunci">
                            <option value="belum">belum</option>
                            <option valuue="sudah">sudah</option>
                 
                            </select></td>
                        <td>dummy</td>
                    </tr>
                </tbody>
            </table>`;
         
            kDetail(id)
    })

    //ajax untuk kamar
    function kDetail(id){
        $.ajax({
            url: "<?=BASEURL?>transaksi/kDetail",
            dataType: "text",
            method: 'post',
            data: {
                id:id
            },
            success:function(data){
                $('#kModal').html(data);
            }
        })
    }
 //end riwayat transaksi

</script>
</body>

</html>