	<div class="container">
		<div class="menu_profile">
			<div class="row">
				<div class="col-6">
					<div class="row">
						<div class="profile">
							<div class="profile_image">
								<img src="<?= base_url('vendor/public/img/' . $gambar_profile); ?>" alt="">
								<div class="user_role">
									<div class="username">
										<a href="<?= base_url('/User/Profile/setting'); ?>">
											<?= $user; ?>
										</a>
									</div>
									<div class="role"><i class='bx bxl-pocket'></i> <?= $role; ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-5">
					<div class="menu">
						<div class="row">
							<div class="col">
								<div class="submenu transaksi">
									<a href="<?= base_url('User/Profile/transaksi'); ?>">
										<i class='bx bx-cart'></i>
										<div class="deskripsi"><small>Transaksi</small></div>
									</a>
								</div>
							</div>
							<div class="col">
								<div class="submenu history">
									<a href="<?= base_url('User/Profile/history'); ?>">
										<i class='bx bx-history'></i>
										<div class="deskripsi"><small>History Peminjaman</small></div>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="submenu ulasan">
									<a href="<?= base_url('User/Profile/menunggu_ulasan'); ?>">
										<i class='bx bxs-message-square-edit'></i>
										<div class="deskripsi"><small>Ulasan Anda</small></div>
									</a>
								</div>
							</div>
							<div class="col">
								<div class="submenu logout">
									<a href="<?= base_url(); ?>">
										<i class='bx bx-log-out'></i>
										<div class="logout">Logout</div>
									</a>
								</div>
							</div>
						</div>
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
							<th scope="col">
								<a href="<?= base_url('User/Profile/history'); ?>">
									Semua Order
								</a>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						$row = 0;
						foreach ($pesanan as $p) :
							if ($i < 5) {
								$row++;
								$i++;
								$supir = number_format($p->supir, 0, ',', '.');
						?>
								<input id="invoice<?= $row; ?>" type="hidden" value="<?= $p->invoice; ?>">
								<input id="status<?= $row; ?>" type="hidden" value="<?= $p->status; ?>">
								<input id="kendaraan<?= $row; ?>" type="hidden" value="<?= $p->kendaraan; ?>">
								<input id="tanggal<?= $row; ?>" type="hidden" value="<?= $p->tanggal; ?>">
								<input id="ambil<?= $row; ?>" type="hidden" value="<?= $p->tgl_pnjm; ?>">
								<input id="kembali<?= $row; ?>" type="hidden" value="<?= $p->tgl_kmbl; ?>">
								<input id="durasi<?= $row; ?>" type="hidden" value="<?= $p->durasi; ?>">
								<input id="sopir<?= $row; ?>" type="hidden" value="<?= $supir; ?>">
								<?php
								$harga = number_format($p->harga, 0, ',', '.');
								$total = number_format($p->total, 0, ',', '.');
								?>
								<input id="harga<?= $row; ?>" type="hidden" value="<?= $harga; ?>">
								<input id="total<?= $row; ?>" type="hidden" value="<?= $total; ?>">
								<input id="pembayaran<?= $row; ?>" type="hidden" value="<?= $p->metode_pembayaran; ?>">
								<input type="hidden" id="icon<?= $row; ?>" value="<?= base_url('vendor/public/icon/' . $p->metode_pembayaran . "_icon.png"); ?>">

								<tr>
									<td>
										<img src="<?= base_url('vendor/public/img/' . $p->gambar) ?>" alt="">
									</td>
									<td>
										<i class='bx bx-user'></i>
										<div class="icon"><?= $p->peminjam; ?></div>
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
										<!-- <div class="rincian">Lihat</div> -->
										<a href="#" onclick="formOpen(<?= $row; ?>)" data-toggle="modal" data-target="#exampleModal">Lihat</a>
									</td>
								</tr>
						<?php
							} else {
								break;
							}
						endforeach; ?>
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

								var ambil = document.getElementById("ambil" + data).value;
								document.getElementById("receive-ambil").innerHTML = ambil + " WIB ";

								var kembali = document.getElementById("kembali" + data).value;
								document.getElementById("receive-kembali").innerHTML = kembali + " WIB ";

								var durasi = document.getElementById("durasi" + data).value;
								document.getElementById("receive-durasi").innerHTML = durasi + " Hari";

								var sopir = document.getElementById("sopir" + data).value;
								var durasi = document.getElementById("durasi" + data).value;
								sopir = (sopir / durasi) * 1000;
								sopir = new Intl.NumberFormat('de-DE').format(sopir)
								document.getElementById("receive-sopir").innerHTML = "Rp " + sopir;

								var harga = document.getElementById("harga" + data).value;
								document.getElementById("receive-harga").innerHTML = "Rp " + harga;

								var total = document.getElementById("total" + data).value;
								document.getElementById("receive-total").innerHTML = "Rp " + total;

								var icon = document.getElementById("icon" + data).value;
								document.getElementById("receive-icon").src = icon;
							}
						</script>
					</tbody>
				</table>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
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
											<div class="col-6">
												<div class="left-detail">
													<p><small> Nomor Invoice</small></p>
													<p id="receive-invoice"></p>
													<p><small>Nama Kendaraan</small></p>
													<p id="receive-kendaraan"></p>
													<p><small>Tanggal Pengambilan</small></p>
													<p id="receive-ambil"></p>
												</div>
											</div>
											<div class="col-6">
												<div class="left-detail">
													<p><small>Status</small></p>
													<p id="receive-status"></p>
													<p><small>Tanggal Pembayaran</small></p>
													<p id="receive-tanggal"></p>
													<p><small>Tanggal Pengembalian</small></p>
													<p id="receive-kembali"></p>
												</div>
											</div>
										</div>
										<br>
									</div>
									<div class="content-body">
										<div class="row">
											<p><strong>Pembayaran</strong></p>
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
		<div class="favorite">
			<div class="header">
				<div class="row">
					<div class="tag"><b>Favorite</b></div>
					<div class="detail"><b>Lihat Semua</b></div>
				</div>
			</div>
			<hr>
			<div class="favorite_user">
				<?php
				$i = 0;
				foreach ($whislist as $w) :
					if ($i < 5) :
						$i++;
				?>
						<a href="<?= base_url('User/Kendaraan/mobil/' . $w->id_kendaraan); ?>">
							<div class="pesanan_detail">
								<div class="pesanan_head">
									<img src="<?= base_url('vendor/public/img/' . $w->gambar); ?>" alt="">
								</div>
								<div class="pesanan_body">
									<div class="nama">

										<?= $w->nama; ?>

									</div>
								</div>
							</div>
						</a>
				<?php
					endif;
				endforeach;
				?>
			</div>
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