<!-- MAIN -->
<div class="col-9">
    <h1>Data Transaksi : </h1>
    <hr>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID Transaksi</th>
                <th scope="col">ID User</th>
                <th scope="col">kendaraan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Status</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- 
            SELECT akun.nama, pesan.pesan, pesan.tanggal
            FROM pesan, akun
            WHERE pesan.user_id=akun.id 
            -->
            <?php
            $row = 1;
            foreach ($transaksi as $t) :
            ?>
                <tr>
                    <th scope="row"><?= $row++; ?></th>
                    <td><?= $t->user_id; ?></td>
                    <td><?= $t->kendaraan_id; ?></td>
                    <td><?= date('D-m-y [H:m:s]', strtotime($t->tanggal)); ?></td>
                    <td><?= $t->status; ?></td>
                    <td><?= $t->harga; ?></td>
                    <td class="align-middle">
                    <a href="<?= base_url('kendaraan/selesai/' . $t->kendaraan_id); ?>" class="btn btn-success"><i class="fa fa-check"> Selesai</i></a>
                    
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>