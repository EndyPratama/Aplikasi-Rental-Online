<!-- MAIN -->
<div class="col">
    <h1>Data Booking : </h1>
    <hr>
    <?php
    $title = array("Menunggu Konfirmasi", "Diterima", "Ditolak");
    // $action = array("0", "1", "-1");
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
                    <th scope="col">Tanggal</th>
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
                                <td><?= $b->tgl_pnjm; ?></td>
                                <td><?= $b->durasi; ?> Hari</td>
                                <td>Rp <?= $total; ?></td>
                                <td class="align-middle">
                                    <a href="<?= base_url('Admin/booking/terima/' . $b->id); ?>" class="btn btn-success"><i class="fa fa-check"> Terima</i></a>
                                    <a href="<?= base_url('Admin/booking/tolak/' . $b->id); ?>" class="btn btn-danger"><i class="fa fa-remove"> Tolak</i></a>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Diterima") :
                        if ($b->action == 1 || $b->action == 2) :
                            $harga = number_format($b->harga, 0, ',', '.');
                        ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $b->id; ?></td>
                                <td><?= $b->peminjam; ?></td>
                                <td><?= $b->alamat; ?></td>
                                <td><?= $b->kendaraan; ?></td>
                                <td><?= $b->tgl_pnjm; ?></td>
                                <td><?= $b->durasi; ?> Hari</td>
                                <td>Rp <?= $harga; ?></td>
                                <td class="align-middle">Diterima</td>
                            </tr>
                        <?php
                        endif;
                    endif;
                    if ($title[$i] == "Ditolak") :
                        if ($b->action == -1) :
                            $harga = number_format($b->harga, 0, ',', '.');
                        ?>
                            <tr>
                                <th scope="row"><?= $row++; ?></th>
                                <td><?= $b->id; ?></td>
                                <td><?= $b->peminjam; ?></td>
                                <td><?= $b->alamat; ?></td>
                                <td><?= $b->kendaraan; ?></td>
                                <td><?= $b->tgl_pnjm; ?></td>
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