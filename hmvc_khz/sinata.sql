-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 08:00 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wearekhz_sinata`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_bank`
--

CREATE TABLE `akun_bank` (
  `Id_bank` varchar(15) NOT NULL,
  `Nama_bank` varchar(15) NOT NULL,
  `Nama_pemilik` varchar(18) NOT NULL,
  `No_rekening` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ion_auth_groups`
--

CREATE TABLE `ion_auth_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ion_auth_groups`
--

INSERT INTO `ion_auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'User', 'General User'),
(3, 'Waiters', 'Waiters');

-- --------------------------------------------------------

--
-- Table structure for table `ion_auth_login_attempts`
--

CREATE TABLE `ion_auth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ion_auth_users`
--

CREATE TABLE `ion_auth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `gender` bit(1) NOT NULL DEFAULT b'0',
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ion_auth_users`
--

INSERT INTO `ion_auth_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `birth_date`, `gender`, `address`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1506243268, 1, 'Admin', 'istrator', 'ADMIN', '0', '0000-00-00', b'1', ''),
(2, '::1', 'tes@gmail.com', '$2y$08$62aT9ZBEgtbZwTFlxqVFJO8V0TUr4pTye5VvHV//WaJTSOemrrSSy', NULL, 'tes@gmail.com', NULL, NULL, NULL, NULL, 1505377656, 1505379908, 1, 'asdas', 'asdasd', 'adasa', '34234', '0000-00-00', b'1', ''),
(3, '::1', 'fakhri.warnet@live.com', '$2y$08$UdNkAJMTQyFUHGYp53A/4u8spkALh8fM.2Ok3TTOfAiH8J3LCBRGi', NULL, 'fakhri.warnet@live.com', NULL, 'ikT4uYOQiuA6.lcYLsFqXu3c0b17c87c75bd41d8', 1505815843, NULL, 1505644423, 1506336663, 1, 'Muhammad', 'Fakhri', NULL, '2323233', '0000-00-00', b'1', 'sadas'),
(4, '::1', 'm.fakhri_facebook@yahoo.com', '$2y$08$EF1LtwDPS0sFkHC7tUD3deaYwv1V.C1x5Wd6qmUqVbISNFkbEz9Dm', NULL, 'm.fakhri_facebook@yahoo.com', NULL, NULL, NULL, NULL, 1505880313, NULL, 1, 'Muhammad', 'Fakhri', NULL, '9083948', '0000-00-00', b'1', 'asdas'),
(5, '::1', 'tesd@gmail.com', '$2y$08$UMEKcwopGPPCKdSG4QU24.uPWssr72L3YcU52TC3CFvIvMnvYXpF.', NULL, 'tesd@gmail.com', NULL, NULL, NULL, NULL, 1505880795, NULL, 1, 'asd', 'sf', NULL, '34343334', '0000-00-00', b'1', 'sfasdf'),
(6, '::1', 'cobacoba@gmail.com', '$2y$08$SReFEhYL37UlLUiGW.fwneLYjuzj7OpffLiwCe53JTz57ZBTDxFsC', NULL, 'cobacoba@gmail.com', NULL, NULL, NULL, NULL, 1506325648, 1506325679, 1, 'coba', 'satu', NULL, '082370707070', '0000-00-00', b'1', 'Jl. coba no coba');

-- --------------------------------------------------------

--
-- Table structure for table `ion_auth_users_groups`
--

CREATE TABLE `ion_auth_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ion_auth_users_groups`
--

INSERT INTO `ion_auth_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `Id_jenis` int(2) NOT NULL,
  `Nama_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `Id_kategori` bigint(10) NOT NULL,
  `Nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`Id_kategori`, `Nama_kategori`) VALUES
(1, 'Indonesia'),
(2, 'Malaysia'),
(3, 'Thailand'),
(4, 'Korea');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `Id_metode` bit(2) NOT NULL,
  `Nama_metode` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `Id_pemesanan` bigint(10) NOT NULL,
  `Id_user` varchar(15) NOT NULL,
  `Waktu_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Id_waiters` varchar(15) NOT NULL,
  `Daftar_pesanan` longtext NOT NULL,
  `Id_metode` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`Id_pemesanan`, `Id_user`, `Waktu_pemesanan`, `Id_waiters`, `Daftar_pesanan`, `Id_metode`) VALUES
(1, '1', '2017-09-24 16:02:52', '1', '{\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":1,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":20000},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":3,\"price\":5000,\"name\":\"Teh Manis\",\"jenis\":\"1\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":15000},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":2,\"price\":20000,\"name\":\"Ayam Bakar\",\"jenis\":\"2\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":40000}}', b'1'),
(2, '3', '2017-09-24 16:13:14', '1', '{\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":2,\"price\":10000,\"name\":\"Kopi Hitam\",\"jenis\":\"1\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":20000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":2,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":40000}}', b'1'),
(3, '3', '2017-09-24 19:41:01', '1', '{\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":2,\"price\":10000,\"name\":\"Kopi Hitam\",\"jenis\":\"1\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":20000},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":2,\"price\":20000,\"name\":\"Ayam Bakar\",\"jenis\":\"2\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":40000}}', b'1'),
(4, '6', '2017-09-25 14:48:24', '1', '{\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":2,\"price\":10000,\"name\":\"Kopi Hitam\",\"jenis\":\"1\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":20000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":4,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":80000}}', b'1'),
(5, '6', '2017-09-25 15:07:45', '1', '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":6,\"price\":5000,\"name\":\"Teh Manis\",\"jenis\":\"1\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":30000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":5,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":100000},\"1679091c5a880faf6fb5e6087eb1b2dc\":{\"id\":\"6\",\"qty\":3,\"price\":20000,\"name\":\"Ayam Bakar\",\"jenis\":\"2\",\"rowid\":\"1679091c5a880faf6fb5e6087eb1b2dc\",\"subtotal\":60000}}', b'1'),
(6, '6', '2017-09-25 15:41:41', '1', '{\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":2,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":40000},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":1,\"price\":10000,\"name\":\"Kopi Hitam\",\"jenis\":\"1\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":10000}}', b'1'),
(7, '6', '2017-09-25 15:45:13', '1', '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":5,\"price\":5000,\"name\":\"Teh Manis\",\"jenis\":\"1\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":25000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":2,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":40000},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":7,\"price\":10000,\"name\":\"Kopi Hitam\",\"jenis\":\"1\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":70000}}', b'1'),
(8, '6', '2017-09-25 15:46:47', '1', '[]', b'1'),
(9, '6', '2017-09-25 16:11:50', '1', '{\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":4,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":80000}}', b'1'),
(10, '6', '2017-09-25 16:16:22', '1', '{\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":3,\"price\":10000,\"name\":\"Kopi Hitam\",\"jenis\":\"1\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":30000}}', b'1'),
(11, '3', '2017-09-25 16:55:57', '1', '{\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"qty\":2,\"price\":5000,\"name\":\"Teh Manis\",\"jenis\":\"1\",\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":10000},\"e4da3b7fbbce2345d7772b0674a318d5\":{\"id\":\"5\",\"qty\":2,\"price\":10000,\"name\":\"Kopi Hitam\",\"jenis\":\"1\",\"rowid\":\"e4da3b7fbbce2345d7772b0674a318d5\",\"subtotal\":20000},\"a87ff679a2f3e71d9181a67b7542122c\":{\"id\":\"4\",\"qty\":5,\"price\":20000,\"name\":\"Ayam Goreng\",\"jenis\":\"2\",\"rowid\":\"a87ff679a2f3e71d9181a67b7542122c\",\"subtotal\":100000}}', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Kd_Product` int(3) UNSIGNED NOT NULL,
  `Kd_Kategori` varchar(8) NOT NULL,
  `Kd_Jenis` tinyint(1) NOT NULL,
  `Nama_Product` varchar(20) NOT NULL,
  `Harga` mediumint(15) NOT NULL,
  `Deskripsi` text,
  `Gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Kd_Product`, `Kd_Kategori`, `Kd_Jenis`, `Nama_Product`, `Harga`, `Deskripsi`, `Gambar`) VALUES
(7, '1', 1, 'Raja Ampat', 5000000, 'Tour ke Raja Ampat', 'tour4.jpg'),
(8, '1', 1, 'Jogja 4D 3N', 4000000, 'Jogja 4 days 3 night', 'tour1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_bank`
--
ALTER TABLE `akun_bank`
  ADD PRIMARY KEY (`Id_bank`);

--
-- Indexes for table `ci_session`
--
ALTER TABLE `ci_session`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ion_auth_groups`
--
ALTER TABLE `ion_auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ion_auth_login_attempts`
--
ALTER TABLE `ion_auth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ion_auth_users`
--
ALTER TABLE `ion_auth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ion_auth_users_groups`
--
ALTER TABLE `ion_auth_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`Id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`Id_kategori`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`Id_metode`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`Id_pemesanan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Kd_Product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ion_auth_groups`
--
ALTER TABLE `ion_auth_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ion_auth_login_attempts`
--
ALTER TABLE `ion_auth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ion_auth_users`
--
ALTER TABLE `ion_auth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ion_auth_users_groups`
--
ALTER TABLE `ion_auth_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `Id_kategori` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `Id_pemesanan` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Kd_Product` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ion_auth_users_groups`
--
ALTER TABLE `ion_auth_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `ion_auth_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `ion_auth_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
