<div class="container mt-4">
    <h3>Ulasan</h3>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Menunggu Ulasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ulasan Saya</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="" style="font-size: 18px;margin-left: 10px;">
                        <i class='bx bx-arrow-back' style="font-size: 28px;margin-left:5px;">Kembali</i>
                    </a>
                </div>
            </div>
            <?php foreach ($ulasan as $u) : ?>
                <form action="<?= base_url('/user/profile/kirim_ulasan'); ?>" method="post">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="row">
                                <input type="hidden" name="transaksi" value="<?= $u->id_transaksi; ?>">
                                <input type="hidden" name="userid" value="<?= $u->id; ?>">
                                <input type="hidden" name="kendaraanid" value="<?= $u->id_kendaraan; ?>">
                                <!-- <p><?= $u->invoice; ?></p> -->
                                <input type="hidden" name="invoice" value="<?= $u->invoice; ?>">
                                <p style="margin-left:auto;"><em>[<?= $u->tanggal; ?>]</em></p>
                                <input type="hidden" name="tanggal" value="<?= $u->tanggal; ?>">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="gambar" style="width: 100%; height:200px">
                                        <img src="<?= base_url('vendor/public/img/' . $u->gambar); ?>" alt="" style="max-height: 100%;max-width: 100%;margin: auto;display: flex;">
                                    </div>
                                </div>
                                <div class="col">
                                    <p><strong><?= $u->nama; ?></strong></p>
                                    <p>Bagaimana perjalanan anda?</p>
                                    <?php for ($j = 0; $j < 5; $j++) : ?>
                                        <i id="star<?= $j; ?>" class='bx bx-star' onclick="myFunction(<?= $j; ?>)" style='color:#3fff2a; font-size:24px;'></i>
                                    <?php endfor; ?>
                                    <span id="pendapat"></span>
                                    <p id="alert" style="color:red;"></p>
                                    <input type="hidden" id="rating" name="rating" value="0" required>
                                    <script>
                                        $(document).ready(function() {
                                            if (document.getElementById('rating').value == 0) {
                                                document.getElementById('submit').type = "reset";
                                                document.getElementById('alert').innerHTML = "*wajib diisi";
                                            }
                                        });

                                        function myFunction(data) {
                                            for (var i = 0; i < 5; i++) {
                                                $("#star" + i).removeClass("bxs-star");
                                                $("#star" + i).addClass("bx-star");
                                            }
                                            for (var i = 0; i < (data + 1); i++) {
                                                $("#star" + i).removeClass("bx-star");
                                                $("#star" + i).addClass("bxs-star");
                                            }
                                            if (data == 0) {
                                                document.getElementById('pendapat').innerHTML = "Sangat Buruk";
                                                document.getElementById('rating').value = 1;
                                            } else if (data == 1) {
                                                document.getElementById('pendapat').innerHTML = "Buruk";
                                                document.getElementById('rating').value = 2;
                                            } else if (data == 2) {
                                                document.getElementById('pendapat').innerHTML = "Cukup";
                                                document.getElementById('rating').value = 3;
                                            } else if (data == 3) {
                                                document.getElementById('pendapat').innerHTML = "Baik";
                                                document.getElementById('rating').value = 4;
                                            } else if (data == 4) {
                                                document.getElementById('pendapat').innerHTML = "Sangat Baik";
                                                document.getElementById('rating').value = 5;
                                            }
                                            if (document.getElementById('rating').value != 0) {
                                                document.getElementById('submit').type = "submit";
                                                document.getElementById('alert').style.display = "none";
                                            }
                                        }
                                    </script>
                                    <br><br>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Berikan ulasan anda</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ulasan"></textarea>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-outline-success" style="float: right;">
                                        <!-- <a href="" type="submit"> -->
                                        <i class='bx bxl-telegram'>Kirim</i>
                                        <!-- </a> -->
                                    </button>
                                    <button class="btn btn-outline-success mr-3" style="float: right;">
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>