<div class="container" id="formContact">
    <div class="col-1"></div>
    <div class="col">
        <?php if ($notif != null) : ?>
            <div class="alert alert-success" role="alert">
                <?= $notif; ?>
            </div>
        <?php endif; ?>
        <h1>Contact Us : </h1>
        <hr>
        <form action="<?= base_url('contact/save'); ?>" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama : </label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pesan">Pesan : </label>
                    <textarea class="form-control" id="pesan" rows="3" name="pesan"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-send"> Kirim</i></button>
        </form>
    </div>
    <div class="col-1"></div>
</div>