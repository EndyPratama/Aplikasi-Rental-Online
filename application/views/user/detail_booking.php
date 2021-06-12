<div class="container">
    <form action="<?= base_url('/user/kendaraan/cek'); ?>" method="POST">
        <div class="row">
            <div class="col">
                <h3 class="my-3">Kendaraan yang dipesan : </h3>
                <div class="row">
                    <div class="col-3">
                        <div class="detail_gambar" style="width: 100%;">
                            <img src="<?= base_url('vendor/public/img/' . $gambar); ?>" alt="" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-9">
                        <p><?= $kendaraan; ?></p>
                        <p>Pemilik : Mr. X</p>
                        <div class="row" style="margin:0;">
                            <p>Durasi :</p>
                            <div class="center ml-3">
                                <div class="input-group">
                                    <!-- <span class="input-group-btn"> -->
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]" style="height: 25px;border-radius:15px;padding: 0 5px;">
                                        <!-- <span class="bx bx-minus"></span> -->
                                        <i class="bx bx-minus"></i>
                                    </button>
                                    <!-- </span> -->
                                    <input type="text" name="quant[2]" class="form-control input-number" value="<?= $durasi; ?>" min="1" max="7" style="width: 50px;height:25px;border: none;border-bottom: 1px solid grey;" readonly>
                                    <!-- <span class="input-group-btn"> -->
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]" style="height: 25px;border-radius:15px;padding: 0 5px;">
                                        <span class="bx bx-plus"></span>
                                    </button>
                                    <!-- </span> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="data_peminjam mt-5">
                    <h6>Detail peminjam</h6>
                    <hr>

                    <div class="form-group">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama Peminjam">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="alamat" placeholder="Alamat Rumah Anda ....">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tgl_pnjm" name="tgl_pnjm">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tgl_kmbl" name="tgl_kmbl">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Metode Pembayaran</label>
                        <select class="custom-select" name="metode_pembayaran">
                            <option value="COD" selected>Cash On Delivery</option>
                            <option value="BNI">BNI [009<?= rand(); ?>]</option>
                            <option value="BRI">BRI [002<?= rand(); ?>]</option>
                            <option value="BCA">BCA [014<?= rand(); ?>]</option>
                            <option value="MANDIRI">MANDIRI [008<?= rand(); ?>]</option>
                        </select>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" onclick="cekData()" class="custom-control-input" id="customSwitch1" value="0">
                        <label class="custom-control-label" for="customSwitch1">Perjalanan dengan supir</label>
                    </div>
                    <div class="form-group mt-2" id="supir">

                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Harga</h5>
                        <div class="row">
                            <div class="col">
                                <p>Harga sewa kendaraan</p>
                                <p>Harga sewa supir</p>
                                <p>Durasi</p>
                            </div>
                            <div class="col">
                                <?php
                                $harga_kendaraan = $harga;
                                $harga_sewa = number_format($harga_kendaraan, 0, ',', '.');
                                ?>
                                <p>Rp. <?= $harga_sewa; ?></p>
                                <input type="hidden" id="harga_kendaraan_kirim" value="" name="kendaraan">
                                <p id="harga_supir">Rp. 0</p>
                                <input type="hidden" id="harga_supir_kirim" value="" name="supir">
                                <p id="durasi_peminjaman"><?= $durasi; ?> hari</p>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Total Tagihan</div>
                                <?php
                                $total = $harga_kendaraan * $durasi;
                                ?>
                                <?php $total = number_format($total, '0', ',', '.') ?>
                                <div class="col" id="total_harga">Rp. <?= $total; ?></div>
                                <input type="hidden" id="total_kirim" value="" name="total">
                            </div>
                        </li>
                    </ul>
                    <div class="card-footer">
                        <!-- <a href="#" class="btn btn-primary" style="width: 100%;">Pesan Sekarang</a> -->
                        <button type="submit" class="btn-primary" style="width: 100%;">Pesan Sekarang</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function hargaTotal() {
        durasi = document.getElementById('durasi_peminjaman').innerHTML;
        durasi = durasi[0];

        harga_kendaraan = <?= $harga_kendaraan; ?> * durasi;
        document.getElementById('harga_kendaraan_kirim').value = harga_kendaraan;

        Cswitch = document.getElementById("customSwitch1").value;
        if (Cswitch == 1) {
            supir = document.getElementById('inputSupir').value;
            data = supir.length;

            harga_supir = supir[4];
            for (var i = 5; i < data; i++) {
                harga_supir += supir[i];
            }
            harga_supir = Number(harga_supir) * durasi;
            console.log(harga_supir);
            document.getElementById('harga_supir_kirim').value = harga_supir;
            test = document.getElementById('harga_supir_kirim').value;
            console.log("Test" + test);
            total = harga_kendaraan + harga_supir;
        } else {
            total = harga_kendaraan;
        }
        document.getElementById('total_kirim').value = total;
        console.log(total);

        var angka = total;
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        total = ribuan;

        document.getElementById('total_harga').innerHTML = "Rp. " + total;
    }

    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {
                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                    document.getElementsByClassName("btn-number")[1].removeAttribute("disabled");
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    document.getElementsByClassName("btn-number")[0].setAttribute('disabled', true);
                }
                akhir = document.getElementById('tgl_kmbl').value;
                console.log("Tanggal akhir : " + akhir);
                nilai = $("input[name='" + fieldName + "']");
                nilai = nilai.val();
                console.log(nilai);
                returnDate(nilai);
                // hargaTotal();
            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                    document.getElementsByClassName("btn-number")[0].removeAttribute("disabled");
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    document.getElementsByClassName("btn-number")[1].setAttribute('disabled', true);
                }
                akhir = document.getElementById('tgl_kmbl').value;
                console.log("Tanggal akhir : " + akhir);
                nilai = $("input[name='" + fieldName + "']");
                nilai = nilai.val();
                console.log(nilai);
                returnDate(nilai);
                // hargaTotal();
            }
        } else {
            input.val(0);
        }
    });

    function returnDate(nilai) {
        var durasi = nilai;
        var Day = 24 * 60 * 60 * 1000;
        var firstDate = new Date($("#tgl_pnjm").val());
        var secondDate = new Date($("#tgl_kmbl").val());

        var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (Day)));
        nilai = nilai - diffDays;

        Day = nilai * 24 * 60 * 60 * 1000;
        var diffDays = secondDate.getTime() + Day;
        console.log(diffDays);
        diffDays = new Date(diffDays);
        console.log(diffDays);

        var days = new Date(diffDays);

        let date = JSON.stringify(days)
        date = date.slice(1, 11)

        document.getElementById('tgl_kmbl').value = date;
        document.getElementById('durasi_peminjaman').innerHTML = durasi + " hari";
        nilai = $("input[name='quant[2]']");
        nilai.val(durasi).change();
        hargaTotal();
    }

    $(function() {
        $('input[type=date]').on('change', function() {

            var Day = 24 * 60 * 60 * 1000;
            var firstDate = new Date($("#tgl_pnjm").val());
            var secondDate = new Date($("#tgl_kmbl").val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (Day)));
            if (diffDays > 7) {
                alert("Peminjaman Max 7 hari");
                returnDate(7);
                // hitungHari();
            } else {
                hitungHari();
            }

            function hitungHari() {
                if (($('#tgl_pnjm').val() != '') && ($('#tgl_kmbl').val() != '')) {
                    nilai = $("input[name='quant[2]']");
                    nilai.val(diffDays).change();
                    document.getElementById('durasi_peminjaman').innerHTML = diffDays + " hari";
                    hargaTotal();
                }
            }
        })
    })

    function cekData() {
        Cswitch = document.getElementById("customSwitch1").value;
        console.log(Cswitch);
        if (Cswitch == 1) {
            document.getElementById("customSwitch1").value = 0;
        } else {
            document.getElementById("customSwitch1").value = 1;
        }
        Cswitch = document.getElementById("customSwitch1").value;
        console.log(Cswitch);
        if (Cswitch == '1') {
            <?php $supir = "100000" ?>

            data = ``;
            data += `
                                        <label for="inputSupir">Biaya Penjemputan</label>
                                        <input type="text" class="form-control" id="inputSupir" value="Rp. <?= $supir; ?>" readonly>
                                        `;
            document.getElementById("supir").innerHTML = data;

            <?php $supir = number_format($supir, 0, ',', '.'); ?>
            document.getElementById("harga_supir").innerHTML = "Rp. <?= $supir; ?>";
            hargaTotal();
        } else {
            <?php $supir = "0" ?>

            document.getElementById("supir").innerHTML = ``;

            <?php $supir = number_format($supir, 0, ',', '.'); ?>
            document.getElementById("harga_supir").innerHTML = "Rp. <?= $supir; ?>";

            hargaTotal();
        }
    }
</script>