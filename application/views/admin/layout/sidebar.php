<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Link CSS personal -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/sidebar-new2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/') . $css ?>">
    <!-- link CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CDN boxicons.com -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- CDN Fontawasome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title><?= $title; ?></title>
    <!-- Chart JS -->
    <script src="<?php echo base_url('vendor/public/assets/Chart.js') ?>"></script>
</head>

<body>
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
                <a href="<?= base_url('/kendaraan'); ?>">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-user-detail'></i>
                    <span class="links_name">Member</span>
                </a>
                <span class="tooltip">Member</span>
            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li> -->
            <li>
                <a href="<?= base_url('pesan/'); ?>">
                    <i class='bx bx-message-dots'></i>
                    <span class="links_name">Message</span>
                </a>
                <span class="tooltip">Message</span>
            </li>
            <li>
                <a href="<?= base_url('chart/'); ?>">
                    <i class='bx bx-bar-chart-alt'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="<?= base_url('kendaraan/transaksi'); ?>">
                    <i class='bx bx-cart'></i>
                    <span class="links_name">Transaction</span>
                </a>
                <span class="tooltip">Transaction</span>
            </li>
            <li>
                <a href="<?= base_url('kendaraan/booking2'); ?>">
                    <i class='bx bx-book-add'></i>
                    <span class="links_name">Booking</span>
                </a>
                <span class="tooltip">Booking</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <a href="<?= base_url('admin'); ?>">
                    <div class="profile_details">
                        <img src="<?php echo base_url('vendor/public/img/Endy.jpeg') ?>" alt="">
                        <div class="name_job">
                            <div class="name">Endy Gigih Pratama</div>
                            <div class="job">Admin</div>
                        </div>
                    </div>
                </a>
                <a href="<?= base_url('kendaraan/list'); ?>"><i class='bx bx-log-out' id="log_out"></i></a>
            </div>
        </div>
    </div>
    <div class="home_content">
        <div class="content">