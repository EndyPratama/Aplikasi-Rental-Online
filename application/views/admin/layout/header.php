<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/sidebar.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/') . $css ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <script src="<?php echo base_url('vendor/public/assets/Chart.js') ?>"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <!-- Start Sidebar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('vendor/public/img/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            R<small>ental</small> O<small>nline</small> <small>and</small> S<small>afety</small>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item dropdown d-sm-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                        <a class="dropdown-item" href="#">Home</a>
                        <a class="dropdown-item" href="#">Dashboard</a>
                        <a class="dropdown-item" href="#">Profile</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>


    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                <a href="<?= base_url('/kendaraan'); ?>" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-home fa-fw mr-3"></span>
                        <span class="menu-collapsed">Home</span>
                    </div>
                </a>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="<?= base_url('kendaraan/booking2'); ?>" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Booking</span>
                    </a>
                    <a href="<?= base_url('kendaraan/transaksi'); ?>" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Transaction</span>
                    </a>
                    <a href="<?= base_url('chart/'); ?>" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Charts</span>
                    </a>
                    <a href="<?= base_url('pesan/'); ?>" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Pesan</span>
                    </a>
                    <a href="<?= base_url('member/'); ?>" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Member</span>
                    </a>

                </div>
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-user fa-fw mr-3"></span>
                        <span class="menu-collapsed">Profile</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Settings</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Password</span>
                    </a>
                </div>

            </ul>
        </div> <!-- End Sidebar -->