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
            <h1 class="m-0 text-dark">Daftar Status Kunci</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>">Home</a></li>
                <li class="breadcrumb-item active">Daftar Status Kunci</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Pengunjung</th>
                <th>No HP</th>
                <th>Tanggal Keluar</th>
                <th>No Kamar</th>
                <th>Status</th>
                <th>Ubah</th>
            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($data['status'] as $status) : ?>

            <tbody>
                <tr>
                    <td> <?= $no ?></td>
                    <td><?= $status['nama'] ?></td>
                    <td><?= $status['no_hp'] ?></td>
                    <td><?= $status['tanggal_keluar'] ?></td>
                    <td><?= $status['no_kamar'] ?></td>
                    <td id="st<?= $status['id'] ?>"><?= $status['status'] ?> </td>
                    <td id="tdop<?= $status['id'] ?>"><span id="ubahstatus" data-id="<?= $status['id'] ?>" class="badge-warning mr-1" style="cursor:pointer">Edit</span></td>
                </tr>
                <?php $no += 1; ?>
            </tbody>

        <?php endforeach; ?>
    </table>
    <!-- end table -->
</div>