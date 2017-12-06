-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 12:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `event_organizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(1, 'Administrasi', 1, '2017-12-06 11:21:59', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`id` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `id_wilayah`, `nama`, `hari`, `waktu_mulai`, `waktu_selesai`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(4, 4, 'Rumahqu', 'Senin', '12:40:00', '00:00:00', 1, '2017-12-06 11:30:25', 0, NULL),
(5, 4, 'Rumahqu', 'Senin', '12:40:00', '00:00:00', 1, '2017-12-06 11:30:25', 0, NULL),
(6, 4, 'Rumahmu', 'Senin', '00:00:00', '00:00:00', 1, '2017-12-06 11:30:45', 0, NULL),
(7, 4, 'ey', 'Senin', '465:46:54', '00:00:00', 1, '2017-12-06 11:30:57', 0, NULL),
(8, 4, 'asdasd', 'Senin', '12:40:00', '12:45:00', 1, '2017-12-06 11:31:10', 0, NULL),
(9, 4, 'asdasd', 'Senin', '12:40:00', '12:45:00', 1, '2017-12-06 11:43:14', 0, NULL),
(10, 4, 'hgkkh', 'Minggu', '04:13:00', '17:55:00', 1, '2017-12-06 11:43:52', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE IF NOT EXISTS `honor` (
`id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `tanggal_event` date NOT NULL,
  `gaji` double NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`nip` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `entry_honor` tinyint(1) NOT NULL,
  `koordinator` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2147483647 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`nip`, `password`, `nama`, `id_posisi`, `email`, `hp`, `rekening`, `entry_honor`, `koordinator`, `admin`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(2147483647, 'admin123', 'Adm00n', 8, 'ad@m00.n', '085645621324', '7512356489', 0, 0, 1, 1, '2017-12-06 11:25:34', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE IF NOT EXISTS `posisi` (
`id` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gaji` double NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `id_bagian`, `nama`, `gaji`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(8, 1, 'Admin', 100000, 1, '2017-12-06 11:23:49', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE IF NOT EXISTS `wilayah` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(4, 'Surabaya', 1, '2017-12-06 11:29:55', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
 ADD PRIMARY KEY (`id`), ADD KEY `entry_user` (`entry_user`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`id`), ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
 ADD PRIMARY KEY (`id`), ADD KEY `id_event` (`id_event`), ADD KEY `id_personal` (`id_personal`), ADD KEY `id_posisi` (`id_posisi`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
 ADD PRIMARY KEY (`nip`), ADD KEY `id_posisi` (`id_posisi`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
 ADD PRIMARY KEY (`id`), ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`);

--
-- Constraints for table `honor`
--
ALTER TABLE `honor`
ADD CONSTRAINT `honor_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`),
ADD CONSTRAINT `honor_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`nip`),
ADD CONSTRAINT `honor_ibfk_3` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id`);

--
-- Constraints for table `personal`
--
ALTER TABLE `personal`
ADD CONSTRAINT `personal_ibfk_2` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id`);

--
-- Constraints for table `posisi`
--
ALTER TABLE `posisi`
ADD CONSTRAINT `posisi_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
