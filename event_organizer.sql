-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 09:58 AM
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
  `entry_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `aktif`, `entry_date`, `entry_user`) VALUES
(1, 'Bagian 1', 1, '2017-12-04 08:27:47', 0),
(2, 'Bagian 2', 1, '2017-12-04 08:27:47', 0),
(3, 'ADMIN', 0, '2017-12-04 08:36:39', 0);

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
  `entry_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `id_wilayah`, `nama`, `hari`, `waktu_mulai`, `waktu_selesai`, `aktif`, `entry_date`, `entry_user`) VALUES
(1, 3, 'ABC', 'Rabu', '00:00:00', '00:00:00', 1, '2017-12-04 08:28:34', 0),
(2, 3, 'ABC', 'Rabu', '00:00:00', '00:00:00', 1, '2017-12-04 08:28:34', 0),
(3, 2, 'Minggu Pgi', 'Minggu', '08:00:00', '10:00:00', 0, '2017-12-04 08:28:34', 0);

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
  `entry_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honor`
--

INSERT INTO `honor` (`id`, `id_event`, `id_personal`, `id_posisi`, `tanggal_event`, `gaji`, `entry_date`, `entry_user`) VALUES
(1, 1, 1, 1, '0000-00-00', 0, '2017-12-04 08:29:19', 0),
(2, 3, 2, 2, '0000-00-00', 0, '2017-12-04 08:29:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `nip` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `koordinator` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`nip`, `password`, `nama`, `id_bagian`, `email`, `hp`, `rekening`, `koordinator`, `admin`, `aktif`, `entry_date`, `entry_user`) VALUES
(0, 'admin123', 'Admin', 1, 'admin@admin', '123123123', '123123123', 0, 1, 1, '2017-12-04 08:36:00', 0),
(1, '', 'Bojo', 1, 'asdf@saf.com', '123123123', '98798789797897', 0, 0, 1, '2017-12-04 08:29:40', 0),
(2, '', 'Bojo23', 2, 'asdf@saf.com', '123123123', '98798789797897', 0, 0, 1, '2017-12-04 08:29:40', 0),
(123, '', 'Evans Jahja', 1, 'evans.jahja@yahoo.com', '0', '0', 0, 0, 1, '2017-12-04 08:29:40', 0),
(567, '', 'Haha', 2, 'hehe', '234234', '345345', 0, 0, 1, '2017-12-04 08:29:40', 0),
(568, '', '', 1, '', '0', '0', 1, 1, 1, '2017-12-04 08:29:40', 0),
(569, '', '', 1, '', '0', '0', 1, 0, 1, '2017-12-04 08:29:40', 0),
(793287, '', 'mumu', 1, 'mu@mu.mu', '829891', '0', 0, 0, 1, '2017-12-04 08:29:40', 0);

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
  `entry_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `id_bagian`, `nama`, `gaji`, `aktif`, `entry_date`, `entry_user`) VALUES
(1, 2, 'posisi', 123, 0, '2017-12-04 08:29:58', 0),
(2, 2, 'posisi2', 123, 1, '2017-12-04 08:29:58', 0),
(5, 1, 'hello', 4444, 1, '2017-12-04 08:29:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `aktif`, `entry_date`, `entry_user`) VALUES
(1, 'Hello', 0, '2017-12-04 08:30:13', 0),
(2, 'Surabaya', 1, '2017-12-04 08:30:13', 0),
(3, 'Bandung', 1, '2017-12-04 08:30:13', 0);

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
  ADD KEY `id_bagian` (`id_bagian`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=793290;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bagian`
--
ALTER TABLE `bagian`
  ADD CONSTRAINT `bagian_ibfk_1` FOREIGN KEY (`entry_user`) REFERENCES `personal` (`nip`);

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
