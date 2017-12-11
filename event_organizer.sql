-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 07:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_organizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(1, 'Administrasi', 1, '2017-12-06 11:21:59', 0, NULL),
(3, 'Kucing', 1, '2017-12-07 07:05:20', 0, NULL),
(4, 'Doggo', 1, '2017-12-07 07:05:26', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 4, 'hgkkh', 'Minggu', '04:13:00', '17:55:00', 1, '2017-12-06 11:43:52', 0, NULL),
(11, 4, '', 'Senin', '00:00:00', '00:00:00', 1, '2017-12-07 07:02:43', 0, NULL),
(12, 5, 'Asdf', 'Senin', '00:00:00', '00:00:00', 1, '2017-12-07 07:04:22', 0, NULL),
(13, 4, '123', 'Sabtu', '13:02:00', '15:04:00', 1, '2017-12-09 16:10:03', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE `honor` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `tanggal_event` date NOT NULL,
  `gaji` double NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  `delete_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honor`
--

INSERT INTO `honor` (`id`, `id_event`, `id_personal`, `id_posisi`, `tanggal_event`, `gaji`, `entry_date`, `entry_user`, `delete_time`, `delete_user`) VALUES
(16, 4, 2147483647, 8, '2017-12-03', 100000, '2017-12-07 06:56:08', 2147483647, '2017-12-11 06:54:21', 2147483647),
(17, 4, 123, 8, '2017-12-03', 100000, '2017-12-07 06:56:10', 2147483647, NULL, 0),
(18, 4, 123, 8, '2017-12-03', 100000, '2017-12-07 06:56:30', 2147483647, NULL, 0),
(22, 4, 123, 8, '2017-12-03', 100000, '2017-12-07 06:58:00', 2147483647, NULL, 0),
(23, 4, 2147483647, 8, '2017-12-03', 100000, '2017-12-07 06:58:03', 2147483647, '2017-12-11 06:54:59', 2147483647),
(24, 4, 123, 8, '2017-12-03', 100000, '2017-12-07 06:58:06', 2147483647, NULL, 0),
(28, 4, 12322, 8, '0000-00-00', 100000, '2017-12-07 07:33:05', 2147483647, NULL, 0),
(29, 4, 123, 8, '0000-00-00', 100000, '2017-12-07 07:33:07', 2147483647, NULL, 0),
(30, 4, 123, 8, '0000-00-00', 100000, '2017-12-07 07:33:07', 2147483647, NULL, 0),
(31, 4, 12322, 8, '2017-12-03', 100000, '2017-12-07 07:34:32', 2147483647, NULL, 0),
(32, 4, 12322, 8, '2017-12-03', 100000, '2017-12-07 07:34:32', 2147483647, NULL, 0),
(33, 4, 123, 8, '2017-12-03', 100000, '2017-12-07 07:34:36', 2147483647, NULL, 0),
(34, 4, 123, 8, '2017-12-03', 100000, '2017-12-07 07:34:36', 2147483647, NULL, 0),
(41, 13, 2147483647, 8, '2017-12-01', 100000, '2017-12-11 06:38:31', 2147483647, '2017-12-11 06:51:49', 2147483647),
(42, 13, 222, 8, '2017-12-01', 100000, '2017-12-11 06:52:42', 2147483647, '2017-12-11 06:52:51', 2147483647),
(43, 13, 12322, 8, '2017-12-01', 100000, '2017-12-11 06:52:45', 2147483647, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`nip`, `password`, `nama`, `id_posisi`, `email`, `hp`, `rekening`, `entry_honor`, `koordinator`, `admin`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(6, '', '', 8, '', '0', '0', 0, 0, 0, 1, '2017-12-09 16:02:08', 2147483647, NULL),
(66, '', '', 8, '', '0', '0', 0, 0, 0, 1, '2017-12-09 16:02:12', 2147483647, NULL),
(123, '', '', 8, '', '0', '0', 0, 0, 0, 0, '2017-12-07 06:49:19', 2147483647, NULL),
(222, '', 'Basic', 8, 'basic@eo', '123', '234', 0, 0, 0, 1, '2017-12-07 08:38:23', 2147483647, NULL),
(555, '', '', 8, '', '0', '0', 0, 0, 0, 1, '2017-12-09 15:59:51', 2147483647, NULL),
(666, '', '', 8, '', '0', '0', 0, 0, 0, 1, '2017-12-09 16:02:02', 2147483647, NULL),
(3333, '', '', 8, '', '0', '0', 0, 0, 0, 1, '2017-12-09 16:00:28', 2147483647, NULL),
(12322, '', 'asdf', 8, 'asdf', '0', '0', 0, 0, 0, 1, '2017-12-07 07:32:22', 2147483647, NULL),
(44444444, '', '', 8, '', '0', '0', 0, 0, 0, 1, '2017-12-09 15:58:22', 2147483647, NULL),
(2147483647, 'admin123', 'Adm00n', 8, 'ad@m00.n', '085645621324', '7512356489', 0, 0, 1, 1, '2017-12-06 11:25:34', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gaji` double NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `id_bagian`, `nama`, `gaji`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(8, 1, 'Admin', 100000, 1, '2017-12-06 11:23:49', 0, NULL),
(9, 1, 'Bojo', 100000, 1, '2017-12-07 07:12:07', 0, NULL),
(10, 1, 'Ar', 1233, 1, '2017-12-09 16:03:46', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `aktif`, `entry_date`, `entry_user`, `deleted`) VALUES
(4, 'Surabaya', 1, '2017-12-06 11:29:55', 0, NULL),
(5, 'asd', 1, '2017-12-07 06:59:51', 0, NULL),
(6, '', 1, '2017-12-07 07:00:42', 0, NULL),
(7, '', 1, '2017-12-07 07:00:44', 0, NULL),
(8, '', 1, '2017-12-07 07:00:50', 0, NULL),
(9, '', 1, '2017-12-07 07:00:53', 0, NULL),
(10, 'Surabaya', 1, '2017-12-07 07:02:18', 0, NULL),
(11, 'asd', 1, '2017-12-07 07:02:21', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entry_user` (`entry_user`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_posisi` (`id_posisi`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_posisi` (`id_posisi`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bagian` (`id_bagian`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
