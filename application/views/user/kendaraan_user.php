<div class="container">
    <div class="submenu">
        <div class="row">
            <div class="col">
                <label class="sr-only" for="inlineFormInputGroup">Search</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search...">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class='bx bx-search-alt'></i></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
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
        </div>
    </div>
    <div class="status">
        <div class="row">
            <h5><b>Status</b></h5>
            <a href="<?= base_url('transaksi/history_peminjaman'); ?>" class="btn btn-outline-success">Ready</a>
            <a href="<?= base_url('transaksi/history_peminjaman/Selesai'); ?>" class="btn btn-outline-success">Di pinjam</a>
            <a href="<?= base_url('transaksi/history_peminjaman/Berlangsung'); ?>" class="btn btn-outline-warning">Di booking</a>
            <!-- <button class="btn btn-outline-success active">Semua</button>
            <button class="btn btn-outline-success">Selesai</button>
            <button class="btn btn-outline-success">Dibatalkan</button>
            <button class="btn btn-outline-success">Berlangsung</button> -->
        </div>
    </div>
    <?php
    $row = 0;
    foreach ($kendaraan as $k) :
        $row++;
    ?>
        <!-- <input id="invoice<?= $row; ?>" type="hidden" value="<?= $k->invoice; ?>"> -->
        <!-- <input id="status<?= $row; ?>" type="hidden" value="<?= $k->status; ?>"> -->
        <input id="kendaraan<?= $row; ?>" type="hidden" value="<?= $k->nama; ?>">
        <!-- <input id="tanggal<?= $row; ?>" type="hidden" value="<?= $k->tanggal; ?>"> -->
        <!-- <input id="durasi<?= $row; ?>" type="hidden" value="<?= $k->durasi; ?>"> -->
        <input id="sopir<?= $row; ?>" type="hidden" value="0">
        <?php
        $harga = number_format($k->harga, 0, ',', '.');
        // $total = number_format($k->total, 0, ',', '.');
        ?>
        <input id="harga<?= $row; ?>" type="hidden" value="<?= $harga; ?>">
        <!-- <input id="total<?= $row; ?>" type="hidden" value="<?= $total; ?>"> -->
        <!-- <input id="pembayaran<?= $row; ?>" type="hidden" value="<?= $k->metode_pembayaran; ?>"> -->

        <div class="card">
            <div class="card_head">
                <div class="row">
                    <div class="icon"><i class='bx bxs-car'></i></div>
                    <div class="merk">Sewa</div>
                    <!-- <div class="tanggal"><?= $k->tanggal; ?></div> -->
                    <div class="Keterangan">
                        <!-- <?php if ($k->status == 'Selesai') { ?> -->
                        <!-- <span class="badge badge-success"><?= $k->status; ?></span> -->
                        <!-- <?php } else { ?> -->
                        <!-- <span class="badge badge-warning"><?= $k->status; ?></span> -->
                        <!-- <?php } ?> -->
                    </div>
                </div>
            </div>
            <div class="card_body">
                <div class="row">
                    <div class="col-2">
                        <div class="gambar">
                            <img src="<?= base_url('vendor/public/img/' . $k->gambar); ?>" alt="<?= $k->nama; ?>" style="max-width: 100%;max-height: 120px;margin: auto;display: flex;">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="judul"><b><?= $k->nama; ?></b></div>
                        <?php
                        $harga = number_format($k->harga, 0, ',', '.');
                        ?>
                        <div class="rating-kendaraan">
                            <?php for ($i = 0; $i < 5; $i++) : ?>
                                <i id="star<?= $i; ?>" class='bx bxs-star' style='color:#3fff2a; font-size:24px;'></i>
                            <?php endfor; ?>

                        </div>
                        <div class="statistik">
                            <span id="rating">(4.7/5)</span> | <span id="jumlah-peminjam">Dipinjam : 3x</span>
                        </div>
                        <div class="history-statistik-kendaraan">
                            <a href="<?= base_url(); ?>">Lihat history kendaraan</a>
                        </div>

                    </div>
                    <div class="col">
                        <div class="total_belanja">
                            <div>
                                <?php
                                // $total = number_format($k->total, 0, ',', '.');
                                ?>
                                <p class="detail">Harga Sewa Harian</p>
                                <p id="total<?= $row; ?>" class="total"><b>Rp <?= $harga; ?></b></p>
                                <!-- <input type="hidden" id="icon<?= $row; ?>" value="<?= base_url('vendor/public/icon/' . $k->metode_pembayaran . "_icon.png"); ?>"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_footer">
                <div class="row">
                    <div class="detail">
                        <a href="#" onclick="formOpen(<?= $row; ?>)" data-toggle="modal" data-target="#exampleModal">Lihat Detail Transaksi</a>
                    </div>
                    <div class="ulasan">
                        <a href="#" class="btn btn-success">Beri ulasan</a>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Sewa lagi</a>
                            <a class="dropdown-item" href="#">Tanyakan ketersediaan</a>
                        </div>
                    </div>
                </div>
            </div>
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
                                <div class="col-5">
                                    <div class="right-detail">
                                        <a href="#" class="btn btn-success">Beri ulasan</a>
                                        <a href="#" class="btn btn-warning">Sewa Lagi</a>
                                        <a href="#" class="btn btn-secondary">Tanya Penjual</a>
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