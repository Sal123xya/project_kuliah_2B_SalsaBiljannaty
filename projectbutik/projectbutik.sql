-- --------------------------------------------------------
-- Host:                         154.41.240.125
-- Server version:               10.6.15-MariaDB-cll-lve - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table u419014200_niarbutik.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint(20) NOT NULL,
  `nominal_uang` bigint(20) DEFAULT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u419014200_niarbutik.tb_bayar: ~1 rows (approximately)
INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
	(2312181011630, 200000, 200000, '2023-12-21 08:23:42');

-- Dumping structure for table u419014200_niarbutik.tb_daftar_product
CREATE TABLE IF NOT EXISTS `tb_daftar_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) DEFAULT NULL,
  `nama_product` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kategori` int(5) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `stok` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_daftar_product_tb_kategori_product` (`kategori`),
  CONSTRAINT `FK_tb_daftar_product_tb_kategori_product` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_product` (`id_kat_product`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u419014200_niarbutik.tb_daftar_product: ~5 rows (approximately)
INSERT INTO `tb_daftar_product` (`id`, `foto`, `nama_product`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
	(1, '39426_blouse organza.jpeg', 'Blouse Organza', 'Bahan adem', 1, '20000', '20'),
	(3, '27736_65174_dress silk.jpeg', 'dress silk', 'fghjk', 2, '150000', '20'),
	(4, '64600_38297_Kebaya Formal.jpeg', 'Kebaya ', 'cocok untuk wisuda', 3, '200000', '15'),
	(5, '40680_28366_10415_dress korea.jpeg', 'Dress Korea', 'Yang buatnya orang korea', 2, '300000', '20'),
	(6, '14635_blouse korea.jpeg', 'Blouse Korea', '', 1, '50000', '2');

-- Dumping structure for table u419014200_niarbutik.tb_kategori_product
CREATE TABLE IF NOT EXISTS `tb_kategori_product` (
  `id_kat_product` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_product` int(10) DEFAULT NULL,
  `kategori_product` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kat_product`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u419014200_niarbutik.tb_kategori_product: ~3 rows (approximately)
INSERT INTO `tb_kategori_product` (`id_kat_product`, `jenis_product`, `kategori_product`) VALUES
	(1, 1, 'Baju Santai'),
	(2, 2, 'Dress Wanita'),
	(3, 3, 'Kebaya formal');

-- Dumping structure for table u419014200_niarbutik.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `product` int(10) DEFAULT NULL,
  `kode_order` bigint(20) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_list_order`),
  KEY `product` (`product`),
  KEY `order` (`kode_order`) USING BTREE,
  CONSTRAINT `FK_tb_list_order_tb_daftar_product` FOREIGN KEY (`product`) REFERENCES `tb_daftar_product` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u419014200_niarbutik.tb_list_order: ~3 rows (approximately)
INSERT INTO `tb_list_order` (`id_list_order`, `product`, `kode_order`, `jumlah`, `status`) VALUES
	(2, 4, 2312181011630, 1, NULL),
	(3, 4, 2312180955923, 1, 2),
	(4, 3, 2312211551319, 1, NULL);

-- Dumping structure for table u419014200_niarbutik.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` bigint(20) NOT NULL,
  `pelanggan` varchar(50) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `waktu_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_order`),
  KEY `pelayan` (`admin`) USING BTREE,
  CONSTRAINT `FK_tb_order_tb_user` FOREIGN KEY (`admin`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u419014200_niarbutik.tb_order: ~3 rows (approximately)
INSERT INTO `tb_order` (`id_order`, `pelanggan`, `admin`, `alamat`, `waktu_order`) VALUES
	(2312180955923, 'Salsa Biljannaty', NULL, 'panggoi', '2023-12-18 02:56:09'),
	(2312181011630, 'Nazara ', NULL, 'nibong', '2023-12-18 03:46:58'),
	(2312211551319, 'Putri Cahyana', NULL, 'cunda', '2023-12-21 08:52:19');

-- Dumping structure for table u419014200_niarbutik.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u419014200_niarbutik.tb_user: ~8 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(2, 'admin', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '085266738210', 'jalan merdeka'),
	(13, 'salsa biljannaty', 'salsa.biljannaty@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '082162094017', 'Panggoi indah, muara dua, kota Lhokseumawe,aceh'),
	(14, 'abc1', 'abc1@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '085260737641', 'jakarta'),
	(16, 'abc', 'abc@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '7654', 'kjhgfd'),
	(17, 'Putri Cahyana', 'pcy@pcy.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '23456789', 'sdfghjkl'),
	(18, 'Afifah Thahira', 'afifah24@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '08987654', 'nibong'),
	(19, 'Salsa ', 'salsa@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '3456789', 'panggoi'),
	(20, 'Raisa Hafizah', 'Raisa@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '085288765431', 'nisam');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
