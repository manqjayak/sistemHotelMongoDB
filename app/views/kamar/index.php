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
            <h1 class="m-0 text-dark">Daftar Kamar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>">Home</a></li>
                <li class="breadcrumb-item active">Daftar Kamar</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- Button trigger modal -->
<form method="POST">
    <div class="container mb-3">
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
            Tambah Kamar
        </button>
    </div>
</form>
<!-- table -->
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No Kamar</th>
                <th>Jenis Kamar</th>
                <th>Harga Kamar</th>
                <th>Status Kamar</th>
                <th>Opsi</th>

            </tr>
        </thead>
        <?php foreach ($data['kamar'] as $kamar) : ?>

            <tbody id="b<?= $kamar['no_kamar'] ?>">
                <tr id="t<?= $kamar['no_kamar'] ?>">
                    <td id='n<?= $kamar['no_kamar'] ?>'><?= $kamar['no_kamar'] ?> </td>
                    <td id='j<?= $kamar['no_kamar'] ?>'><?= $kamar['jenis_kamar'] ?></td>
                    <td id='h<?= $kamar['no_kamar'] ?>'><?= $kamar['harga'] ?></td>
                    <td><?= $kamar['ketersediaan'] ?></td>
                    <td id='o<?= $kamar['no_kamar'] ?>'>
                        <span id="editButton" data-kamar='<?= $kamar['no_kamar'] ?>' class="badge-warning w-25 px-2" style="cursor:pointer">Edit</span>
                        <!-- <span class="badge-danger px-1" onclick="return confirm('Yakin?')"><a href="<?= BASEURL ?> kamar/delete" style="color:white;">Hapus</a></span> -->
                    </td>
                </tr>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASEURL ?>kamar/tambah">
                    <div class="form-group">
                        <label for="nokamar">No Kamar</label>
                        <input type="text" class="form-control" id="nokamar" name="nokamar" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jeniskamar">Jenis Kamar</label>
                        <select class="form-control" id="jeniskamar" name="jeniskamar">
                            <option value="Standar room">Standar Room</option>
                            <option value="Superior room">Superior Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="" autocomplete="off" min=1>
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