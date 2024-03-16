-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2024 at 01:08 AM
-- Server version: 8.0.36
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parogorg_datainventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `id_bangunan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bangunan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hyperlink` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bangunan`
--

INSERT INTO `bangunan` (`id_bangunan`, `nama_bangunan`, `hyperlink`) VALUES
('HBP0001', 'Lahan / Gedung', ''),
('HBP0002', 'Fasilitas Ruangan', ''),
('HBP0003', 'Pastoran', ''),
('HBP0004', 'Aula Lantai 3', ''),
('HBP0005', 'Perlengkapan Gereja', ''),
('HBP0006', 'Ruang Adorasi Lt 2', ''),
('HBP0007', 'Goa Maria Taman Doa', ''),
('HBP0008', 'Toilet Umat', ''),
('HBP0009', 'Instalasi Listrik/Lampu', ''),
('HBP0010', 'Instalasi CCTV', ''),
('HBP0011', 'Kendaraan Paroki', ''),
('HBP0012', 'Kebun Balearjosari', ''),
('HBP0013', 'Kelengkapan Prokes', ''),
('HBP0014', 'Pecah Belah Paroki', ''),
('HBP0015', 'Pecah Belah Pastoran', ''),
('HBP0016', 'Peralatan Kerja', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_gereja`
--

CREATE TABLE `barang_gereja` (
  `id_barang` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `kondisi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bangunan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi_sekunder` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_sekunder`
--

CREATE TABLE `lokasi_sekunder` (
  `id_lokasi_sekunder` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bangunan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hyperlink` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi_sekunder`
--

INSERT INTO `lokasi_sekunder` (`id_lokasi_sekunder`, `nama_lokasi`, `id_bangunan`, `id_lokasi`, `hyperlink`) VALUES
('LOS0001', 'Kelengkapan Umum', 'HBP0002', 'LOC0002', ''),
('LOS0002', 'Buku Sakramen', 'HBP0002', 'LOC0002', ''),
('LOS0003', 'Form Pendaftaran', 'HBP0002', 'LOC0002', ''),
('LOS0004', 'Peralatan Umum', 'HBP0005', 'LOC0029', ''),
('LOS0005', 'Peralatan Meja Altar', 'HBP0005', 'LOC0029', ''),
('LOS0006', 'Busana Liturgi Imam', 'HBP0005', 'LOC0029', ''),
('LOS0007', 'Busana Liturgi Lektor', 'HBP0005', 'LOC0029', ''),
('LOS0008', 'Busana Liturgi Assisten Imam', 'HBP0005', 'LOC0029', ''),
('LOS0009', 'Buku Panduan Ibadat', 'HBP0005', 'LOC0029', '');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_utama`
--

CREATE TABLE `lokasi_utama` (
  `id_lokasi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bangunan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hyperlink` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi_utama`
--

INSERT INTO `lokasi_utama` (`id_lokasi`, `nama_lokasi`, `id_bangunan`, `hyperlink`) VALUES
('LOC0001', 'Sekretariat Paroki Ruang 1', 'HBP0002', ''),
('LOC0002', 'Sekretariat Paroki Ruang 2', 'HBP0002', ''),
('LOC0003', 'Ruang Arsip', 'HBP0002', ''),
('LOC0004', 'Ruang Tamu', 'HBP0002', ''),
('LOC0005', 'Ruang Aquarium', 'HBP0002', ''),
('LOC0006', 'Ruang Dewan Pastoral Paroki', 'HBP0002', ''),
('LOC0007', 'Ruang Katekese', 'HBP0002', ''),
('LOC0008', 'Toko Paroki', 'HBP0002', ''),
('LOC0009', 'Gudang Elektronik', 'HBP0002', ''),
('LOC0010', 'Ruang Kesehatan', 'HBP0002', ''),
('LOC0011', 'Gudang PSE', 'HBP0002', ''),
('LOC0012', 'Ruang Orang Muda Katolik', 'HBP0002', ''),
('LOC0013', 'Ruang Perpustakaan', 'HBP0002', ''),
('LOC0014', 'Aula Gereja Lama', 'HBP0002', ''),
('LOC0015', 'Ruang Rapat Gereja Lama', 'HBP0002', ''),
('LOC0016', 'ARCADIA Studio', 'HBP0002', ''),
('LOC0017', 'Gudang Terop', 'HBP0002', ''),
('LOC0018', 'Pos Satpam', 'HBP0002', ''),
('LOC0019', 'Ruang Tunggu Lorong Masuk', 'HBP0002', ''),
('LOC0020', 'Ruang Tidur', 'HBP0003', ''),
('LOC0021', 'Ruang Rekreasi Romo', 'HBP0003', ''),
('LOC0022', 'Perpustakaan Pastoran', 'HBP0003', ''),
('LOC0023', 'Kamar Makan', 'HBP0003', ''),
('LOC0024', 'Dapur Kering Pastoran', 'HBP0003', ''),
('LOC0025', 'Dapur Basah Pastoran', 'HBP0003', ''),
('LOC0026', 'Ruang Cuci', 'HBP0003', ''),
('LOC0027', 'Panti Imam', 'HBP0005', ''),
('LOC0028', 'Ruang Umat', 'HBP0005', ''),
('LOC0029', 'Ruang Sakristi', 'HBP0005', ''),
('LOC0030', 'Ruang Devosi', 'HBP0005', ''),
('LOC0031', 'Ruang Pengakuan Dosa', 'HBP0005', ''),
('LOC0032', 'Ruang Sound System', 'HBP0005', ''),
('LOC0033', 'Gudang Gereja', 'HBP0005', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`id_bangunan`);

--
-- Indexes for table `barang_gereja`
--
ALTER TABLE `barang_gereja`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `lokasi_sekunder`
--
ALTER TABLE `lokasi_sekunder`
  ADD PRIMARY KEY (`id_lokasi_sekunder`);

--
-- Indexes for table `lokasi_utama`
--
ALTER TABLE `lokasi_utama`
  ADD PRIMARY KEY (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
