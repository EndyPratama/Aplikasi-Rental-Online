<div class="container mt-5">
    <div class="search">
        <h1 class="mb-3">Pencarian Kendaraan : </h1>
        <form action="<?= base_url('/User/Kendaraan/'); ?>" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan yang anda cari" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <br>
        <form action="<?= base_url('/User/Kendaraan/filter'); ?>" method="POST">
            <div class="row" style="margin:0;padding:0;">
                <div class="col">
                    <h3>Filter : </h3>
                </div>
                <div class="col-3" style="padding:0;">
                    <select class="custom-select" name="merk">
                        <option value="" selected>Merk</option>
                        <?php foreach ($merk as $m) : ?>
                            <option value="<?= $m->merk; ?>"><?= $m->merk; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="col-3" style="padding:0;">
                    <select class="custom-select" name="warna">
                        <option value="" selected>Warna</option>
                        <?php foreach ($warna as $w) : ?>
                            <option value="<?= $w->warna; ?>"><?= $w->warna; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-3" style="padding:0;">
                    <select class="custom-select" name="tahun">
                        <option value="" selected>Tahun</option>
                        <?php foreach ($tahun as $th) : ?>
                            <option value="<?= $th->tahun; ?>"><?= $th->tahun; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-1" style="padding:0px;">
                    <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="invoice mt-5">
        <h1 class="mb-3">Cek Invoice Kendaraan : </h1>
        <form id="cek_invoice">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan yang anda cari" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <div id="invoice"></div>
        <script>
            $(document).ready(function(e) {
                $('#cek_invoice').submit(function() {
                    e.ajax({
                        url: '<?= base_url('User/Home/cekinvoice'); ?>',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data) {
                            data = JSON.parse(data)
                            total = new Intl.NumberFormat('de-DE').format(data[0]["total"]);
                            input = ``;
                            $('#invoice').empty(input);
                            input += `
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Peminjam</th>
                                <th>Kendaraan</th>
                                <th>Tanggal</th>
                                <th>Durasi</th>
                                <th>Total</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>` + data[0]["peminjam"] + `</td>
                                <td>` + data[0]["kendaraan"] + `</td>
                                <td>` + data[0]["tgl_pnjm"] + `</td>
                                <td>` + data[0]["durasi"] + ` Hari</td>
                                <td>Rp. ` + total + `</td>
                                <td>` + data[0]["status"] + `</td>
                                </tr>
                            </tbody>
                        </table>
                            `;
                            $('#invoice').append(input);
                        },
                        error: function() {
                            alert("Gagal Memuat data");
                        }
                    });
                    return false;
                })
            });
        </script>
    </div>
    <div class="kendaraan mt-5">
        <h1>Mobil Unggulan : </h1>
        <table class="table">
            <tr>
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <td>
                        <div class="card">
                            <a href="<?= base_url('User/Kendaraan/mobil/' . $kendaraan[$i]->id_kendaraan); ?>">
                                <div class="image" style="width: 100%;height:180px;background-color:pink;">
                                    <img src="<?= base_url('vendor/public/img/' . $kendaraan[$i]->gambar); ?>" class="card-img-top" alt="..." style="width: inherit;height:100%;">
                                </div>
                                <div class="card-body">
                                    <!-- // $kendaraa[$i]->gambar; -->
                                    <p class="card-text" style="height: 25px;overflow:hidden;"><strong><?= $kendaraan[$i]->nama; ?></strong></p>
                                    <p class="card-text">Rp. <?= $kendaraan[$i]->harga; ?></p>
                                    <div class="rating">
                                        <div class="row" style="margin:0; align-items: center;">
                                            <?php for ($j = 0; $j < 5; $j++) : ?>
                                                <i id="star<?= $i; ?><?= $j; ?>" class='bx bx-star' style='color:#3fff2a; font-size:18px;'></i>
                                            <?php endfor; ?>
                                            <div>(<?= $kendaraan[$i]->review; ?>)</div>
                                        </div>
                                        <script>
                                            <?php for ($j = 0; $j < $kendaraan[$i]->rating; $j++) : ?>
                                                $("#star<?= $i; ?><?= $j; ?>").removeClass("bx-star");
                                                $("#star<?= $i; ?><?= $j; ?>").addClass("bxs-star");
                                            <?php endfor; ?>
                                        </script>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </td>
                <?php endfor; ?>
            </tr>
        </table>
    </div>
    <div class="deskripsi">
        <h1>Deskripsi : </h1>
        <hr>
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= base_url('/vendor/public/img/jpg1.jpg') ?>" alt="..." style="width:100%;">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('/vendor/public/img/jpg7.jpg') ?>" alt="..." style="width:100%;">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('/vendor/public/img/jpg3.jpg') ?>" alt="..." style="width:100%;">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('/vendor/public/img/jpg4.jpg') ?>" alt="..." style="width:100%;">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('/vendor/public/img/jpg6.jpg') ?>" alt="..." style="width:100%;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title">Reno</h5>
                        <p class="card-text">
                            RENO adalah penyedia jasa rental kendaraan online yang menggunakan website
                            sebagai platform transaksi. <br>
                            RENO mengedepankan kecepatan, kemudahan dan kepercayaan pengguna terhadap layanan yang digunakan
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>