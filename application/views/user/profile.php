	<div class="container">
		<div class="menu_profile">
			<div class="row">
				<div class="col-6">
					<div class="row">
						<div class="profile">
							<div class="profile_image">
								<img src="<?= base_url('vendor/public/img/' . $gambar_profile); ?>" alt="">
								<div class="user_role">
									<div class="username"><?= $user; ?></div>
									<div class="role"><i class='bx bxl-pocket'></i> <?= $role; ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr class="vertical">
				<div class="col-5">
					<div class="menu">
						<div class="row">
							<div class="col">
								<div class="submenu transaksi">
									<i class='bx bx-cart'></i>
									<div class="deskripsi"><small>Transaksi</small></div>
								</div>
							</div>
							<div class="col">
								<div class="submenu booking">
									<i class='bx bxs-book-alt'></i>
									<div class="deskripsi"><small>Kode Booking</small></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="submenu ulasan">
									<i class='bx bxs-message-square-edit'></i>
									<div class="deskripsi"><small>Ulasan Anda</small></div>
								</div>
							</div>
							<div class="col">
								<div class="submenu history">
									<i class='bx bx-history'></i>
									<div class="deskripsi"><small>History Peminjaman</small></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr class="vertical">
				<div class="col">
					<div class="logout_icon">
						<i class='bx bx-log-out'></i>
						<div class="logout">Logout</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pesanan_user">
			<div class="pesanan">
				<table class="table">
					<thead>
						<tr>
							<th scope="col" colspan="5">Pesanan Saya</th>
							<th scope="col">Semua Order</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach ($pesanan as $p) :
							if ($i < 5) {
								$i++;
								$harga = number_format($p->harga, 0, ',', '.');
						?>
								<tr>
									<td>
										<img src="<?= base_url('vendor/public/img/' . $p->gambar) ?>" alt="">
									</td>
									<td>
										<i class='bx bx-user'></i>
										<div class="icon"><?= $p->username; ?></div>
									</td>
									<td>
										<div class="harga">Rp <?= $harga; ?></div>
									</td>
									<td>
										<div class="date_time"><?= $p->tanggal; ?></div>
									</td>
									<td>
										<div class="status"><?= $p->status; ?></div>
									</td>
									<td>
										<div class="rincian">Lihat</div>
									</td>
								</tr>
						<?php
							} else {
								break;
							}
						endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="favorite">
			<div class="header">
				<div class="tag">Favorite</div>
				<div class="detail">Lihat Semua</div>
			</div>
			<hr>
			<div class="favorite_user">
				<?php
				$i = 0;
				foreach ($whislist as $w) :
					if ($i < 5) :
						$i++;
				?>
						<div class="pesanan_detail">
							<div class="pesanan_head">
								<img src="<?= base_url('vendor/public/img/' . $w->gambar); ?>" alt="">
							</div>
							<div class="pesanan_body">
								<div class="nama"><?= $w->nama; ?></div>
							</div>
						</div>
				<?php
					endif;
				endforeach;
				?>
			</div>
		</div>
		<footer>
			<div class="jaminan">
				<div class="box mobil">
					<i class='bx bxs-car'></i>
					<div class="deskripsi">Kami menjamin produk yang kami sediakan sudah diuji dan dirawat dengan baik
					</div>
				</div>
				<hr class="vertical">
				<div class="box waktu">
					<i class='bx bx-timer'></i>
					<div class="deskripsi">Pertanyaan akan ditanggapi dalam waktu 24 jam</div>
				</div>
				<hr class="vertical">
				<div class="box medal">
					<i class='bx bxs-medal'></i>
					<div class="deskripsi">Kami menjamin produk yang kami jual 100% bukan barang palsu</div>
				</div>
			</div>
			<div class="copyright">Copyright Rental Online 2021</div>
		</footer>