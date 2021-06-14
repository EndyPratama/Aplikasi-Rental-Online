<div class="container mt-4">
    <h3>Ulasan</h3>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('/user/profile/menunggu_ulasan'); ?>">Menunggu Ulasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/user/profile/ulasan_saya'); ?>">Ulasan Saya</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <h5>Filter : </h5>
                </div>
                <div class="col-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            3 Bulan Terakhir
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Semua</a>
                            <a class="dropdown-item" href="#">3 Bulan Terakhir</a>
                            <a class="dropdown-item" href="#">6 Bulan Terakhir</a>
                            <a class="dropdown-item" href="#">12 Bulan Terakhir</a>
                        </div>
                    </div>
                </div>
                <div class="col-5"></div>
                <div class="col">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari disini...">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class='bx bx-search-alt'></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($ulasan as $u) : ?>
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <p><?= $u->invoice; ?></p>
                            <p style="margin-left:auto;"><em>[<?= $u->tanggal; ?>]</em></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="gambar" style="width: 100%; height:100px">
                                    <img src="<?= base_url('vendor/public/img/' . $u->gambar); ?>" alt="" style="max-height: 100%;max-width: 100%;margin: auto;display: flex;">
                                </div>
                            </div>
                            <div class="col-4">
                                <p><strong><?= $u->nama; ?></strong></p>
                                <p><em>Belum Diulas</em></p>
                                <!-- <p><?= $u->id_kendaraan; ?></p> -->
                            </div>
                            <div class="col-4">
                                <div class="action" style="display: flex; flex-direction:column;">
                                    <a href="<?= base_url('/user/profile/ulasan_kendaraan/' . $u->id_transaksi); ?>" class="btn btn-success"><i class='bx bxl-telegram'>Berikan Ulasan</i></a>
                                    <a href="<?= base_url('/user/kendaraan/mobil/' . $u->id_kendaraan); ?>" class="btn btn-outline-success"><i class='bx bx-notepad'>Sewa Lagi</i></a>
                                    <a href="<?= base_url('/user/contact'); ?>" class="btn btn-outline-warning"><i class='bx bx-message-square-detail'>Hubungi Admin</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>