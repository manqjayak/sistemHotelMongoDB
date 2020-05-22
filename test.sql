-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 01:59 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilDetailTransaksi` (IN `id` INT)  BEGIN 
SELECT b.no_kamar, b.jenis_kamar,b.harga
FROM transaksi a 
INNER JOIN kamar b on a.no_kamar = b.no_kamar
WHERE a.no_transaksi = id;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `status` (`date` DATE, `nomor` INT) RETURNS INT(2) BEGIN
 DECLARE hasil DATE;

 DECLARE jadi integer;
 	set hasil=	(SELECT a.tanggal_keluar FROM transaksi a INNER JOIN kamar b on b.no_kamar = a.no_kamar WHERE b.no_kamar = nomor AND a.tanggal_keluar BETWEEN date AND '2050-01-01');
  set jadi = ifnull(hasil,1);
 
  RETURN jadi;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `total` (`date1` DATE) RETURNS INT(11) BEGIN
 DECLARE total integer;
  set	total = (SELECT COUNT(*) FROM transaksi WHERE tanggal_masuk = date1);
  RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cekid`
-- (See below for the actual view)
--
CREATE TABLE `cekid` (
`nama` varchar(30)
,`alamat` varchar(20)
,`jk` enum('perempuan','laki-laki')
,`no_hp` varchar(20)
,`no_ktp` bigint(16)
,`tanggal_masuk` date
,`tanggal_keluar` date
);

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
(203, 'Superior room', 500000),
(204, 'Superior room', 2000000),
(205, 'Superior room', 10000000);

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
('A01', 'Tadi Apa Ya', 'laki-laki', 'Jalan Taruma Negara', '0985678921'),
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
(2, 'Irmayanti', 'Jalan Panji Semirang', 'perempuan', '09890050190', 4232123421234212),
(3, 'Test', 'jalan test', 'laki-laki', '08431723121', 2984110294121);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(11) NOT NULL,
  `id_pengunjung` int(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `id_pengunjung`, `id_karyawan`, `tanggal_masuk`, `tanggal_keluar`, `lama_menginap`, `no_kamar`, `total_harga`) VALUES
(1, 2, 'A01', '2020-05-19', '2020-05-20', 1, 201, 670000),
(2, 3, 'A02', '2020-05-22', '2020-05-25', 3, 203, 5000000),
(3, 1, 'A01', '2020-05-20', '2020-05-28', 2, 101, 750000),
(4, 1, 'A01', '2020-05-23', '2020-05-27', 3, 205, 10000000),
(5, 2, 'A02', '2020-05-22', '2020-05-23', 1, 204, 2000000);

-- --------------------------------------------------------

--
-- Structure for view `cekid`
--
DROP TABLE IF EXISTS `cekid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cekid`  AS  select ucase(`pengunjung`.`nama`) AS `nama`,`pengunjung`.`alamat` AS `alamat`,`pengunjung`.`jk` AS `jk`,`pengunjung`.`no_hp` AS `no_hp`,`pengunjung`.`no_ktp` AS `no_ktp`,`transaksi`.`tanggal_masuk` AS `tanggal_masuk`,`transaksi`.`tanggal_keluar` AS `tanggal_keluar` from (`transaksi` join `pengunjung` on((`transaksi`.`id_pengunjung` = `pengunjung`.`id_pengunjung`))) ;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
