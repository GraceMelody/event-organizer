-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 05:39 PM
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
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `aktif`) VALUES
(1, 'Bagian 1', 0),
(2, 'Bagian 2', 1);

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
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `id_wilayah`, `nama`, `hari`, `waktu_mulai`, `waktu_selesai`, `aktif`) VALUES
(1, 3, 'ABC', 'Rabu', '00:00:00', '00:00:00', 1),
(2, 3, 'ABC', 'Rabu', '00:00:00', '00:00:00', 1),
(3, 2, 'Minggu Pgi', 'Minggu', '08:00:00', '10:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE IF NOT EXISTS `honor` (
`id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`nip` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `koordinator` tinyint(1) NOT NULL,
  `entry_honor` tinyint(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`nip`, `nama`, `id_bagian`, `email`, `hp`, `rekening`, `koordinator`, `entry_honor`, `aktif`) VALUES
(1, 'Lala', 1, 'la@la.com', '02665', '23654651', 1, 0, 1),
(12, 'Epuns', 2, 'e@pun.z', '516516', '512313', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE IF NOT EXISTS `posisi` (
`id` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gaji` double NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `id_bagian`, `nama`, `gaji`, `aktif`) VALUES
(1, 2, 'posisi', 123, 0),
(2, 2, 'posisi2', 123, 0),
(5, 1, 'hello', 4444, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE IF NOT EXISTS `wilayah` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `aktif`) VALUES
(1, 'Hello', 0),
(2, 'Surabaya', 1),
(3, 'Bandung', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
 ADD PRIMARY KEY (`id`);

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
 ADD PRIMARY KEY (`nip`), ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
 ADD PRIMARY KEY (`id`), ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`);

--
-- Constraints for table `posisi`
--
ALTER TABLE `posisi`
ADD CONSTRAINT `posisi_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
