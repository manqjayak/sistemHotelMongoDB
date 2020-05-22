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


<div class="container ml-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="container border p-2">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="booking-form">
                            <div class="form-header">
                                <h1 class="text-center my-3">Check In</h1>
                            </div>
                            <form method="POST" action="<?= BASEURL ?>transaksi/tambahTransaksi">
                                <div class="form-group">
                                    <span class="form-label">No KTP</span>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" autocomplete='off' id="noktp" name="noktp" placeholder="noktp" required="">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" id="cekButton" type="button">Cek</button>
                                            <a href=""></a>
                                        </div>
                                    </div>
                                    <div id="tempatktp"> </div>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">ID Karyawan</span>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" autocomplete='off' id="idkaryawan" name="idkaryawan" placeholder="idkaryawan" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Check In</span>
                                            <input class="form-control" type="date" required="" name="tanggalmasuk">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Check out</span>
                                            <input class="form-control" type="date" required="" name="tanggalkeluar">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <span class="form-label">No Kamar</span>
                                            <select class="form-control" required="" name="nokamar" id='nokamaropsi'>

                                                <?php foreach ($data['nokamar'] as $no) : ?>
                                                    <option value="<?= $no['no_kamar'] ?>"><?= $no['no_kamar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="select-arrow"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Lama Menginap</span>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" autocomplete='off' id="lamamenginap" name="lamamenginap" placeholder="lamamenginap" required="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <span class="form-label">Harga Kamar</span>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" autocomplete='off' id="harga" name="harga" placeholder="harga" required="">
                                    </div>
                                </div>
                                <div class="form-btn text-center">
                                    <button type="submit" class="submit-btn">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>