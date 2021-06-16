<div class="col">
    <h1>Data Transaksi : </h1>
    <hr>
    <?php
    $title = array("Menunggu Pembayaran", "Lunas", "Berlangsung", "Selesai", "Dibatalkan");
    $status = array("Menunggu Pembayaran", "Lunas", "Berlangsung", "Selesai", "Dibatalkan");
    ?>
    <?php
    for ($i = 0; $i < 5; $i++) :
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
                    if ($title[$i] == "Menunggu Pembayaran") :
                        if ($t->status == "Menunggu Pembayaran") :
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
                                    <a href="<?= base_url('admin/transaksi/batal/' . $t->id_kendaraan); ?>" class="btn btn-danger"><i class="fa fa-remove"> Batal</i></a>
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
                                                <a href="<?= base_url('admin/transaksi/terima/' . $t->id); ?>" class="btn btn-success"><i class="fa fa-check"> Terima</i></a>
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
                                    <a href="<?= base_url('admin/transaksi/diterima/' . $t->id_kendaraan . '/' . $t->id); ?>" class="btn btn-success"><i class="fa fa-check"> Kendaraan Diterima</i></a>

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
                                <td><?= date('D-m-y [H:m:s]', strtotime($t->tanggal)); ?></td>
                                <td>Rp <?= $harga; ?></td>
                                <td><?= $t->status; ?></td>
                                <td class="align-middle">
                                    <a href="" class="btn btn-success" onclick="formOpen(<?= $i; ?>)" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-star"> Lihat Review</i></a>

                                </td>
                            </tr>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Dibatalkan") :
                        if ($t->status == "Dibatalkan") :
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
                                    Transaksi dibatalkan

                                </td>
                            </tr>
                    <?php
                        endif;
                    endif;
                    ?>
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

                            console.log(nama);
                            console.log(invoice);
                            console.log(gambar);
                            console.log(rating);
                            console.log(ulasan);
                            console.log(tanggal);
                        }
                    </script>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endfor; ?>
</div>