<div class="col-8">
    <div class="container" id="content">
        <h1 class="mt-5">Detail Kendaraan : </h1>
        <hr>
        <?php
        foreach ($detail as $d) :
            $harga = number_format($d->harga, 0, ',', '.');
        ?>
            <div class="card mb-3">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo base_url('vendor/public/img/' . $d->gambar) ?>" class="card-img" alt="<?= $d->nama; ?>">
                    </div>
                    <div class="col">
                        <div class="card-header rounded">
                            <h2>Rp <?= $harga; ?>/hari</h2>
                            <h6><?= $d->nama; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Merk</p>
                                        </div>
                                        <div class="col">
                                            <p><?= $d->merk; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Model</p>
                                        </div>
                                        <div class="col">
                                            <p><?= $d->model; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Warna</p>
                                        </div>
                                        <div class="col">
                                            <p><?= $d->warna; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Bahan bakar</p>
                                        </div>
                                        <div class="col">
                                            <p><?= $d->bahan_bakar; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Tahun</p>
                                        </div>
                                        <div class="col">
                                            <p><?= $d->tahun; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Mesin</p>
                                        </div>
                                        <div class="col">
                                            <p><?= $d->mesin; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Deskripsi</p>
                                    <p><?= $d->deskripsi; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="list-group">
                                        <a href="<?= base_url('admin/kendaraan/ubah/' . $d->id_kendaraan); ?>" class="btn btn-warning"><i class="fa fa-clipboard"> Edit</i></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="list-group">
                                        <a href="<?= base_url('admin/kendaraan/hapus/' . $d->id_kendaraan); ?>" class="btn btn-danger"><i class="fa fa-trash"> Delete</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>