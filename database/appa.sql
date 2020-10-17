-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 04:53 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jk`, `tempat_lahir`, `tanggal_lahir`, `username`, `password`) VALUES
(2, 'Kazuyami', 'L', 'Serang', '03-05-1998', 'iandzillanmalik', '0879a2a818aae47080feb10aa02b4c85');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `alamat` varchar(500) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `nohp`, `username`, `password`) VALUES
('1202160294', 'Ian Dzillan Malik', 'Serang', '03/05/1998', 'L', 'Cilegon', '082216651071', 'iandzillan', '9b534531f56f2849feeec30e43b30dcc'),
('12121212', 'ddd', 'ddd', '02/04/2020', 'L', 'dd', 'dd', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(30) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `pengaduan` text,
  `tanggal` varchar(10) NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT '1',
  `kategori` varchar(200) NOT NULL,
  `lat` varchar(200) NOT NULL,
  `long` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nik`, `pengaduan`, `tanggal`, `file`, `status`, `id_admin`, `kategori`, `lat`, `long`, `lokasi`) VALUES
(1, '1202160294', 'Tesing API lagi', '06-12-2019', 'Screenshot_(512).png', 0, 2, 'Pelecehan Seksual', '-6.9696681', '107.6363705', 'Cipagalo Kecamatan Bojongsoang Bandung Jawa Barat Indonesia 40287 '),
(2, '1202160294', 'testing', '12-12-2019', 'Screenshot_(415).png', 0, 2, 'KDRT', '-6.970969', '107.643127', '3b Jalan Ciganitri Cipagalo Kecamatan Bojongsoang Bandung Jawa Barat 40288'),
(3, '1202160294', 'Testing Android', '12-12-2019', 'Screenshot_(415)1.png', 1, 1, 'Penganiyayaan', '-6.970969', '107.643127', '3b Jalan Ciganitri Cipagalo Kecamatan Bojongsoang Bandung Jawa Barat 40288');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `cons_admin` (`id_admin`),
  ADD KEY `pengaduan_ibfk_1` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
