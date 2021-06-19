<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/') . $css ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/') . $css ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/header.css') ?>">

    <!-- CDN fontawsome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- CDN Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- CDN JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <!-- <div class="fixed-top"> -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('vendor/public/img/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            R<small>ental</small> O<small>nline</small> <small>and</small> S<small>afety</small>
        </a>
        <!--<nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/home'); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/Kendaraan/list'); ?>">Kendaraan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/contact'); ?>">Contact</a>
                </li>
                <?php
                $user = $this->session->userdata('id');
                if ($user != 0) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('profile'); ?>">Profile</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- </nav> -->
    </nav>
    <header>
        <a class="logo" href="/">
            <div class="row">
                <div class="logo_name mr-3" style=" color:#fff;font-size:32px;">Rental Online</div>
                <i class='bx bx-car' style="color:#fff;font-size:42px;"></i>
            </div>
        </a>

        <nav>
            <ul class="nav__links">
                <li><a href="<?= base_url('/home'); ?>">Home</a></li>
                <li><a href="<?= base_url('/Kendaraan/list'); ?>">Kendaraan</a></li>
                <?php
                $user = $this->session->userdata('id');
                if ($user != 0) {
                ?>
                    <li><a href="<?= base_url('/contact'); ?>">Contact</a></li>
                    <li><a href="<?= base_url('profile'); ?>">Profile</a></li>
                <?php
                } else {
                ?>
                    <a class="cta" href="<?= base_url('auth'); ?>">
                        <i class='bx bxs-log-out' style="color:#fff;font-size:32px;"></i>
                    </a>
                <?php
                }
                ?>
            </ul>
        </nav>
        <!-- logout taruh di kanan -->


        <p class="menu cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="<?= base_url('/home'); ?>">Home</a>
            <a href="<?= base_url('/Kendaraan/list'); ?>">Kendaraan</a>
            <a href="<?= base_url('/contact'); ?>">Contact</a>
            <a href="<?= base_url('profile'); ?>">Profile</a>
            <?php
            $user = $this->session->userdata('id');
            if ($user != 0) {
            ?>
                <a href="#">Logout</a>
            <?php
            } else {
            ?>
                <a href="#">Login</a>
            <?php
            }
            ?>

        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('vendor/public/js/mobile.js'); ?>"></script>