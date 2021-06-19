<!-- MAIN -->
<div class="content">
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <h1>Data Kendaraan : </h1>
            <hr>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2" id="sidebar">
            <form action="<?= base_url('/User/Kendaraan/'); ?>" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukkan yang anda cari" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <form action="<?= base_url('/User/Kendaraan/filter'); ?>" method="post">
                <button type="reset" class="reset btn btn-outline-dark">Reset Filter</button>
                <!-- <a type="reset">Reset Filter</a> -->
                <a href="#submenu1" class="sub" data-toggle="collapse">
                    Kategori
                </a>
                <div id='submenu1' class="collapse">
                    <?php foreach ($merk as $m) : ?>
                        <a href="#<?= $m->merk; ?>" class="sub" data-toggle="collapse"><?= $m->merk; ?></a>
                        <div id='<?= $m->merk; ?>' class="collapse">
                            <?php
                            foreach ($model as $md) :
                                if ($md->merk == $m->merk) {
                            ?>

                                    <div class="form-group row">
                                        <div class="col-2"></div>
                                        <div class="col-sm-8"><?= $md->model; ?></div>
                                        <div class="col-sm-2">
                                            <div class="form-check">
                                                <input class="form-check-input" name="model" value="<?= $md->model; ?>" type="radio" id="option1">
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <a href="#submenu2" class="sub" data-toggle="collapse">
                    Tahun
                </a>
                <div id='submenu2' class="collapse">
                    <p>Pilih dari pilihan di bawah</p>
                    <div class="scroll">
                        <?php
                        $i = 0;
                        foreach ($tahun as $t) :
                        ?>
                            <div class="form-group row">
                                <div class="col-1"></div>
                                <div class="col-sm-8"><?= $t->tahun; ?></div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" name="tahun" value="<?= $t->tahun; ?>" type="radio" id="option1">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <hr>
                <a href="#submenu3" class="sub" data-toggle="collapse">
                    Kapasitas Mesin
                </a>
                <div id='submenu3' class="collapse">
                    <p>Pilih dari pilihan di bawah</p>
                    <?php foreach ($mesin as $m) : ?>
                        <div class="form-group row">
                            <div class="col-1"></div>
                            <div class="col-sm-8"><?= $m->mesin; ?></div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="mesin" value="<?= $m->mesin; ?>" type="radio" id="option1">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <a href="#submenu4" class="sub" data-toggle="collapse">
                    Warna
                </a>
                <div id='submenu4' class="collapse">
                    <p>Pilih dari pilihan di bawah</p>
                    <?php foreach ($warna as $w) : ?>
                        <div class="form-group row">
                            <div class="col-1"></div>
                            <div class="col-sm-8"><?= $w->warna; ?></div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="warna" value="<?= $w->warna; ?>" type="radio" id="option1">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8">
            <br>
            <div class="container">
                <?php
                $row = 1;
                $i = 0;
                foreach ($kendaraan as $k) :
                    if ($k->ketersediaan == 1) :
                        $i++;
                ?>
                        <div class="card" style="width: 15rem; display:flex;">
                            <a href="<?= base_url('User/Kendaraan/mobil/' . $k->id_kendaraan); ?>">
                                <img src="<?php echo base_url('vendor/public/img/' . $k->gambar) ?>" class="img-fluid" alt="...">
                                <div class="card-body" style="flex-grow:1;">
                                    <h5 class="card-title" style="margin-bottom: .75rem;max-height: 25px;overflow: hidden;"><?= $k->nama; ?></h5>
                                    <?php
                                    $harga = number_format($k->harga, '0', ',', '.');
                                    ?>
                                    <p class="card-text">Rp <?= $harga; ?>/hari</p>
                                    <!-- <p class="card-text"><?= $k->tahun; ?>.</p> -->
                                    <div class="row" style="margin:0; align-items: center;">
                                        <?php for ($j = 0; $j < 5; $j++) : ?>
                                            <i id="star<?= $i; ?><?= $j; ?>" class='bx bx-star' style='color:#3fff2a; font-size:18px;'></i>
                                        <?php endfor; ?>
                                        <div>(<?= $k->review; ?>)</div>
                                    </div>
                                    <script>
                                        <?php for ($j = 0; $j < $k->rating; $j++) : ?>
                                            $("#star<?= $i; ?><?= $j; ?>").removeClass("bx-star");
                                            $("#star<?= $i; ?><?= $j; ?>").addClass("bxs-star");
                                        <?php endfor; ?>
                                    </script>
                                </div>
                            </a>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>