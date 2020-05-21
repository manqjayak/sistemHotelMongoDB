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
            <h1 class="m-0 text-dark">Riwayat Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>">Home</a></li>
                <li class="breadcrumb-item active">Riwayat Transaksi</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- Button trigger modal -->

<div class="container mb-3 mt-3">
    <div class="row">

        <div class="col">
            <form action="<?= BASEURL ?>riwayat/riwayatTransaksi" method="POST">


                <div class="form-group">
                    <input class="form-control" type="date" name='tanggal'>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>

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
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($data['riwayat'] as $riwayat) : ?>

            <tbody>
                <tr>
                    <td> <?= $no ?></td>
                    <td><?= $riwayat['nama'] ?></td>
                    <td><?= $riwayat['alamat'] ?></td>
                    <td><?= $riwayat['jk'] ?></td>
                    <td><?= $riwayat['no_hp'] ?></td>
                    <td><?= $riwayat['no_ktp'] ?></td>
                    <td><?= $riwayat['tanggal_masuk'] ?></td>
                    <td><?= $riwayat['tanggal_keluar'] ?></td>

                </tr>
                <?php $no += 1; ?>
            </tbody>

        <?php endforeach; ?>
    </table>
    <!-- end table -->
</div>