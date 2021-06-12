-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 03:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp_uts_framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `alamat`, `profile`, `email`, `password`, `hp`, `role`) VALUES
(5, 'Admin', 'rahasia', 'default.jpg', 'admin@gmail.com', '1234', '085749754070', 1),
(6, 'Endy ', 'Pare', 'endy.jpg', 'endy@gmail.com', 'endy111', '082229126997', 2),
(7, 'Erik', 'Jakarta', 'erik.jpeg', 'erik@gmail.com', 'erik123', '08574975xxxx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `peminjam` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kendaraan` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_user`, `peminjam`, `alamat`, `kendaraan`, `durasi`, `harga`, `action`) VALUES
(2, 2, 'Endy', 'pare', 'Suzuki Swift', '2', 300000, 1),
(4, 2, 'Endy', 'Surabaya', 'TOYOTA YARIS S 2011 A/T CBU', '3', 450000, 1),
(5, 2, 'Endy', 'Pare', 'Suzuki Ertiga GX AT 2013', '2', 200000, 2),
(6, 2, 'Endy', 'Pare', 'Suzuki Ertiga GX AT 2013', '2', 200000, 1),
(7, 2, 'Endy', 'pare', 'TOYOTA YARIS S 2011 A/T CBU', '2', 300000, 1),
(8, 2, 'Tian', 'Jombang', 'Innova V Matic', '2', 600000, 1),
(9, 2, 'Endy', 'Bendo', 'Avanza 2016 Manual', '3', 360000, 1),
(10, 2, 'garcia', 'barcelona', 'Innova V Matic', '3', 0, 2),
(11, 2, 'Pique', 'Barcelona', 'Suzuki Ertiga GX AT 2013', '2', 200000, 2),
(12, 2, 'Doni', 'Kediri', 'Innova V Matic', '2', 600000, 1),
(14, 4, 'Aghil', 'Malang', 'Innova V Matic', '3', 300000, 1),
(15, 3, 'Tian', 'Jombok', 'Innova V Matic', '3', 900000, 1),
(18, 1, 'Endy', 'Pare', 'Suzuki Baleno', '2', 500000, 1),
(19, 1, 'Endy', 'Pare', 'Kijang Toyota', '2', 300000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_pesan`, `jawaban`, `tanggal`) VALUES
(3, 3, 'ada', '2021-04-27 11:14:33'),
(4, 4, 'Peminjaman sesuai dengan transaksi, jika lebih dari transaksi maka akan dikenakan biaya tambahan...', '2021-04-27 11:25:06'),
(5, 5, 'oke masuk', '2021-05-03 09:26:50'),
(9, 13, 'oke', '2021-05-09 14:03:14'),
(10, 7, 'oke', '2021-05-09 14:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mesin` varchar(255) NOT NULL,
  `bahan_bakar` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(20) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `terpinjam` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `userid`, `nama`, `mesin`, `bahan_bakar`, `model`, `warna`, `merk`, `tahun`, `deskripsi`, `harga`, `ketersediaan`, `terpinjam`, `gambar`) VALUES
(1, 2, 'Innova V Matic', '1500 cc', 'Bensin', 'Inova', 'Silver', 'Toyota', '2015', 'Tipe V, Silver Metalik, NoPol: GANJIL, Dokumen lengkap BPKB, Stoplamp LED, Double Din, Sensor Parkir, Mesin dijamin sehat dan normal, Kaki2 suspensi senyap gak ada bunyi, Tool kit: Dongkrak, Kunci roda, Segitiga', 300000, 1, 0, 'innova_v_matic.jpeg'),
(2, 2, 'Suzuki Baleno', '1000 cc', 'Bensin', 'Baleno', 'Merah', 'Suzuki', '2017', 'Mobil masih bagus dan mulus, Mobil masih baru, Jarak tempuh masih 50.000 - 55.000 km, Mesin oke, Pas banget untuk jalan2 sama keluarga atau teman', 250000, 1, 0, 'suzuki_baleno.jpeg'),
(3, 2, 'Kijang Toyota', '1500 cc', 'Bensin', 'Kijang', 'Biru', 'Toyota', '1995', 'Double blower, Ac dingin, Power window, Kaki kaki senyap', 150000, 1, 0, 'kijang_toyota.jpeg'),
(4, 2, 'Suzuki Ertiga', '1500 cc', 'Bensin', 'Ertiga', 'Putih', 'Suzuki', '2015', 'Servis record, Mesin terawat,halus dan kering, Kaki\" senyap, Understel Ok, Transmisi responsif, Kelistrikan normal, Ac dingin, Interior bersih dan rapi', 130000, 1, 0, 'ertiga.jpeg'),
(5, 2, 'Suzuki Swift', '1000 cc', 'Bensin', 'Swift', 'Silver', 'Suzuki', '2012', 'Service record bengkel resmi, Transmisi manual, Kondisi sangat terawat', 150000, 1, 1, 'swift-gl-mt-silver-2012.jpeg'),
(6, 4, 'Suzuki Ertiga 2014 manual', '1000 cc', 'Bensin', 'Ertiga', 'Abu-abu', 'Suzuki', '2014', 'kaca flm anti panas, tv layar, camera mundur, jok kulit, sensor mundur, oli baru, ban tebal, alas dasar', 130000, 1, 0, 'Suzuki-Ertiga-2014-manual.jpeg'),
(7, 4, 'Suzuki Ertiga GX AT 2013', '1000 cc', 'Bensin', 'Ertiga', 'Merah', 'Suzuki', '2013', 'Servis Record Suzuki, Transmisi Automatic sangat responsif, bertenaga dan irit bahan bakar, kilometer 105 rb an, Audio Steering Switch, Dual Airbags, Rem ABS EBD, interior full orisinil rapih dan bersih, Head unit dengan Duble Din sudah Support USB, dll, Eksterior sangat mulus dan kinclong, Power steering EPS yang kinerjanya tidak membebani mesin sehingga kerja mesin lebih efisien., Side impact beam, electric mirror, Ban ke empat roda nya masih sangat tebal, AC dingin sudah Double Blower', 100000, 1, 1, 'Suzuki-Ertiga-GX-AT-2013.jpeg'),
(8, 3, 'Avanza 2016 Manual', '1000 cc', 'Bensin', 'Avansa', 'Silver', 'Toyota', '2016', 'Orisinil Luar Dalam, Interior Bersih Dan Wangi, Mesin Halus Dan Terawat, nyaman dipakai berpergian.', 120000, 1, 0, 'Avanza-2016-Manual.jpeg'),
(9, 4, 'TOYOTA YARIS S 2011 A/T CBU', '1000 cc', 'BEnsin', 'Yaris', 'Abu-abu', 'Toyota', '2011', 'Kondisi mobil terawat, mesin oke, interior ori, kamera parkir.', 150000, 1, 2, 'TOYOTA-YARIS-S-2011.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `harga` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id_pendapatan`, `admin_id`, `tanggal`, `harga`, `total`) VALUES
(2, 1, '2021-03-26 09:58:14', 250000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `jawaban_id` int(11) NOT NULL,
  `notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `user_id`, `pesan`, `tanggal`, `status`, `jawaban_id`, `notif`) VALUES
(3, 2, 'apakah ada mobil honda brio??', '2021-04-27 10:56:02', 1, 3, 0),
(4, 2, 'Adakah batas waktu peminjaman??', '2021-04-27 11:24:23', 1, 4, 0),
(5, 2, 'Test pesan', '2021-05-03 09:26:39', 1, 5, 0),
(6, 2, 'Test Nambah Pesan', '2021-05-08 08:52:03', 0, 0, 0),
(7, 2, 'tambah lagi pesannya', '2021-05-08 09:06:50', 1, 7, 0),
(9, 2, 'haloo admin', '2021-05-09 11:04:46', 0, 0, 0),
(13, 2, 'cek notif', '2021-05-09 11:50:55', 1, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `userid`, `nama`, `gambar`, `ttl`, `provinsi`, `kota`, `alamat`, `kode_pos`, `jenis_kelamin`, `phone`) VALUES
(1, 1, 'Admin Keren', 'default.jpg', '2001-05-07', 'Rahasia', 'Rahasia', 'Jl. jalan aja yuk', 999, 'Pria', '0812xxxxx'),
(2, 2, 'Endy Gigih Pratama', 'Endy.jpeg', '1999-12-29', 'Jawa Timur', 'Kediri', 'Perumahan bendo Permai block B No 1', 64225, 'Pria', '085749754070'),
(3, 3, 'Eka Restu Justitian', 'default.jpg', '2000-05-05', 'Jawa Timur', 'Jombang', 'Jl. Jombang, RT.02/RW.02, Kwayuhan, Jombok, Kec. Ngoro', 61473, 'Pria', '086746547890'),
(4, 4, 'Aghil Syahputra', 'default.jpg', '1999-11-15', 'Jawa Timur', 'Malang', 'Jl. K.H Wahid Hasyim, Sidomakmur, Brongkal, Kec. Pagelaran', 65174, 'Pria', '085738594561'),
(45, 8, 'abang tampan', 'default.jpg', '0000-00-00', 'Jakarta', 'Jakarta', 'Jl. Patimura No 1x', 62134, '', '081234856080'),
(51, 21, 'Endy', 'Endy.jpeg', '0000-00-00', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `transaksi` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `kendaraanid` int(11) NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `transaksi`, `userid`, `kendaraanid`, `ulasan`, `rating`, `tanggal`) VALUES
(1, 13, 4, 1, 'Mobilnya lumayan enak dipakai', 4, '2021-05-02'),
(2, 14, 3, 1, 'mobil nyaman, bersih dan ac dingin. sip dah pokoknya...', 5, '2021-05-06'),
(3, 1, 2, 5, 'Mobil nyaman, enak, dan Ac nya mantap...', 5, '2021-05-06'),
(4, 2, 2, 9, 'mobil bagus, inerior nya juga oke, nyaman digunakan. makasih banyak.', 4, '2021-04-21'),
(5, 3, 2, 7, 'Mantap nih mobil. Gokil abiss.. nyaman banget dipakai, terlihat jelas jika mobil sering perawatan..', 4, '2021-04-26'),
(6, 10, 2, 1, 'mobilnya lumayan enak digunakan.', 4, '2021-05-07'),
(7, 16, 3, 7, '', 0, '0000-00-00'),
(8, 8, 2, 9, 'Nyaman digunakan untuk berpergian ke luar kota', 4, '2021-05-11'),
(9, 9, 2, 8, '', 0, '0000-00-00'),
(10, 11, 2, 1, '', 0, '0000-00-00'),
(11, 12, 2, 1, '', 0, '0000-00-00'),
(12, 13, 4, 1, '', 0, '0000-00-00'),
(13, 14, 3, 1, '', 0, '0000-00-00'),
(14, 14, 3, 1, '', 0, '0000-00-00'),
(16, 9, 2, 8, '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaksi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `ulasan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaksi`, `user_id`, `kendaraan_id`, `status`, `harga`, `tanggal`, `invoice`, `metode_pembayaran`, `ulasan`) VALUES
(1, 2, 5, 'Selesai', 300000, '2021-04-21 11:28:43', 'INV/20210421/MBL/1193982278', 'BNI', 1),
(2, 2, 9, 'Selesai', 450000, '2021-04-21 12:24:51', 'INV/20210421/MBL/1193982865', 'MANDIRI', 1),
(3, 2, 7, 'Selesai', 200000, '2021-04-26 18:37:37', 'INV/20210421/MBL/1193467278', 'BCA', 1),
(8, 2, 9, 'Selesai', 300000, '2021-04-27 13:14:26', 'INV/20210421/MBL/1119572278', 'BRI', 1),
(9, 2, 8, 'Selesai', 360000, '2021-05-03 10:01:38', 'INV/20210421/MBL/1119511111', 'BNI', 0),
(10, 2, 1, 'Selesai', 600000, '2021-05-07 10:19:03', 'INV/20210421/MBL/1119522222', 'BCA', 1),
(11, 2, 1, 'Selesai', 600000, '2021-05-09 14:22:55', 'INV/20210421/MBL/1119512345', 'Mandiri', 0),
(12, 2, 1, 'Selesai', 600000, '2021-05-09 14:24:06', 'INV/20210421/MBL/1119572321', 'BRI', 0),
(13, 4, 1, 'Selesai', 300000, '2021-05-09 14:54:36', 'INV/20210421/MBL/1119574444', 'BNI', 0),
(14, 3, 1, 'Selesai', 900000, '2021-05-09 14:55:58', 'INV/20210421/MBL/1119111111', 'BCA', 0),
(16, 3, 7, 'Selesai', 300000, '2021-05-10 08:39:07', 'INV/20210421/MBL/1119111122', 'BCA', 0),
(20, 1, 3, 'Selesai', 300000, '2021-05-17 06:36:26', '', '', 0),
(21, 1, 2, 'Selesai', 500000, '2021-05-17 06:36:28', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role_id`, `alamat`, `is_active`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$JbJmppTayKxmMyzDxvRNheBK7cEZO9DkQ/k0L9pNeNglikFUVi4AW', 1, '', 1, 1617171614),
(2, 'Endy Gigih Pratama', 'Endy299', 'egp12345678@gmail.com', '$2y$10$ALM6vY/fC215Gi9h4UqiJeOkiqHY6iWsrHJ5iAx./q8pikBn5frW2', 1, '112.158293, -7.767023', 1, 1617694620),
(3, 'Eka Restu Justitian', 'Titan97', 'tian@gmail.com', '$2y$10$5LWUmr46f0rzZeTCt0/GwegIx16kNiqUAnMbTiRvsJhTrtYaJKSyK', 2, '112.2226624,-7.6845914', 1, 1618373350),
(4, 'Aghil Syahputra', 'Aghilsah', 'aghil@gmail.com', '$2y$10$iPKVE4jBgL2YJE971koe3O1HwaHqljvVFgxVDPY6uKx7yQwk0TSLu', 2, '112.5918462,-8.1805938', 1, 1620189499),
(8, 'abang tampan', '', 'tampan@gmail.com', '$2y$10$e1nN38vRp9KEOLipWV/TrObDlF7R58iYoFO0j1tNDSmIHeTvzcrkW', 2, '', 1, 1620709171),
(21, 'Endy', '', 'endypratama2999@gmail.com', '$2y$10$DGnjj6SMe4/HPpiP6d4/heSnFsAvnGC.iTwZj8uciNcMNXr..EEuS', 2, '', 1, 1621122288);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `whislist`
--

CREATE TABLE `whislist` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `whislist`
--

INSERT INTO `whislist` (`id`, `id_user`, `id_kendaraan`) VALUES
(14, 2, 5),
(15, 2, 8),
(16, 2, 4),
(18, 2, 2),
(20, 2, 6),
(21, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_booking_user` (`id_user`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesan_id` (`id_pesan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `r_kendaraan_user` (`userid`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD UNIQUE KEY `total` (`total`),
  ADD KEY `harga` (`harga`),
  ADD KEY `r_pendapatan_user` (`admin_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `r_pesan_user` (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_profile_user` (`userid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_k_id` (`kendaraanid`),
  ADD KEY `r_r_u` (`userid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kendaraan` (`kendaraan_id`),
  ADD KEY `r_t_u` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whislist`
--
ALTER TABLE `whislist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_w_u` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `whislist`
--
ALTER TABLE `whislist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `r_booking_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `pesan_id` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `r_kendaraan_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `harga` FOREIGN KEY (`harga`) REFERENCES `transaksi` (`harga`),
  ADD CONSTRAINT `r_pendapatan_user` FOREIGN KEY (`admin_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `r_pesan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `r_profile_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `r_k_id` FOREIGN KEY (`kendaraanid`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `r_r_u` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `kendaraan` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `r_t_u` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `whislist`
--
ALTER TABLE `whislist`
  ADD CONSTRAINT `r_w_u` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
