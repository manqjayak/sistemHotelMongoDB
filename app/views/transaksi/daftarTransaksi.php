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
            <h1 class="m-0 text-dark">Daftar Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>">Home</a></li>
                <li class="breadcrumb-item active">Daftar Transaksi</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- Button trigger modal -->
<!-- <form method="POST">
    <div class="container mb-3">
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
            Tambah Karyawan
        </button>
    </div>
</form> -->
<!-- table -->
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Nama Pengunjung</th>
                <th>Jumlah Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Lama Menginap</th>
                <th>Total Harga</th>
                <th>No Kamar</th>
            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($data['daftar'] as $daftar) : ?>

            <tbody>
                <tr>
                    <td> <?= $no ?></td>
                    <td><?= $daftar['namaKaryawan'] ?></td>
                    <td><?= $daftar['namaPengunjung'] ?></td>
                    <td><?= $daftar['jumlah_kamar']  ?> Kamar</td>
                    <td><?= $daftar['tanggal_masuk'] ?></td>
                    <td><?= $daftar['tanggal_keluar'] ?></td>
                    <td><?= $daftar['lama_menginap'] ?> Hari</td>
                    <td><?= $daftar['total_harga'] ?></td>
                    <td><span id="lihatKamar" data-id="<?= $daftar['no_transaksi'] ?>" class="badge-warning p-1" data-toggle="modal" data-target="#exampleModal" style="cursor:pointer">lihat</span></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body">

            </div>
        </div>
    </div>
</div>