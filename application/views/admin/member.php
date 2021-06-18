<!-- MAIN -->
<div class="col">
    <h1>Data Member : </h1>
    <hr>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Active</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $row = 1;
            foreach ($member as $m) :
            ?>
                <tr>
                    <th scope="row"><?= $row++; ?></th>
                    <input type="hidden" id="id<?= $row; ?>" value="<?= $m->id; ?>">

                    <td><?= $m->name; ?></td>
                    <input type="hidden" id="nama<?= $row; ?>" value="<?= $m->name; ?>">

                    <td><?= $m->username; ?></td>
                    <input type="hidden" id="username<?= $row; ?>" value="<?= $m->username; ?>">

                    <td><?= $m->email; ?></td>
                    <input type="hidden" id="email<?= $row; ?>" value="<?= $m->email; ?>">

                    <?php
                    if ($m->role_id == 1) {
                    ?>
                        <td>Admin</td>
                        <input type="hidden" id="role_id<?= $row; ?>" value="Admin">
                    <?php
                    } elseif ($m->role_id == 2) {
                    ?>
                        <td>Member</td>
                        <input type="hidden" id="role_id<?= $row; ?>" value="Member">
                    <?php
                    } else {
                    ?>
                        <td>Unknown</td>
                    <?php
                    }
                    ?>

                    <td>
                        <?php if ($m->is_active == 0) { ?>
                            <p>Not Active</p>
                        <?php
                        } else if ($m->is_active == 1) {
                        ?>
                            <p>Actived</p>
                        <?php
                        } ?>
                    </td>
                    <input type="hidden" id="ttl<?= $row; ?>" value="<?= $m->ttl; ?>">
                    <input type="hidden" id="jk<?= $row; ?>" value="<?= $m->jenis_kelamin; ?>">
                    <input type="hidden" id="phone<?= $row; ?>" value="<?= $m->phone; ?>">

                    <td class="align-middle">
                        <a href="<?= base_url('member/detail/' . $m->id); ?>" class="btn btn-success" onclick="formOpen(<?= $row; ?>)" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-show-alt'></i></a>
                    </td>
                </tr>
                <script>
                    function formOpen(data) {
                        // console.log(data);
                        var id = document.getElementById("id" + data).value;
                        // document.getElementById("recipient-name").value = id;

                        var nama = document.getElementById("nama" + data).value;
                        document.getElementById("recipient-name").value = nama;

                        var username = document.getElementById("username" + data).value;
                        document.getElementById("recipient-username").value = username;

                        var email = document.getElementById("email" + data).value;
                        document.getElementById("recipient-email").value = email;

                        var role_id = document.getElementById("role_id" + data).value;
                        document.getElementById("recipient-status").value = role_id;

                        var ttl = document.getElementById("ttl" + data).value;
                        document.getElementById("recipient-ttl").value = ttl;

                        var jk = document.getElementById("jk" + data).value;
                        document.getElementById("recipient-jk").value = jk;

                        var phone = document.getElementById("phone" + data).value;
                        document.getElementById("recipient-phone").value = phone;

                        // var nama = document.getElementById("nama" + data).value;
                        // document.getElementById("recipient-name").value = nama;
                    }
                </script>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <!-- <img src="<?= base_url('vendor/public/img/' . $m->gambar); ?>" class="rounded mx-auto d-block" alt="Gambar Profile" style="width: 100px;"> -->
                        <!-- <img src="#" class="card-img-top" alt="Gambar Profile"> -->
                        <div class="card-body">
                            <form action="<?= base_url('pesan/tanggapan'); ?>" method="post">
                                <input type="hidden" name="id_pesan" id="id-pesan">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama :</label>
                                    <input type="text" class="form-control" id="recipient-name" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Username :</label>
                                    <input type="text" class="form-control" id="recipient-username" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email :</label>
                                    <input type="text" class="form-control" id="recipient-email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Status :</label>
                                    <input type="text" class="form-control" id="recipient-status" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tanggal Lahir :</label>
                                    <input type="text" class="form-control" id="recipient-ttl" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Jenis Kelamin :</label>
                                    <input type="text" class="form-control" id="recipient-jk" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Phone :</label>
                                    <input type="text" class="form-control" id="recipient-phone" readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>