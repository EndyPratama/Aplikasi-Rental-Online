<div class="container mt-4">
    <h3>Ulasan</h3>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/user/profile/menunggu_ulasan'); ?>">Menunggu Ulasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('/user/profile/ulasan_saya'); ?>">Ulasan Saya</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <h5>Filter : </h5>
                </div>
                <div class="col-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            3 Bulan Terakhir
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Semua</a>
                            <a class="dropdown-item" href="#">3 Bulan Terakhir</a>
                            <a class="dropdown-item" href="#">6 Bulan Terakhir</a>
                            <a class="dropdown-item" href="#">12 Bulan Terakhir</a>
                        </div>
                    </div>
                </div>
                <div class="col-5"></div>
                <div class="col">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari disini...">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class='bx bx-search-alt'></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i = 0;
            foreach ($ulasan as $u) :

            ?>
                <div class="card mt-3">
                    <div class="card-header">
                        <p><?= $u->invoice; ?></p>
                        <input type="hidden" name="" id="invoice<?= $i; ?>" value="<?= $u->invoice; ?>">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="gambar" style="width: 100%; height:100px">
                                    <img src="<?= base_url('vendor/public/img/' . $u->gambar); ?>" alt="" style="max-height: 100%;max-width: 100%;margin: auto;display: flex;">
                                    <input type="hidden" name="" id="gambar<?= $i; ?>" value="<?= $u->gambar; ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <p><strong><?= $u->nama; ?></strong></p>
                                <input type="hidden" name="" id="nama<?= $i; ?>" value="<?= $u->nama; ?>">
                                <?php for ($j = 0; $j < 5; $j++) : ?>
                                    <i id="star<?= $i; ?><?= $j; ?>" class='bx bx-star' style='color:#3fff2a; font-size:24px;'></i>
                                <?php endfor; ?>
                                <script>
                                    <?php for ($j = 0; $j < $u->rating; $j++) : ?>
                                        $("#star<?= $i; ?><?= $j; ?>").removeClass("bx-star");
                                        $("#star<?= $i; ?><?= $j; ?>").addClass("bxs-star");
                                    <?php endfor; ?>
                                </script>
                                <input type="hidden" name="" id="rating<?= $i; ?>" value="<?= $u->rating; ?>">
                                <input type="hidden" name="" id="ulasan<?= $i; ?>" value="<?= $u->ulasan; ?>">
                                <input type="hidden" name="" id="tanggal<?= $i; ?>" value="<?= $u->tanggal; ?>">
                            </div>
                            <div class="col-4">
                                <div class="action" style="display: flex; flex-direction:column;">
                                    <a href="" class="btn btn-success" onclick="formOpen(<?= $i; ?>)" data-toggle="modal" data-target="#exampleModal"><i class='bx bxl-telegram'>Lihat Ulasan</i></a>
                                    <a href="<?= base_url('/user/kendaraan/mobil/' . $u->id_kendaraan); ?>" class="btn btn-outline-success"><i class='bx bx-notepad'>Sewa Lagi</i></a>
                                    <a href="<?= base_url('/user/contact'); ?>" class="btn btn-outline-warning"><i class='bx bx-message-square-detail'>Hubungi Admin</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function formOpen(data) {
                        // nama, gambar, invoice, rating, ulasan
                        // console.log(data);
                        // var id = document.getElementById("id" + data).value;

                        var nama = document.getElementById("nama" + data).value;
                        document.getElementById("tamplate-name").innerHTML = nama;

                        var invoice = document.getElementById("invoice" + data).value;
                        document.getElementById("tamplate-invoice").innerHTML = invoice;

                        var gambar = document.getElementById("gambar" + data).value;
                        document.getElementById("tamplate-gambar").src = "<?= base_url(); ?>/vendor/public/img/" + gambar;

                        var rating = document.getElementById("rating" + data).value;
                        // document.getElementById("tamplate-rating").value = rating;
                        for (var i = 0; i < rating; i++) {
                            $("#star" + i).removeClass("bx-star");
                            $("#star" + i).addClass("bxs-star");
                        }
                        if (rating == 1) {
                            document.getElementById('pendapat').innerHTML = "Sangat Buruk";
                        } else if (rating == 2) {
                            document.getElementById('pendapat').innerHTML = "Buruk";
                        } else if (rating == 3) {
                            document.getElementById('pendapat').innerHTML = "Cukup";
                        } else if (rating == 4) {
                            document.getElementById('pendapat').innerHTML = "Baik";
                        } else if (rating == 5) {
                            document.getElementById('pendapat').innerHTML = "Sangat Baik";
                        }

                        var ulasan = document.getElementById("ulasan" + data).value;
                        document.getElementById("tamplate-ulasan").value = ulasan;

                        var tanggal = document.getElementById("tanggal" + data).value;
                        document.getElementById("tamplate-tanggal").innerHTML = tanggal;
                    }
                </script>
            <?php
                $i++;
            endforeach;
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p style="margin-bottom: 0;"><strong id="tamplate-invoice"></strong></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="gambar" style="width: 100%; height:200px">
                            <img src="<?= base_url('vendor/public/img/' . $u->gambar); ?>" id="tamplate-gambar" alt="" style="max-height: 100%;max-width: 100%;margin: auto;display: flex;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <p><strong id="tamplate-name"></strong></p>
                            <p style="margin-left:auto;"><em id="tamplate-tanggal"></em></p>
                        </div>
                        <?php for ($j = 0; $j < 5; $j++) : ?>
                            <i id="star<?= $j; ?>" class='bx bx-star' style='color:#3fff2a; font-size:24px;'></i>
                        <?php endfor; ?>
                        <span id="pendapat"></span>
                        <br><br>
                        <div class="form-group">
                            <label>Ulasan anda : </label>
                            <textarea class="form-control" rows="3" name="ulasan" id="tamplate-ulasan" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-primary"><i class='bx bx-notepad'>Sewa Lagi</i></a>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>