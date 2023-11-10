-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mcu
CREATE DATABASE IF NOT EXISTS `mcu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `mcu`;

-- Dumping structure for table mcu.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `idkaryawan` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `instansi` varchar(60) DEFAULT NULL,
  `created_add` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`idkaryawan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table mcu.karyawan: ~2 rows (approximately)
DELETE FROM `karyawan`;
INSERT INTO `karyawan` (`idkaryawan`, `id`, `nama`, `tgl_lahir`, `alamat`, `status`, `jk`, `instansi`, `created_add`) VALUES
	(1, 123, 'Riyanto', '1991-09-16', 'Banjarbaru', 'Tetap', 'Laki-laki', 'PT. BIB', '2023-10-11 00:00:00'),
	(4, 456, 'Siti Patimah', '1992-02-13', 'Jl. A. Yani km 30 Banjarbaru, Kec. Landasan Ulin, Prov Kalimantan Selatan', 'Tetap', 'Perempuan', 'PT. Binuang Mitra Bersama', '2023-10-18 14:55:23'),
	(5, 230116, 'Ichsan Guntur Prasetia', '1989-04-12', 'Batulicin, Plajau karang jawa.', 'Tetap', 'Laki-laki', 'PT.BIB', '2023-11-09 17:55:19');

-- Dumping structure for table mcu.login
CREATE TABLE IF NOT EXISTS `login` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table mcu.login: ~1 rows (approximately)
DELETE FROM `login`;
INSERT INTO `login` (`iduser`, `email`, `password`, `username`) VALUES
	(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin');

-- Dumping structure for table mcu.sehat
CREATE TABLE IF NOT EXISTS `sehat` (
  `idsehat` int(11) NOT NULL AUTO_INCREMENT,
  `idkaryawan` int(11) DEFAULT NULL,
  `dokter` varchar(50) DEFAULT NULL,
  `klinik` varchar(50) DEFAULT NULL,
  `izin_klinik` varchar(50) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) NOT NULL DEFAULT 0,
  `keluhan` varchar(255) DEFAULT NULL,
  `tekanan_darah` varchar(30) DEFAULT NULL,
  `nafas` int(11) DEFAULT NULL,
  `suhu` varchar(10) DEFAULT NULL,
  `saturasi_o2` varchar(10) DEFAULT NULL,
  `syarat` varchar(50) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `create_add` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idsehat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table mcu.sehat: ~1 rows (approximately)
DELETE FROM `sehat`;
INSERT INTO `sehat` (`idsehat`, `idkaryawan`, `dokter`, `klinik`, `izin_klinik`, `berat_badan`, `tinggi_badan`, `keluhan`, `tekanan_darah`, `nafas`, `suhu`, `saturasi_o2`, `syarat`, `tgl_daftar`, `create_add`) VALUES
	(1, 4, 'dr. Ilham P', 'Klinik PPA', '100', 60, 158, 'Batuk berdahak', '128', 30, '37', '', 'baik', '2023-11-07', '2023-11-07 03:40:41');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
