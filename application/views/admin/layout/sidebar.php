<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Link CSS personal -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/sidebar-new3.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/') . $css ?>">
    <!-- link CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- link JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- CDN boxicons.com -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- CDN Fontawasome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title><?= $title; ?></title>
    <!-- Chart JS -->
    <script src="<?php echo base_url('vendor/public/assets/Chart.js') ?>"></script>
    <!-- Leaflet JS -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
    <!-- CDN mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

</head>

<body>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bx-car'></i>
                <div class="logo_name">Rental Online</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/Dashboard'); ?>">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/Member'); ?>">
                    <i class='bx bxs-user-detail '></i>
                    <span class="links_name">Member</span>
                </a>
                <span class="tooltip">Member</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/Kendaraan'); ?>">
                    <!-- saat active tambah bx-flashing -->
                    <i class='bx bx-car'></i>
                    <span class="links_name">Kendaraan</span>
                </a>
                <span class="tooltip">Kendaraan</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/Lokasi'); ?>">
                    <!-- saat active tambah bx-flashing -->
                    <i class='bx bxs-map'></i>
                    <span class="links_name">Kendaraan</span>
                </a>
                <span class="tooltip">Lokasi</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/Pesan/'); ?>">
                    <i class='bx bx-message-dots'>
                        <!-- <span id="notification_message" class="badge badge-light">4</span> -->
                        <div id="notification_message" class="badge badge-light"></div>
                    </i>
                    <span class="links_name">Message
                        <div id="notification_message2" class="badge badge-light"></div>
                    </span>
                </a>
                <span class="tooltip">Message</span>
            </li>
            <script>
                $(document).ready(function(e) {
                    setInterval(function() {
                        e.ajax({
                            url: "<?= base_url('Admin/Pesan/jmlhPesanBaru'); ?>",
                            type: "POST",
                            dataType: "json",
                            data: {},
                            success: function(data) {
                                if (data == 0) {
                                    $("#notification_message").removeClass("badge badge-light");
                                    $("#notification_message2").removeClass("badge badge-light");
                                } else {
                                    $("#notification_message").addClass("badge badge-light");
                                    $("#notification_message2").addClass("badge badge-light");
                                    document.getElementById('notification_message').innerHTML = data;
                                    document.getElementById('notification_message2').innerHTML = data;
                                }
                            }
                        });
                    }, 2000);
                })
            </script>
            <li>
                <a href="<?= base_url('Admin/Chart/'); ?>">
                    <i class='bx bx-bar-chart-alt'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/Transaksi'); ?>">
                    <i class='bx bx-cart'></i>
                    <span class="links_name">Transaction</span>
                </a>
                <span class="tooltip">Transaction</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/Booking'); ?>">
                    <i class='bx bx-book-add'></i>
                    <span class="links_name">Booking</span>
                </a>
                <span class="tooltip">Booking</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <a href="<?= base_url('Admin/Setting'); ?>">
                    <div class="profile_details">
                        <img src="<?php echo base_url('vendor/public/img/Endy.jpeg') ?>" alt="">
                        <div class="name_job">
                            <div class="name">Endy Gigih Pratama</div>
                            <div class="job">Admin</div>
                        </div>
                    </div>
                </a>
                <a href="<?= base_url('Admin/kendaraan/list'); ?>"><i class='bx bx-log-out' id="log_out"></i></a>
            </div>
        </div>
    </div>
    <div class="home_content">
        <div class="content">