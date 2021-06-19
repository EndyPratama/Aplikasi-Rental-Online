<div class="col">
    <h1>Edit Kendaraan : </h1>
    <hr>
    <div class="container">
        <div class="row">
            <form action="<?= base_url('admin/Kendaraan/edit'); ?>" method="POST" enctype="multipart/form-data">
                <?php
                foreach ($kendaraan as $k) :
                ?>
                    <div class="modal-body" id="modal-edits">
                        <input type="hidden" name="id_kendaraan" id="id_kendaraan" value="<?= $k->id_kendaraan; ?>">
                        <div class="form-group">
                            <label for="nama"><b>Nama Kendaraan</b></label>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $k->nama; ?>">
                            <?= form_error('nama', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="mesin"><b>Mesin</b></label>
                            <input type="text" class="form-control" id="mesin" name="mesin" value="<?= $k->mesin; ?>">
                            <?= form_error('mesin', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="bahan_bakar"><b>Bahan Bakar</b></label>
                            <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" value="<?= $k->bahan_bakar; ?>">
                            <?= form_error('bahan_bakar', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="model"><b>Model</b></label>
                            <input type="text" class="form-control" id="model" name="model" value="<?= $k->model; ?>">
                            <?= form_error('model', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="warna"><b>Warna</b></label>
                            <input type="text" class="form-control" id="warna" name="warna" value="<?= $k->warna; ?>">
                            <?= form_error('warna', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="merk"><b>Merk</b></label>
                            <input type="text" class="form-control" id="merk" name="merk" value="<?= $k->merk; ?>">
                            <?= form_error('merk', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tahun"><b>Tahun</b></label>
                            <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $k->tahun; ?>">
                            <?= form_error('tahun', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi"><b>Deskripsi</b></label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $k->deskripsi; ?>">
                            <?= form_error('deskripsi', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga"><b>Harga</b></label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $k->harga; ?>">
                            <?= form_error('harga', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="ketersediaan"><b>Ketersediaan (Tersedia = 1 | Tidak Tersedia = 0)</b></label>
                            <input type="text" class="form-control" id="ketersediaan" name="ketersediaan" value="<?= $k->ketersediaan; ?>">
                            <?= form_error('ketersediaan', '<small class="text-danger" pl-1>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="gambar"><b>Upload Gambar</b></label>
                            <div class="file-upload-wrapper">
                                <input type="file" class="form-control" id="gambar" name="gambar" value="<?= set_value('gambar'); ?>">
                                <?= form_error('gambar', '<small class="text-danger" pl-1>', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-plus"></i> Edit Kendaraan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle"></i> Batal</button>

                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>