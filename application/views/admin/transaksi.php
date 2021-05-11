<div class="col">
    <h1>Data Transaksi : </h1>
    <hr>
    <?php
    $title = array("Menunggu Pembayaran", "Diterima", "Berlangsung", "Selesai", "Dibatalkan");
    $status = array("Menunggu Pembayaran", "Diterima", "Berlangsung", "Selesai", "Dibatalkan");
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
                        <a href="<?= base_url('transaksi/selesai/' . $t->id_kendaraan); ?>" class="btn btn-warning"><i class="fa fa-search"> Cek</i></a>
                        <a href="<?= base_url('transaksi/selesai/' . $t->id_kendaraan); ?>" class="btn btn-success"><i class="fa fa-check"> Terima</i></a>
                        <a href="<?= base_url('transaksi/selesai/' . $t->id_kendaraan); ?>" class="btn btn-danger"><i class="fa fa-remove"> Batal</i></a>

                    </td>
                </tr>
                <?php
                    endif;
                endif;
                    if ($title[$i] == "Diterima") :
                        if ($t->status == "Diterima") :
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
                        <a href="<?= base_url('transaksi/selesai/' . $t->id_kendaraan); ?>" class="btn btn-success"><i class="fa fa-check"> Selesai</i></a>

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
                        <a href="<?= base_url('admin/transaksi/selesai/' . $t->id_kendaraan); ?>" class="btn btn-success"><i class="fa fa-check"> Selesai</i></a>

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
                        Kendaraan telah kembali

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
                        <a href="<?= base_url('transaksi/selesai/' . $t->id_kendaraan); ?>" class="btn btn-success"><i class="fa fa-check"> Cek</i></a>

                    </td>
                </tr>
                <?php
                        endif;
                    endif;
                    ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endfor; ?>
</div>
