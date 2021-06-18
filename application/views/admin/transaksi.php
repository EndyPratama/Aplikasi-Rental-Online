<div class="col">
    <h1>Data Transaksi : </h1>
    <hr>
    <?php
    $title = array("Menunggu Pembayaran", "Lunas", "Berlangsung", "Selesai");
    $status = array("Menunggu Pembayaran", "Lunas", "Berlangsung", "Selesai");
    ?>
    <?php
    $a = 0;
    $data = 0;
    for ($i = 0; $i < 4; $i++) :
    ?>
        <h3><?= $title[$i]; ?></h3>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">User</th>
                    <th scope="col">kendaraan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = 1;
                foreach ($transaksi as $t) :
                    foreach ($rating as $r) {
                        if ($r->id_transaksi == $t->id_transaksi) {
                            $rating_kendaraan = $r->rating;
                            $ulasan_kendaraan = $r->ulasan;
                        }
                    }
                    if ($title[$i] == "Menunggu Pembayaran") :
                        if ($t->status == "Menunggu Pembayaran" || $t->status == "Menunggu Verifikasi") :
                            $harga = number_format($t->harga, 0, ',', '.');
                ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $t->name; ?></td>
                                <td><?= $t->nama; ?></td>
                                <td><?= date('D-m-y [H:m:s]', strtotime($t->tanggal)); ?></td>
                                <td>Rp <?= $harga; ?></td>
                                <td><?= $t->status; ?></td>
                                <td class="align-middle">
                                    <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"> Lihat</i></a>
                                    <!-- <a href="<?= base_url('admin/transaksi/batal/' . $t->id_kendaraan); ?>" class="btn btn-danger"><i class="fa fa-remove"> Batal</i></a> -->
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="gambar" style="width:100%;">
                                                <?php if ($t->bukti_transaksi != NULL) { ?>
                                                    <img src="<?= base_url('vendor/public/img/' . $t->bukti_transaksi) ?>" alt="transaksi" style="width:100%;">
                                                <?php } else { ?>
                                                    <p>Belum melakukan upload bukti pembayaran...</p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <?php if ($t->bukti_transaksi != NULL) { ?>
                                                <a href="<?= base_url('admin/transaksi/lunas/' . $t->id_kendaraan . '/' . $t->id . '/' . $t->id_transaksi); ?>" class="btn btn-success"><i class="fa fa-check"> Lunas</i></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Lunas") :
                        if ($t->status == "Lunas") :
                            $harga = number_format($t->harga, 0, ',', '.');
                        ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $t->name; ?></td>
                                <td><?= $t->nama; ?></td>
                                <td><?= date('D-m-y [H:m:s]', strtotime($t->tanggal)); ?></td>
                                <td>Rp <?= $harga; ?></td>
                                <td><?= $t->status; ?></td>
                                <td class="align-middle">
                                    <a href="<?= base_url('admin/transaksi/diterima/' . $t->id_kendaraan . '/' . $t->id . '/' . $t->id_transaksi); ?>" class="btn btn-success"><i class="fa fa-check"> Kendaraan Diterima</i></a>

                                </td>
                            </tr>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Berlangsung") :
                        if ($t->status == "Berlangsung") :
                            $harga = number_format($t->harga, 0, ',', '.');
                        ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $t->name; ?></td>
                                <td><?= $t->nama; ?></td>
                                <td><?= date('D-m-y [H:m:s]', strtotime($t->tanggal)); ?></td>
                                <td>Rp <?= $harga; ?></td>
                                <td><?= $t->status; ?></td>
                                <td class="align-middle">
                                    <a href="<?= base_url('admin/transaksi/selesai/' . $t->id_kendaraan . '/' . $t->id . '/' . $t->id_transaksi); ?>" class="btn btn-success"><i class="fa fa-check"> Selesai</i></a>

                                </td>
                            </tr>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Selesai") :

                        if ($t->status == "Selesai") :
                            $harga = number_format($t->harga, 0, ',', '.');
                        ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $t->name; ?></td>
                                <td><?= $t->nama; ?></td>
                                <input type="hidden" name="nama_kendaraan" id="nama_kendaraan<?= $data; ?>" value="<?= $t->nama; ?>">
                                <input type="hidden" name="invoice_kendaraan" id="invoice_kendaraan<?= $data; ?>" value="<?= $t->invoice; ?>">
                                <input type="hidden" name="peminjam_kendaraan" id="peminjam_kendaraan<?= $data; ?>" value="<?= $t->name; ?>">


                                <input type="hidden" name="rating_kendaraan" id="rating_kendaraan<?= $data; ?>" value="<?= $rating_kendaraan; ?>">
                                <input type="hidden" name="ulasan_kendaraan" id="ulasan_kendaraan<?= $data; ?>" value="<?= $ulasan_kendaraan; ?>">

                                <input type="hidden" name="tanggal_kendaraan" id="tanggal_kendaraan<?= $data; ?>" value="<?= $t->tanggal; ?>">
                                <input type="hidden" name="gambar_kendaraan" id="gambar_kendaraan<?= $data; ?>" value="<?= $t->gambar; ?>">
                                <td><?= date('D-m-y [H:m:s]', strtotime($t->tanggal)); ?></td>
                                <td>Rp <?= $harga; ?></td>
                                <td><?= $t->status; ?></td>

                                <td class="align-middle">
                                    <a href="" class="btn btn-success" onclick="formOpen(<?= $data; ?>)" data-toggle="modal" data-target="#lihatreview"><i class="fa fa-star"> Lihat Review</i></a>

                                    <div class="modal fade" id="lihatreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div id="tamplate-invoice_kendaraan">
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="gambar" style="width: 100%; height:200px">
                                                                <img id="tamplate-gambar_kendaraan" alt="" style="max-height: 100%;max-width: 100%;margin: auto;display: flex;">
                                                                <?php $a++; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row" style="margin:0;">
                                                                <div id="tamplate-name"></div>
                                                                <div id="tamplate-tanggal_kendaraan" style="margin-left:auto;margin-right:50px;"></div>
                                                            </div>
                                                            <div id="tamplate-nama_peminjam"></div>
                                                            <br>
                                                            <?php for ($j = 0; $j < 5; $j++) : ?>
                                                                <i id="star<?= $j; ?>" class='bx bx-star' style='color:#3fff2a; font-size:24px;'></i>
                                                            <?php endfor; ?>
                                                            <span id="pendapat"></span>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label>Ulasan Peminjam : </label>
                                                                <textarea class="form-control" rows="3" name="ulasan" id="tamplate-ulasan_kendaraan" readonly></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    <?php
                            $data++;
                        endif;
                    endif;
                    ?>
                    <script>
                        function formOpen(data) {

                            var nama_kendaraan = document.getElementById("nama_kendaraan" + data).value;
                            document.getElementById("tamplate-name").innerHTML = nama_kendaraan;

                            var peminjam_kendaraan = document.getElementById("peminjam_kendaraan" + data).value;
                            document.getElementById("tamplate-nama_peminjam").innerHTML = "Peminjam : " + peminjam_kendaraan;

                            var invoice_kendaraan = document.getElementById("invoice_kendaraan" + data).value;
                            document.getElementById("tamplate-invoice_kendaraan").innerHTML = invoice_kendaraan;

                            var gambar_kendaraan = document.getElementById("gambar_kendaraan" + data).value;
                            document.getElementById("tamplate-gambar_kendaraan").src = "<?= base_url(); ?>/vendor/public/img/" + gambar_kendaraan;

                            var rating = document.getElementById("rating_kendaraan" + data).value;
                            // document.getElementById("tamplate-rating").value = rating;
                            console.log(rating);
                            for (var i = 0; i < 5; i++) {
                                $("#star" + i).removeClass("bxs-star");
                                $("#star" + i).addClass("bx-star");
                            }
                            for (var i = 0; i < rating; i++) {
                                $("#star" + i).removeClass("bx-star");
                                $("#star" + i).addClass("bxs-star");
                            }
                            if (rating == 0) {
                                document.getElementById('pendapat').innerHTML = "";
                            } else if (rating == 1) {
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

                            var ulasan = document.getElementById("ulasan_kendaraan" + data).value;
                            document.getElementById("tamplate-ulasan_kendaraan").value = ulasan;

                            var tanggal_kendaraan = document.getElementById("tanggal_kendaraan" + data).value;
                            document.getElementById("tamplate-tanggal_kendaraan").innerHTML = tanggal_kendaraan;
                        }
                    </script>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endfor; ?>
</div>