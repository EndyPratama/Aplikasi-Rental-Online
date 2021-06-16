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
                            <img src="<?php echo base_url('vendor/public/img/' . $d->gambar) ?>" id="imgmbl" alt="<?= $d->nama; ?>">
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
                                    <a href="<?= base_url('/user/kendaraan/whislist/' . $d->id_kendaraan); ?>">
                                        <img src="<?php echo base_url('vendor/public/img/' . $whislist) ?>" style="width: 50px; height:50px; float:right">
                                    </a>
                                <?php endif ?>
                                <?php $harga = number_format($d->harga, 0, ',', '.'); ?>
                                <h2>Rp <?= $harga; ?>/hr</h2>
                                <h6><small><?= $d->tahun; ?></small></h6>
                                <h6><?= $d->nama; ?></h6>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->userdata('id') == 0) { ?>
                                    <a href="<?= base_url('auth'); ?>" class="btn btn-outline-success" style="width: 100%;">Login</a>
                                    <h5>Note!</h5>
                                    <p>Harap Register / Login Untuk melakukan pemesanan</p>
                                <?php } else { ?>
                                    <button class="btn btn-success btn-block" onclick="formOpen()" id="order">Order now</button>
                                    <!-- JS untuk merubah form pemesanan -->
                                    <div id="formOrder" style="visibility: hidden;">
                                        <form action="<?= base_url('user/kendaraan/booking'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <input type="hidden" value="<?= $d->gambar; ?>" name="gambar">
                                                <input type="hidden" value="<?= $d->harga; ?>" name="harga">
                                                <div class="form-group col-md-6">
                                                    <input type="hidden" name="idUser" value="<?= $this->session->userdata('id'); ?>">
                                                    <label for="nama">Nama : </label>
                                                    <input type="text" class="form-control" value="<?= $nama; ?>" id="nama" name="peminjam" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alamat">Alamat : </label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" autofocus>
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
                                                <input type="text" class="form-control" id="harga" value="" readonly>
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
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- Keluar card -->
                <div class="card">
                    <H3>Spesifikasi Kendaraan : </H3>
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
                            <div class="deskripsi">
                                <p><?= $d->deskripsi; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review mt-3" style="margin-left: 32px;">
                    <h4>Ulasan (<?= $total; ?>)</h4>
                    <p><?= $d->nama; ?> <?= $d->tahun; ?></p>
                    <div class="nama_kendaraan">
                        <div class="row">
                            <div class="col-4">
                                <div class="rating">
                                    <?php
                                    $rating = number_format($rating, 1);
                                    ?>
                                    <p><span id="avg_rating" style="font-size:48px;"><?= $rating; ?></span>/5</p>
                                    <?php
                                    $rating = number_format($rating);
                                    ?>
                                    <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <i id="star<?= $i; ?>" class='bx bx-star' style='color:#3fff2a; font-size:24px;'></i>
                                    <?php endfor; ?>
                                    <script>
                                        <?php for ($i = 0; $i < $rating; $i++) : ?>
                                            $("#star<?= $i; ?>").removeClass("bx-star");
                                            $("#star<?= $i; ?>").addClass("bxs-star");
                                        <?php endfor; ?>
                                    </script>
                                </div>
                                <div class="">(<?= $total; ?>) Ulasan</div>
                            </div>
                            <div class="col-3">
                                <?php
                                $A = 0;
                                $B = 0;
                                $C = 0;
                                $D = 0;
                                $E = 0;
                                $data = 0;
                                foreach ($review as $r) :
                                    $data++;
                                    if ($r->rating == 5) {
                                        $A++;
                                    } elseif ($r->rating == 4) {
                                        $B++;
                                    } elseif ($r->rating == 3) {
                                        $C++;
                                    } elseif ($r->rating == 2) {
                                        $D++;
                                    } elseif ($r->rating == 1) {
                                        $E++;
                                    }
                                endforeach;
                                if ($data == 0) {
                                    $widthA = 0;
                                    $widthB = 0;
                                    $widthC = 0;
                                    $widthD = 0;
                                    $widthE = 0;
                                } else {
                                    $widthA = ($A / $data) * 100;
                                    $widthB = ($B / $data) * 100;
                                    $widthC = ($C / $data) * 100;
                                    $widthD = ($D / $data) * 100;
                                    $widthE = ($E / $data) * 100;
                                }
                                ?>
                                <div class="row">
                                    <div class="col-1">
                                        <i class='bx bxs-star' style='color:#3fff2a'>5</i>
                                    </div>
                                    <div class="col">
                                        <hr style="width:<?= $widthA; ?>%">
                                    </div>
                                    <div class="col-2">
                                        <?= $A; ?>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-1">
                                        <i class='bx bxs-star' style='color:#3fff2a'>4</i>
                                    </div>
                                    <div class="col">
                                        <hr style="width:<?= $widthB; ?>%">
                                    </div>
                                    <div class="col-2">
                                        <?= $B; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <i class='bx bxs-star' style='color:#3fff2a'>3</i>
                                    </div>
                                    <div class="col">
                                        <hr style="width:<?= $widthC; ?>%">
                                    </div>
                                    <div class="col-2">
                                        <?= $C; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <i class='bx bxs-star' style='color:#3fff2a'>2</i>
                                    </div>
                                    <div class="col">
                                        <hr style="width:<?= $widthD; ?>%">
                                    </div>
                                    <div class="col-2">
                                        <?= $D; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <i class='bx bxs-star' style='color:#3fff2a'>1</i>
                                    </div>
                                    <div class="col">
                                        <hr style="width:<?= $widthE; ?>%">
                                    </div>
                                    <div class="col-2">
                                        <?= $E; ?>
                                    </div>
                                </div>
                                <!-- 
                                        hr: border-top: 10px solid #28a745; box-sizing: content-box;
                                        /* height: 100px; */
                                        width: 90%;
                                        overflow: visible;
                                    -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="filter mt-3">
                        <div class="row">
                            <div class="col-1">
                                <h5>Filter : </h5>
                            </div>
                            <div class="col">
                                <a href="" class="btn btn-outline-secondary">Semua Ulasan</a>
                                <a href="" class="btn btn-outline-secondary"><i class='bx bxs-star' style='color:#3fff2a;'></i>5</a>
                                <a href="" class="btn btn-outline-secondary"><i class='bx bxs-star' style='color:#3fff2a;'></i>4</a>
                                <a href="" class="btn btn-outline-secondary"><i class='bx bxs-star' style='color:#3fff2a;'></i>3</a>
                                <a href="" class="btn btn-outline-secondary"><i class='bx bxs-star' style='color:#3fff2a;'></i>2</a>
                                <a href="" class="btn btn-outline-secondary"><i class='bx bxs-star' style='color:#3fff2a;'></i>1</a>
                            </div>
                        </div>
                    </div> -->
                    <div class="row mt-3">
                        <h3>Semua Ulasan : </h3>
                    </div>
                    <div class="ulasan mt-3">
                        <?php
                        $i = 0;
                        foreach ($review as $r) :
                            if ($r->rating == 0) {
                            } else {
                                if ($i < 10) :
                        ?>
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="profile_user" style="width: 60px;height:60px;">
                                                <img src="<?= base_url('vendor/public/img/' . $r->gambar); ?>" alt="Profile user" style="width: 100%;height:100%; border-radius:50px;">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <p><?= $r->name; ?></p>
                                            <p><?= $r->tanggal; ?></p>
                                        </div>
                                        <div class="col">
                                            <?php
                                            $rating = number_format($r->rating);
                                            ?>
                                            <?php for ($j = 0; $j < 5; $j++) : ?>
                                                <i class='star<?= $i; ?><?= $j; ?> bx bx-star' style='color:#3fff2a'></i>
                                            <?php endfor; ?>
                                            <script>
                                                <?php for ($j = 0; $j < $rating; $j++) : ?>
                                                    $(".star<?= $i; ?><?= $j; ?>").removeClass("bx-star");
                                                    $(".star<?= $i; ?><?= $j; ?>").addClass("bxs-star");
                                                <?php endfor; ?>
                                            </script>
                                            <p><?= $r->ulasan; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                        <?php
                                    $i++;
                                endif;
                            }
                        endforeach;
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div> <!-- akhir content -->
        <div class="lainnya">
            <h3>Iklan terkait : </h3>
            <div class="iklan-terkait">
                <?php foreach ($iklan as $i) : ?>
                    <div class="card">
                        <a href="<?= base_url('/user/kendaraan/mobil/' . $i->id_kendaraan); ?>" style="text-decoration: none; color:#000">
                            <div class="card-head">
                                <img src="<?= base_url('vendor/public/img/' . $i->gambar); ?>" alt="<?= $i->nama; ?>" style="max-width: 100%;height: 150px;display: flex;margin: 0 auto;">
                            </div>
                            <div class="card-body">
                                <h6>Rp <?= $i->harga; ?>/hr</h6>
                                <p><small><?= $i->tahun; ?></small></p>
                                <p id="nama_kendaraan"><?= $i->nama; ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div> <!-- akhir container -->
    <div class="col-1"></div>
</div>