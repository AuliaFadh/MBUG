-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 02:04 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbug`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `id_beasiswa` int(3) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tahun_penerimaan` varchar(4) NOT NULL,
  `status_beasiswa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`id_beasiswa`, `jenis`, `asal`, `tahun_penerimaan`, `status_beasiswa`) VALUES
(1, '	KARTU INDONESIA PINTAR KULIAH(KIPK)', '	KEMENDIKBUD', '2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akademik`
--

CREATE TABLE `laporan_akademik` (
  `id_akademik` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `semester` int(2) NOT NULL,
  `tahun_ajaran` varchar(13) NOT NULL,
  `ipk` float NOT NULL,
  `ipk_lokal` float NOT NULL,
  `ipk_uu` float NOT NULL,
  `rangkuman_nilai` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_akademik`
--

INSERT INTO `laporan_akademik` (`id_akademik`, `id_beasiswa`, `id_penerima`, `semester`, `tahun_ajaran`, `ipk`, `ipk_lokal`, `ipk_uu`, `rangkuman_nilai`) VALUES
(1, 1, 1, 6, 'ATA 2022/2023', 3.93, 3.91, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keaktifan`
--

CREATE TABLE `laporan_keaktifan` (
  `id_keaktifan` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `semester` int(2) NOT NULL,
  `tahun_ajaran` varchar(13) NOT NULL,
  `krs` blob DEFAULT NULL,
  `jumlah_ditagihkan` int(11) NOT NULL,
  `jumlah_potongan` int(11) NOT NULL,
  `blanko_pembayaran` blob DEFAULT NULL,
  `bukti_pembayaran` blob DEFAULT NULL,
  `status_keaktifan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_keaktifan`
--

INSERT INTO `laporan_keaktifan` (`id_keaktifan`, `id_beasiswa`, `id_penerima`, `semester`, `tahun_ajaran`, `krs`, `jumlah_ditagihkan`, `jumlah_potongan`, `blanko_pembayaran`, `bukti_pembayaran`, `status_keaktifan`) VALUES
(1, 1, 1, 6, 'ATA 2022/2023', '', 11000000, 10000000, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_mbkm`
--

CREATE TABLE `laporan_mbkm` (
  `id_mbkm` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `kegiatan_mbkm` varchar(100) NOT NULL,
  `periode` int(4) NOT NULL,
  `keterangan_mbkm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_mbkm`
--

INSERT INTO `laporan_mbkm` (`id_mbkm`, `id_beasiswa`, `id_penerima`, `kegiatan_mbkm`, `periode`, `keterangan_mbkm`) VALUES
(1, 1, 1, 'Bangkit Academy 2023', 2023, 'Lulus Machine learning Path');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_prestasi`
--

CREATE TABLE `laporan_prestasi` (
  `id_prestasi` int(10) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `id_penerima` int(8) NOT NULL,
  `tingkat` int(1) NOT NULL,
  `jenis_prestasi` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `capaian` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `bukti_prestasi` blob DEFAULT NULL,
  `publikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_prestasi`
--

INSERT INTO `laporan_prestasi` (`id_prestasi`, `id_beasiswa`, `id_penerima`, `tingkat`, `jenis_prestasi`, `nama_kegiatan`, `capaian`, `tempat`, `tanggal`, `penyelenggara`, `bukti_prestasi`, `publikasi`) VALUES
(1, 1, 1, 3, 'Top 20 Capstone', 'Bangkit Academy 2023', 'Lulus Bangkit Academy 2023', 'Rumah', '2023-07-16', 'Google, GoTo, Traveloka', NULL, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `link_gform`
--

CREATE TABLE `link_gform` (
  `id_lgf` int(10) NOT NULL,
  `nama_form` varchar(100) NOT NULL,
  `id_beasiswa` int(3) NOT NULL,
  `tautan` varchar(100) NOT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_gform`
--

INSERT INTO `link_gform` (`id_lgf`, `nama_form`, `id_beasiswa`, `tautan`, `tanggal_pembuatan`) VALUES
(1, 'Pendataan Peserta KIPK', 1, 'https://docs.google.com/forms', '2023-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_pengguna`
--

CREATE TABLE `manajemen_pengguna` (
  `id_manajemen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hak_akses` tinyint(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manajemen_pengguna`
--

INSERT INTO `manajemen_pengguna` (`id_manajemen`, `id_user`, `nama`, `hak_akses`, `last_login`, `status`) VALUES
(1, 1, 'Aulia', 1, '2023-07-12 22:24:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerima_beasiswa`
--

CREATE TABLE `penerima_beasiswa` (
  `id_penerima` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npm` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tahun_diterima` int(4) NOT NULL,
  `status_penerima` tinyint(1) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima_beasiswa`
--

INSERT INTO `penerima_beasiswa` (`id_penerima`, `nama`, `npm`, `prodi`, `alamat`, `no_hp`, `jenis_kelamin`, `tahun_diterima`, `status_penerima`, `keterangan`) VALUES
(1, 'Aulia', 10120698, 'Sistem Informasi', '	Depok Dua', '081237275191', '1', 2022, 2, '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `laporan_akademik`
--
ALTER TABLE `laporan_akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `laporan_keaktifan`
--
ALTER TABLE `laporan_keaktifan`
  ADD PRIMARY KEY (`id_keaktifan`);

--
-- Indexes for table `laporan_mbkm`
--
ALTER TABLE `laporan_mbkm`
  ADD PRIMARY KEY (`id_mbkm`);

--
-- Indexes for table `laporan_prestasi`
--
ALTER TABLE `laporan_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `link_gform`
--
ALTER TABLE `link_gform`
  ADD PRIMARY KEY (`id_lgf`);

--
-- Indexes for table `manajemen_pengguna`
--
ALTER TABLE `manajemen_pengguna`
  ADD PRIMARY KEY (`id_manajemen`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  ADD PRIMARY KEY (`id_penerima`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `id_beasiswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laporan_akademik`
--
ALTER TABLE `laporan_akademik`
  MODIFY `id_akademik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_keaktifan`
--
ALTER TABLE `laporan_keaktifan`
  MODIFY `id_keaktifan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_mbkm`
--
ALTER TABLE `laporan_mbkm`
  MODIFY `id_mbkm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_prestasi`
--
ALTER TABLE `laporan_prestasi`
  MODIFY `id_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `link_gform`
--
ALTER TABLE `link_gform`
  MODIFY `id_lgf` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manajemen_pengguna`
--
ALTER TABLE `manajemen_pengguna`
  MODIFY `id_manajemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
