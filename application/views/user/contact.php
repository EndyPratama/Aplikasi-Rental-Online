<div class="container" id="formContact">
    <div class="row">
        <!-- <div class="col-1"></div> -->
        <div class="col-6">
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
        <div class="col-6">
            <h1>History Pesan : </h1>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Role</th>
                        <th scope="col" colspan="2">Pesan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($history as $h) :
                    ?>
                        <tr>
                            <th scope="row">U</th>
                            <td colspan="2"><?= $h->pesan; ?></td>
                            <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td>
                        </tr>
                        <?php if ($h->jawaban == null) {
                        } else {

                        ?>
                            <tr>
                                <th scope="row">A</th>
                                <td colspan="2"><?= $h->jawaban; ?></td>
                                <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td>
                            </tr>
                    <?php
                        }
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="col-1"></div> -->
    </div>
</div>