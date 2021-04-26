<div class="row">
    <div class="col-1"></div>
    <div class="container col-10">
        <div class="" id="content">
            <h1 class="mt-5">Detail Kendaraan : </h1>
            <hr>

            <?php foreach ($detail as $d) : ?>
                <div class="card mb-3" id="gambarMobil">
                    <div class="row">
                        <div class="col-8 image-show">
                            <img src="<?php echo base_url('vendor/public/img/' . $d->gambar) ?>" id="imgmbl" class="card-img" alt="<?= $d->nama; ?>">
                        </div>
                        <div class="col">
                            <div class="card-header rounded">
                                <!-- <div class="row"> -->
                                <!-- <div class="col"> -->
                                <?php
                                $user = $this->session->userdata('id');
                                // echo $user;
                                if ($user != 0) :
                                ?>
                                    <a href="<?= base_url('/kendaraan/whislist/' . $d->id_kendaraan); ?>">
                                        <img src="<?php echo base_url('vendor/public/img/' . $whislist) ?>" style="width: 50px; height:50px; float:right">
                                    </a>
                                <?php endif ?>
                                <h2>Rp <?= $d->harga; ?>/hr</h2>
                                <h6><small><?= $d->tahun; ?></small></h6>
                                <h6><?= $d->nama; ?></h6>
                                <!-- </div> -->
                                <!-- <div class="col-1">
                                    </div> -->
                                <!-- </div> -->
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success btn-block" onclick="formOpen()" id="order">Order now</button>
                                <!-- JS untuk merubah form pemesanan -->
                                <div id="formOrder" style="visibility: hidden;">
                                    <form action="<?= base_url('kendaraan/booking'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" name="idUser" value="<?= $this->session->userdata('id'); ?>">
                                                <label for="nama">Nama : </label>
                                                <input type="text" class="form-control" id="nama" name="peminjam" autofocus>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="alamat">Alamat : </label>
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="kendaraan">Kendaraan : </label>
                                                <input type="text" class="form-control" id="kendaraan" value="<?= $d->nama; ?>" name="kendaraan" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="confirm">Durasi</label>
                                                <div>
                                                    <select name="durasi" class="form-control">
                                                        <option value="1">1 Hari</option>
                                                        <option value="2">2 Hari</option>
                                                        <option value="3">3 Hari</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total">Harga : </label>
                                            <input type="text" class="form-control" id="harga" value="" name="harga" readonly>
                                            <input type="hidden" id="total" value="" name="total">
                                            <script>
                                                $(function() {
                                                    $('select[name=durasi]').on('change', function() {
                                                        durasi = $(this).children("option:selected").val();
                                                        console.log(durasi);
                                                        var harga = "Rp " + <?= $d->harga; ?> * durasi;
                                                        var total = <?= $d->harga; ?> * durasi;
                                                        document.getElementById("harga").value = harga;
                                                        document.getElementById("total").value = total;
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">Booking now</button>
                                    </form>
                                </div>
                                <script>
                                    function formOpen() {
                                        document.getElementById('formOrder').style.visibility = 'visible';
                                        document.getElementById('order').style.display = 'none';
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div> <!-- Keluar card -->
                <div class="card">
                    <header>Spesifikasi Kendaraan : </header>
                    <hr>
                    <div class="center">
                        <div class="kendaraan">
                            <p>Merk : <?= $d->merk; ?></p>
                            <p>Model : <?= $d->model; ?></p>
                            <p>Warna : <?= $d->warna; ?></p>
                            <p>Bahan bakar : <?= $d->bahan_bakar; ?></p>
                            <p>Tahun : <?= $d->tahun; ?></p>
                            <p>Mesin : <?= $d->mesin; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p id="deskripsi">Deskripsi : </p>
                            <div class="center">
                                <p><?= $d->deskripsi; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <div class="lainnya">
                    <h3>Iklan terkait : </h3>
                    <?php foreach ($iklan as $i) : ?>
                        <div class="card" style="width: 150px;">
                            <img src="<?php echo base_url('vendor/public/img/' . $i->gambar) ?>" class="card-img" alt="<?= $d->nama; ?>">
                            <div class="card-body">
                                <h6 class="card-text">Rp <?= $i->harga; ?>/hr</h6>
                                <p class="card-text"><small><?= $i->tahun; ?></small></p>
                                <p class="card-text"><?= $i->nama; ?></p>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>