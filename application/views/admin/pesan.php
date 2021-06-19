<!-- MAIN -->
<div class="col">
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
        <tbody id="target_ajax">
            <?php
            $row = 1;
            $data = 0;
            foreach ($pesan as $p) :
            ?>
                <?php
                foreach ($jawaban as $j) :
                    if ($p->id_pesan == $j->id_pesan) {
                ?>
                        <tr>
                            <th scope="row"><?= $row++; ?></th>
                            <input type="hidden" id="id<?= $data; ?>" value="<?= $p->id_pesan; ?>">

                            <td><?= $p->name; ?></td>
                            <input type="hidden" id="nama<?= $data; ?>" value="<?= $p->name; ?>">

                            <td><?= $p->pesan; ?></td>
                            <input type="hidden" id="pesan<?= $data; ?>" value="<?= $p->pesan; ?>">
                            <input type="hidden" id="jawaban<?= $data; ?>" value="<?= $j->jawaban; ?>">

                            <input type="hidden" id="status<?= $data; ?>" value="<?= $p->status; ?>">
                            <td><?= date('D-m-y [H:m:s]', strtotime($p->tanggal)); ?></td>
                            <td>
                                <a href="" class="btn btn-success" onclick="formOpen(<?= $data; ?>)" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                <a href="<?= base_url('Admin/Pesan/delete/' . $p->id_pesan); ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                // update status dan jawaban_id pada pesan
                endforeach; ?>
                <tr>
                    <?php if ($p->jawaban_id == 0) : ?>
                        <th scope="row"><?= $row++; ?></th>
                        <input type="hidden" id="id<?= $data; ?>" value="<?= $p->id_pesan; ?>">

                        <td><?= $p->name; ?></td>
                        <input type="hidden" id="nama<?= $data; ?>" value="<?= $p->name; ?>">

                        <td><?= $p->pesan; ?></td>
                        <input type="hidden" id="pesan<?= $data; ?>" value="<?= $p->pesan; ?>">

                        <input type="hidden" id="status<?= $data; ?>" value="<?= $p->status; ?>">
                        <td><?= date('D-m-y [H:m:s]', strtotime($p->tanggal)); ?></td>
                        <td>
                            <a href="" class="btn btn-success" onclick="formOpen(<?= $data; ?>)" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url('Admin/Pesan/delete/' . $p->id_pesan); ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    <?php endif; ?>

                </tr>
                <?php $data++ ?>
                <script>
                    function formOpen(data) {
                        // console.log(data);
                        var id = document.getElementById("id" + data).value;
                        var nama = document.getElementById("nama" + data).value;
                        var pesan = document.getElementById("pesan" + data).value;
                        if (document.getElementById("status" + data).value == 1) {
                            var jawaban = document.getElementById("jawaban" + data).value;
                            $('#answer-text').prop('readonly', true);
                            document.getElementById('sendBtn').style.display = 'none';
                        } else {
                            var jawaban = "";
                            document.getElementById("answer-text").removeAttribute("readonly", 0);
                        }
                        // console.log(id);
                        // console.log(pesan);
                        document.getElementById("id-pesan").value = id;
                        document.getElementById("recipient-name").value = nama;
                        document.getElementById("message-text").value = pesan;
                        document.getElementById("answer-text").value = jawaban;
                    }
                </script>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/Pesan/tanggapan'); ?>" method="post">
                        <input type="hidden" name="id_pesan" id="id-pesan">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pengirim:</label>
                            <input type="text" class="form-control" id="recipient-name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Pesan:</label>
                            <textarea class="form-control" id="message-text" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jawaban:</label>
                            <textarea class="form-control" id="answer-text" name="jawaban" readonly></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="sendBtn">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>