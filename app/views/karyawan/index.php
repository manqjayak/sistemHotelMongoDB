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
            <h1 class="m-0 text-dark">Daftar Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>">Home</a></li>
                <li class="breadcrumb-item active">Daftar Karyawan</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- Button trigger modal -->
<form method="POST">
    <div class="container mb-3">
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
            Tambah Karyawan
        </button>
    </div>
</form>
<!-- table -->
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama </th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No HP</th>

                <th>Opsi</th>

            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($data['karyawan'] as $karyawan) : ?>

            <tbody id="b<?= $karyawan['_id'] ?>">
                <tr id="t<?= $karyawan['_id'] ?>">
                    <td> <?= $no ?></td>
                    <td id='n<?= $karyawan['_id'] ?>'><?= $karyawan['nama'] ?></td>
                    <td id='j<?= $karyawan['_id'] ?>'><?= $karyawan['jk'] ?></td>
                    <td id='a<?= $karyawan['_id'] ?>'><?= $karyawan['alamat'] ?></td>
                    <td id='hp<?= $karyawan['_id'] ?>'><?= $karyawan['no_hp'] ?></td>
                    <td id='o<?= $karyawan['_id'] ?>'>
                        <span id="editButtonKar" data-karyawan='<?= $karyawan['_id'] ?>' class="badge-warning w-25 px-2" style="cursor:pointer">Edit</span>
                        <!-- <span class="badge-danger px-1" onclick="return confirm('Yakin?')"><a href="<?= BASEURL ?> karyawan/delete" style="color:white;">Hapus</a></span> -->
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
                <form method="POST" action="<?= BASEURL ?>karyawan/tambah">
                    <div class="form-group">
                        <label for="idkaryawan">ID karyawan</label>
                        <input type="text" class="form-control" id="idkaryawan" name="idkaryawan" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jeniskelamin" name="jeniskelamin " required="">
                            <option value="laki-laki" selected>Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="notlp">No HP</label>
                        <input type="text" class="form-control" id="notlp" name="notlp" placeholder="" autocomplete="off" min=1 required="">
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