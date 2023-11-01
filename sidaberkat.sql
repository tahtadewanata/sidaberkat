-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 03:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arpus_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_arsip`
--

CREATE TABLE `data_arsip` (
  `id` int(11) NOT NULL,
  `pokok_masalah` varchar(200) DEFAULT NULL,
  `kode_pokok_masalah` int(100) DEFAULT NULL,
  `rincian_masalah` text DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `box` varchar(100) DEFAULT NULL,
  `rak` varchar(100) DEFAULT NULL,
  `sap` varchar(100) DEFAULT NULL,
  `aktif` varchar(100) DEFAULT NULL,
  `inaktif` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_opd` text DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_arsip`
--

INSERT INTO `data_arsip` (`id`, `pokok_masalah`, `kode_pokok_masalah`, `rincian_masalah`, `tahun`, `box`, `rak`, `sap`, `aktif`, `inaktif`, `keterangan`, `nama_opd`, `created_by`, `created_at`) VALUES
(1, 'SPJ Rutin', NULL, 'SPJ GU 1 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '1', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(2, 'SPJ Rutin', NULL, 'SPJ GU 2 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '1', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(3, 'SPJ Rutin', NULL, 'SPJ GU 3 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '1', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(4, 'SPJ Rutin', NULL, 'SPJ GU 4 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '1', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(5, 'SPJ Rutin', NULL, 'SPJ GU 5 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '1', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(6, 'SPJ Rutin', NULL, 'SPJ GU 6 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '1', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(7, 'SPJ Rutin', NULL, 'SPJ GU 7 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '2', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(8, 'SPJ Rutin', NULL, 'SPJ GU 8 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '2', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(9, 'SPJ Rutin', NULL, 'SPJ GU 9 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '2', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(10, 'SPJ Rutin', NULL, 'SPJ GU 10 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '2', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(11, 'SPJ Rutin', NULL, 'SPJ GU 11 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '2', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(12, 'SPJ Rutin', NULL, 'SPJ GU 12 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '2', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(13, 'SPJ Rutin', NULL, 'SPJ GU 13 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '3', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(14, 'SPJ Rutin', NULL, 'SPJ GU 14 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '3', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(15, 'SPJ Rutin', NULL, 'SPJ GU 15 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '3', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(16, 'SPJ Rutin', NULL, 'SPJ GU 16 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '3', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(17, 'SPJ Rutin', NULL, 'SPJ GU 17 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '3', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(18, 'SPJ Rutin', NULL, 'SPJ GU 18 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '3', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(19, 'SPJ Rutin', NULL, 'SPJ GU 19 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '3', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(20, 'SPJ Rutin', NULL, 'SPJ GU 20 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(21, 'SPJ Rutin', NULL, 'SPJ GU 21 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(22, 'SPJ Rutin', NULL, 'SPJ GU 22 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(23, 'SPJ Rutin', NULL, 'SPJ GU 23 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(24, 'SPJ Rutin', NULL, 'SPJ GU 24 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(25, 'SPJ Rutin', NULL, 'SPJ GU 25 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(26, 'SPJ Rutin', NULL, 'SPJ GU 26 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(27, 'SPJ Rutin', NULL, 'SPJ GU 27 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '4', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(28, 'SPJ Rutin', NULL, 'SPJ GU 28 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(29, 'SPJ Rutin', NULL, 'SPJ GU 29 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(30, 'SPJ Rutin', NULL, 'SPJ GU 30 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(31, 'SPJ Rutin', NULL, 'SPJ GU 31 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(32, 'SPJ Rutin', NULL, 'SPJ GU 32 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(33, 'SPJ Rutin', NULL, 'SPJ GU 33 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(34, 'SPJ Rutin', NULL, 'SPJ GU 34 Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(35, 'SPJ Rutin', NULL, 'SPJ GU Nihil Kantor Perpustakaan dan Arsip tahun 2014', 2014, '5', 'Rool Opack 2', '1', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(36, 'Pajak', NULL, 'Kumpulan Berita Acara Pemeriksaan kas, Buku Panjar, Buku Pajak Kantor Perpustakan dan Arsip Tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(37, 'SP2D', NULL, 'Kumpulan SP2D Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(38, 'SSP', NULL, 'Kumpulan SSP Rekanan Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(39, 'SPJ Administratif', NULL, 'Kumpulan SPJ Administratif Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(40, 'SPD', NULL, 'Kumpulan Surat Penyediaan Dana Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(41, 'Keuangan', NULL, 'Laporan DTH Bulan Oktober Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(42, 'Keuangan', NULL, 'SPJ LS Pembayaran Pertama (P1) Rehab Gedung Layanan Perpustakaan Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(43, 'Keuangan', NULL, 'SPJ Fungsional Bulan Januari - Desember Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(44, 'Keuangan', NULL, 'BKU Bulan Januari s/d Desember Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(45, 'Keuangan', NULL, 'Buku Pembantu Kas Tunai Bulan Januari s/d Juni Kantor Perpustakaan dan Arsip tahun 2014', 2014, '6', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(46, 'Keuangan', NULL, 'Rekapitulasi DTH Bulan Juli s/d September Kantor Perpustakaan dan Arsip tahun 2014', 2014, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(47, 'Keuangan', NULL, 'SK Penunjukan PT. Bank Jatim Cabang Nganjuk sebagai tempat pembayaran, penyimpanan uang daerah dan membayar seluruh pengeluaran daerah Kab. Nganjuk Tahun Anggaran 2014', 2014, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(48, 'Keuangan', NULL, 'SSP Lembar 5 Kantor Perpustakaan dan Arsip Tahun 2014 Pertama (I)', 2014, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(49, 'Keuangan', NULL, 'SPJ LS Pengadaan Mesin Penghancur Kertas Rp. 55.825.000,00 CV Catur Putri Tahun 2014.', 2014, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(50, 'Keuangan', NULL, 'SPJ LS Pengadaan Software Otomasi Perpustakaan bulan Oktober Kantor Perpustakaan dan Arsip tahun 2014', 2014, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(51, 'Keuangan', NULL, 'SPJ Rool Opack dan Rak CV. Wahana Sejahtera Rp. 56.100.000,00 bulan Juli tahun 2014.', 2014, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(52, 'Keuangan', NULL, 'SPJ GU 1 / UP Kantor Perpustakaan dan Arsip Tahun 2015.', 2015, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(53, 'Keuangan', NULL, 'SPJ GU 2 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '7', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(54, 'Keuangan', NULL, 'SPJ GU 3 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '8', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(55, 'Keuangan', NULL, 'SPJ GU 4 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '8', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(56, 'Keuangan', NULL, 'SPJ GU 5 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '8', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(57, 'Keuangan', NULL, 'SPJ GU 6 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '8', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(58, 'Keuangan', NULL, 'SPJ GU 7 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '8', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(59, 'Keuangan', NULL, 'SPJ GU 8 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '8', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(60, 'Keuangan', NULL, 'SPJ GU 9 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '8', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(61, 'Keuangan', NULL, 'SPJ GU 10 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '9', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(62, 'Keuangan', NULL, 'SPJ GU 11 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '9', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(63, 'Keuangan', NULL, 'SPJ GU 12 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '9', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(64, 'Keuangan', NULL, 'SPJ GU 13 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '9', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(65, 'Keuangan', NULL, 'SPJ GU 14 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '9', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(66, 'Keuangan', NULL, 'SPJ GU 15 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '9', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(67, 'Keuangan', NULL, 'SPJ GU 16 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '9', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(68, 'Keuangan', NULL, 'SPJ GU 17 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '10', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(69, 'Keuangan', NULL, 'SPJ GU 18 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '10', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(70, 'Keuangan', NULL, 'SPJ GU 19 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '10', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(71, 'Keuangan', NULL, 'SPJ GU 20 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '10', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(72, 'Keuangan', NULL, 'SPJ GU 21 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '10', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(73, 'Keuangan', NULL, 'SPJ GU 22 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '10', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(74, 'Keuangan', NULL, 'SPJ GU 23 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '10', 'Rool Opack 2', '2', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(75, 'Keuangan', NULL, 'SPJ GU 24 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '11', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(76, 'Keuangan', NULL, 'SPJ GU 25 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '11', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(77, 'Keuangan', NULL, 'SPJ GU 26 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '11', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(78, 'Keuangan', NULL, 'SPJ GU 27 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '11', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(79, 'Keuangan', NULL, 'SPJ GU 28 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '11', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(80, 'Keuangan', NULL, 'SPJ GU 29 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '11', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(81, 'Keuangan', NULL, 'SPJ GU 30 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '11', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(82, 'Keuangan', NULL, 'SPJ GU 31 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '12', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(83, 'Keuangan', NULL, 'SPJ GU 32 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '12', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(84, 'Keuangan', NULL, 'SPJ GU 33 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '12', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(85, 'Keuangan', NULL, 'SPJ GU 34 Kantor Perpustakaan dan Arsip tahun 2015', 2015, '12', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(86, 'Keuangan', NULL, 'SPP dan SPJ LS Pengadaan Rool Opack dan Rak Kegiatan Pengadaan sarana pengolahan dan penyimpanan arsip Rp. 44.935.000 tahun 2015', 2015, '12', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(87, 'Keuangan', NULL, 'NPD (Nota Pencairan Dana) Kantor Perpustakaan dan Arsip tahun 2015', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(88, 'Keuangan', NULL, 'Registrasi Penutupan Kas Kantor Perpustakaan dan Arsip tahun 2015', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(89, 'Keuangan', NULL, 'Debet Gaji arsip bulan Januari s/d Desember 2015 Kantor Perpustakaan dan Arsip', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(90, 'Keuangan', NULL, 'SPJ LS Pengadaan Sarana Pengolahan dan Penyimpanan arsip Kantor Perpustakaan dan Arsip tahun 2015', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(91, 'Keuangan', NULL, 'SPJ Administratif Kantor Perpustakaan dan Arsip tahun 2015', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(92, 'Keuangan', NULL, 'SPJ LS Bahan Pustaka Perpustakaan Umum Kantor Perpustakaan dan Arsip tahun 2015', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(93, 'Keuangan', NULL, 'SPJ LS Buku Kantor Perpustakaan dan Arsip tahun 2015', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(94, 'Keuangan', NULL, '1). Keputusan Bupati Nganjk tentang Standart Biaya TA. 2014, 2). Anggaran Kas DPA-SKPD Tahun 2015, 3) DPA-SKPD Tahun 2015, 4). Dokumen Pelaksanaan Perubahan Anggaran SKPD Tahun 2015 Kantor Perpustakaan dan Arsip', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(95, 'Keuangan', NULL, 'Rekanan Kantor Perpustakaan dan Arsip tahun 2015', 2015, '13', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(96, 'Keuangan', NULL, 'SPJ LS Rehab Gedung Arsip Kantor Perpustakaan dan Arsip tahun 2015', 2015, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(97, 'Keuangan', NULL, 'SPJ LS Pengadaan Meubelair Kantor Perpustakaan dan Arsip Tahun 2015', 2015, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(98, 'Keuangan', NULL, 'Kartu kendali Kantor Perpustakaan dan Arsip tahun 2014 GU 11 - 34', 2014, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(99, 'Keuangan', NULL, 'Kumpulan SP2D Kantor Perpustakaan dan Arsip Tahun 2014', 2014, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(100, 'Keuangan', NULL, 'Kumpulan SSP Rekanan Kantor Perpustakaan dan Arsip tahun 2014', 2014, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(101, 'Keuangan', NULL, 'Kumpulan DTH (Daftar Transaksi Harian) bulan Desember 2014 (lembar 5) Kantor Perpustakaan dan Arsip', 2014, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(102, 'Keuangan', NULL, 'Kumpulan Giro Bank Kantor Perpustakaan dan Arsip tahun 2014', 2014, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(103, 'Keuangan', NULL, 'Buku Kas Umum Kantor Perpustakaan dan Arsip tahun 2015', 2015, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(104, 'Keuangan', NULL, 'Buku Pembantu Kas Tunai Kantor Perpustakaan dan Arsip tahun 2015', 2015, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(105, 'Keuangan', NULL, 'Kumpulan SP2D Kantor Perpustakaan dan Arsip Tahun 2015 GU 13 - GU 24', 2015, '14', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(106, 'Keuangan', NULL, 'Laporan Pertanggung jawaban Kantor Perpustakaan dan Arsip tahun 2015', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(107, 'Keuangan', NULL, 'Kumpulan Rekening Koran Kantor Perpustakaan dan Arsip tahun 2015', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(108, 'Keuangan', NULL, 'Kumpulan NPD (Nota Pencairan Dana) Kantor Perpustakaan dan Arsip tahun 2015', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(109, 'Keuangan', NULL, 'SPJ Fungsional Kantor Perpustakaan dan Arsip tahun 2015', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(110, 'Keuangan', NULL, 'Buku Pembantu Pajak Kantor Perpustakaan dan Arsip tahun 2015', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(111, 'Keuangan', NULL, 'Laporan DTH (Daftar Transaksi Harian) bulan Februari, April - November tahun 2015 Kantor Perpustakaan dan Arsip', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(112, 'Keuangan', NULL, 'Kumpulan SPD Kantor Perpustakaan dan Arsip Tahun 2015', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(113, 'Keuangan', NULL, 'Kartu Kendali Kantor Perpustakaan dan Arsip tahun 2015', 2015, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(114, 'Keuangan', NULL, 'SPJ GU 1 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '15', 'Rool Opack 2', '3', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(115, 'Keuangan', NULL, 'SPJ GU 2 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '16', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(116, 'Keuangan', NULL, 'SPJ GU 3 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '16', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(117, 'Keuangan', NULL, 'SPJ GU 4 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '16', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(118, 'Keuangan', NULL, 'SPJ GU 5 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '16', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(119, 'Keuangan', NULL, 'SPJ GU 6 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '16', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(120, 'Keuangan', NULL, 'SPJ GU 7 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '17', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(121, 'Keuangan', NULL, 'SPJ GU 8 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '17', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(122, 'Keuangan', NULL, 'SPJ GU 9 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '17', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(123, 'Keuangan', NULL, 'SPJ GU 10 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '17', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(124, 'Keuangan', NULL, 'SPJ GU 11 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '17', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(125, 'Keuangan', NULL, 'SPJ GU 12 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '18', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(126, 'Keuangan', NULL, 'SPJ GU 13 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '18', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(127, 'Keuangan', NULL, 'SPJ GU 14 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '18', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(128, 'Keuangan', NULL, 'SPJ GU 15 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '18', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(129, 'Keuangan', NULL, 'SPJ GU 16 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '18', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(130, 'Keuangan', NULL, 'SPJ GU 17 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '19', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(131, 'Keuangan', NULL, 'SPJ GU 18 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '19', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(132, 'Keuangan', NULL, 'SPJ GU 19 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '19', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(133, 'Keuangan', NULL, 'SPJ GU 20 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '19', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(134, 'Keuangan', NULL, 'SPJ GU 21 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '20', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(135, 'Keuangan', NULL, 'SPJ GU 22 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '20', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(136, 'Keuangan', NULL, 'SPJ GU 23 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '20', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(137, 'Keuangan', NULL, 'SPJ GU 24 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '20', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(138, 'Keuangan', NULL, 'SPJ GU 25 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '20', 'Rool Opack 2', '4', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(139, 'Keuangan', NULL, 'SPJ GU 26 Kantor Perpustakaan dan Arsip Tahun 2016', 2016, '21', 'Rool Opack 2', '5', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(140, 'Keuangan', NULL, 'SPJ LS Pengadaan Buku LS Rp. 61.890.000,- Kantor Perpustakaan dan Arsip tahun 2016', 2016, '21', 'Rool Opack 2', '5', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(141, 'Keuangan', NULL, 'SPJ LS Pekerjaan : Pengadaan Mebeleir Kantor Perpustakaan dan Arsip tahun 2016 SPM : 0018/SPPLS/124/2016 9 Juni 2016', 2016, '21', 'Rool Opack 2', '5', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(142, 'Keuangan', NULL, 'SPJ LS Pengadaan Pembangunan Gedung Kantor (P1 +P2) Rp. 162.307.500,- Kantor Perpustakaan dan Arsip tahun 2016', 2016, '21', 'Rool Opack 2', '5', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(143, 'Keuangan', NULL, 'SPJ LS Rehabilitasi Depo Arsip (P1 + P2) Rp. 174.933.000,- Kantor Perpustakaan dan Arsip tahun 2016', 2016, '22', 'Rool Opack 3', '6', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(144, 'Keuangan', NULL, 'SPJ LS Pengadaan Rool Opack dan Rak Arsip Kantor Perpustakaan dan Arsip tahun 2016', 2016, '22', 'Rool Opack 3', '6', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16'),
(145, 'Keuangan', NULL, 'SPJ Laporan Ganti Uang Kantor Perpustakaan dan Arsip tahun 2014', 2014, '22', 'Rool Opack 3', '6', '2 tahun', '5 tahun', 'Dinilai Kembali', 'DINAS KEARSIPAN DAN PERPUSTAKAAN KABUPATEN NGANJUK', 1, '2023-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `master_opd`
--

CREATE TABLE `master_opd` (
  `id` int(11) NOT NULL,
  `nama_opd` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_opd`
--

INSERT INTO `master_opd` (`id`, `nama_opd`) VALUES
(1, 'Bagian Hukum');

-- --------------------------------------------------------

--
-- Table structure for table `master_pokok_masalah`
--

CREATE TABLE `master_pokok_masalah` (
  `id` int(11) NOT NULL,
  `nama_pokok_masalah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pokok_masalah`
--

INSERT INTO `master_pokok_masalah` (`id`, `nama_pokok_masalah`) VALUES
(1, 'Bupati/Walikota');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `roleid` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `api_key` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `roleid`, `isActive`, `api_key`) VALUES
(1, 'adminarsip', '9fd254d530046bbfae2a1c0fdcb2b031', 'Admin Arsip', 1, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_arsip`
--
ALTER TABLE `data_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_opd`
--
ALTER TABLE `master_opd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pokok_masalah`
--
ALTER TABLE `master_pokok_masalah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_arsip`
--
ALTER TABLE `data_arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `master_opd`
--
ALTER TABLE `master_opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_pokok_masalah`
--
ALTER TABLE `master_pokok_masalah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
