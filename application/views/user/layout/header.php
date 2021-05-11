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
    <link rel="stylesheet" href="<?php echo base_url('vendor/public/css/header1.css') ?>">

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
    <header>
<<<<<<< HEAD
        <nav>
            <div class="row">
                <a class="logo" href="/">
                    <div class="logo_name mr-3" style=" color:#fff;font-size:32px;"><i class='bx bx-car' style="color:#fff;font-size:42px;">Rental Online</i></div>
                </a>
                <ul class="nav__links">
                    <li><a href="<?= base_url('/home'); ?>">Home</a></li>
                    <li><a href="<?= base_url('user/kendaraan'); ?>">Kendaraan</a></li>
                    <?php
                    $user = $this->session->userdata('id');
                    if ($user != 0) {
                    ?>
                        <li><a href="<?= base_url('user/contact'); ?>">Contact</a></li>
                        <!-- <li><a href="<?= base_url('profile'); ?>">Profile</a></li> -->
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
            </div>
        </nav>

        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?= base_url('vendor/public/img/' . $profile); ?>" alt="" style="width: 50px;height:50px;border-radius:50px;">
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?= base_url('user/profile'); ?>"><i class='bx bx-user'>Profile</i></a>
                <a class="dropdown-item" href="#"><i class='bx bx-wrench'>Setting</i></a>
                <a class="dropdown-item" href="#"><i class='bx bx-log-out'>Logout</i></a>
=======
        <div class="col">
            <nav>
                <div class="row">
                    <a class="logo" href="/">
                        <div class="logo_name mr-3" style=" color:#fff;font-size:32px;"><i class='bx bx-car' style="color:#fff;font-size:42px;">Rental Online</i></div>
                    </a>
                    <ul class="nav__links">
                        <li><a href="<?= base_url('/home'); ?>">Home</a></li>
                        <li><a href="<?= base_url('user/kendaraan'); ?>">Kendaraan</a></li>
                        <?php
                        $user = $this->session->userdata('id');
                        if ($user != 0) {
                        ?>
                            <li><a href="<?= base_url('user/contact'); ?>">Contact</a></li>
                            <!-- <li><a href="<?= base_url('profile'); ?>">Profile</a></li> -->
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
                </div>
            </nav>
        </div>
        <div class="col-1">
            <div class="dropdown">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" style="font-size: 32px;color:#fff;">
                    <i class='bx bxs-bell'></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width: 300px;">
                    <a class="dropdown-item text-wrap" href="<?= base_url('user/profile'); ?>">
                        <i class='bx bx-money' style='color:#0bff00'></i>
                        Pembayaran Selesai
                        <hr>
                    </a>
                    <a class="dropdown-item text-wrap" href="#">
                        <i class='bx bxs-message-square-detail' style='color:#f6ff00'></i>
                        Anda memiliki pesan baru
                        <hr>
                    </a>
                    <a class="dropdown-item text-wrap" href="#">
                        <i class='bx bxs-message-square-edit' style='color:#07bcf4'></i>
                        Bagaimana perjalanan anda? Yuk beri penilaian untuk kami.
                        <hr>
                    </a>
                </div>
            </div>
            <!-- 
                notifikasi yang dibutuhkan :
                1. id notif
                2. id user
                3. pesan
                4. jenis
                5. tanggal/waktu
                6. direct ke mana

             -->
        </div>
        <div class="col-1">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= base_url('vendor/public/img/' . $foto_profile); ?>" alt="" style="width: 50px;height:50px;border-radius:50px;">
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url('/user/profile'); ?>"><i class='bx bx-user'>Profile</i></a>
                    <a class="dropdown-item" href="<?= base_url('/user/profile/setting'); ?>"><i class='bx bx-wrench'>Setting</i></a>
                    <a class="dropdown-item" href="#"><i class='bx bx-log-out'>Logout</i></a>
                </div>
>>>>>>> aabdc87f02435e7ff25dc265fcb2a53470efe998
            </div>
        </div>
        <!-- logout taruh di kanan -->


        <p class="menu_mobile cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="<?= base_url('/home'); ?>">Home</a>
            <a href="<?= base_url('user/kendaraan/list'); ?>">Kendaraan</a>
            <a href="<?= base_url('user/contact'); ?>">Contact</a>
            <a href="<?= base_url('user/profile'); ?>">Profile</a>
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
    <script type="text/javascript" src="<?= base_url('vendor/public/js/mobile2.js'); ?>"></script>