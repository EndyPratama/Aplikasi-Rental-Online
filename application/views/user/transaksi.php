<div class="container">
    <div class="row mt-5">
        <?php
        foreach ($booking as $b) :
        ?>
            <div class="col-8">
                <div class="card">
                    <div class="card border-success mb-3">
                        <div class="card-header bg-transparent border-success">
                            <div class="alert alert-success" role="alert">
                                Invoice Pembayaran Anda
                            </div>
                        </div>
                        <div class="card-body text-success">

                            <!-- <h5 class="card-title">Success card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <div class="row">
                                <div class="col-5">
                                    <p>Invoice</p>
                                    <p>Merk Mobil</p>
                                    <p>Tanggal Peminjaman</p>
                                    <p>Tanggal Kembali</p>
                                    <p>Biaya Sewa Kendaraan</p>
                                    <p>Biaya Supir</p>
                                    <p>Durasi Sewa</p>
                                    <p>Jumlah Pembayaran</p>
                                </div>
                                <div class="col-1">
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                </div>
                                <div class="col">
                                    <p><?= $b->invoice; ?></p>
                                    <p><?= $b->kendaraan; ?></p>
                                    <p><?= $b->tgl_pnjm; ?></p>
                                    <p><?= $b->tgl_kmbl; ?></p>
                                    <p>Rp <?= $b->harga; ?></p>
                                    <p>Rp <?= $b->supir; ?></p>
                                    <p><?= $b->durasi; ?> Hari</p>
                                    <p>Rp <?= $b->total; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-success">
                            <div class="alert alert-secondary" style="max-width: 20%;" role="alert">
                                Print Invoice
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card border-success mb-3">
                        <div class="card-header bg-transparent border-success">
                            <div class="alert alert-primary" role="alert">
                                Informasi Pembayaran
                            </div>
                        </div>
                        <div class="card-body text-success">
                            <h5 class="card-title">Panduan Pembayaran</h5>
                            <p class="card-text">
                                Silahkan melakukan pembayaran ke rekening berikut:
                            </p>
                            <p>A/N : <?= $an; ?></p>
                            <p>No : <?= $rekening; ?></p>
                            <p><b>Note!</b></p>
                            <p><em>Jika bank anda sama maka hilangkan 3 digit angka depannya.</em></p>
                        </div>
                        <div class="card-footer bg-transparent border-success">
                            <?php
                            if ($b->bukti_transaksi == Null) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    Upload Bukti Transaksi
                                </div>
                            <?php
                            } else if ($b->bukti_transaksi != Null && $b->action == 0) {
                            ?>
                                <div class="alert alert-warning" role="alert">
                                    Menunggu Verifikasi
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-success" role="alert">
                                    Diterima
                                </div>
                            <?php
                            }
                            ?>



                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>