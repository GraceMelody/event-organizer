/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 5.6.21 : Database - event_organizer
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`event_organizer` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `event_organizer`;

/*Table structure for table `bagian` */

DROP TABLE IF EXISTS `bagian`;

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bagian` */

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_wilayah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_wilayah` (`id_wilayah`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `event` */

/*Table structure for table `honor` */

DROP TABLE IF EXISTS `honor`;

CREATE TABLE `honor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_event` (`id_event`),
  KEY `id_personal` (`id_personal`),
  KEY `id_posisi` (`id_posisi`),
  CONSTRAINT `honor_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`),
  CONSTRAINT `honor_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`nip`),
  CONSTRAINT `honor_ibfk_3` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `honor` */

/*Table structure for table `personal` */

DROP TABLE IF EXISTS `personal`;

CREATE TABLE `personal` (
  `nip` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `koordinator` tinyint(1) NOT NULL,
  `entry_honor` tinyint(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_bagian` (`id_bagian`),
  CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personal` */

/*Table structure for table `posisi` */

DROP TABLE IF EXISTS `posisi`;

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gaji` double NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bagian` (`id_bagian`),
  CONSTRAINT `posisi_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `posisi` */

/*Table structure for table `wilayah` */

DROP TABLE IF EXISTS `wilayah`;

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wilayah` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
