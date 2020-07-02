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
     <div class="row justify-content-end">
        <div class="col-6">
            <form action="<?= BASEURL ?>transaksi/riwayatTransaksi" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" autocomplete='off' name="keyword" placeholder="Cari berdasarkan ktp atau nama" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
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
                <th>ID Karyawan </th>
                <th>Pengunjung</th>
                <th>Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Lama Menginap</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <?php $no = 1; ?>
        <?php foreach ($data['riwayat'] as $d) : ?>

            <tbody>
                <tr>
                    <td> <?= $no ?></td>
                    <td><?= $d['id_karyawan'] ?></td>
                    <td><button class="btn-warning"  value= "<?=$d['_id']?>" id="pDetail" data-toggle="modal" data-target="#pengunjungModal">lihat detail</button></td>
                    <td ><button class="btn-warning"  value = "<?=$d['_id']?>" id="kDetail" data-toggle="modal" data-target="#kamarModal">lihat detail</button></td>
                    <td><?= $d['tanggal_masuk'] ?></td>
                    <td><?= $d['tanggal_keluar'] ?></td>
                    <td><?= $d['lama_menginap'] ?> Hari</td>
                    <td><?= $d['harga'] ?></td>                    
                </tr>
                <?php $no += 1; ?>
            </tbody>

        <?php endforeach; ?>
    </table>
    <!-- end table -->
</div>

<!-- Modal Penunjung-->
<div class="modal fade" id="pengunjungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detai Pengunjung</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="pModal">
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal kamar-->
<div class="modal fade" id="kamarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=BASEURL?>transaksi/tambahkDetail" method="POST">
      <div class="modal-body" id="kModal">
            
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" >Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
