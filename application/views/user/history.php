<div class="container">
    <div class="submenu">
        <div class="row">
            <div class="col-4">
                <label class="sr-only" for="inlineFormInputGroup">Search</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search...">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class='bx bx-search-alt'></i></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Semua Merk Kendaraan
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:100%;">
                        <?php foreach ($merk as $m) : ?>
                            <a class="dropdown-item" href="#"><?= $m->merk; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="tanggal">
                    <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="Date">
                </div>
            </div>
        </div>
    </div>
    <div class="status">
        <div class="row">
            <h5><b>Status</b></h5>
            <!-- <a href="<?= base_url('/User/Profile/history'); ?>" class="btn btn-outline-success">Semua</a> -->
            <a href="<?= base_url('/User/Profile/history/Selesai'); ?>" class="btn btn-outline-success">Selesai</a>
            <a href="<?= base_url('/User/Profile/history/Berlangsung'); ?>" class="btn btn-outline-warning">Berlangsung</a>
            <a href="<?= base_url('/User/Profile/history/Dibatalkan'); ?>" class="btn btn-outline-danger">Dibatalkan</a>
        </div>
    </div>
    <?php
    $row = 0;
    foreach ($kendaraan as $k) :
        $row++;
    ?>
        <input id="invoice<?= $row; ?>" type="hidden" value="<?= $k->invoice; ?>">
        <?php if ($k->action != -1) {
            $status = $k->status;
        } else {
            $status = "Dibatalkan";
        } ?>
        <input id="status<?= $row; ?>" type="hidden" value="<?= $status; ?>">
        <input id="kendaraan<?= $row; ?>" type="hidden" value="<?= $k->nama; ?>">

        <?php if ($k->action != -1) {
            $tanggal = $k->tanggal;
        } else {
            $tanggal = $k->tgl_pnjm;
        } ?>
        <input id="tanggal<?= $row; ?>" type="hidden" value="<?= $tanggal; ?>">

        <input id="durasi<?= $row; ?>" type="hidden" value="<?= $k->durasi; ?>">
        <input id="sopir<?= $row; ?>" type="hidden" value="0">
        <?php
        $harga = number_format($k->harga, 0, ',', '.');
        $total = number_format($k->total, 0, ',', '.');
        ?>
        <input id="harga<?= $row; ?>" type="hidden" value="<?= $harga; ?>">
        <input id="total<?= $row; ?>" type="hidden" value="<?= $total; ?>">
        <input id="pembayaran<?= $row; ?>" type="hidden" value="<?= $k->metode_pembayaran; ?>">

        <div class="card">
            <div class="card_head">
                <div class="row">
                    <div class="icon"><i class='bx bxs-car'></i></div>
                    <div class="merk">Sewa</div>
                    <div class="tanggal"><?= $tanggal; ?></div>
                    <div class="Keterangan">
                        <?php if ($status == 'Selesai') { ?>
                            <span class="badge badge-success"><?= $k->status; ?></span>
                        <?php } else if ($status == 'Berlangsung') { ?>
                            <span class="badge badge-warning"><?= $k->status; ?></span>
                        <?php } else { ?>
                            <span class="badge badge-danger"><?= $status; ?></span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card_body">
                <div class="row">
                    <div class="col-2">
                        <div class="gambar">
                            <img src="<?= base_url('vendor/public/img/' . $k->gambar); ?>" alt="<?= $k->nama; ?>" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="judul"><b><?= $k->nama; ?></b></div>
                        <?php
                        $harga = number_format($k->harga, 0, ',', '.');
                        ?>
                        <div id="harga<?= $row; ?>" class="harga_mobil"><?= $k->durasi; ?> x Rp <?= $harga; ?> </div>
                        <div class="lainnya">
                            <?php if ($k->action != -1) : ?>
                                <a href="#" onclick="formOpen(<?= $row; ?>)" data-toggle="modal" data-target="#exampleModal">Biaya lain-lain</a>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="col">
                        <div class="total_belanja">
                            <div>
                                <?php
                                $total = number_format($k->total, 0, ',', '.');
                                ?>
                                <p class="detail">Total Pembayaran</p>
                                <p id="total<?= $row; ?>" class="total"><b>Rp <?= $total; ?></b></p>
                                <input type="hidden" id="icon<?= $row; ?>" value="<?= base_url('vendor/public/icon/' . $k->metode_pembayaran . "_icon.png"); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($k->action != -1) : ?>
                <div class="card_footer">
                    <div class="row">
                        <div class="detail">
                            <a href="#" onclick="formOpen(<?= $row; ?>)" data-toggle="modal" data-target="#exampleModal">Lihat Detail Transaksi</a>
                        </div>
                        <div class="ulasan">
                            <?php if ($k->ulasan == '1') : ?>
                                <a href="<?= base_url('/User/Profile/ulasan_saya'); ?>" class="btn btn-success">Lihat ulasan</a>
                            <?php endif; ?>
                            <?php if ($k->ulasan == '0') : ?>
                                <a href="<?= base_url('/User/Profile/menunggu_ulasan'); ?>" class="btn btn-success">Beri ulasan</a>
                            <?php endif; ?>
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-outline-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url('/User/Kendaraan/mobil/' . $k->id_kendaraan); ?>">Sewa lagi</a>
                                <a class="dropdown-item" href="<?= base_url('/User/contact'); ?>">Tanyakan ketersediaan</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <script>
            function formOpen(data) {
                var invoice = document.getElementById("invoice" + data).value;
                document.getElementById("receive-invoice").innerHTML = invoice;

                var status = document.getElementById("status" + data).value;
                document.getElementById("receive-status").innerHTML = status;

                var kendaraan = document.getElementById("kendaraan" + data).value;
                document.getElementById("receive-kendaraan").innerHTML = kendaraan;

                var tanggal = document.getElementById("tanggal" + data).value;
                document.getElementById("receive-tanggal").innerHTML = tanggal + " WIB ";

                var durasi = document.getElementById("durasi" + data).value;
                document.getElementById("receive-durasi").innerHTML = durasi + " Hari";

                var sopir = document.getElementById("sopir" + data).value;
                document.getElementById("receive-sopir").innerHTML = "Rp " + sopir;

                var harga = document.getElementById("harga" + data).value;
                document.getElementById("receive-harga").innerHTML = "Rp " + harga;

                var total = document.getElementById("total" + data).value;
                document.getElementById("receive-total").innerHTML = "Rp " + total;

                var icon = document.getElementById("icon" + data).value;
                document.getElementById("receive-icon").src = icon;
            }
        </script>
    <?php endforeach; ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="margin: 10% auto;">
            <div class=" modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="content-header">
                            <div class="row">
                                <div class="col-7">
                                    <div class="left-detail">
                                        <p><small> Nomor Invoice</small></p>
                                        <p id="receive-invoice"></p>
                                        <p><small>Status</small></p>
                                        <p id="receive-status"></p>
                                        <p><small>Nama Kendaraan</small></p>
                                        <p id="receive-kendaraan"></p>
                                        <p><small>Tanggal Pembelian</small></p>
                                        <p id="receive-tanggal"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-body">
                            <div class="row">
                                <div class="pembayaran">Pembayaran</div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="total_harga">Harga Kendaraan </p>
                                    <p class="total_sopir">Harga Sopir</p>
                                    <p class="total_harga">Durasi Peminjaman </p>
                                    <p class="total_bayar">Total Bayar</p>
                                    <p class="metode_pembayaran">Metode Pembayaran</p>
                                </div>
                                <div class="col-4">
                                    <div class="total-pembayaran">
                                        <p id="receive-harga"></p>
                                        <p id="receive-sopir"></p>
                                        <p id="receive-durasi"></p>
                                        <p id="receive-total"></p>
                                        <div class="metode_pembayaran">
                                            <img id="receive-icon" src="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>