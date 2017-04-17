-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 07:42 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE IF NOT EXISTS `anak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `fk_pegawai` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pegawai_anak` (`fk_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id`, `nama`, `tanggalLahir`, `fk_pegawai`) VALUES
(1, 'Umar Khairullah Al Fatih', '2017-10-10', 1),
(2, 'Usman Khairullah Al Fatih', '2019-10-10', 1),
(3, 'Bujang Kelana', '2017-11-11', 2),
(4, 'Tere Liyane', '2018-11-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_pegawai`
--

CREATE TABLE IF NOT EXISTS `jabatan_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaJabatan` varchar(255) NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalSelesai` date NOT NULL,
  `fk_pegawai` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pegawai` (`fk_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jabatan_pegawai`
--

INSERT INTO `jabatan_pegawai` (`id`, `namaJabatan`, `tanggalMulai`, `tanggalSelesai`, `fk_pegawai`) VALUES
(1, 'The Conquerror', '1945-01-01', '1954-01-01', 1),
(2, 'The Wise Leader', '1954-01-02', '1964-01-01', 1),
(3, 'The Novelist', '2000-10-10', '2010-10-10', 2),
(4, 'The Epic Novelist', '2010-10-10', '2015-10-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `tanggalLahir`, `alamat`) VALUES
(1, 'Muhammad Al Fatih', '198611032014041001', '1986-03-11', 'Jalan Konstantinopel no 1945'),
(2, 'Tere Liye', '196811032014041001', '1968-03-11', 'Jalan Negeri di ujung tanduk no 99'),
(5, 'Tamara Dhea p', '12345678910', '2017-03-23', 'Kesumba No.30 f Malang'),
(7, 'Fandy Ramadhan', '1357558809100', '2017-03-15', 'Jalan Tawangrejo 12'),
(9, 'Tamara Pramesti', '1542288011353', '1997-07-06', 'Ds.Wayut RT.28 RW.07 Kec.Jiwan Kab.Madiun');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `fk_pegawai_anak` FOREIGN KEY (`fk_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`fk_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
