<div class="detail_user">
	<div class="gambar">
		<img src="<?php echo base_url('vendor/public/img/' . $gambar) ?>" alt="">
	</div>
</div>
<div class="keterangan">
	<?php
	$icon = array("bx bxs-user", "bx bx-dollar", "bx bxs-wrench", "bx bx-car", "bx bxs-user-account", "bx bx-history");
	$title = array("$nama", "Pendapatan", "Setting", "Kendaraan", "Member", "Histori Transaksi");
	$pendapatan = number_format($pendapatan, 0, ',', '.');
	$keterangan = array("$role", "Rp $pendapatan", "Edit Account", "$kendaraan", "$member", "$diterima Diterima | $ditolak Ditolak");
	$background = array("f39c11", "00a65a", "dd4c39", "0073b6", "00c0ef", "ce5adc");
	$link = array("User/view", "transaksi", "Admin/Setting", "kendaraan", "member", "booking");
	$j = 0;
	?>
	<?php for ($i = 0; $i < 3; $i++) : ?>
		<div class="row">
			<div class="col">
				<a href="<?= base_url($link[$j]); ?>">
					<div class="card">
						<div class="card_head" style="background-color: #<?= $background[$j]; ?>;">
							<div class="row">
								<div class="col-3">
									<i class='<?= $icon[$j]; ?>'></i>
								</div>
								<div class="col detail">
									<h5 class="card-title"><?= $title[$j]; ?></h5>
									<p class="card-text"><small class=""><?= $keterangan[$j++]; ?></small></p>
								</div>
							</div>
						</div>
						<div class="card_body">
							<p class="text-muted">Detail</p>
							<i class='bx bx-right-arrow-circle'></i>
						</div>
					</div>
				</a>
			</div>
			<div class="col">
				<a href="<?= base_url($link[$j]); ?>">
					<div class="card">
						<div class="card_head" style="background-color: #<?= $background[$j]; ?>;">
							<div class="row">
								<div class="col-3">
									<i class='<?= $icon[$j]; ?>'></i>
								</div>
								<div class="col detail">
									<h5 class="card-title"><?= $title[$j]; ?></h5>
									<p class="card-text"><small class=""><?= $keterangan[$j++]; ?></small></p>
								</div>
							</div>
						</div>
						<div class="card_body">
							<p class="text-muted">Detail</p>
							<i class='bx bx-right-arrow-circle'></i>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endfor; ?>
</div>