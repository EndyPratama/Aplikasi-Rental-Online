<!-- MAIN -->
<div class="col content">
    <h1>Data Kendaraan : </h1>
    <hr>
    <div class="container">
        <div class="row">
            <?php
            $row = 1;
            foreach ($kendaraan as $k) :
            ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <a href="<?= base_url('kendaraan/detail/' . $k->id_kendaraan); ?>">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo base_url('vendor/public/img/' . $k->gambar) ?>" class="card-img" alt="<?= $k->nama; ?>" style="height: 150px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $k->nama; ?></h5>
                                    <p class="card-text"><?= $k->tahun; ?></p>
                                    <p class="card-text"><small class="text-muted"><?= $k->harga; ?>/hari</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>