-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 01:42 PM
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
(6, 2, 'Endy', 'Pare', 'Suzuki Ertiga GX AT 2013', '2', 200000, 1);

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
(1, 1, 'Untuk saat ini masih dipinjam orang lain pak, mungkin 2 hari lagi baru ready.', '2021-04-03 07:07:50'),
(2, 27, 'Halo juga', '2021-04-03 21:17:17'),
(3, 28, 'Masuk pak', '2021-04-03 21:24:26'),
(4, 29, 'Hai erik', '2021-04-03 21:30:02'),
(8, 26, 'Bisa bapak cek di website kami', '2021-04-05 21:21:13'),
(10, 25, 'banyak pak', '2021-04-05 21:34:36'),
(11, 30, 'Halo user', '2021-04-06 10:18:16'),
(12, 31, 'oke masuk', '2021-04-06 14:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
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
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama`, `mesin`, `bahan_bakar`, `model`, `warna`, `merk`, `tahun`, `deskripsi`, `harga`, `ketersediaan`, `gambar`) VALUES
(1, 'Innova V Matic', '1500 cc', 'Bensin', 'Inova', 'Silver', 'Toyota', '2015', 'Tipe V, Silver Metalik, NoPol: GANJIL, Dokumen lengkap BPKB, Stoplamp LED, Double Din, Sensor Parkir, Mesin dijamin sehat dan normal, Kaki2 suspensi senyap gak ada bunyi, Tool kit: Dongkrak, Kunci roda, Segitiga', 300000, 1, 'innova_v_matic.jpeg'),
(2, 'Suzuki Baleno', '1000 cc', 'Bensin', 'Baleno', 'Merah', 'Suzuki', '2017', 'Mobil masih bagus dan mulus, Mobil masih baru, Jarak tempuh masih 50.000 - 55.000 km, Mesin oke, Pas banget untuk jalan2 sama keluarga atau teman', 250000, 1, 'suzuki_baleno.jpeg'),
(3, 'Kijang Toyota', '1500 cc', 'Bensin', 'Kijang', 'Biru', 'Toyota', '1995', 'Double blower, Ac dingin, Power window, Kaki kaki senyap', 150000, 1, 'kijang_toyota.jpeg'),
(4, 'Suzuki Ertiga', '1500 cc', 'Bensin', 'Ertiga', 'Putih', 'Suzuki', '2015', 'Servis record, Mesin terawat,halus dan kering, Kaki\" senyap, Understel Ok, Transmisi responsif, Kelistrikan normal, Ac dingin, Interior bersih dan rapi', 130000, 1, 'ertiga.jpeg'),
(5, 'Suzuki Swift', '1000 cc', 'Bensin', 'Swift', 'Silver', 'Suzuki', '2012', 'Service record bengkel resmi, Transmisi manual, Kondisi sangat terawat', 150000, 1, 'swift-gl-mt-silver-2012.jpeg'),
(6, 'Suzuki Ertiga 2014 manual', '1000 cc', 'Bensin', 'Ertiga', 'Abu-abu', 'Suzuki', '2014', 'kaca flm anti panas, tv layar, camera mundur, jok kulit, sensor mundur, oli baru, ban tebal, alas dasar', 130000, 1, 'Suzuki-Ertiga-2014-manual.jpeg'),
(7, 'Suzuki Ertiga GX AT 2013', '1000 cc', 'Bensin', 'Ertiga', 'Merah', 'Suzuki', '2013', 'Servis Record Suzuki, Transmisi Automatic sangat responsif, bertenaga dan irit bahan bakar, kilometer 105 rb an, Audio Steering Switch, Dual Airbags, Rem ABS EBD, interior full orisinil rapih dan bersih, Head unit dengan Duble Din sudah Support USB, dll, Eksterior sangat mulus dan kinclong, Power steering EPS yang kinerjanya tidak membebani mesin sehingga kerja mesin lebih efisien., Side impact beam, electric mirror, Ban ke empat roda nya masih sangat tebal, AC dingin sudah Double Blower', 100000, 0, 'Suzuki-Ertiga-GX-AT-2013.jpeg'),
(8, 'Avanza 2016 Manual', '1000 cc', 'Bensin', 'Avansa', 'Silver', 'Toyota', '2016', 'Orisinil Luar Dalam, Interior Bersih Dan Wangi, Mesin Halus Dan Terawat, nyaman dipakai berpergian.', 120000, 1, 'Avanza-2016-Manual.jpeg'),
(9, 'TOYOTA YARIS S 2011 A/T CBU', '1000 cc', 'BEnsin', 'Yaris', 'Abu-abu', 'Toyota', '2011', 'Kondisi mobil terawat, mesin oke, interior ori, kamera parkir.', 150000, 0, 'TOYOTA-YARIS-S-2011.jpeg');

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
(2, 5, '2021-03-26 09:58:14', 250000, 250000);

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
  `jawaban_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `user_id`, `pesan`, `tanggal`, `status`, `jawaban_id`) VALUES
(1, 6, 'Apakah mobil Suzuki Baleno dengan nopol D xxxx Afx tersedia??', '2021-03-21 09:59:21', 1, 1),
(25, 6, 'untuk sekarang yang ready apa saja ya??', '2021-04-03 07:43:33', 1, 25),
(26, 6, 'adakah yang bisa dipinjam 3hari??', '2021-04-03 07:44:27', 1, 26),
(27, 6, 'hallo', '2021-04-03 17:33:31', 1, 27),
(28, 6, 'test', '2021-04-03 17:34:04', 1, 28),
(29, 7, 'Hai saya erik', '2021-04-03 21:29:43', 1, 29),
(30, 7, 'Halo admin', '2021-04-06 10:17:10', 1, 30),
(31, 6, 'Test pesan masuk', '2021-04-06 14:58:01', 1, 31);

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
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaksi`, `user_id`, `kendaraan_id`, `status`, `harga`, `tanggal`) VALUES
(1, 2, 5, 'Selesai', 300000, '2021-04-21 11:28:43'),
(2, 2, 9, 'Tersewakan', 450000, '2021-04-21 12:24:51'),
(3, 2, 7, 'Tersewakan', 200000, '2021-04-26 18:37:37');

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
  `gambar` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `gambar`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$JbJmppTayKxmMyzDxvRNheBK7cEZO9DkQ/k0L9pNeNglikFUVi4AW', 'logo.png', 1, 1, 1617171614),
(2, 'Endy Gigih Pratama', 'Endy', 'egp12345678@gmail.com', '$2y$10$ALM6vY/fC215Gi9h4UqiJeOkiqHY6iWsrHJ5iAx./q8pikBn5frW2', 'Endy.jpeg', 1, 1, 1617694620),
(3, 'Eka Restu Justitian', 'Titan', 'tian@gmail.com', '$2y$10$5LWUmr46f0rzZeTCt0/GwegIx16kNiqUAnMbTiRvsJhTrtYaJKSyK', '', 2, 1, 1618373350);

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
(19, 2, 1),
(20, 2, 6);

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
  ADD KEY `user` (`id_user`);

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
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD UNIQUE KEY `total` (`total`),
  ADD KEY `harga` (`harga`),
  ADD KEY `admin` (`admin_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `userid` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `iduser` (`user_id`),
  ADD KEY `kendaraan` (`kendaraan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whislist`
--
ALTER TABLE `whislist`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `whislist`
--
ALTER TABLE `whislist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `pesan_id` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `admin` FOREIGN KEY (`admin_id`) REFERENCES `akun` (`id`),
  ADD CONSTRAINT `harga` FOREIGN KEY (`harga`) REFERENCES `transaksi` (`harga`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `akun` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `kendaraan` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
