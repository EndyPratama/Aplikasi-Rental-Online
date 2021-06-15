<!-- MAIN -->
<div class="col">
    <h1>Data Booking : </h1>
    <hr>
    <?php
    $title = array("Menunggu Konfirmasi", "Diterima", "Ditolak");
    $action = array("0", "1", "2");
    ?>
    <?php
    for ($i = 0; $i < 3; $i++) :
    ?>
        <h3><?= $title[$i]; ?></h3>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Booking</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kendaraan</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = 1;
                foreach ($booking as $b) :
                    if ($title[$i] == "Menunggu Konfirmasi") :
                        if ($b->action == 0) :
                            $total = number_format($b->total, 0, ',', '.');
                ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $b->id; ?></td>
                                <td><?= $b->peminjam; ?></td>
                                <td><?= $b->alamat; ?></td>
                                <td><?= $b->kendaraan; ?></td>
                                <td><?= $b->durasi; ?> Hari</td>
                                <td>Rp <?= $total; ?></td>
                                <td class="align-middle">
                                    <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"> Lihat</i></a>

                                    <a href="<?= base_url('admin/booking/tolak/' . $b->id); ?>" class="btn btn-danger"><i class="fa fa-remove"> Tolak</i></a>

                                    <!-- Modal -->
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
                                                        <?php if ($b->bukti_transaksi != NULL) { ?>
                                                            <img src="<?= base_url('vendor/public/img/' . $b->bukti_transaksi) ?>" alt="transaksi" style="width:100%;">
                                                        <?php } else { ?>
                                                            <p>Belum melakukan upload bukti pembayaran...</p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <?php if ($b->bukti_transaksi != NULL) { ?>
                                                        <a href="<?= base_url('admin/booking/terima/' . $b->id); ?>" class="btn btn-success"><i class="fa fa-check"> Terima</i></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Diterima") :
                        if ($b->action == 1) :
                            $harga = number_format($b->harga, 0, ',', '.');
                        ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $b->id; ?></td>
                                <td><?= $b->peminjam; ?></td>
                                <td><?= $b->alamat; ?></td>
                                <td><?= $b->kendaraan; ?></td>
                                <td><?= $b->durasi; ?> Hari</td>
                                <td>Rp <?= $harga; ?></td>
                                <td class="align-middle">Diterima</td>
                            </tr>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Ditolak") :
                        if ($b->action == 2) :
                            $harga = number_format($b->harga, 0, ',', '.');
                        ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $b->id; ?></td>
                                <td><?= $b->peminjam; ?></td>
                                <td><?= $b->alamat; ?></td>
                                <td><?= $b->kendaraan; ?></td>
                                <td><?= $b->durasi; ?> Hari</td>
                                <td>Rp <?= $harga; ?></td>
                                <td class="align-middle">Ditolak</td>
                            </tr>
                    <?php
                        endif;
                    endif;
                    ?>
                <?php

                endforeach;
                ?>
            </tbody>
        </table>
    <?php endfor; ?>
</div>