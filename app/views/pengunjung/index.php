<div class="content-header">
    <div class="container" id="flasher">
        <?php if (Flasher::flash()) : ?>
            <div class="row  justify-content-center my-5">
                <div class="col">

                    <?php Flasher::flash(); ?>
                </div>
            </div>
    </div>
<?php endif; ?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Pengunjung</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>">Home</a></li>
                <li class="breadcrumb-item active">Daftar Pengunjung</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- Button trigger modal -->

<div class="container mb-3 mt-3">
    <div class="row">
        <div class="col">
            <form method="POST">
                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
                    Tambah Pengunjung
                </button>
            </form>
        </div>
        <div class="col">
            <form action="<?= BASEURL ?>pengunjung" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" autocomplete='off' name="keyword" placeholder="Cari berdasarkan ktp atau nama" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <input class="form-control" type="date" name='tanggal'>
                </div> -->


            </form>
        </div>
    </div>
</div>

<!-- table -->
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama </th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>No KTP</th>
                <!-- <th>Opsi</th> -->

            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($data['pengunjung'] as $pengunjung) : ?>

            <tbody>
                <tr>
                    <td> <?= $no ?></td>
                    <td><?= $pengunjung['nama'] ?></td>
                    <td id='hp<?= $pengunjung['no_ktp'] ?>'><?= $pengunjung['alamat'] ?></td>
                    <td><?= $pengunjung['jk'] ?></td>
                    <td id='hp<?= $pengunjung['no_ktp'] ?>'><?= $pengunjung['no_hp'] ?></td>
                    <td><?= $pengunjung['no_ktp'] ?></td>
                    <!-- <td id='ktp ?=// $pengunjung['no_ktp'] ?>'>
                        <span id="editButtonPeng" data-pengunjung='?= $pengunjung['no_ktp'] ?>' class="badge-warning w-25 px-2" style="cursor:pointer">Edit</span>
                        <!-- <span class="badge-danger px-1" onclick="return confirm('Yakin?')"><a href="?= BASEURL ?> pengunjung/delete" style="color:white;">Hapus</a></span> -->
                    </td>
                </tr>
                <?php $no += 1; ?>
            </tbody>

        <?php endforeach; ?>
    </table>
    <!-- end table -->
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASEURL ?>pengunjung/tambah">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jeniskelamin" name="jeniskelamin" required="">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP</label>
                        <input type="text" class="form-control" required="" id="NoHP" name="NoHP" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="noKTP">NO KTP</label>
                        <input type="text" class="form-control" required="" id="noKTP" name="noKTP" placeholder="" autocomplete="off" min=1>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>