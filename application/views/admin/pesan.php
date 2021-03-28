<!-- MAIN -->
<div class="col-9">
    <h1>Data Pesan : </h1>
    <hr>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Pesan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
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
            foreach ($pesan as $p) :
            ?>
                <tr>
                    <th scope="row"><?= $row++; ?></th>
                    <td><?= $p->nama; ?></td>
                    <td><?= $p->pesan; ?></td>
                    <td><?= date('D-m-y [H:m:s]', strtotime($p->tanggal)); ?></td>
                    <td>
                        <a href="pesan/detail" class="btn btn-success"><i class="fa fa-eye"></i></a>
                        <a href="pesan/delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>