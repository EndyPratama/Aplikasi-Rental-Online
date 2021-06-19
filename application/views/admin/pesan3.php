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
            <script>
                $(document).ready(function(e) {
                    setInterval(function() {
                        e.ajax({
                            url: "<?= base_url('Pesan/pesan'); ?>",
                            type: "POST",
                            dataType: "json",
                            data: {},
                            success: function(data) {
                                // console.log("ini data : " + data.pesan);
                                // console.log("ini dati : " + data.jmlah);
                                var table = '';
                                var row = 1;
                                var no = 0;
                                console.log(data.pesan[0].id_pesan);
                                var p = data.pesan[i];
                                var j = data.jawaban[j];
                                for (var i = 0; i < data.jmlhPesan; i++) {
                                    for (var j = 0; j < data.jmlhJawaban; j++) {
                                        if (data.pesan[i].id_pesan == data.jawaban[j].id_pesan) {
                                            var d = new Date(data.pesan[i].tanggal)
                                            table += `
                                                <tr>
                                                    <th scope="row">` + row + `</th>
                                                    <input type="hidden" id="id` + no + `" value="` + data.pesan[i].id_pesan + `">

                                                    <td>` + data.pesan[i].name + `</td>
                                                    <input type="hidden" id="nama` + no + `" value="` + data.pesan[i].name + `">

                                                    <td>` + data.pesan[i].pesan + `</td>
                                                    <input type="hidden" id="pesan` + no + `" value="` + data.pesan[i].pesan + `">
                                                    <input type="text" id="jawaban` + no + `" value="` + data.jawaban[j].jawaban + `">

                                                    <input type="text" id="status` + no + `" value="` + data.pesan[i].status + `">
                                                    <td>` + d + `</td>
                                                    <td>
                                                    <a href="" class="btn btn-success" onclick="` + formOpen(no) + `" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        <a href="http://localhost/fp_uts_framework/Pesan/delete/` + data.pesan[i].id_pesan + `" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                `
                                            row++;
                                        }

                                    }
                                    if (data.pesan[i].jawaban_id == 0) {
                                        table += `
                                        <tr>
                                                <th scope="row">` + row + `</th>
                                                <input type="hidden" id="id` + no + `" value="` + data.pesan[i].id_pesan + `">

                                                <td>` + data.pesan[i].name + `</td>
                                                <input type="hidden" id="nama` + no + `" value="` + data.pesan[i].name + `">

                                                <td>` + data.pesan[i].pesan + `</td>
                                                <input type="hidden" id="pesan` + no + `" value="` + data.pesan[i].pesan + `">

                                                <input type="text" id="status` + no + `" value="` + data.pesan[i].status + `">
                                                <td>` + d + `</td>
                                                <td>
                                                    <a href="" class="btn btn-success" onclick="` + formOpen(no) + `" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                    <a href="http://localhost/fp_uts_framework/Pesan/delete/` + data.pesan[i].id_pesan + `" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                        </tr>
                                        `
                                        row++;
                                    }
                                    no++;

                                    function formOpen(data) {
                                        console.log(data);
                                        var id = document.getElementById("id" + data);
                                        if (id == null) {
                                            console.log("Pass");
                                        } else {
                                            var nama = document.getElementById("nama" + data).value;
                                            var pesan = document.getElementById("pesan" + data).value;
                                            console.log(id.value);
                                            console.log(nama);
                                            console.log("Pesan : " + pesan);
                                            if (document.getElementById("status" + data).value == 1) {
                                                var jawaban = document.getElementById("jawaban" + data).value;
                                                console.log("Jawaban : " + jawaban);
                                                // $('#answer-text').prop('readonly', true);
                                                // document.getElementById('sendBtn' + data).style.display = 'none';
                                            } else {
                                                var jawaban = "";
                                                document.getElementById("answer-text").removeAttribute("readonly", 0);
                                            }
                                            document.getElementById("id-pesan").value = id;
                                            document.getElementById("recipient-name").value = nama;
                                            document.getElementById("message-text").value = pesan;
                                            document.getElementById("answer-text").value = jawaban;
                                        }
                                    }
                                }
                                document.getElementById('target_ajax').innerHTML = table;
                            }
                        });
                    }, 10000);
                })
            </script>

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
                    <form action="<?= base_url('pesan/tanggapan'); ?>" method="post">
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