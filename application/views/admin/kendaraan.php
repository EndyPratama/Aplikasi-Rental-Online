<!-- MAIN -->
<div class="col content">
    <h1>Data Kendaraan : </h1>
    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="<?= base_url('Admin/Kendaraan/tambah'); ?>" class="btn btn-success"><i class="fa fa-plus"> Tambah Kendaraan</i></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <?php
            $row = 1;
            foreach ($kendaraan as $k) :
                $harga = number_format($k->harga, 0, ',', '.');
            ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <a href="<?= base_url('Admin/Kendaraan/detail/' . $k->id_kendaraan); ?>">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo base_url('vendor/public/img/' . $k->gambar) ?>" class="card-img" alt="<?= $k->nama; ?>" style="height: 150px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $k->nama; ?></h5>
                                    <p class="card-text"><?= $k->tahun; ?></p>
                                    <p class="card-text"><small class="text-muted">Rp <?= $harga; ?>/hari</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>