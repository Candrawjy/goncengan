-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2022 at 11:00 AM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goncenga_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `balance_in` int(11) NOT NULL,
  `balance_out` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `total_balance` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `id_user`, `balance_in`, `balance_out`, `tax`, `total_balance`, `created_at`) VALUES
('526b8', '02f53', 0, 0, 6000, 0, '2022-12-08 23:04:40'),
('ee309', '0045e', 6000, 0, 1500, 4500, '2022-12-08 22:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `nama_banner` text NOT NULL,
  `foto_banner` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `nama_banner`, `foto_banner`, `created_at`) VALUES
(3, 'Founder', 'Tim_8255c.png', '2022-12-08 23:12:09'),
(4, 'Tutorial', 'Tutorial_838e4.png', '2022-12-08 23:12:45'),
(5, 'Keunggulan', '20221208_150003_0001_5d125.png', '2022-12-08 23:13:26'),
(6, 'Tagline', '20221208_150003_0000_823b4.png', '2022-12-08 23:13:46'),
(7, 'Grandlaunching', 'Grand-launching_13576.png', '2022-12-08 23:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `type` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `title`, `message`, `type`, `created_at`) VALUES
('0062d', 'a9d3a', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-11-23 10:01:00'),
('03cb1', 'a9d3a', 'Menerima Pesanan', 'Kamu menerima sebuah pesanan!', 'driver', '2022-12-08 18:42:35'),
('06774', '0045e', 'Pesanan Telah Dibayar', 'Penumpang telah membayar transaksi kamu!', 'driver', '2022-12-08 22:56:36'),
('06be6', '5bdfc', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 19:08:32'),
('08bc0', '02f53', 'Menerima Pesanan', 'Kamu menerima sebuah pesanan!', 'driver', '2022-12-08 22:41:41'),
('09fca', 'cdbe7', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-02 09:14:50'),
('0b86f', 'a9d3a', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-12-01 19:37:24'),
('0bdd5', '5bdfc', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-12-08 22:09:07'),
('0fbae', '02f53', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 18:37:27'),
('12e97', '5bdfc', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 22:45:54'),
('13ade', 'a9d3a', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-08 18:36:34'),
('14593', '5bdfc', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 18:53:04'),
('147ff', '0045e', 'Menerima Pesanan', 'Kamu menerima sebuah pesanan!', 'driver', '2022-12-08 22:55:43'),
('15e10', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 18:41:02'),
('1b668', 'a9d3a', 'Memesan Driver', 'Kamu berhasil menemukan driver yang diinginkan!', 'penumpang', '2022-12-08 22:41:15'),
('1c02b', '02f53', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 18:39:56'),
('1cc4d', 'cdbe7', 'Memesan Driver', 'Kamu berhasil menemukan driver yang diinginkan!', 'penumpang', '2022-12-07 14:54:37'),
('1dfc2', 'a9d3a', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-08 18:33:32'),
('1fea7', '5bdfc', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 18:48:53'),
('20dff', 'cdbe7', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-02 09:15:37'),
('23257', 'cdbe7', 'Transaksi Selesai', 'Kamu telah menyelesaikan transaksi bersama driver. Terima kasih telah menggunakan layanan Goncengan!', 'penumpang', '2022-12-08 23:43:05'),
('24f99', '5bdfc', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-08 18:48:19'),
('279c8', 'a9d3a', 'Menerima Pesanan', 'Kamu menerima sebuah pesanan!', 'driver', '2022-12-07 15:16:43'),
('30547', '02f53', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 22:39:06'),
('371cc', '5bdfc', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-08 22:39:46'),
('38bd3', '5bdfc', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-09 10:49:25'),
('3ac92', '5bdfc', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 19:03:17'),
('3c6ff', '02f53', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 18:38:25'),
('3d086', 'a9d3a', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-12-08 15:16:04'),
('3da97', 'a9d3a', 'Pesanan Telah Dibayar', 'Penumpang telah membayar transaksi kamu!', 'driver', '2022-12-08 18:42:57'),
('3f45f', 'cdbe7', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-11-24 11:13:06'),
('40126', '02f53', 'Menyelesaikan Pesanan', 'Kamu telah menyelesaikan sebuah pesanan!', 'driver', '2022-12-08 23:04:48'),
('4095b', 'a9d3a', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-08 15:27:33'),
('41dac', '5bdfc', 'Memesan Driver', 'Kamu berhasil menemukan driver yang diinginkan!', 'penumpang', '2022-12-08 22:55:29'),
('428e1', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-07 15:03:41'),
('4506e', 'cdbe7', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-12-02 09:16:13'),
('4509e', '5bdfc', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-12-08 18:48:13'),
('45252', '02f53', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 18:40:33'),
('4657b', '02f53', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-05 23:08:35'),
('46ac9', 'a9d3a', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-12-08 23:14:44'),
('4962c', '02f53', 'Transaksi Selesai', 'Kamu telah menyelesaikan transaksi bersama driver. Terima kasih telah menggunakan layanan Goncengan!', 'penumpang', '2022-12-08 22:35:45'),
('4a314', 'cdbe7', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-11-26 14:21:06'),
('4a7b4', '5bdfc', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 19:13:20'),
('4aab4', 'a9d3a', 'Menyelesaikan Pesanan', 'Kamu telah menyelesaikan sebuah pesanan!', 'driver', '2022-12-08 19:20:49'),
('4b0cd', '02f53', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 18:35:00'),
('4d353', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 18:39:02'),
('4d646', '5bdfc', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 19:02:50'),
('55d90', 'a9d3a', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-08 18:40:40'),
('55f58', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 15:48:11'),
('59086', '5bdfc', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-12-08 22:40:05'),
('597c6', 'a9d3a', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-07 15:02:41'),
('5f23c', '02f53', 'Memesan Driver', 'Kamu berhasil menemukan driver yang diinginkan!', 'penumpang', '2022-12-08 18:41:32'),
('60ff9', '5bdfc', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 19:08:16'),
('61d04', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-07 15:00:34'),
('65d79', '5bdfc', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 18:49:32'),
('69320', 'a9d3a', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-08 22:39:13'),
('72ace', '02f53', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 18:37:51'),
('732ad', '5bdfc', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-08 22:44:53'),
('771d6', 'cdbe7', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-07 14:52:27'),
('79c61', 'a9d3a', 'Transaksi Selesai', 'Kamu telah menyelesaikan transaksi bersama driver. Terima kasih telah menggunakan layanan Goncengan!', 'penumpang', '2022-12-08 23:05:13'),
('7bf90', '02f53', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 18:38:04'),
('7daa0', 'cdbe7', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-11-26 14:19:52'),
('7f0de', '02f53', 'Pesanan Telah Dibayar', 'Penumpang telah membayar transaksi kamu!', 'driver', '2022-12-08 23:04:40'),
('823d5', 'a9d3a', 'Pesanan Telah Dibayar', 'Penumpang telah membayar transaksi kamu!', 'driver', '2022-12-07 14:56:08'),
('84164', '349c8', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-07 15:13:33'),
('8633e', 'a9d3a', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-11-23 09:59:14'),
('8ce54', 'd1339', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-06 14:41:37'),
('945ef', 'a9d3a', 'Menyelesaikan Pesanan', 'Kamu telah menyelesaikan sebuah pesanan!', 'driver', '2022-12-07 15:21:13'),
('9743f', 'cdbe7', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-11-24 11:12:54'),
('9bb47', 'cdbe7', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-02 09:13:25'),
('9bf9b', 'a9d3a', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-11-23 10:01:03'),
('9cc4a', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-07 14:54:11'),
('9e5ac', '349c8', 'Memesan Driver', 'Kamu berhasil menemukan driver yang diinginkan!', 'penumpang', '2022-12-07 15:14:05'),
('a0136', '5bdfc', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-08 22:44:27'),
('a0ea2', 'd1339', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-06 14:36:00'),
('a2a16', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 18:34:07'),
('a3cd1', '94e42', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-06 14:39:01'),
('a8ad8', 'cdbe7', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-11-26 14:22:51'),
('aa3e2', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 18:36:54'),
('af721', '0045e', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 22:47:21'),
('af914', 'a9d3a', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-07 14:51:52'),
('b36e3', 'a9d3a', 'Menerima Pesanan', 'Kamu menerima sebuah pesanan!', 'driver', '2022-12-07 14:55:03'),
('b6bdf', 'cdbe7', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-07 14:54:11'),
('b7969', 'cdbe7', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-02 09:15:23'),
('c1996', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-11-23 09:59:04'),
('c3a5f', '0045e', 'Menyelesaikan Pesanan', 'Kamu telah menyelesaikan sebuah pesanan!', 'driver', '2022-12-08 22:56:41'),
('c4a24', 'cdbe7', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-11-26 14:21:23'),
('c5648', 'cdbe7', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-02 09:14:35'),
('c6291', '02f53', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-08 22:40:11'),
('c69fa', '5bdfc', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-08 18:47:44'),
('c71a8', '02f53', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-12-08 23:04:58'),
('c778e', 'cdbe7', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-11-24 11:13:03'),
('c7b23', '94e42', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-06 14:41:26'),
('c7ebe', '349c8', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-07 15:12:33'),
('c9574', '5bdfc', 'Transaksi Selesai', 'Kamu telah menyelesaikan transaksi bersama driver. Terima kasih telah menggunakan layanan Goncengan!', 'penumpang', '2022-12-08 23:00:10'),
('cd1a0', 'cdbe7', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-11-26 14:22:17'),
('ce9b9', '94e42', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-06 14:37:52'),
('cfbbe', 'cdbe7', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-11-26 14:22:58'),
('cfed3', 'a9d3a', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-01 17:19:12'),
('d2dcd', 'cdbe7', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-02 09:12:36'),
('d3352', '349c8', 'Transaksi Selesai', 'Kamu telah menyelesaikan transaksi bersama driver. Terima kasih telah menggunakan layanan Goncengan!', 'penumpang', '2022-12-07 15:21:19'),
('d613b', 'a9d3a', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-11-27 17:54:18'),
('d6ad7', 'cdbe7', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-11-26 14:21:14'),
('d7df1', '1346a', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-07 18:24:06'),
('d7fb5', '02f53', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 22:40:52'),
('d9c8a', '5bdfc', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 18:59:37'),
('d9d9e', '0045e', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-09 10:48:21'),
('dd862', 'cdbe7', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-12-02 09:14:43'),
('e096e', 'cdbe7', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-11-24 11:12:40'),
('e1b98', '02f53', 'Masuk Mode Driver', 'Kamu memasuki mode driver!', 'driver', '2022-12-08 22:38:20'),
('e5b5a', 'a9d3a', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-12-08 19:20:56'),
('ea322', '5bdfc', 'Pembatalan Pencarian Berhasil', 'Kamu berhasil untuk membatalkan pencarian.', 'penumpang', '2022-12-08 18:53:09'),
('ec423', 'a9d3a', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-08 18:38:32'),
('ee934', 'a9d3a', 'Menyelesaikan Pesanan', 'Kamu telah menyelesaikan sebuah pesanan!', 'driver', '2022-12-07 14:56:13'),
('ef942', '349c8', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-07 15:00:40'),
('f4437', 'a9d3a', 'Pesanan Telah Dibayar', 'Penumpang telah membayar transaksi kamu!', 'driver', '2022-12-07 15:17:48'),
('f8765', '02f53', 'Keluar Mode Penumpang', 'Kamu keluar dari mode penumpang!', 'penumpang', '2022-12-08 22:35:53'),
('f9164', 'd1339', 'Masuk Mode Penumpang', 'Kamu memasuki mode penumpang!', 'penumpang', '2022-12-06 14:35:02'),
('fb2c1', 'a9d3a', 'Pencarian Driver Berhasil', 'Kamu berhasil untuk mencari driver. Silakan memilih driver dan menunggu beberapa saat sampai driver mengkonfirmasi pilihanmu!', 'penumpang', '2022-12-08 22:39:49'),
('fc463', 'a9d3a', 'Buat Penawaran Berhasil', 'Kamu berhasil untuk membuat penawaran. Silakan menunggu beberapa saat sampai penumpang memilihmu!', 'driver', '2022-12-08 18:36:10'),
('feaa6', '5bdfc', 'Keluar Mode Driver', 'Kamu keluar dari mode driver!', 'driver', '2022-12-08 22:44:51'),
('ff12c', 'a9d3a', 'Pembatalan Penawaran Berhasil', 'Kamu berhasil untuk membatalkan penawaran.', 'driver', '2022-12-08 18:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `lokasi_awal` text NOT NULL,
  `lokasi_tujuan` text NOT NULL,
  `waktu_berangkat` time DEFAULT '00:00:00',
  `waktu_pulang` time DEFAULT '00:00:00',
  `gender` text NOT NULL,
  `type` text NOT NULL,
  `type_waktu_penawaran` text NOT NULL,
  `harga` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_booked` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_user`, `lokasi_awal`, `lokasi_tujuan`, `waktu_berangkat`, `waktu_pulang`, `gender`, `type`, `type_waktu_penawaran`, `harga`, `is_active`, `is_booked`, `created_at`) VALUES
('095f5', 'a9d3a', 'sekolah-bisnis', '-6.5775456,106.8160839', NULL, '19:00:00', 'laki-laki', 'bisnis', 'pulang', 0, 0, 0, '2022-12-08 18:39:02'),
('1eb30', 'cdbe7', 'sekolah-bisnis', '-6.5808169,106.8078517', '20:00:00', NULL, 'perempuan', 'bisnis', 'berangkat', 0, 0, 0, '2022-11-26 14:19:52'),
('49767', 'a9d3a', 'sekolah-bisnis', '-6.5776104,106.8160997', '10:00:00', NULL, 'laki-laki', 'angle', 'berangkat', 0, 0, 0, '2022-11-23 09:59:04'),
('4c9a8', 'a9d3a', 'sekolah-bisnis', '-6.5775455,106.8160837', NULL, '16:00:00', 'laki-laki', 'angle', 'pulang', 0, 0, 0, '2022-12-08 18:36:54'),
('5a26b', '02f53', 'sekolah-bisnis', '-6.5775437,106.8160819', '07:00:00', NULL, 'keduanya', 'angle', 'berangkat', 0, 0, 0, '2022-12-08 22:39:06'),
('616e0', 'a9d3a', 'sekolah-bisnis', '-6.57772,106.8150722', '08:30:00', NULL, 'keduanya', 'angle', 'berangkat', 0, 0, 0, '2022-12-08 15:48:11'),
('644c5', 'a9d3a', 'sekolah-bisnis', '-6.5775377,106.8160782', NULL, '16:00:00', 'keduanya', 'bisnis', 'pulang', 0, 0, 0, '2022-12-08 18:36:10'),
('64add', 'a9d3a', 'sekolah-bisnis', '-6.5775423,106.816083', NULL, '16:00:00', 'keduanya', 'angle', 'pulang', 0, 0, 0, '2022-12-08 18:34:07'),
('64ca5', '94e42', 'sekolah-bisnis', '-6.5996284,106.809222', '14:38:00', NULL, 'keduanya', 'bisnis', 'berangkat', 0, 0, 0, '2022-12-06 14:39:01'),
('6a397', 'cdbe7', 'sekolah-bisnis', '-6.5873486,106.8062555', '09:30:00', NULL, 'perempuan', 'angle', 'berangkat', 0, 0, 0, '2022-12-02 09:13:25'),
('7b474', 'a9d3a', 'sekolah-bisnis', 'undefined,undefined', NULL, '16:00:00', 'laki-laki', 'bisnis', 'pulang', 0, 0, 1, '2022-12-07 14:54:11'),
('81f55', 'a9d3a', 'sekolah-bisnis', 'undefined,undefined', NULL, '16:00:00', 'keduanya', 'angle', 'pulang', 0, 0, 0, '2022-12-07 15:00:34'),
('a8908', '02f53', 'sekolah-bisnis', 'undefined,undefined', '07:00:00', NULL, 'laki-laki', 'angle', 'berangkat', 0, 0, 1, '2022-12-08 22:40:52'),
('c3bd7', 'a9d3a', 'sekolah-bisnis', 'undefined,undefined', '19:00:00', NULL, 'laki-laki', 'angle', 'berangkat', 0, 0, 1, '2022-12-08 18:41:02'),
('e6a40', '0045e', 'sekolah-vokasi', '-6.3985446,106.8866531', NULL, '10:48:00', 'keduanya', 'bisnis', 'pulang', 0, 1, 0, '2022-12-09 10:48:21'),
('eadcf', 'a9d3a', 'sekolah-bisnis', 'undefined,undefined', NULL, '16:00:00', 'keduanya', 'bisnis', 'pulang', 0, 0, 1, '2022-12-07 15:03:41'),
('eba8d', '0045e', 'sekolah-vokasi', '-6.5949552,106.7903693', NULL, '22:47:00', 'keduanya', 'bisnis', 'pulang', 0, 0, 1, '2022-12-08 22:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_penawaran` varchar(100) DEFAULT NULL,
  `lokasi_user` text NOT NULL,
  `lokasi_akhir` text NOT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `waktu` time NOT NULL,
  `type_waktu` text NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `catatan` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_acc` int(11) NOT NULL DEFAULT 0,
  `is_payment` int(11) NOT NULL DEFAULT 0,
  `is_done` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `id_penawaran`, `lokasi_user`, `lokasi_akhir`, `jam_berangkat`, `jam_pulang`, `waktu`, `type_waktu`, `harga`, `catatan`, `is_active`, `is_acc`, `is_payment`, `is_done`, `created_at`) VALUES
('0ce02', '02f53', NULL, '-6.5775456,106.8160817', 'sekolah-bisnis', NULL, NULL, '16:00:00', 'pulang', 0, '', 0, 0, 0, 0, '2022-12-08 18:37:51'),
('3162b', 'cdbe7', NULL, '-6.5883725,106.8043781', 'sekolah-bisnis', NULL, NULL, '12:00:00', '', 6000, '', 0, 0, 0, 0, '2022-11-24 11:12:40'),
('36143', 'cdbe7', NULL, '-6.5873486,106.8062555', 'sekolah-bisnis', NULL, NULL, '09:30:00', 'berangkat', 0, '', 0, 0, 0, 0, '2022-12-02 09:15:23'),
('3ca9c', '5bdfc', NULL, '-6.5929303,106.8064646', 'sekolah-vokasi', NULL, NULL, '18:53:00', 'pulang', 0, '', 0, 0, 0, 0, '2022-12-08 18:53:04'),
('4893a', 'cdbe7', NULL, '-6.5808301,106.8078369', 'sekolah-bisnis', NULL, NULL, '15:00:00', '', 6000, 'gonceng gua bang', 0, 0, 0, 0, '2022-11-26 14:22:17'),
('5290a', '5bdfc', 'eba8d', '-6.5940388,106.7903833', 'sekolah-vokasi', NULL, NULL, '22:45:00', 'pulang', 6000, '', 0, 1, 1, 1, '2022-12-08 22:45:54'),
('61e2b', '02f53', NULL, '-6.5775468,106.8160826', 'sekolah-bisnis', NULL, NULL, '19:00:00', 'pulang', 6000, '', 0, 0, 0, 0, '2022-12-08 18:38:25'),
('62a1a', '349c8', 'eadcf', 'undefined,undefined', 'sekolah-bisnis', NULL, NULL, '16:00:00', 'pulang', 6000, '', 0, 1, 1, 1, '2022-12-07 15:13:33'),
('701fc', '5bdfc', NULL, '-6.5929315,106.8064718', 'sekolah-vokasi', NULL, NULL, '19:03:00', 'pulang', 0, '', 0, 0, 0, 0, '2022-12-08 19:03:17'),
('7c934', '349c8', NULL, 'undefined,undefined', 'sekolah-bisnis', NULL, NULL, '16:00:00', 'berangkat', 6000, 'haloo', 0, 0, 0, 0, '2022-12-07 15:00:40'),
('82c43', '5bdfc', NULL, '-6.5929359,106.8065087', 'sekolah-vokasi', NULL, NULL, '05:48:00', 'pulang', 0, '', 0, 0, 0, 0, '2022-12-08 18:48:53'),
('9275b', '5bdfc', NULL, '-6.5929296,106.806465', 'sekolah-vokasi', NULL, NULL, '19:08:00', 'berangkat', 6000, 'Test lokasi', 0, 0, 0, 0, '2022-12-08 19:08:32'),
('9c371', 'cdbe7', '7b474', 'undefined,undefined', 'sekolah-bisnis', NULL, NULL, '16:00:00', 'pulang', 6000, 'jidan asem', 0, 1, 1, 1, '2022-12-07 14:54:11'),
('ad534', '5bdfc', NULL, '-6.3985541,106.886653', 'sekolah-vokasi', NULL, NULL, '10:49:00', 'pulang', 40470, '', 1, 0, 0, 0, '2022-12-09 10:49:25'),
('b9318', '02f53', 'c3bd7', 'undefined,undefined', 'sekolah-bisnis', NULL, NULL, '19:00:00', 'berangkat', 6000, '', 0, 1, 1, 1, '2022-12-08 18:40:33'),
('c4416', '5bdfc', NULL, '-6.592931,106.8064684', 'sekolah-vokasi', NULL, NULL, '18:59:00', 'pulang', 0, 'Test', 0, 0, 0, 0, '2022-12-08 18:59:37'),
('d4e59', '02f53', NULL, '-6.5775415,106.8160828', 'sekolah-bisnis', NULL, NULL, '16:00:00', 'pulang', 6000, '', 0, 0, 0, 0, '2022-12-08 18:35:00'),
('e10bd', 'd1339', NULL, '-6.5996404,106.8092263', 'sekolah-bisnis', NULL, NULL, '15:35:00', 'berangkat', 6000, 'cepet', 0, 0, 0, 0, '2022-12-06 14:36:00'),
('f42cf', 'a9d3a', 'a8908', 'undefined,undefined', 'sekolah-bisnis', NULL, NULL, '07:00:00', 'berangkat', 6000, '', 0, 1, 1, 1, '2022-12-08 22:39:49');

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
  `is_banned` int(11) NOT NULL DEFAULT 0,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `role` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`, `no_wa`, `jenis_kelamin`, `profile_picture`, `email`, `password`, `is_active`, `is_banned`, `is_admin`, `role`, `created_at`) VALUES
('0045e', 'Admin', 'J0303201031', '6280186861', 'laki-laki', 'IMG-20221206-WA0001_0045e.jpg', 'Admin@apps.ipb.ac.id', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 0, 'driver', '2022-11-14 16:02:50'),
('02f53', 'Fadli', 'K111111111', '087723405421', 'laki-laki', NULL, 'fadliarisqi@apps.ipb.ac.id', '8948cbc205b60786d358094b116799ab', 1, 0, 0, NULL, '2022-12-05 23:06:30'),
('1346a', 'Febriann Dedy Syahputra ', 'K1401201069', '085867883068', 'laki-laki', NULL, 'febrianndedy@apps.ipb.ac.id', 'c975b9a9eeceebcb0b2064f656bda0bf', 1, 0, 0, 'driver', '2022-12-07 18:22:25'),
('22f33', 'Khalid Hafizh Sulaiman', 'K1401201102', '085365403799', 'laki-laki', NULL, 'khalidhafizhsulaiman@apps.ipb.ac.id', 'c872bafd5cb6d5206a042ec8495db091', 1, 0, 1, NULL, '2022-11-22 14:53:15'),
('349c8', 'Anneke Valentina Rachel ', 'K1401201129', '088809271985', 'perempuan', NULL, 'annekevalentina@apps.ipb.ac.id', 'c4b5595e071fc320ae120683daee93cc', 1, 0, 1, 'penumpang', '2022-11-20 19:40:31'),
('5bdfc', 'Candra Wijaya', 'J0303201030', '0895377562532', 'laki-laki', NULL, '2604candra@apps.ipb.ac.id', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 1, 'penumpang', '2022-11-29 19:05:34'),
('94e42', 'Nurizqy Althaaf Hidayat', 'K1401201011', '085784016477', 'laki-laki', NULL, 'nurizqyhidayat@apps.ipb.ac.id', 'f783db7b81c1a7ebd09bacbe44ce201d', 1, 0, 0, 'driver', '2022-12-06 14:30:54'),
('a9d3a', 'Zidan Afzalurrahman', 'K1401201099', '081325801694', 'laki-laki', NULL, 'genzafzalurrahman@apps.ipb.ac.id', 'c7641b44233ae52a9ab4c3e9b0addd60', 1, 0, 1, NULL, '2022-11-21 13:17:22'),
('b329a', 'Fadli Arisqi', 'K1401201169', '087723405421', 'laki-laki', NULL, 'fadliarisqo@apps.ipb.ac.id', '1d2600d3f9abf8c8dac918dbcd6a4f2d', 0, 0, 0, NULL, '2022-11-29 22:29:39'),
('bed0a', 'ipah', 'K1401201009', '085934382488', 'perempuan', '', 'Ipah2791masripah@apps.ipb.ac.id', 'cfe1b4cd42263dbf4693ad41866ec02e', 1, 0, 0, NULL, '2022-12-07 15:00:46'),
('cc529', 'Imam Naufal Kurnia Azhary', 'K1401201101', '085236084725', 'laki-laki', NULL, 'naufalimam@apps.ipb.ac.id', '4911df8c329e02f6c84461b0764fb13f', 1, 0, 0, NULL, '2022-11-27 18:54:28'),
('cdbe7', 'Victor Descartes Dalo Kotan', 'K1401201138', '082298968047', 'laki-laki', NULL, 'victor2509victor@apps.ipb.ac.id', '05b2cbcaa78f2655b74f955744ff18ae', 1, 0, 1, 'penumpang', '2022-11-20 20:49:17'),
('d1339', 'M. Firoos Hilmi Al Ghifary', 'K1401201020', '08123101391', 'laki-laki', NULL, 'firooshilmi@apps.ipb.ac.id', '62abec551e5180cf6d2cfc86e2a220e0', 1, 0, 0, 'penumpang', '2022-12-06 14:30:30'),
('d4cb2', 'Zikri Alkautsar', 'K1401201007', '081383713072', 'laki-laki', NULL, 'zikrialkautsar@apps.ipb.ac.id', '7809cc585cc9310c3067dc3d5b1f7835', 1, 0, 0, NULL, '2022-11-29 11:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `created_at`) VALUES
(4, 'admin@gmail.com', 'wBzrqz77B6VDomJiTaACHjXVIc0WubAojJodEt5Xj5A=', '1668416570'),
(8, 'khalidhafizhsulaiman@apps.ipb.ac.id', 'YGLg4Je5qQuhRILzZxI6R+p4ML58ki3a8vNZ87CN1Io=', '1669103595'),
(9, 'naufalimam@apps.ipb.ac.id', 'l4gwdWBTAHdq9qPsP8Lyu5gGtE1Z1tvQYgSo0M9UN98=', '1669550068'),
(10, 'zikrialkautsar@apps.ipb.ac.id', 'WdDY4+dyS10Xf/KRDHS2lh0i7pYTYwQheNslA98tnkg=', '1669695633'),
(14, 'fadliarisqo@apps.ipb.ac.id', 'CB3vEZOW1iZPGl+84n47OlUc60rr930HMsOFfXPhvME=', '1669735779');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
