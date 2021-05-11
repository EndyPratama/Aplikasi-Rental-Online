<div class="container">
    <div class="row gutters">
        <?php foreach ($profile as $p) : ?>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar mb-3">
                                    <img src="<?= base_url('vendor/public/img/' . $p->gambar); ?>" alt="<?= $p->nama; ?>">
                                    <span class="badge badge-secondary"><?= $p->role_id; ?></span>
                                    <div class="text-muted" id="joined"><small>Joined 09 Dec 2017</small></div>
                                </div>
                                <h5 class="user-name mt-5"><?= $p->nama; ?></h5>
                                <h6 class="user-email">@<?= $p->username; ?></h6>
                                <div class="mt-5">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-fw fa-camera"></i>
                                        <span>Change Photo</span>
                                    </button>
                                </div>
                            </div>
                            <div class="px-xl-3">
                                <button class="btn btn-block btn-secondary">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Nama lengkap</label>
                                    <input type="text" class="form-control" id="fullName" value="<?= $p->nama; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Username</label>
                                    <input type="text" class="form-control" id="fullName" value="<?= $p->username; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" value="<?= $p->email; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" value="<?= $p->phone; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="saldo">saldo</label>
                                    <input type="text" class="form-control" id="saldo" placeholder="Enter saldo number" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="ttl">Tanggal lahir</label>
                                    <input type="text" class="form-control" id="ttl" value="<?= $p->ttl; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="name" class="form-control" id="alamat" value="<?= $p->alamat; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kota">kota</label>
                                    <input type="name" class="form-control" id="kota" value="<?= $p->kota; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="provinsi">provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" value="<?= $p->provinsi; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="zIp">Zip Code</label>
                                    <input type="text" class="form-control" id="zIp" value="<?= $p->kode_pos; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                    <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>