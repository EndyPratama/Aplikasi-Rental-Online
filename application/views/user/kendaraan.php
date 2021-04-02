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
            <form action="">
                <input class="form-control" id="formSearch" type="search" placeholder="Search" width="50px">
                <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                <!-- <a href="/" class="reset"><i class="fa fa-filters"></i> Reset Filter</a> -->
                <button type="reset" class="reset btn btn-outline-dark">Reset Filter</button>
                <!-- <a type="reset">Reset Filter</a> -->
                <a href="#submenu1" class="sub" data-toggle="collapse">
                    Kategori
                </a>
                <div id='submenu1' class="collapse">
                    <?php
                    // $merk = ['Toyota, Suzuki, Mitshubishi'];
                    $merk = array("Toyota", "Suzuki", "Mitsubishi");
                    $Toyota = array("Avansa", "Agya");
                    $Suzuki = array("Swift", "Ertiga");
                    // echo $merk[0];
                    ?>
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <a href="#<?= $merk[$i]; ?>" class="sub" data-toggle="collapse"><?= $merk[$i]; ?></a>
                        <div id='<?= $merk[$i]; ?>' class="collapse">
                            <?php
                            for ($j = 0; $j < 2; $j++) :
                                $model = $merk[$i];
                            ?>

                                <div class="form-group row">
                                    <div class="col-2"></div>
                                    <div class="col-sm-8"><?= $$model[$j]; ?></div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" name="model" type="radio" id="option1">
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                </div>
                <hr>
                <a href="#submenu2" class="sub" data-toggle="collapse">
                    Tahun
                </a>
                <div id='submenu2' class="collapse">
                    <p>Pilih dari pilihan di bawah</p>
                    <div class="scroll">
                        <?php for ($i = 2000; $i <= 2010; $i++) : ?>
                            <div class="form-group row">
                                <div class="col-1"></div>
                                <div class="col-sm-8"><?= $i; ?></div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" name="tahun" type="radio" id="option1">
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <hr>
                <a href="#submenu3" class="sub" data-toggle="collapse">
                    Kapasitas Mesin
                </a>
                <div id='submenu3' class="collapse">
                    <p>Pilih dari pilihan di bawah</p>
                    <?php for ($i = 1000; $i <= 3000; $i += 500) : ?>
                        <div class="form-group row">
                            <div class="col-1"></div>
                            <div class="col-sm-8"><?= $i; ?></div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="mesin" type="radio" id="option1">
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <hr>
                <a href="#submenu4" class="sub" data-toggle="collapse">
                    Warna
                </a>
                <div id='submenu4' class="collapse">
                    <?php
                    $warna = array("Merah", "Hitam", "Silver", "Putih", "Biru");
                    $count = count($warna);
                    ?>
                    <p>Pilih dari pilihan di bawah</p>
                    <?php for ($i = 0; $i < $count; $i++) : ?>
                        <div class="form-group row">
                            <div class="col-1"></div>
                            <div class="col-sm-8"><?= $warna[$i]; ?></div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="warna" type="radio" id="option1">
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-block">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8">
            <br>
            <div class="container">
                <?php
                $row = 1;
                foreach ($kendaraan as $k) :
                ?>
                    <div class="card" style="width: 15rem;">
                        <a href="<?= base_url('kendaraan/mobil/' . $k->id_kendaraan); ?>">
                            <img src="<?php echo base_url('vendor/public/img/' . $k->gambar) ?>" class="img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $k->nama; ?></h5>
                                <p class="card-text"><?= $k->tahun; ?>.</p>
                                <a href="<?= base_url('kendaraan/mobil/' . $k->id_kendaraan); ?>" class="btn btn-primary">Rp <?= $k->harga; ?>/hari</a>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                <?php
                $row = 1;
                foreach ($kendaraan as $k) :
                ?>
                    <div class="card" style="width: 15rem;">
                        <a href="<?= base_url('kendaraan/mobil/' . $k->id_kendaraan); ?>">
                            <!-- <img src="..." class="img-fluid" alt="Responsive image"> -->
                            <img src="<?php echo base_url('vendor/public/img/' . $k->gambar) ?>" class="img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $k->nama; ?></h5>
                                <p class="card-text"><?= $k->tahun; ?>.</p>
                                <a href="<?= base_url('/kendaraan/mobil' . $k->id_kendaraan); ?>" class="btn btn-primary">Rp <?= $k->harga; ?>/hari</a>
                            </div>
                        </a>
                    </div>
                    <!--  -->
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>