-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: May 05, 2021 at 09:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2
=======
-- Generation Time: May 02, 2021 at 07:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3
>>>>>>> 16cc5794bbd736833d00b21a047207a0238533ee

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(8, 2, 'Tian', 'Jombang', 'Innova V Matic', '2', 600000, 0);

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
(4, 4, 'Peminjaman sesuai dengan transaksi, jika lebih dari transaksi maka akan dikenakan biaya tambahan...', '2021-04-27 11:25:06');

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
  `terpinjam` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama`, `mesin`, `bahan_bakar`, `model`, `warna`, `merk`, `tahun`, `deskripsi`, `harga`, `ketersediaan`, `terpinjam`, `gambar`) VALUES
(1, 'Innova V Matic', '1500 cc', 'Bensin', 'Inova', 'Silver', 'Toyota', '2015', 'Tipe V, Silver Metalik, NoPol: GANJIL, Dokumen lengkap BPKB, Stoplamp LED, Double Din, Sensor Parkir, Mesin dijamin sehat dan normal, Kaki2 suspensi senyap gak ada bunyi, Tool kit: Dongkrak, Kunci roda, Segitiga', 300000, 1, 0, 'innova_v_matic.jpeg'),
(2, 'Suzuki Baleno', '1000 cc', 'Bensin', 'Baleno', 'Merah', 'Suzuki', '2017', 'Mobil masih bagus dan mulus, Mobil masih baru, Jarak tempuh masih 50.000 - 55.000 km, Mesin oke, Pas banget untuk jalan2 sama keluarga atau teman', 250000, 1, 0, 'suzuki_baleno.jpeg'),
(3, 'Kijang Toyota', '1500 cc', 'Bensin', 'Kijang', 'Biru', 'Toyota', '1995', 'Double blower, Ac dingin, Power window, Kaki kaki senyap', 150000, 1, 0, 'kijang_toyota.jpeg'),
(4, 'Suzuki Ertiga', '1500 cc', 'Bensin', 'Ertiga', 'Putih', 'Suzuki', '2015', 'Servis record, Mesin terawat,halus dan kering, Kaki\" senyap, Understel Ok, Transmisi responsif, Kelistrikan normal, Ac dingin, Interior bersih dan rapi', 130000, 1, 0, 'ertiga.jpeg'),
(5, 'Suzuki Swift', '1000 cc', 'Bensin', 'Swift', 'Silver', 'Suzuki', '2012', 'Service record bengkel resmi, Transmisi manual, Kondisi sangat terawat', 150000, 1, 1, 'swift-gl-mt-silver-2012.jpeg'),
(6, 'Suzuki Ertiga 2014 manual', '1000 cc', 'Bensin', 'Ertiga', 'Abu-abu', 'Suzuki', '2014', 'kaca flm anti panas, tv layar, camera mundur, jok kulit, sensor mundur, oli baru, ban tebal, alas dasar', 130000, 1, 0, 'Suzuki-Ertiga-2014-manual.jpeg'),
(7, 'Suzuki Ertiga GX AT 2013', '1000 cc', 'Bensin', 'Ertiga', 'Merah', 'Suzuki', '2013', 'Servis Record Suzuki, Transmisi Automatic sangat responsif, bertenaga dan irit bahan bakar, kilometer 105 rb an, Audio Steering Switch, Dual Airbags, Rem ABS EBD, interior full orisinil rapih dan bersih, Head unit dengan Duble Din sudah Support USB, dll, Eksterior sangat mulus dan kinclong, Power steering EPS yang kinerjanya tidak membebani mesin sehingga kerja mesin lebih efisien., Side impact beam, electric mirror, Ban ke empat roda nya masih sangat tebal, AC dingin sudah Double Blower', 100000, 1, 1, 'Suzuki-Ertiga-GX-AT-2013.jpeg'),
(8, 'Avanza 2016 Manual', '1000 cc', 'Bensin', 'Avansa', 'Silver', 'Toyota', '2016', 'Orisinil Luar Dalam, Interior Bersih Dan Wangi, Mesin Halus Dan Terawat, nyaman dipakai berpergian.', 120000, 1, 0, 'Avanza-2016-Manual.jpeg'),
(9, 'TOYOTA YARIS S 2011 A/T CBU', '1000 cc', 'BEnsin', 'Yaris', 'Abu-abu', 'Toyota', '2011', 'Kondisi mobil terawat, mesin oke, interior ori, kamera parkir.', 150000, 1, 2, 'TOYOTA-YARIS-S-2011.jpeg');

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
(3, 2, 'apakah ada mobil honda brio??', '2021-04-27 10:56:02', 1, 3),
(4, 2, 'Adakah batas waktu peminjaman??', '2021-04-27 11:24:23', 1, 4);

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
  `metode_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaksi`, `user_id`, `kendaraan_id`, `status`, `harga`, `tanggal`, `invoice`, `metode_pembayaran`) VALUES
(1, 2, 5, 'Selesai', 300000, '2021-04-21 11:28:43', 'INV/20210421/MBL/1193982278', 'BNI'),
(2, 2, 9, 'Selesai', 450000, '2021-04-21 12:24:51', 'INV/20210421/MBL/1193982865', 'MANDIRI'),
(3, 2, 7, 'Selesai', 200000, '2021-04-26 18:37:37', 'INV/20210421/MBL/1193467278', 'BCA'),
(8, 2, 9, 'Berlangsung', 300000, '2021-04-27 13:14:26', 'INV/20210421/MBL/1119572278', 'BRI');

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
  `ttl` datetime NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

<<<<<<< HEAD
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `gambar`, `role_id`, `is_active`, `date_created`) VALUES
(0, 'Aghil Sahputro', '', 'aghilsyahputro@gmail.com', '$2y$10$CMdjQ6261QjXIgDAzT8xi.GOcZ/EO8BGNreyQFMlg4EE/1aERnqsm', '', 2, 1, 1620240474),
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$JbJmppTayKxmMyzDxvRNheBK7cEZO9DkQ/k0L9pNeNglikFUVi4AW', 'logo.png', 1, 1, 1617171614),
(2, 'Endy Gigih Pratama', 'Endy', 'egp12345678@gmail.com', '$2y$10$ALM6vY/fC215Gi9h4UqiJeOkiqHY6iWsrHJ5iAx./q8pikBn5frW2', 'Endy.jpeg', 1, 1, 1617694620),
(3, 'Eka Restu Justitian', 'Titan', 'tian@gmail.com', '$2y$10$5LWUmr46f0rzZeTCt0/GwegIx16kNiqUAnMbTiRvsJhTrtYaJKSyK', '', 2, 1, 1618373350);
=======
INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `gambar`, `role_id`, `ttl`, `alamat`, `jk`, `phone`, `is_active`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$JbJmppTayKxmMyzDxvRNheBK7cEZO9DkQ/k0L9pNeNglikFUVi4AW', 'logo.png', 1, '0000-00-00 00:00:00', '', '', '', 1, 1617171614),
(2, 'Endy Gigih Pratama', 'Endy', 'egp12345678@gmail.com', '$2y$10$ALM6vY/fC215Gi9h4UqiJeOkiqHY6iWsrHJ5iAx./q8pikBn5frW2', 'Endy.jpeg', 1, '0000-00-00 00:00:00', 'Pare', 'pria', '085749754070', 1, 1617694620),
(3, 'Eka Restu Justitian', 'Titan', 'tian@gmail.com', '$2y$10$5LWUmr46f0rzZeTCt0/GwegIx16kNiqUAnMbTiRvsJhTrtYaJKSyK', 'default.jpg', 2, '0000-00-00 00:00:00', 'Jombang', 'pria', '081542348894', 1, 1618373350);
>>>>>>> 16cc5794bbd736833d00b21a047207a0238533ee

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
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `whislist`
--
ALTER TABLE `whislist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

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
