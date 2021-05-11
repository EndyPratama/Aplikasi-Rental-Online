<!-- MAIN -->
<div class="col">
    <h1>Tambah Kendaraan : </h1>
    <hr>
    <div class="container">
        <div class="row">
            <form action="<?= base_url('admin/Kendaraan/insert'); ?>" method="POST" enctype="multipart/form-data">
                <div class="tambah-body">
                    <div class="form-group">
                        <label for="nama"><b>Nama Kendaraan</b></label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="mesin"><b>Mesin</b></label>
                        <input type="text" class="form-control" id="mesin" name="mesin" value="<?= set_value('mesin'); ?>">
                        <?= form_error('mesin', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="bahan_bakar"><b>Bahan Bakar</b></label>
                        <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" value="<?= set_value('bahan_bakar'); ?>">
                        <?= form_error('bahan_bakar', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="model"><b>Model</b></label>
                        <input type="text" class="form-control" id="model" name="model" value="<?= set_value('model'); ?>">
                        <?= form_error('model', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="warna"><b>Warna</b></label>
                        <input type="text" class="form-control" id="warna" name="warna" value="<?= set_value('warna'); ?>">
                        <?= form_error('warna', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="merk"><b>Merk</b></label>
                        <input type="text" class="form-control" id="merk" name="merk" value="<?= set_value('merk'); ?>">
                        <?= form_error('merk', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tahun"><b>Tahun</b></label>
                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?= set_value('tahun'); ?>">
                        <?= form_error('tahun', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"><b>Deskripsi</b></label>
                        <input type="text" class="form-control" row="5" id="deskripsi" name="deskripsi" value="<?= set_value('deskripsi'); ?>">
                        <?= form_error('deskripsi', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga"><b>Harga</b></label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga'); ?>">
                        <?= form_error('harga', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="ketersediaan"><b>Ketersediaan (Tersedia = 1 | Tidak Tersedia = 2)</b></label>
                        <input type="text" class="form-control" id="ketersediaan" name="ketersediaan" value="<?= set_value('ketersediaan'); ?>">
                        <?= form_error('ketersediaan', '<small class="text-danger" pl-1>', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gambar"><b>Upload Photo</b></label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="input-file-now" class="file-upload" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kendaraan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>

                </div>
            </form>
        </div>
    </div>
</div>