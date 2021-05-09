<div class="col">
    <h1>Data Transaksi : </h1>
    <hr>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID Transaksi</th>
                <th scope="col">User</th>
                <th scope="col">kendaraan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Status</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $row = 1;
            foreach ($transaksi as $t) :
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

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>