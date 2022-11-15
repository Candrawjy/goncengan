-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 04:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goncengan`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `title`, `message`, `created_at`) VALUES
('675f3', '1', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', '2022-11-15 22:01:08'),
('82d10', '1', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', '2022-11-15 21:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `lokasi_awal` text NOT NULL,
  `lokasi_tujuan` text NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_pulang` time NOT NULL,
  `gender` text NOT NULL,
  `type` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_booked` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_user`, `lokasi_awal`, `lokasi_tujuan`, `waktu_berangkat`, `waktu_pulang`, `gender`, `type`, `is_active`, `is_booked`, `created_at`) VALUES
('14368', '1', 'sekolah-bisnis', 'Malabar', '22:59:00', '20:01:00', 'laki-laki', 'angle', 0, 0, '2022-11-15 20:59:17'),
('92185', '1', 'sekolah-vokasi', 'Malabar ujung', '07:00:00', '00:00:00', 'laki-laki', 'bisnis', 1, 0, '2022-11-15 22:01:08'),
('c1e2d', '1', 'sekolah-bisnis', 'ddd', '03:32:00', '03:32:00', 'laki-laki', 'bisnis', 0, 0, '2022-11-15 03:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `id_user`, `pesan`, `created_at`) VALUES
('0cfe9', '1', 'bagus', '2022-11-14 02:14:04'),
('d0342', '1', 'ss', '2022-11-14 22:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `nim` text NOT NULL,
  `no_wa` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `role` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`, `no_wa`, `jenis_kelamin`, `profile_picture`, `email`, `password`, `is_active`, `role`, `created_at`) VALUES
('0045e', 'Admin', 'J0303201031', '6280186861', 'laki-laki', NULL, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '2022-11-14 16:02:50'),
('1', 'Candra', 'J0303201030', '62895377562532', 'laki-laki', 'Solusi-Transportasi-Terbaik_1.png', '2604candra@apps.ipb.ac.id', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, '2022-11-14 01:22:40'),
('2', 'CANDRA WIJAYA', 'J0303201032', '62895377562532', 'laki-laki', NULL, 'canderaw8@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '2022-11-14 01:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `created_at`) VALUES
(4, 'admin@gmail.com', 'wBzrqz77B6VDomJiTaACHjXVIc0WubAojJodEt5Xj5A=', '1668416570');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
