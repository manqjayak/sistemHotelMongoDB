-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 06:47 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(10) NOT NULL,
  `no_transaksi` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `no_transaksi`, `no_kamar`) VALUES
(1, 1, 101);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` int(11) NOT NULL,
  `jenis_kamar` varchar(20) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `jenis_kamar`, `harga`) VALUES
(101, 'Standar room', 750000),
(201, 'Superior room', 800000),
(202, 'Superior room', 1000000),
(203, 'Superior room', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('perempuan','laki-laki') NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jk`, `alamat`, `no_hp`) VALUES
('A01', 'Tadi Apa Ya', 'laki-laki', 'Jalan Taruma Negara', '09856789'),
('A02', 'Aku Sayang Kamu', 'laki-laki', 'jalan-jalan', '0854323412');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `jk` enum('perempuan','laki-laki') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_ktp` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `alamat`, `jk`, `no_hp`, `no_ktp`) VALUES
(1, 'Ayu Trisna', 'Jalan Panji Semirang', 'perempuan', '0857380000', 4323456345323453),
(2, 'Irmayanti', 'Jalan Panji Semirang', 'perempuan', '09890050190', 4232123421234212);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(11) NOT NULL,
  `id_pengunjung` int(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `id_pengunjung`, `id_karyawan`, `jumlah_kamar`, `tanggal_masuk`, `tanggal_keluar`, `lama_menginap`, `total_harga`) VALUES
(0, 1, 'A01', 1, '2020-05-20', '2020-05-28', 2, 750000),
(1, 2, 'A01', 1, '2020-05-19', '2020-05-20', 1, 750000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `no_kamar` (`no_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pengunjung` (`id_pengunjung`),
  ADD KEY `id_karyawanMasuk` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`no_transaksi`) REFERENCES `transaksi` (`no_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
