<div class="container">
    <div class="container">
        <div class="text-center">
            <div class="card">
                <?php if ($status == 'Berhasil') { ?>
                    <img src="<?= base_url('vendor/public/img/berhasil.png'); ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Booking berhasil</h5>
                        <p class="card-text">Harap membawa menunjukkan kode booking ke pihak penyewa.</p>
                        <!-- <p class="card-text">Harap membawa menunjukkan kode booking ke pihak penyewa.</p> -->
                        <a href="<?= base_url('/profile/history'); ?>" class="btn btn-primary">Cek Transaksi Anda</a>
                    </div>
                <?php } else { ?>
                    <img src="<?= base_url('vendor/public/img/sad.png'); ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Maaf anda belum berhasil</h5>
                        <p class="card-text">Pastikan bahwa anda telah terdaftar/login pada akun anda.</p>
                        <!-- <p class="card-text">Harap membawa menunjukkan kode booking ke pihak penyewa.</p> -->
                        <a href="<?= base_url('auth'); ?>" class="btn btn-primary">Login</a>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>