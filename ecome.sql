# MySQL-Front 5.0  (Build 1.0)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: ecome
# ------------------------------------------------------
# Server version 5.5.27

DROP DATABASE IF EXISTS `ecome`;
CREATE DATABASE `ecome` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ecome`;

#
# Table structure for table alt_customer
#

CREATE TABLE `alt_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jelas` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(40) DEFAULT NULL,
  `jenis_kelamin` varchar(40) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `provinsi` varchar(40) DEFAULT NULL,
  `kota` varchar(40) DEFAULT NULL,
  `kode_pos` varchar(40) DEFAULT NULL,
  `idCustomer` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
INSERT INTO `alt_customer` VALUES (2,'sadfsafsaf','safsafasfas','Pria','fsafasfasfasdf','asfasfasf','Bandung','adfasfasf',2,5);
INSERT INTO `alt_customer` VALUES (3,'asdfasfasf','asdfafasf','Pria','safasfsafsaf','safsafsaf','Depok','ssadfsfasfasf',2,5);
INSERT INTO `alt_customer` VALUES (4,'adsfasfas','fasdfasfasf','Pria','safasfasf','asdfasfasf','Tangerang','adfasdfasdf',2,5);
INSERT INTO `alt_customer` VALUES (5,'adsfasfas','fasdfasfasf','Pria','safasfasf','asdfasfasf','Tangerang','adfasdfasdf',2,5);
INSERT INTO `alt_customer` VALUES (6,'sadfdsaf','asfasfsafsafasfasf','Pria','asdfasdf','sadfsafd','Jakarta','sadfdsaf',2,5);
INSERT INTO `alt_customer` VALUES (7,'','','Pria','','','','',2,5);
INSERT INTO `alt_customer` VALUES (8,'Ryan Gosling','089656525375','Pria','ana inu','DKI Jakarta','Jakarta','13120',2,5);
/*!40000 ALTER TABLE `alt_customer` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table artikel
#

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `isi` text,
  `tgl_input` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `input_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
INSERT INTO `artikel` VALUES (109,'ini artikel','ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ini artikel ','f4b5759b64059afc231b055dd9e4d206.jpg','ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;ini artikel&nbsp;','2014-03-17 14:03:40',NULL,NULL,NULL);
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table banner
#

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambarBanner` varchar(255) DEFAULT NULL,
  `isActive` char(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
INSERT INTO `banner` VALUES (3,'942938bece7254a6d784e06dc988fbef.jpg','0');
INSERT INTO `banner` VALUES (4,'7a388638342d5875372dbe128cff1532.jpg','1');
INSERT INTO `banner` VALUES (5,'e0f9dbda426755b3a89cff5cf0989232.jpg','0');
INSERT INTO `banner` VALUES (6,'96ba2fcee21d603c9ee5cfb8ced7455c.jpg','0');
INSERT INTO `banner` VALUES (7,'a805e19bd3d4ce46794857bcecbb3312.jpg','0');
INSERT INTO `banner` VALUES (8,'8106bc22a01f2428d0971895f088587c.jpg','1');
INSERT INTO `banner` VALUES (9,'530f89bc25269f3ba4c3b7f00c01052c.jpg','0');
INSERT INTO `banner` VALUES (10,'f080b6aff2636b89a1506c4993101dfc.jpg','0');
INSERT INTO `banner` VALUES (11,'9f225631da450839fec78384c64fb24e.JPG','1');
INSERT INTO `banner` VALUES (12,'e46dccd530602ddad7f655a32c06fe9d.jpg','0');
INSERT INTO `banner` VALUES (14,'50fd66dd1b48b4d790f98d3de7dadb91.jpg','1');
INSERT INTO `banner` VALUES (15,'63531a3ff383911255b0b4ed307194de.jpg','0');
INSERT INTO `banner` VALUES (16,'7bee965a1d8703058f5bff02046d47c4.jpg','0');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table customer
#

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jelas` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(40) DEFAULT NULL,
  `jenis_kelamin` varchar(40) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `provinsi` int(11) DEFAULT '0',
  `kota` int(11) DEFAULT '0',
  `kode_pos` varchar(40) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_customer` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
INSERT INTO `customer` VALUES (1,'Jimmy Samanda Rasu','089656525375','Pria','jl ini itu suka suka',12,164,'13120',4);
INSERT INTO `customer` VALUES (2,'Jimmy Samanda','089656525375','Pria','jl suka suka',12,164,'13120',5);
INSERT INTO `customer` VALUES (5,'asdfsaf asfdasf','123213123213','Pria','sadfsafasf',12,164,'13120',8);
INSERT INTO `customer` VALUES (6,'Samanda','089656525374','Pria','jl. duren no 6',12,164,'13120',9);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table gambar_produk
#

CREATE TABLE `gambar_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_gambar` varchar(255) DEFAULT NULL,
  `idProduk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
INSERT INTO `gambar_produk` VALUES (1,'1fe379cf54964dca07b0fb90a92ee441.jpg',54);
INSERT INTO `gambar_produk` VALUES (2,'e9babe8a6c080f7c3dff9e8116c0dd9b.jpg',54);
INSERT INTO `gambar_produk` VALUES (3,'cd39dc63fc04f7d3f17b9aa0624de016.jpg',54);
INSERT INTO `gambar_produk` VALUES (4,'281b3df5ed7b3717ad5bd225e5fc02a6.jpg',28);
INSERT INTO `gambar_produk` VALUES (5,'47cb8c69a41cbd3dac02fd14378a0486.jpg',28);
INSERT INTO `gambar_produk` VALUES (6,'137e79dab4ab5f33f60d78ebc90bcc99.JPG',28);
INSERT INTO `gambar_produk` VALUES (7,'96e112101b900b0f4b97659e9c323fd1.jpg',106);
INSERT INTO `gambar_produk` VALUES (8,'cf64e98a8ae505eeac67ae056a51304b.jpg',106);
INSERT INTO `gambar_produk` VALUES (9,'eec5bb7dd14a4d78a32e404b07c9022a.jpg',106);
INSERT INTO `gambar_produk` VALUES (10,'0dac5cebbebceb11aadf233d8c715d17.jpeg',29);
INSERT INTO `gambar_produk` VALUES (11,'85f72b1e91d81cd2a52b98ae267c7312.jpg',29);
INSERT INTO `gambar_produk` VALUES (12,'3d8078aa7d30280b3c2135f8c9b48d4d.jpg',29);
INSERT INTO `gambar_produk` VALUES (13,'c9143039e3b62e5a02bb90fb752ad1e6.jpg',30);
INSERT INTO `gambar_produk` VALUES (14,'72c9305baac1dabab09b0941c40b7e39.jpg',30);
INSERT INTO `gambar_produk` VALUES (15,'e2209febe6091535c74a4562c0ed5295.jpg',30);
/*!40000 ALTER TABLE `gambar_produk` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table iklan
#

CREATE TABLE `iklan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambarIklan` varchar(255) DEFAULT NULL,
  `isActive` char(1) DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
INSERT INTO `iklan` VALUES (16,'e59705e0629aeb4bf4eb381567273aca.jpg','1',NULL);
INSERT INTO `iklan` VALUES (17,'8224f945d151f7b644dee2352e3fa00a.jpg','1',NULL);
INSERT INTO `iklan` VALUES (18,'feb0edb1040b69798dd85f18736f5a96.jpg','0',NULL);
INSERT INTO `iklan` VALUES (19,'8cb1fd5890a174c24f65e623a4ad5a3b.jpg','0',NULL);
INSERT INTO `iklan` VALUES (20,'de039e213dd4c9abe3b36ff0802ee4cd.jpg','1',NULL);
INSERT INTO `iklan` VALUES (21,'9761c6d2fbf75e5dc43672a614145d7e.jpg','0',NULL);
INSERT INTO `iklan` VALUES (22,'1ca332ff4b7c6087e134a0714cc5a4cd.png','0','http://www.blabal.com');
/*!40000 ALTER TABLE `iklan` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table kategori
#

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaKategori` varchar(255) DEFAULT NULL,
  `idx` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
INSERT INTO `kategori` VALUES (17,'Komputer','2');
INSERT INTO `kategori` VALUES (23,'Smartphone','3');
INSERT INTO `kategori` VALUES (24,'Notebook','1');
INSERT INTO `kategori` VALUES (25,'Server','4');
INSERT INTO `kategori` VALUES (26,'Router','5');
INSERT INTO `kategori` VALUES (27,'Switch','6');
INSERT INTO `kategori` VALUES (28,'UPS','7');
INSERT INTO `kategori` VALUES (29,'Cabling','8');
INSERT INTO `kategori` VALUES (30,'Wireless','9');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table kategori_merk
#

CREATE TABLE `kategori_merk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idKategori` int(11) NOT NULL,
  `idMerk` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idKategori`,`idMerk`),
  KEY `kategori_kategori_merk` (`idKategori`),
  KEY `merk_kategori_merk` (`idMerk`)
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;
INSERT INTO `kategori_merk` VALUES (160,17,2);
INSERT INTO `kategori_merk` VALUES (161,17,3);
INSERT INTO `kategori_merk` VALUES (162,17,4);
INSERT INTO `kategori_merk` VALUES (163,23,2);
INSERT INTO `kategori_merk` VALUES (164,23,3);
INSERT INTO `kategori_merk` VALUES (165,23,4);
INSERT INTO `kategori_merk` VALUES (168,17,1);
INSERT INTO `kategori_merk` VALUES (169,24,1);
INSERT INTO `kategori_merk` VALUES (170,23,15);
INSERT INTO `kategori_merk` VALUES (171,25,1);
INSERT INTO `kategori_merk` VALUES (172,25,2);
INSERT INTO `kategori_merk` VALUES (173,26,16);
INSERT INTO `kategori_merk` VALUES (174,26,17);
INSERT INTO `kategori_merk` VALUES (175,26,18);
INSERT INTO `kategori_merk` VALUES (176,27,17);
INSERT INTO `kategori_merk` VALUES (177,27,18);
INSERT INTO `kategori_merk` VALUES (178,28,1);
INSERT INTO `kategori_merk` VALUES (179,29,2);
INSERT INTO `kategori_merk` VALUES (180,30,16);
INSERT INTO `kategori_merk` VALUES (181,30,18);
/*!40000 ALTER TABLE `kategori_merk` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table master_city
#

CREATE TABLE `master_city` (
  `city_id` int(4) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) DEFAULT NULL,
  `city_state_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=498 DEFAULT CHARSET=latin1;
INSERT INTO `master_city` VALUES (1,'Kabupaten Aceh Barat',1);
INSERT INTO `master_city` VALUES (2,'Kabupaten Aceh Barat Daya',1);
INSERT INTO `master_city` VALUES (3,'Kabupaten Aceh Besar',1);
INSERT INTO `master_city` VALUES (4,'Kabupaten Aceh Jaya',1);
INSERT INTO `master_city` VALUES (5,'Kabupaten Aceh Selatan',1);
INSERT INTO `master_city` VALUES (6,'Kabupaten Aceh Singkil',1);
INSERT INTO `master_city` VALUES (7,'Kabupaten Aceh Tamiang',1);
INSERT INTO `master_city` VALUES (8,'Kabupaten Aceh Tengah',1);
INSERT INTO `master_city` VALUES (9,'Kabupaten Aceh Tenggara',1);
INSERT INTO `master_city` VALUES (10,'Kabupaten Aceh Timur',1);
INSERT INTO `master_city` VALUES (11,'Kabupaten Aceh Utara',1);
INSERT INTO `master_city` VALUES (12,'Kabupaten Bener Meriah',1);
INSERT INTO `master_city` VALUES (13,'Kabupaten Bireuen',1);
INSERT INTO `master_city` VALUES (14,'Kabupaten Gayo Luwes',1);
INSERT INTO `master_city` VALUES (15,'Kabupaten Nagan Raya',1);
INSERT INTO `master_city` VALUES (16,'Kabupaten Pidie',1);
INSERT INTO `master_city` VALUES (17,'Kabupaten Pidie Jaya',1);
INSERT INTO `master_city` VALUES (18,'Kabupaten Simeulue',1);
INSERT INTO `master_city` VALUES (19,'Kota Banda Aceh',1);
INSERT INTO `master_city` VALUES (20,'Kota Langsa',1);
INSERT INTO `master_city` VALUES (21,'Kota Lhokseumawe',1);
INSERT INTO `master_city` VALUES (22,'Kota Sabang',1);
INSERT INTO `master_city` VALUES (23,'Kota Subulussalam',1);
INSERT INTO `master_city` VALUES (24,'Kabupaten Asahan',2);
INSERT INTO `master_city` VALUES (25,'Kabupaten Batubara',2);
INSERT INTO `master_city` VALUES (26,'Kabupaten Dairi',2);
INSERT INTO `master_city` VALUES (27,'Kabupaten Deli Serdang',2);
INSERT INTO `master_city` VALUES (28,'Kabupaten Humbang Hasundutan',2);
INSERT INTO `master_city` VALUES (29,'Kabupaten Karo',2);
INSERT INTO `master_city` VALUES (30,'Kabupaten Labuhan Batu',2);
INSERT INTO `master_city` VALUES (31,'Kabupaten Labuhanbatu Selatan',2);
INSERT INTO `master_city` VALUES (32,'Kabupaten Labuhanbatu Utara',2);
INSERT INTO `master_city` VALUES (33,'Kabupaten Langkat',2);
INSERT INTO `master_city` VALUES (34,'Kabupaten Mandailing Natal',2);
INSERT INTO `master_city` VALUES (35,'Kabupaten Nias',2);
INSERT INTO `master_city` VALUES (36,'Kabupaten Nias Barat',2);
INSERT INTO `master_city` VALUES (37,'Kabupaten Nias Selatan',2);
INSERT INTO `master_city` VALUES (38,'Kabupaten Nias Utara',2);
INSERT INTO `master_city` VALUES (39,'Kabupaten Padang Lawas',2);
INSERT INTO `master_city` VALUES (40,'Kabupaten Padang Lawas Utara',2);
INSERT INTO `master_city` VALUES (41,'Kabupaten Pakpak Barat',2);
INSERT INTO `master_city` VALUES (42,'Kabupaten Samosir',2);
INSERT INTO `master_city` VALUES (43,'Kabupaten Serdang Bedagai',2);
INSERT INTO `master_city` VALUES (44,'Kabupaten Simalungun',2);
INSERT INTO `master_city` VALUES (45,'Kabupaten Tapanuli Selatan',2);
INSERT INTO `master_city` VALUES (46,'Kabupaten Tapanuli Tengah',2);
INSERT INTO `master_city` VALUES (47,'Kabupaten Tapanuli Utara',2);
INSERT INTO `master_city` VALUES (48,'Kabupaten Toba Samosir',2);
INSERT INTO `master_city` VALUES (49,'Kota Binjai',2);
INSERT INTO `master_city` VALUES (50,'Kota Gunung Sitoli',2);
INSERT INTO `master_city` VALUES (51,'Kota Medan',2);
INSERT INTO `master_city` VALUES (52,'Kota Padangsidempuan',2);
INSERT INTO `master_city` VALUES (53,'Kota Pematang Siantar',2);
INSERT INTO `master_city` VALUES (54,'Kota Sibolga',2);
INSERT INTO `master_city` VALUES (55,'Kota Tanjung Balai',2);
INSERT INTO `master_city` VALUES (56,'Kota Tebing Tinggi',2);
INSERT INTO `master_city` VALUES (57,'Kabupaten Agam',3);
INSERT INTO `master_city` VALUES (58,'Kabupaten Dharmas Raya',3);
INSERT INTO `master_city` VALUES (59,'Kabupaten Kepulauan Mentawai',3);
INSERT INTO `master_city` VALUES (60,'Kabupaten Lima Puluh Kota',3);
INSERT INTO `master_city` VALUES (61,'Kabupaten Padang Pariaman',3);
INSERT INTO `master_city` VALUES (62,'Kabupaten Pasaman',3);
INSERT INTO `master_city` VALUES (63,'Kabupaten Pasaman Barat',3);
INSERT INTO `master_city` VALUES (64,'Kabupaten Pesisir Selatan',3);
INSERT INTO `master_city` VALUES (65,'Kabupaten Sijunjung',3);
INSERT INTO `master_city` VALUES (66,'Kabupaten Solok',3);
INSERT INTO `master_city` VALUES (67,'Kabupaten Solok Selatan',3);
INSERT INTO `master_city` VALUES (68,'Kabupaten Tanah Datar',3);
INSERT INTO `master_city` VALUES (69,'Kota Bukittinggi',3);
INSERT INTO `master_city` VALUES (70,'Kota Padang',3);
INSERT INTO `master_city` VALUES (71,'Kota Padang Panjang',3);
INSERT INTO `master_city` VALUES (72,'Kota Pariaman',3);
INSERT INTO `master_city` VALUES (73,'Kota Payakumbuh',3);
INSERT INTO `master_city` VALUES (74,'Kota Sawah Lunto',3);
INSERT INTO `master_city` VALUES (75,'Kota Solok',3);
INSERT INTO `master_city` VALUES (76,'Kabupaten Bengkalis',4);
INSERT INTO `master_city` VALUES (77,'Kabupaten Indragiri Hilir',4);
INSERT INTO `master_city` VALUES (78,'Kabupaten Indragiri Hulu',4);
INSERT INTO `master_city` VALUES (79,'Kabupaten Kampar',4);
INSERT INTO `master_city` VALUES (80,'Kabupaten Kuantan Singingi',4);
INSERT INTO `master_city` VALUES (81,'Kabupaten Meranti',4);
INSERT INTO `master_city` VALUES (82,'Kabupaten Pelalawan',4);
INSERT INTO `master_city` VALUES (83,'Kabupaten Rokan Hilir',4);
INSERT INTO `master_city` VALUES (84,'Kabupaten Rokan Hulu',4);
INSERT INTO `master_city` VALUES (85,'Kabupaten Siak',4);
INSERT INTO `master_city` VALUES (86,'Kota Dumai',4);
INSERT INTO `master_city` VALUES (87,'Kota Pekanbaru',4);
INSERT INTO `master_city` VALUES (88,'Kabupaten Bintan',5);
INSERT INTO `master_city` VALUES (89,'Kabupaten Karimun',5);
INSERT INTO `master_city` VALUES (90,'Kabupaten Kepulauan Anambas',5);
INSERT INTO `master_city` VALUES (91,'Kabupaten Lingga',5);
INSERT INTO `master_city` VALUES (92,'Kabupaten Natuna',5);
INSERT INTO `master_city` VALUES (93,'Kota Batam',5);
INSERT INTO `master_city` VALUES (94,'Kota Tanjung Pinang',5);
INSERT INTO `master_city` VALUES (95,'Kabupaten Bangka',6);
INSERT INTO `master_city` VALUES (96,'Kabupaten Bangka Barat',6);
INSERT INTO `master_city` VALUES (97,'Kabupaten Bangka Selatan',6);
INSERT INTO `master_city` VALUES (98,'Kabupaten Bangka Tengah',6);
INSERT INTO `master_city` VALUES (99,'Kabupaten Belitung',6);
INSERT INTO `master_city` VALUES (100,'Kabupaten Belitung Timur',6);
INSERT INTO `master_city` VALUES (101,'Kota Pangkal Pinang',6);
INSERT INTO `master_city` VALUES (102,'Kabupaten Kerinci',7);
INSERT INTO `master_city` VALUES (103,'Kabupaten Merangin',7);
INSERT INTO `master_city` VALUES (104,'Kabupaten Sarolangun',7);
INSERT INTO `master_city` VALUES (105,'Kabupaten Batang Hari',7);
INSERT INTO `master_city` VALUES (106,'Kabupaten Muaro Jambi',7);
INSERT INTO `master_city` VALUES (107,'Kabupaten Tanjung Jabung Timur',7);
INSERT INTO `master_city` VALUES (108,'Kabupaten Tanjung Jabung Barat',7);
INSERT INTO `master_city` VALUES (109,'Kabupaten Tebo',7);
INSERT INTO `master_city` VALUES (110,'Kabupaten Bungo',7);
INSERT INTO `master_city` VALUES (111,'Kota Jambi',7);
INSERT INTO `master_city` VALUES (112,'Kota Sungai Penuh',7);
INSERT INTO `master_city` VALUES (113,'Kabupaten Bengkulu Selatan',8);
INSERT INTO `master_city` VALUES (114,'Kabupaten Bengkulu Tengah',8);
INSERT INTO `master_city` VALUES (115,'Kabupaten Bengkulu Utara',8);
INSERT INTO `master_city` VALUES (116,'Kabupaten Kaur',8);
INSERT INTO `master_city` VALUES (117,'Kabupaten Kepahiang',8);
INSERT INTO `master_city` VALUES (118,'Kabupaten Lebong',8);
INSERT INTO `master_city` VALUES (119,'Kabupaten Mukomuko',8);
INSERT INTO `master_city` VALUES (120,'Kabupaten Rejang Lebong',8);
INSERT INTO `master_city` VALUES (121,'Kabupaten Seluma',8);
INSERT INTO `master_city` VALUES (122,'Kota Bengkulu',8);
INSERT INTO `master_city` VALUES (123,'Kabupaten Banyuasin',9);
INSERT INTO `master_city` VALUES (124,'Kabupaten Empat Lawang',9);
INSERT INTO `master_city` VALUES (125,'Kabupaten Lahat',9);
INSERT INTO `master_city` VALUES (126,'Kabupaten Muara Enim',9);
INSERT INTO `master_city` VALUES (127,'Kabupaten Musi Banyu Asin',9);
INSERT INTO `master_city` VALUES (128,'Kabupaten Musi Rawas',9);
INSERT INTO `master_city` VALUES (129,'Kabupaten Ogan Ilir',9);
INSERT INTO `master_city` VALUES (130,'Kabupaten Ogan Komering Ilir',9);
INSERT INTO `master_city` VALUES (131,'Kabupaten Ogan Komering Ulu',9);
INSERT INTO `master_city` VALUES (132,'Kabupaten Ogan Komering Ulu Selatan',9);
INSERT INTO `master_city` VALUES (133,'Kabupaten Ogan Komering Ulu Timur',9);
INSERT INTO `master_city` VALUES (134,'Kota Lubuklinggau',9);
INSERT INTO `master_city` VALUES (135,'Kota Pagar Alam',9);
INSERT INTO `master_city` VALUES (136,'Kota Palembang',9);
INSERT INTO `master_city` VALUES (137,'Kota Prabumulih',9);
INSERT INTO `master_city` VALUES (138,'Kabupaten Lampung Barat',10);
INSERT INTO `master_city` VALUES (139,'Kabupaten Lampung Selatan',10);
INSERT INTO `master_city` VALUES (140,'Kabupaten Lampung Tengah',10);
INSERT INTO `master_city` VALUES (141,'Kabupaten Lampung Timur',10);
INSERT INTO `master_city` VALUES (142,'Kabupaten Lampung Utara',10);
INSERT INTO `master_city` VALUES (143,'Kabupaten Mesuji',10);
INSERT INTO `master_city` VALUES (144,'Kabupaten Pesawaran',10);
INSERT INTO `master_city` VALUES (145,'Kabupaten Pringsewu',10);
INSERT INTO `master_city` VALUES (146,'Kabupaten Tanggamus',10);
INSERT INTO `master_city` VALUES (147,'Kabupaten Tulang Bawang',10);
INSERT INTO `master_city` VALUES (148,'Kabupaten Tulang Bawang Barat',10);
INSERT INTO `master_city` VALUES (149,'Kabupaten Way Kanan',10);
INSERT INTO `master_city` VALUES (150,'Kota Bandar Lampung',10);
INSERT INTO `master_city` VALUES (151,'Kota Metro',10);
INSERT INTO `master_city` VALUES (152,'Kabupaten Lebak',11);
INSERT INTO `master_city` VALUES (153,'Kabupaten Pandeglang',11);
INSERT INTO `master_city` VALUES (154,'Kabupaten Serang',11);
INSERT INTO `master_city` VALUES (155,'Kabupaten Tangerang',11);
INSERT INTO `master_city` VALUES (156,'Kota Cilegon',11);
INSERT INTO `master_city` VALUES (157,'Kota Serang',11);
INSERT INTO `master_city` VALUES (158,'Kota Tangerang',11);
INSERT INTO `master_city` VALUES (159,'Kota Tangerang Selatan',11);
INSERT INTO `master_city` VALUES (160,'Kabupaten Adm. Kepulauan Seribu',12);
INSERT INTO `master_city` VALUES (161,'Kota Jakarta Barat',12);
INSERT INTO `master_city` VALUES (162,'Kota Jakarta Pusat',12);
INSERT INTO `master_city` VALUES (163,'Kota Jakarta Selatan',12);
INSERT INTO `master_city` VALUES (164,'Kota Jakarta Timur',12);
INSERT INTO `master_city` VALUES (165,'Kota Jakarta Utara',12);
INSERT INTO `master_city` VALUES (166,'Kabupaten Bandung',13);
INSERT INTO `master_city` VALUES (167,'Kabupaten Bandung Barat',13);
INSERT INTO `master_city` VALUES (168,'Kabupaten Bekasi',13);
INSERT INTO `master_city` VALUES (169,'Kabupaten Bogor',13);
INSERT INTO `master_city` VALUES (170,'Kabupaten Ciamis',13);
INSERT INTO `master_city` VALUES (171,'Kabupaten Cianjur',13);
INSERT INTO `master_city` VALUES (172,'Kabupaten Cirebon',13);
INSERT INTO `master_city` VALUES (173,'Kabupaten Garut',13);
INSERT INTO `master_city` VALUES (174,'Kabupaten Indramayu',13);
INSERT INTO `master_city` VALUES (175,'Kabupaten Karawang',13);
INSERT INTO `master_city` VALUES (176,'Kabupaten Kuningan',13);
INSERT INTO `master_city` VALUES (177,'Kabupaten Majalengka',13);
INSERT INTO `master_city` VALUES (178,'Kabupaten Purwakarta',13);
INSERT INTO `master_city` VALUES (179,'Kabupaten Subang',13);
INSERT INTO `master_city` VALUES (180,'Kabupaten Sukabumi',13);
INSERT INTO `master_city` VALUES (181,'Kabupaten Sumedang',13);
INSERT INTO `master_city` VALUES (182,'Kabupaten Tasikmalaya',13);
INSERT INTO `master_city` VALUES (183,'Kota Bandung',13);
INSERT INTO `master_city` VALUES (184,'Kota Banjar',13);
INSERT INTO `master_city` VALUES (185,'Kota Bekasi',13);
INSERT INTO `master_city` VALUES (186,'Kota Bogor',13);
INSERT INTO `master_city` VALUES (187,'Kota Cimahi',13);
INSERT INTO `master_city` VALUES (188,'Kota Cirebon',13);
INSERT INTO `master_city` VALUES (189,'Kota Depok',13);
INSERT INTO `master_city` VALUES (190,'Kota Sukabumi',13);
INSERT INTO `master_city` VALUES (191,'Kota Tasikmalaya',13);
INSERT INTO `master_city` VALUES (192,'Kabupaten Banjarnegara',14);
INSERT INTO `master_city` VALUES (193,'Kabupaten Banyumas',14);
INSERT INTO `master_city` VALUES (194,'Kabupaten Batang',14);
INSERT INTO `master_city` VALUES (195,'Kabupaten Blora',14);
INSERT INTO `master_city` VALUES (196,'Kabupaten Boyolali',14);
INSERT INTO `master_city` VALUES (197,'Kabupaten Brebes',14);
INSERT INTO `master_city` VALUES (198,'Kabupaten Cilacap',14);
INSERT INTO `master_city` VALUES (199,'Kabupaten Demak',14);
INSERT INTO `master_city` VALUES (200,'Kabupaten Grobogan',14);
INSERT INTO `master_city` VALUES (201,'Kabupaten Jepara',14);
INSERT INTO `master_city` VALUES (202,'Kabupaten Karanganyar',14);
INSERT INTO `master_city` VALUES (203,'Kabupaten Kebumen',14);
INSERT INTO `master_city` VALUES (204,'Kabupaten Kendal',14);
INSERT INTO `master_city` VALUES (205,'Kabupaten Klaten',14);
INSERT INTO `master_city` VALUES (206,'Kabupaten Kota Tegal',14);
INSERT INTO `master_city` VALUES (207,'Kabupaten Kudus',14);
INSERT INTO `master_city` VALUES (208,'Kabupaten Magelang',14);
INSERT INTO `master_city` VALUES (209,'Kabupaten Pati',14);
INSERT INTO `master_city` VALUES (210,'Kabupaten Pekalongan',14);
INSERT INTO `master_city` VALUES (211,'Kabupaten Pemalang',14);
INSERT INTO `master_city` VALUES (212,'Kabupaten Purbalingga',14);
INSERT INTO `master_city` VALUES (213,'Kabupaten Purworejo',14);
INSERT INTO `master_city` VALUES (214,'Kabupaten Rembang',14);
INSERT INTO `master_city` VALUES (215,'Kabupaten Semarang',14);
INSERT INTO `master_city` VALUES (216,'Kabupaten Sragen',14);
INSERT INTO `master_city` VALUES (217,'Kabupaten Sukoharjo',14);
INSERT INTO `master_city` VALUES (218,'Kabupaten Temanggung',14);
INSERT INTO `master_city` VALUES (219,'Kabupaten Wonogiri',14);
INSERT INTO `master_city` VALUES (220,'Kabupaten Wonosobo',14);
INSERT INTO `master_city` VALUES (221,'Kota Magelang',14);
INSERT INTO `master_city` VALUES (222,'Kota Pekalongan',14);
INSERT INTO `master_city` VALUES (223,'Kota Salatiga',14);
INSERT INTO `master_city` VALUES (224,'Kota Semarang',14);
INSERT INTO `master_city` VALUES (225,'Kota Surakarta',14);
INSERT INTO `master_city` VALUES (226,'Kota Tegal',14);
INSERT INTO `master_city` VALUES (227,'Kabupaten Bantul',15);
INSERT INTO `master_city` VALUES (228,'Kabupaten Gunung Kidul',15);
INSERT INTO `master_city` VALUES (229,'Kabupaten Kulon Progo',15);
INSERT INTO `master_city` VALUES (230,'Kabupaten Sleman',15);
INSERT INTO `master_city` VALUES (231,'Kota Yogyakarta',15);
INSERT INTO `master_city` VALUES (232,'Kabupaten Bangkalan',16);
INSERT INTO `master_city` VALUES (233,'Kabupaten Banyuwangi',16);
INSERT INTO `master_city` VALUES (234,'Kabupaten Blitar',16);
INSERT INTO `master_city` VALUES (235,'Kabupaten Bojonegoro',16);
INSERT INTO `master_city` VALUES (236,'Kabupaten Bondowoso',16);
INSERT INTO `master_city` VALUES (237,'Kabupaten Gresik',16);
INSERT INTO `master_city` VALUES (238,'Kabupaten Jember',16);
INSERT INTO `master_city` VALUES (239,'Kabupaten Jombang',16);
INSERT INTO `master_city` VALUES (240,'Kabupaten Kediri',16);
INSERT INTO `master_city` VALUES (241,'Kabupaten Lamongan',16);
INSERT INTO `master_city` VALUES (242,'Kabupaten Lumajang',16);
INSERT INTO `master_city` VALUES (243,'Kabupaten Madiun',16);
INSERT INTO `master_city` VALUES (244,'Kabupaten Magetan',16);
INSERT INTO `master_city` VALUES (245,'Kabupaten Malang',16);
INSERT INTO `master_city` VALUES (246,'Kabupaten Mojokerto',16);
INSERT INTO `master_city` VALUES (247,'Kabupaten Nganjuk',16);
INSERT INTO `master_city` VALUES (248,'Kabupaten Ngawi',16);
INSERT INTO `master_city` VALUES (249,'Kabupaten Pacitan',16);
INSERT INTO `master_city` VALUES (250,'Kabupaten Pamekasan',16);
INSERT INTO `master_city` VALUES (251,'Kabupaten Pasuruan',16);
INSERT INTO `master_city` VALUES (252,'Kabupaten Ponorogo',16);
INSERT INTO `master_city` VALUES (253,'Kabupaten Probolinggo',16);
INSERT INTO `master_city` VALUES (254,'Kabupaten Sampang',16);
INSERT INTO `master_city` VALUES (255,'Kabupaten Sidoarjo',16);
INSERT INTO `master_city` VALUES (256,'Kabupaten Situbondo',16);
INSERT INTO `master_city` VALUES (257,'Kabupaten Sumenep',16);
INSERT INTO `master_city` VALUES (258,'Kabupaten Trenggalek',16);
INSERT INTO `master_city` VALUES (259,'Kabupaten Tuban',16);
INSERT INTO `master_city` VALUES (260,'Kabupaten Tulungagung',16);
INSERT INTO `master_city` VALUES (261,'Kota Batu',16);
INSERT INTO `master_city` VALUES (262,'Kota Blitar',16);
INSERT INTO `master_city` VALUES (263,'Kota Kediri',16);
INSERT INTO `master_city` VALUES (264,'Kota Madiun',16);
INSERT INTO `master_city` VALUES (265,'Kota Malang',16);
INSERT INTO `master_city` VALUES (266,'Kota Mojokerto',16);
INSERT INTO `master_city` VALUES (267,'Kota Pasuruan',16);
INSERT INTO `master_city` VALUES (268,'Kota Probolinggo',16);
INSERT INTO `master_city` VALUES (269,'Kota Surabaya',16);
INSERT INTO `master_city` VALUES (270,'Kabupaten Badung',17);
INSERT INTO `master_city` VALUES (271,'Kabupaten Bangli',17);
INSERT INTO `master_city` VALUES (272,'Kabupaten Buleleng',17);
INSERT INTO `master_city` VALUES (273,'Kabupaten Gianyar',17);
INSERT INTO `master_city` VALUES (274,'Kabupaten Jembrana',17);
INSERT INTO `master_city` VALUES (275,'Kabupaten Karang Asem',17);
INSERT INTO `master_city` VALUES (276,'Kabupaten Klungkung',17);
INSERT INTO `master_city` VALUES (277,'Kabupaten Tabanan',17);
INSERT INTO `master_city` VALUES (278,'Kota Denpasar',17);
INSERT INTO `master_city` VALUES (279,'Kabupaten Bima',18);
INSERT INTO `master_city` VALUES (280,'Kabupaten Dompu',18);
INSERT INTO `master_city` VALUES (281,'Kabupaten Lombok Barat',18);
INSERT INTO `master_city` VALUES (282,'Kabupaten Lombok Tengah',18);
INSERT INTO `master_city` VALUES (283,'Kabupaten Lombok Timur',18);
INSERT INTO `master_city` VALUES (284,'Kabupaten Lombok Utara',18);
INSERT INTO `master_city` VALUES (285,'Kabupaten Sumbawa',18);
INSERT INTO `master_city` VALUES (286,'Kabupaten Sumbawa Barat',18);
INSERT INTO `master_city` VALUES (287,'Kota Bima',18);
INSERT INTO `master_city` VALUES (288,'Kota Mataram',18);
INSERT INTO `master_city` VALUES (289,'Kabupaten Alor',19);
INSERT INTO `master_city` VALUES (290,'Kabupaten Belu',19);
INSERT INTO `master_city` VALUES (291,'Kabupaten Ende',19);
INSERT INTO `master_city` VALUES (292,'Kabupaten Flores Timur',19);
INSERT INTO `master_city` VALUES (293,'Kabupaten Kupang',19);
INSERT INTO `master_city` VALUES (294,'Kabupaten Lembata',19);
INSERT INTO `master_city` VALUES (295,'Kabupaten Manggarai',19);
INSERT INTO `master_city` VALUES (296,'Kabupaten Manggarai Barat',19);
INSERT INTO `master_city` VALUES (297,'Kabupaten Manggarai Timur',19);
INSERT INTO `master_city` VALUES (298,'Kabupaten Nagekeo',19);
INSERT INTO `master_city` VALUES (299,'Kabupaten Ngada',19);
INSERT INTO `master_city` VALUES (300,'Kabupaten Rote Ndao',19);
INSERT INTO `master_city` VALUES (301,'Kabupaten Sabu Raijua',19);
INSERT INTO `master_city` VALUES (302,'Kabupaten Sikka',19);
INSERT INTO `master_city` VALUES (303,'Kabupaten Sumba Barat',19);
INSERT INTO `master_city` VALUES (304,'Kabupaten Sumba Barat Daya',19);
INSERT INTO `master_city` VALUES (305,'Kabupaten Sumba Tengah',19);
INSERT INTO `master_city` VALUES (306,'Kabupaten Sumba Timur',19);
INSERT INTO `master_city` VALUES (307,'Kabupaten Timor Tengah Selatan',19);
INSERT INTO `master_city` VALUES (308,'Kabupaten Timor Tengah Utara',19);
INSERT INTO `master_city` VALUES (309,'Kota Kupang',19);
INSERT INTO `master_city` VALUES (310,'Kabupaten Bengkayang',20);
INSERT INTO `master_city` VALUES (311,'Kabupaten Kapuas Hulu',20);
INSERT INTO `master_city` VALUES (312,'Kabupaten Kayong Utara',20);
INSERT INTO `master_city` VALUES (313,'Kabupaten Ketapang',20);
INSERT INTO `master_city` VALUES (314,'Kabupaten Kubu Raya',20);
INSERT INTO `master_city` VALUES (315,'Kabupaten Landak',20);
INSERT INTO `master_city` VALUES (316,'Kabupaten Melawi',20);
INSERT INTO `master_city` VALUES (317,'Kabupaten Pontianak',20);
INSERT INTO `master_city` VALUES (318,'Kabupaten Sambas',20);
INSERT INTO `master_city` VALUES (319,'Kabupaten Sanggau',20);
INSERT INTO `master_city` VALUES (320,'Kabupaten Sekadau',20);
INSERT INTO `master_city` VALUES (321,'Kabupaten Sintang',20);
INSERT INTO `master_city` VALUES (322,'Kota Pontianak',20);
INSERT INTO `master_city` VALUES (323,'Kota Singkawang',20);
INSERT INTO `master_city` VALUES (324,'Kabupaten Barito Selatan',21);
INSERT INTO `master_city` VALUES (325,'Kabupaten Barito Timur',21);
INSERT INTO `master_city` VALUES (326,'Kabupaten Barito Utara',21);
INSERT INTO `master_city` VALUES (327,'Kabupaten Gunung Mas',21);
INSERT INTO `master_city` VALUES (328,'Kabupaten Kapuas',21);
INSERT INTO `master_city` VALUES (329,'Kabupaten Katingan',21);
INSERT INTO `master_city` VALUES (330,'Kabupaten Kotawaringin Barat',21);
INSERT INTO `master_city` VALUES (331,'Kabupaten Kotawaringin Timur',21);
INSERT INTO `master_city` VALUES (332,'Kabupaten Lamandau',21);
INSERT INTO `master_city` VALUES (333,'Kabupaten Murung Raya',21);
INSERT INTO `master_city` VALUES (334,'Kabupaten Pulang Pisau',21);
INSERT INTO `master_city` VALUES (335,'Kabupaten Seruyan',21);
INSERT INTO `master_city` VALUES (336,'Kabupaten Sukamara',21);
INSERT INTO `master_city` VALUES (337,'Kota Palangkaraya',21);
INSERT INTO `master_city` VALUES (338,'Kabupaten Balangan',22);
INSERT INTO `master_city` VALUES (339,'Kabupaten Banjar',22);
INSERT INTO `master_city` VALUES (340,'Kabupaten Barito Kuala',22);
INSERT INTO `master_city` VALUES (341,'Kabupaten Hulu Sungai Selatan',22);
INSERT INTO `master_city` VALUES (342,'Kabupaten Hulu Sungai Tengah',22);
INSERT INTO `master_city` VALUES (343,'Kabupaten Hulu Sungai Utara',22);
INSERT INTO `master_city` VALUES (344,'Kabupaten Kota Baru',22);
INSERT INTO `master_city` VALUES (345,'Kabupaten Tabalong',22);
INSERT INTO `master_city` VALUES (346,'Kabupaten Tanah Bumbu',22);
INSERT INTO `master_city` VALUES (347,'Kabupaten Tanah Laut',22);
INSERT INTO `master_city` VALUES (348,'Kabupaten Tapin',22);
INSERT INTO `master_city` VALUES (349,'Kota Banjar Baru',22);
INSERT INTO `master_city` VALUES (350,'Kota Banjarmasin',22);
INSERT INTO `master_city` VALUES (351,'Kabupaten Berau',23);
INSERT INTO `master_city` VALUES (352,'Kabupaten Bulongan',23);
INSERT INTO `master_city` VALUES (353,'Kabupaten Kutai Barat',23);
INSERT INTO `master_city` VALUES (354,'Kabupaten Kutai Kartanegara',23);
INSERT INTO `master_city` VALUES (355,'Kabupaten Kutai Timur',23);
INSERT INTO `master_city` VALUES (356,'Kabupaten Malinau',23);
INSERT INTO `master_city` VALUES (357,'Kabupaten Nunukan',23);
INSERT INTO `master_city` VALUES (358,'Kabupaten Paser',23);
INSERT INTO `master_city` VALUES (359,'Kabupaten Penajam Paser Utara',23);
INSERT INTO `master_city` VALUES (360,'Kabupaten Tana Tidung',23);
INSERT INTO `master_city` VALUES (361,'Kota Balikpapan',23);
INSERT INTO `master_city` VALUES (362,'Kota Bontang',23);
INSERT INTO `master_city` VALUES (363,'Kota Samarinda',23);
INSERT INTO `master_city` VALUES (364,'Kota Tarakan',23);
INSERT INTO `master_city` VALUES (365,'Kabupaten Boalemo',24);
INSERT INTO `master_city` VALUES (366,'Kabupaten Bone Bolango',24);
INSERT INTO `master_city` VALUES (367,'Kabupaten Gorontalo',24);
INSERT INTO `master_city` VALUES (368,'Kabupaten Gorontalo Utara',24);
INSERT INTO `master_city` VALUES (369,'Kabupaten Pohuwato',24);
INSERT INTO `master_city` VALUES (370,'Kota Gorontalo',24);
INSERT INTO `master_city` VALUES (371,'Kabupaten Bantaeng',25);
INSERT INTO `master_city` VALUES (372,'Kabupaten Barru',25);
INSERT INTO `master_city` VALUES (373,'Kabupaten Bone',25);
INSERT INTO `master_city` VALUES (374,'Kabupaten Bulukumba',25);
INSERT INTO `master_city` VALUES (375,'Kabupaten Enrekang',25);
INSERT INTO `master_city` VALUES (376,'Kabupaten Gowa',25);
INSERT INTO `master_city` VALUES (377,'Kabupaten Jeneponto',25);
INSERT INTO `master_city` VALUES (378,'Kabupaten Luwu',25);
INSERT INTO `master_city` VALUES (379,'Kabupaten Luwu Timur',25);
INSERT INTO `master_city` VALUES (380,'Kabupaten Luwu Utara',25);
INSERT INTO `master_city` VALUES (381,'Kabupaten Maros',25);
INSERT INTO `master_city` VALUES (382,'Kabupaten Pangkajene Kepulauan',25);
INSERT INTO `master_city` VALUES (383,'Kabupaten Pinrang',25);
INSERT INTO `master_city` VALUES (384,'Kabupaten Selayar',25);
INSERT INTO `master_city` VALUES (385,'Kabupaten Sidenreng Rappang',25);
INSERT INTO `master_city` VALUES (386,'Kabupaten Sinjai',25);
INSERT INTO `master_city` VALUES (387,'Kabupaten Soppeng',25);
INSERT INTO `master_city` VALUES (388,'Kabupaten Takalar',25);
INSERT INTO `master_city` VALUES (389,'Kabupaten Tana Toraja',25);
INSERT INTO `master_city` VALUES (390,'Kabupaten Toraja Utara',25);
INSERT INTO `master_city` VALUES (391,'Kabupaten Wajo',25);
INSERT INTO `master_city` VALUES (392,'Kota Makassar',25);
INSERT INTO `master_city` VALUES (393,'Kota Palopo',25);
INSERT INTO `master_city` VALUES (394,'Kota Pare-pare',25);
INSERT INTO `master_city` VALUES (395,'Kabupaten Bombana',26);
INSERT INTO `master_city` VALUES (396,'Kabupaten Buton',26);
INSERT INTO `master_city` VALUES (397,'Kabupaten Buton Utara',26);
INSERT INTO `master_city` VALUES (398,'Kabupaten Kolaka',26);
INSERT INTO `master_city` VALUES (399,'Kabupaten Kolaka Utara',26);
INSERT INTO `master_city` VALUES (400,'Kabupaten Konawe',26);
INSERT INTO `master_city` VALUES (401,'Kabupaten Konawe Selatan',26);
INSERT INTO `master_city` VALUES (402,'Kabupaten Konawe Utara',26);
INSERT INTO `master_city` VALUES (403,'Kabupaten Muna',26);
INSERT INTO `master_city` VALUES (404,'Kabupaten Wakatobi',26);
INSERT INTO `master_city` VALUES (405,'Kota Bau-bau',26);
INSERT INTO `master_city` VALUES (406,'Kota Kendari',26);
INSERT INTO `master_city` VALUES (407,'Kabupaten Banggai',27);
INSERT INTO `master_city` VALUES (408,'Kabupaten Banggai Kepulauan',27);
INSERT INTO `master_city` VALUES (409,'Kabupaten Buol',27);
INSERT INTO `master_city` VALUES (410,'Kabupaten Donggala',27);
INSERT INTO `master_city` VALUES (411,'Kabupaten Morowali',27);
INSERT INTO `master_city` VALUES (412,'Kabupaten Parigi Moutong',27);
INSERT INTO `master_city` VALUES (413,'Kabupaten Poso',27);
INSERT INTO `master_city` VALUES (414,'Kabupaten Sigi',27);
INSERT INTO `master_city` VALUES (415,'Kabupaten Tojo Una-Una',27);
INSERT INTO `master_city` VALUES (416,'Kabupaten Toli Toli',27);
INSERT INTO `master_city` VALUES (417,'Kota Palu',27);
INSERT INTO `master_city` VALUES (418,'Kabupaten Bolaang Mangondow',28);
INSERT INTO `master_city` VALUES (419,'Kabupaten Bolaang Mangondow Selatan',28);
INSERT INTO `master_city` VALUES (420,'Kabupaten Bolaang Mangondow Timur',28);
INSERT INTO `master_city` VALUES (421,'Kabupaten Bolaang Mangondow Utara',28);
INSERT INTO `master_city` VALUES (422,'Kabupaten Kepulauan Sangihe',28);
INSERT INTO `master_city` VALUES (423,'Kabupaten Kepulauan Siau Tagulandang Bia',28);
INSERT INTO `master_city` VALUES (424,'Kabupaten Kepulauan Talaud',28);
INSERT INTO `master_city` VALUES (425,'Kabupaten Minahasa',28);
INSERT INTO `master_city` VALUES (426,'Kabupaten Minahasa Selatan',28);
INSERT INTO `master_city` VALUES (427,'Kabupaten Minahasa Tenggara',28);
INSERT INTO `master_city` VALUES (428,'Kabupaten Minahasa Utara',28);
INSERT INTO `master_city` VALUES (429,'Kota Bitung',28);
INSERT INTO `master_city` VALUES (430,'Kota Kotamobagu',28);
INSERT INTO `master_city` VALUES (431,'Kota Manado',28);
INSERT INTO `master_city` VALUES (432,'Kota Tomohon',28);
INSERT INTO `master_city` VALUES (433,'Kabupaten Majene',29);
INSERT INTO `master_city` VALUES (434,'Kabupaten Mamasa',29);
INSERT INTO `master_city` VALUES (435,'Kabupaten Mamuju',29);
INSERT INTO `master_city` VALUES (436,'Kabupaten Mamuju Utara',29);
INSERT INTO `master_city` VALUES (437,'Kabupaten Polewali Mandar',29);
INSERT INTO `master_city` VALUES (438,'Kabupaten Buru',30);
INSERT INTO `master_city` VALUES (439,'Kabupaten Buru Selatan',30);
INSERT INTO `master_city` VALUES (440,'Kabupaten Kepulauan Aru',30);
INSERT INTO `master_city` VALUES (441,'Kabupaten Maluku Barat Daya',30);
INSERT INTO `master_city` VALUES (442,'Kabupaten Maluku Tengah',30);
INSERT INTO `master_city` VALUES (443,'Kabupaten Maluku Tenggara',30);
INSERT INTO `master_city` VALUES (444,'Kabupaten Maluku Tenggara Barat',30);
INSERT INTO `master_city` VALUES (445,'Kabupaten Seram Bagian Barat',30);
INSERT INTO `master_city` VALUES (446,'Kabupaten Seram Bagian Timur',30);
INSERT INTO `master_city` VALUES (447,'Kota Ambon',30);
INSERT INTO `master_city` VALUES (448,'Kota Tual',30);
INSERT INTO `master_city` VALUES (449,'Kabupaten Halmahera Barat',31);
INSERT INTO `master_city` VALUES (450,'Kabupaten Halmahera Selatan',31);
INSERT INTO `master_city` VALUES (451,'Kabupaten Halmahera Tengah',31);
INSERT INTO `master_city` VALUES (452,'Kabupaten Halmahera Timur',31);
INSERT INTO `master_city` VALUES (453,'Kabupaten Halmahera Utara',31);
INSERT INTO `master_city` VALUES (454,'Kabupaten Kepulauan Sula',31);
INSERT INTO `master_city` VALUES (455,'Kabupaten Pulau Morotai',31);
INSERT INTO `master_city` VALUES (456,'Kota Ternate',31);
INSERT INTO `master_city` VALUES (457,'Kota Tidore Kepulauan',31);
INSERT INTO `master_city` VALUES (458,'Kabupaten Fakfak',32);
INSERT INTO `master_city` VALUES (459,'Kabupaten Kaimana',32);
INSERT INTO `master_city` VALUES (460,'Kabupaten Manokwari',32);
INSERT INTO `master_city` VALUES (461,'Kabupaten Maybrat',32);
INSERT INTO `master_city` VALUES (462,'Kabupaten Raja Ampat',32);
INSERT INTO `master_city` VALUES (463,'Kabupaten Sorong',32);
INSERT INTO `master_city` VALUES (464,'Kabupaten Sorong Selatan',32);
INSERT INTO `master_city` VALUES (465,'Kabupaten Tambrauw',32);
INSERT INTO `master_city` VALUES (466,'Kabupaten Teluk Bintuni',32);
INSERT INTO `master_city` VALUES (467,'Kabupaten Teluk Wondama',32);
INSERT INTO `master_city` VALUES (468,'Kota Sorong',32);
INSERT INTO `master_city` VALUES (469,'Kabupaten Merauke',33);
INSERT INTO `master_city` VALUES (470,'Kabupaten Jayawijaya',33);
INSERT INTO `master_city` VALUES (471,'Kabupaten Nabire',33);
INSERT INTO `master_city` VALUES (472,'Kabupaten Kepulauan Yapen',33);
INSERT INTO `master_city` VALUES (473,'Kabupaten Biak Numfor',33);
INSERT INTO `master_city` VALUES (474,'Kabupaten Paniai',33);
INSERT INTO `master_city` VALUES (475,'Kabupaten Puncak Jaya',33);
INSERT INTO `master_city` VALUES (476,'Kabupaten Mimika',33);
INSERT INTO `master_city` VALUES (477,'Kabupaten Boven Digoel',33);
INSERT INTO `master_city` VALUES (478,'Kabupaten Mappi',33);
INSERT INTO `master_city` VALUES (479,'Kabupaten Asmat',33);
INSERT INTO `master_city` VALUES (480,'Kabupaten Yahukimo',33);
INSERT INTO `master_city` VALUES (481,'Kabupaten Pegunungan Bintang',33);
INSERT INTO `master_city` VALUES (482,'Kabupaten Tolikara',33);
INSERT INTO `master_city` VALUES (483,'Kabupaten Sarmi',33);
INSERT INTO `master_city` VALUES (484,'Kabupaten Keerom',33);
INSERT INTO `master_city` VALUES (485,'Kabupaten Waropen',33);
INSERT INTO `master_city` VALUES (486,'Kabupaten Jayapura',33);
INSERT INTO `master_city` VALUES (487,'Kabupaten Deiyai',33);
INSERT INTO `master_city` VALUES (488,'Kabupaten Dogiyai',33);
INSERT INTO `master_city` VALUES (489,'Kabupaten Intan Jaya',33);
INSERT INTO `master_city` VALUES (490,'Kabupaten Lanny Jaya',33);
INSERT INTO `master_city` VALUES (491,'Kabupaten Mamberamo Raya',33);
INSERT INTO `master_city` VALUES (492,'Kabupaten Mamberamo Tengah',33);
INSERT INTO `master_city` VALUES (493,'Kabupaten Nduga',33);
INSERT INTO `master_city` VALUES (494,'Kabupaten Puncak',33);
INSERT INTO `master_city` VALUES (495,'Kabupaten Supiori',33);
INSERT INTO `master_city` VALUES (496,'Kabupaten Yalimo',33);
INSERT INTO `master_city` VALUES (497,'Kota Jayapura',33);
/*!40000 ALTER TABLE `master_city` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table master_state
#

CREATE TABLE `master_state` (
  `state_id` int(3) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(30) NOT NULL,
  `state_country_id` int(11) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
INSERT INTO `master_state` VALUES (1,'Nanggroe Aceh Darussalam',107);
INSERT INTO `master_state` VALUES (2,'Sumatera Utara',107);
INSERT INTO `master_state` VALUES (3,'Sumatera Barat',107);
INSERT INTO `master_state` VALUES (4,'Riau',107);
INSERT INTO `master_state` VALUES (5,'Kepulauan Riau',107);
INSERT INTO `master_state` VALUES (6,'Kepulauan Bangka-Belitung',107);
INSERT INTO `master_state` VALUES (7,'Jambi',107);
INSERT INTO `master_state` VALUES (8,'Bengkulu',107);
INSERT INTO `master_state` VALUES (9,'Sumatera Selatan',107);
INSERT INTO `master_state` VALUES (10,'Lampung',107);
INSERT INTO `master_state` VALUES (11,'Banten',107);
INSERT INTO `master_state` VALUES (12,'DKI Jakarta',107);
INSERT INTO `master_state` VALUES (13,'Jawa Barat',107);
INSERT INTO `master_state` VALUES (14,'Jawa Tengah',107);
INSERT INTO `master_state` VALUES (15,'Daerah Istimewa Yogyakarta  ',107);
INSERT INTO `master_state` VALUES (16,'Jawa Timur',107);
INSERT INTO `master_state` VALUES (17,'Bali',107);
INSERT INTO `master_state` VALUES (18,'Nusa Tenggara Barat',107);
INSERT INTO `master_state` VALUES (19,'Nusa Tenggara Timur',107);
INSERT INTO `master_state` VALUES (20,'Kalimantan Barat',107);
INSERT INTO `master_state` VALUES (21,'Kalimantan Tengah',107);
INSERT INTO `master_state` VALUES (22,'Kalimantan Selatan',107);
INSERT INTO `master_state` VALUES (23,'Kalimantan Timur',107);
INSERT INTO `master_state` VALUES (24,'Gorontalo',107);
INSERT INTO `master_state` VALUES (25,'Sulawesi Selatan',107);
INSERT INTO `master_state` VALUES (26,'Sulawesi Tenggara',107);
INSERT INTO `master_state` VALUES (27,'Sulawesi Tengah',107);
INSERT INTO `master_state` VALUES (28,'Sulawesi Utara',107);
INSERT INTO `master_state` VALUES (29,'Sulawesi Barat',107);
INSERT INTO `master_state` VALUES (30,'Maluku',107);
INSERT INTO `master_state` VALUES (31,'Maluku Utara',107);
INSERT INTO `master_state` VALUES (32,'Papua Barat',107);
INSERT INTO `master_state` VALUES (33,'Papua',107);
/*!40000 ALTER TABLE `master_state` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table merk
#

CREATE TABLE `merk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaMerk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
INSERT INTO `merk` VALUES (1,'HP');
INSERT INTO `merk` VALUES (2,'DELL');
INSERT INTO `merk` VALUES (3,'AXIOO132');
INSERT INTO `merk` VALUES (4,'SAMSUNG');
INSERT INTO `merk` VALUES (15,'APPLE');
INSERT INTO `merk` VALUES (16,'CISCO');
INSERT INTO `merk` VALUES (17,'TP-LINK');
INSERT INTO `merk` VALUES (18,'D-LINK');
/*!40000 ALTER TABLE `merk` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table pembayaran
#

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noPemesanan` varchar(40) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `total_transfer` decimal(19,4) DEFAULT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `catatan` text,
  `tgl_input` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pemesanan_pembayaran` (`noPemesanan`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
INSERT INTO `pembayaran` VALUES (1,'48145',0,'samandajimmy@yahoo.com','BCA',9010005,'2014-03-13','ini konfirmasi','2014-03-21 23:03:10');
INSERT INTO `pembayaran` VALUES (2,'48145',0,'samandajimmy@yahoo.com','BCA',9010005,'2014-03-13','','2014-03-21 23:03:39');
INSERT INTO `pembayaran` VALUES (3,'48145',0,'samandajimmy@yahoo.com','Mandiri',9010005,'2014-03-13','','2014-03-21 23:03:58');
INSERT INTO `pembayaran` VALUES (4,'48145',0,'samandajimmy@yahoo.com','BCA',9010005,'2014-03-13','','2014-03-21 23:03:50');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table pemesanan
#

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noPemesanan` varchar(40) DEFAULT NULL,
  `tglPemesanan` datetime DEFAULT NULL,
  `biayaPemesanan` varchar(40) DEFAULT NULL,
  `jmlPemesanan` int(11) DEFAULT NULL,
  `beratPemesanan` varchar(255) DEFAULT NULL,
  `biayaPengiriman` varchar(40) DEFAULT NULL,
  `is_alt` char(1) DEFAULT '0',
  `is_confirm` char(1) DEFAULT '0',
  `date_confirm` datetime DEFAULT NULL,
  `kode_unik` char(2) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCustomer` int(11) DEFAULT NULL,
  `idShipping` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statusPemesanan_pemesanan` (`idStatus`),
  KEY `customer_pemesanan` (`idCustomer`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;
INSERT INTO `pemesanan` VALUES (10,'51212','2014-02-26','14418000',5,'2','10000','0','1',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (11,'33962','2014-02-26','19224000',5,'1','10000','1','0',NULL,NULL,1,5,6,7);
INSERT INTO `pemesanan` VALUES (12,'48881','2014-02-26','20538000',5,'9','10000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (13,'19495','2014-02-26','20538000',5,'8','10000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (14,'37623','2014-02-26','19224000',5,'7','10000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (15,'56195','2014-02-26','18012000',55,'6','10000','0','0',NULL,NULL,1,5,2,11);
INSERT INTO `pemesanan` VALUES (16,'38229','2014-02-26','9612000',5,'5','10000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (17,'92464','2014-02-26','9612000',5,'4','10000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (18,'21614','2014-02-26','50012000',55,'3','10000','0','0',NULL,NULL,1,8,5,8);
INSERT INTO `pemesanan` VALUES (19,'13371','2014-02-26','13218000',5,'2','10000','0','0',NULL,NULL,1,8,5,9);
INSERT INTO `pemesanan` VALUES (20,'46166','2014-02-26','4406000',5,'1','10000','0','0',NULL,NULL,1,8,5,10);
INSERT INTO `pemesanan` VALUES (21,'89398','2014-02-26','8812000',5,'9','10000','0','0',NULL,NULL,1,8,5,11);
INSERT INTO `pemesanan` VALUES (22,'31714','2014-02-26','8812000',5,'8','10000','0','0',NULL,NULL,1,8,5,6);
INSERT INTO `pemesanan` VALUES (23,'55521','2014-02-26','4406000',5,'7','10000','0','0',NULL,NULL,1,8,5,7);
INSERT INTO `pemesanan` VALUES (24,'53294','2014-02-26','13218000',5,'6','10000','0','0',NULL,NULL,1,8,5,8);
INSERT INTO `pemesanan` VALUES (25,'31232','2014-02-26','26012000',5,'5','10000','0','0',NULL,NULL,1,8,5,9);
INSERT INTO `pemesanan` VALUES (26,'89884','2014-02-26','7006000',5,'4','10000','0','0',NULL,NULL,1,8,5,10);
INSERT INTO `pemesanan` VALUES (27,'67371','2014-02-26','3612000',5,'3','10000','0','0',NULL,NULL,1,8,5,6);
INSERT INTO `pemesanan` VALUES (28,'72674','2014-02-26','26012000',5,'2','10000','0','0',NULL,NULL,1,8,5,7);
INSERT INTO `pemesanan` VALUES (29,'47667','2014-02-26','34824000',5,'1','10000','0','0',NULL,NULL,1,8,5,8);
INSERT INTO `pemesanan` VALUES (30,'21744','2014-02-26','13006000',3,'9','10000','0','0',NULL,NULL,1,8,5,9);
INSERT INTO `pemesanan` VALUES (31,'61638','2014-02-26','13006000',5,'8','10000','0','0',NULL,NULL,1,8,5,10);
INSERT INTO `pemesanan` VALUES (32,'79743','2014-02-26','4406000',5,'7','10000','0','0',NULL,NULL,1,8,5,6);
INSERT INTO `pemesanan` VALUES (33,'18121','2014-02-26','8012000',7,'6','10000','0','0',NULL,NULL,1,8,5,7);
INSERT INTO `pemesanan` VALUES (35,'45994','2014-02-27','9006000',5,'10','10000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (36,'53166','2014-02-27','63042000',7,'14','42000','0','0',NULL,NULL,2,5,2,9);
INSERT INTO `pemesanan` VALUES (37,'38962','2014-02-28','4806000',1,'2','6000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (38,'67221','2014-02-28','4806000',1,'2','6000','0','0',NULL,NULL,1,5,2,11);
INSERT INTO `pemesanan` VALUES (39,'39369','2014-02-28','8812000',2,'4','12000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (40,'92533','2014-02-28','50848000',8,'16','48000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (41,'32872','2014-02-28','102024000',4,'8','24000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (42,'62285','2014-02-28','26824000',4,'8','24000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (43,'79726','2014-02-28','4806000',1,'2','6000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (44,'33949','2014-02-28','9006000',1,'2','6000','0','0',NULL,NULL,1,5,2,11);
INSERT INTO `pemesanan` VALUES (45,'93158','2014-02-28','9006000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (46,'67883','2014-02-28','28024000',4,'8','24000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (47,'92274','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (48,'92623','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (49,'98447','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (50,'23956','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,11);
INSERT INTO `pemesanan` VALUES (51,'42677','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (52,'27286','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (53,'17785','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (54,'23385','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (55,'68269','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (56,'54163','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,11);
INSERT INTO `pemesanan` VALUES (57,'15161','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (58,'15571','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (59,'89926','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (60,'92791','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (61,'46768','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (62,'41621','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,11);
INSERT INTO `pemesanan` VALUES (63,'64741','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (64,'58131','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (65,'45339','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (66,'52848','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (67,'28266','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (68,'39685','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,11);
INSERT INTO `pemesanan` VALUES (69,'45395','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (70,'68661','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (71,'44813','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (72,'82258','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (73,'54838','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,10);
INSERT INTO `pemesanan` VALUES (74,'49374','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (75,'64542','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (76,'35561','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (79,'33233','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,9,6,9);
INSERT INTO `pemesanan` VALUES (80,'16237','2014-03-02','4406000',1,'2','6000','0','0',NULL,NULL,1,9,6,10);
INSERT INTO `pemesanan` VALUES (81,'57395','2014-03-02','54024000',4,'8','24000','1','0',NULL,NULL,1,5,8,11);
INSERT INTO `pemesanan` VALUES (82,'79964','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (83,'23117','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (84,'92623','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (85,'46215','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (86,'17888','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (87,'47277','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (88,'91117','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (89,'33243','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (90,'51131','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (91,'66467','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (92,'93311','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (93,'95684','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (94,'95444','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (95,'11829','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (96,'42722','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (97,'83389','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (98,'56726','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (99,'39423','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (100,'64385','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (101,'58644','2014-03-07','4006000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (102,'69159','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (103,'73264','2014-03-07','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (104,'57595','2014-03-07','4806000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (105,'94764','2014-03-08','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (106,'49346','2014-03-08','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (107,'89438','2014-03-08','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (108,'29194','2014-03-08','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (109,'32785','2014-03-08','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (110,'37225','2014-03-08','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (111,'59493','2014-03-08','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (112,'71719','2014-03-09','13412000',2,'4','12000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (113,'82124','2014-03-09','4006000',1,'2','6000','0','0',NULL,NULL,1,5,2,9);
INSERT INTO `pemesanan` VALUES (114,'63693','2014-03-09','20006000',1,'2','6000','0','0',NULL,NULL,1,5,2,6);
INSERT INTO `pemesanan` VALUES (117,'38711','2014-03-09','4406000',1,'2','6000','0','0',NULL,NULL,1,5,2,7);
INSERT INTO `pemesanan` VALUES (118,'91856','2014-03-09','40020000',1,'2','20000','0','0',NULL,NULL,1,5,2,8);
INSERT INTO `pemesanan` VALUES (124,'55856','2014-03-21 19:59:49','4410000',1,'2','10000','0','0',NULL,'05',1,5,2,10);
INSERT INTO `pemesanan` VALUES (125,'33352','2014-03-21 20:02:56','4810000',1,'2','10000','0','0',NULL,'05',1,5,2,10);
INSERT INTO `pemesanan` VALUES (126,'48145','2014-03-21 20:06:52','9010005',1,'2','10000','0','0',NULL,'05',1,5,2,10);
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table pemesanan_produk
#

CREATE TABLE `pemesanan_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPemesanan` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `jumlahPemesananProduk` int(11) DEFAULT NULL,
  `hargaPemesananProduk` varchar(40) DEFAULT NULL,
  `beratPemesananProduk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`idPemesanan`,`idProduk`),
  KEY `pemesanan_pemesanan_produk` (`idPemesanan`),
  KEY `produk_pemesanan_produk` (`idProduk`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;
INSERT INTO `pemesanan_produk` VALUES (3,4,37,4,'16000000','2');
INSERT INTO `pemesanan_produk` VALUES (4,5,37,2,'8000000','3');
INSERT INTO `pemesanan_produk` VALUES (5,6,30,5,'35000000','4');
INSERT INTO `pemesanan_produk` VALUES (6,7,30,5,'35000000','5');
INSERT INTO `pemesanan_produk` VALUES (7,8,35,5,'65000000','6');
INSERT INTO `pemesanan_produk` VALUES (8,8,30,2,'14000000','7');
INSERT INTO `pemesanan_produk` VALUES (9,9,37,2,'8000000','8');
INSERT INTO `pemesanan_produk` VALUES (10,10,29,3,'14400000','9');
INSERT INTO `pemesanan_produk` VALUES (11,11,29,4,'19200000','1');
INSERT INTO `pemesanan_produk` VALUES (12,12,54,3,'20520000','2');
INSERT INTO `pemesanan_produk` VALUES (13,13,54,3,'20520000','3');
INSERT INTO `pemesanan_produk` VALUES (14,14,29,4,'19200000','4');
INSERT INTO `pemesanan_produk` VALUES (15,15,32,2,'18000000','5');
INSERT INTO `pemesanan_produk` VALUES (16,16,29,2,'9600000','6');
INSERT INTO `pemesanan_produk` VALUES (17,17,29,2,'9600000','7');
INSERT INTO `pemesanan_produk` VALUES (18,18,40,2,'50000000','8');
INSERT INTO `pemesanan_produk` VALUES (19,19,28,3,'13200000','1');
INSERT INTO `pemesanan_produk` VALUES (20,20,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (21,21,28,2,'8800000','3');
INSERT INTO `pemesanan_produk` VALUES (22,22,28,2,'8800000','4');
INSERT INTO `pemesanan_produk` VALUES (23,23,28,1,'4400000','5');
INSERT INTO `pemesanan_produk` VALUES (24,24,28,3,'13200000','6');
INSERT INTO `pemesanan_produk` VALUES (25,25,35,2,'26000000','7');
INSERT INTO `pemesanan_produk` VALUES (26,26,30,1,'7000000','8');
INSERT INTO `pemesanan_produk` VALUES (27,27,36,2,'3600000','1');
INSERT INTO `pemesanan_produk` VALUES (28,28,35,2,'26000000','2');
INSERT INTO `pemesanan_produk` VALUES (29,29,35,2,'26000000','3');
INSERT INTO `pemesanan_produk` VALUES (30,29,28,2,'8800000','4');
INSERT INTO `pemesanan_produk` VALUES (31,30,35,1,'13000000','5');
INSERT INTO `pemesanan_produk` VALUES (32,31,35,1,'13000000','6');
INSERT INTO `pemesanan_produk` VALUES (33,32,28,1,'4400000','7');
INSERT INTO `pemesanan_produk` VALUES (34,33,37,2,'8000000','8');
INSERT INTO `pemesanan_produk` VALUES (35,34,29,1,'4800000','9');
INSERT INTO `pemesanan_produk` VALUES (36,34,41,1,'40000000','5');
INSERT INTO `pemesanan_produk` VALUES (37,35,32,1,'9000000','6');
INSERT INTO `pemesanan_produk` VALUES (38,35,41,1,'9000000','7');
INSERT INTO `pemesanan_produk` VALUES (39,35,29,1,'9000000','8');
INSERT INTO `pemesanan_produk` VALUES (40,35,32,1,'9000000','9');
INSERT INTO `pemesanan_produk` VALUES (41,35,28,1,'9000000','3');
INSERT INTO `pemesanan_produk` VALUES (42,36,33,5,'55000000','2');
INSERT INTO `pemesanan_produk` VALUES (43,36,37,2,'8000000','2');
INSERT INTO `pemesanan_produk` VALUES (44,37,29,1,'4800000','2');
INSERT INTO `pemesanan_produk` VALUES (45,38,29,1,'4800000','2');
INSERT INTO `pemesanan_produk` VALUES (46,39,28,2,'8800000','2');
INSERT INTO `pemesanan_produk` VALUES (47,40,33,2,'22000000','2');
INSERT INTO `pemesanan_produk` VALUES (48,40,29,6,'28800000','2');
INSERT INTO `pemesanan_produk` VALUES (49,41,33,2,'22000000','2');
INSERT INTO `pemesanan_produk` VALUES (50,41,41,2,'80000000','2');
INSERT INTO `pemesanan_produk` VALUES (51,42,28,2,'8800000','2');
INSERT INTO `pemesanan_produk` VALUES (52,42,32,2,'18000000','2');
INSERT INTO `pemesanan_produk` VALUES (53,43,29,1,'4800000','2');
INSERT INTO `pemesanan_produk` VALUES (54,44,32,1,'9000000','2');
INSERT INTO `pemesanan_produk` VALUES (55,45,32,1,'9000000','2');
INSERT INTO `pemesanan_produk` VALUES (56,46,30,2,'14000000','2');
INSERT INTO `pemesanan_produk` VALUES (57,46,39,2,'14000000','2');
INSERT INTO `pemesanan_produk` VALUES (58,47,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (59,48,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (60,49,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (61,50,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (62,51,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (63,52,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (64,53,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (65,54,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (66,55,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (67,56,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (68,57,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (69,58,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (70,59,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (71,60,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (72,61,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (73,62,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (74,63,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (75,64,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (76,65,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (77,66,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (78,67,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (79,68,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (80,69,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (81,70,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (82,71,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (83,72,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (84,73,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (85,74,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (86,75,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (87,76,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (88,77,30,1,'7000000','2');
INSERT INTO `pemesanan_produk` VALUES (89,78,30,1,'7000000','2');
INSERT INTO `pemesanan_produk` VALUES (90,79,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (91,80,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (92,81,43,2,'40000000','2');
INSERT INTO `pemesanan_produk` VALUES (93,81,39,2,'14000000','2');
INSERT INTO `pemesanan_produk` VALUES (94,82,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (95,83,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (96,48,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (97,85,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (98,86,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (99,87,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (100,88,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (101,89,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (102,90,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (103,91,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (104,92,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (105,93,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (106,94,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (107,95,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (108,96,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (109,97,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (110,98,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (111,99,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (112,100,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (113,101,37,1,'4000000','2');
INSERT INTO `pemesanan_produk` VALUES (114,102,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (115,103,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (116,104,29,1,'4800000','2');
INSERT INTO `pemesanan_produk` VALUES (117,105,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (118,106,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (119,107,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (120,108,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (121,109,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (122,110,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (123,111,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (124,112,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (125,112,32,1,'9000000','2');
INSERT INTO `pemesanan_produk` VALUES (126,113,37,1,'4000000','2');
INSERT INTO `pemesanan_produk` VALUES (127,114,43,1,'20000000','2');
INSERT INTO `pemesanan_produk` VALUES (128,115,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (129,116,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (130,117,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (131,118,41,1,'40000000','2');
INSERT INTO `pemesanan_produk` VALUES (132,119,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (133,124,28,1,'4400000','2');
INSERT INTO `pemesanan_produk` VALUES (134,125,29,1,'4800000','2');
INSERT INTO `pemesanan_produk` VALUES (135,126,32,1,'9000000','2');
/*!40000 ALTER TABLE `pemesanan_produk` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table produk
#

CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaProduk` varchar(255) DEFAULT NULL,
  `deskripsiProduk` text,
  `hargaProduk` decimal(19,4) DEFAULT NULL,
  `discountProduk` decimal(4,2) DEFAULT NULL,
  `stlhDiscount` decimal(19,4) DEFAULT NULL,
  `isBest_seller` char(1) DEFAULT '0',
  `is_stock` char(1) DEFAULT '1',
  `gambarProduk` varchar(255) DEFAULT NULL,
  `tglInput` date DEFAULT NULL,
  `tglUpdate` date DEFAULT NULL,
  `inputBy` int(11) DEFAULT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `idKategoriMerk` int(11) DEFAULT NULL,
  `idKategori` int(11) DEFAULT NULL,
  `idMerk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_merk_produk` (`idKategoriMerk`,`idKategori`,`idMerk`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
INSERT INTO `produk` VALUES (28,'Notebook 1','ini notebook 1',5000000,12,4400000,'1','0','913666d4a79c139bda1ad8a39c736f56.jpg','2013-10-15','2014-03-09',3,3,169,24,1);
INSERT INTO `produk` VALUES (29,'Notebook 2','ini notebook 2',6000000,20,4800000,'1','1','e2e75110417dd9d77028a3ea78e49c70.jpg','2014-02-18','2014-03-20',3,3,169,24,1);
INSERT INTO `produk` VALUES (30,'Notebook 3','ini notebook 3',7000000,0,0,'1','1','9e9cff36d0c1f587ac15c4ce6539739b.jpg','2014-02-18','2014-03-20',3,3,169,24,1);
INSERT INTO `produk` VALUES (31,'Notebook 4','ini notebook 4',8000000,0,0,'1','1','e0f24468ef4650f749637b7e2b8daaa5.jpg','2014-02-18','2014-03-20',3,3,169,24,1);
INSERT INTO `produk` VALUES (32,'Komputer 1','ini komputer 1',10000000,10,9000000,'1','1','de08aa17c618c95c9776fcfa83682e58.jpg','2014-02-18','2014-03-02',3,3,160,17,2);
INSERT INTO `produk` VALUES (33,'Komputer 2','ini komputer 2',11000000,0,0,'1','1','b199d1dee720c3ebc57751fa76a989d9.jpg','2014-02-18','2014-03-02',3,3,162,17,4);
INSERT INTO `produk` VALUES (34,'Komputer 3','ini komputer 3',12000000,30,8400000,'1','1','8de5878fb5f5e110ec0dabae664e2934.jpg','2014-02-18','2014-03-02',3,3,161,17,3);
INSERT INTO `produk` VALUES (35,'Komputer 4','ini komputer 4',13000000,0,0,'1','1','f131b406802b2a828244a38212cc953f.jpg','2014-02-18','2014-03-02',3,3,160,17,2);
INSERT INTO `produk` VALUES (36,'Smartphone 1','Smartphone 1 Smartphone 1',3000000,40,1800000,'1','1','7c715a014febabc719311beb25f2f0f9.jpg','2014-02-18','2014-03-02',3,3,165,23,4);
INSERT INTO `produk` VALUES (37,'Smartphone 2','Smartphone 2 Smartphone 2',4000000,0,0,'1','1','79059f9495b52087686e02994c54682e.jpeg','2014-02-18','2014-03-06',3,3,170,23,15);
INSERT INTO `produk` VALUES (38,'Smartphone 3','Smartphone 3 Smartphone 3',5000000,45,2750000,'0','1','0c919c027cffcf77bfe09fb62e064e90.jpg','2014-02-18','2014-03-02',3,3,165,23,4);
INSERT INTO `produk` VALUES (39,'Smartphone 4','Smartphone 4 Smartphone 4',7000000,0,0,'0','1','3a7163bd9b03d22d8c76d05fe4878b86.jpg','2014-02-18','2014-03-02',3,3,170,23,15);
INSERT INTO `produk` VALUES (40,'Server 1','Server 1 Server 1',50000000,50,25000000,'0','1','5eb6f432c0928c7103d205e7cd75b1b2.jpg','2014-02-18','2014-03-02',3,3,171,25,1);
INSERT INTO `produk` VALUES (41,'Server 2','Server 2 Server 2 ',40000000,0,0,'0','1','f54372fcbdd6f6063dac045bfd85634e.jpg','2014-02-18','2014-03-02',3,3,171,25,1);
INSERT INTO `produk` VALUES (42,'Server 3','Server 3 Server 3 ',30000000,10,27000000,'0','1','ec05c63b5825092fc65f2f2d47cc01b8.jpg','2014-02-18','2014-03-02',3,3,171,25,1);
INSERT INTO `produk` VALUES (43,'Server 4','Server 3 Server 3 ',20000000,0,0,'1','1','e1b24df6323bfc34a224ea671c52e8dc.jpg','2014-02-18','2014-03-02',3,3,172,25,2);
INSERT INTO `produk` VALUES (44,'Router 1','Router 1 Router 1',7000000,15,5950000,'0','1','5d0d06575aafe27322fd8434ca957548.jpg','2014-02-18',NULL,3,NULL,173,26,16);
INSERT INTO `produk` VALUES (45,'Router 2','Router 2 Router 2',5000000,0,0,'0','1','6e2dc3b992cfd454e0e4d1355289e76c.jpg','2014-02-18',NULL,3,NULL,174,26,17);
INSERT INTO `produk` VALUES (46,'Router 3','Router 3 Router 3',3000000,25,2250000,'0','1','b181a8fb5839875e71745df726c4f4fd.jpg','2014-02-18',NULL,3,NULL,175,26,18);
INSERT INTO `produk` VALUES (47,'Router 4','Router 4 Router 4',2000000,0,0,'0','1','42fd704a23fe5fa707f9161f3789e167.jpg','2014-02-18',NULL,3,NULL,173,26,16);
INSERT INTO `produk` VALUES (48,'Switch 1','Switch 1 Switch 1',2000000,10,1800000,'0','1','0d7105b59a8ba08a200616caddf60634.jpeg','2014-02-18',NULL,3,NULL,176,27,17);
INSERT INTO `produk` VALUES (49,'Switch 2','Switch 2 Switch 2 ',3000000,0,0,'0','1','39dd3585f99142014987f98a4b244847.jpeg','2014-02-18',NULL,3,NULL,177,27,18);
INSERT INTO `produk` VALUES (50,'Switch 3','Switch 3 Switch 3',4000000,15,3400000,'0','1','f525e58d51d750861ce5ba3e221f25ba.jpeg','2014-02-18',NULL,3,NULL,177,27,18);
INSERT INTO `produk` VALUES (51,'Switch 4','Switch 4 Switch 4',1000000,0,0,'0','1','24f519805c8528c882ac8d7271ef322e.jpeg','2014-02-18',NULL,3,NULL,177,27,18);
INSERT INTO `produk` VALUES (52,' UPS 1',' UPS 1  UPS 1',5000000,23,3850000,'0','1','633abe1af8b8b0f35915380e5c3a077b.jpg','2014-02-18',NULL,3,NULL,178,28,1);
INSERT INTO `produk` VALUES (53,' UPS 2',' UPS 2  UPS 2',8000000,0,0,'0','1','67ebe5df3df60ae942cd009e5418dd99.jpg','2014-02-18',NULL,3,NULL,178,28,1);
INSERT INTO `produk` VALUES (54,'UPS 3','UPS 3 UPS 3',9000000,24,6840000,'0','1','bfe07a3f24bbce5e741a6f28e51934b6.jpg','2014-02-18','2014-03-09',3,3,178,28,1);
INSERT INTO `produk` VALUES (55,'UPS 4','UPS 4 UPS 4',10000000,0,0,'0','1','7846740702a559e2253127d35fc915d6.jpg','2014-02-18',NULL,3,NULL,178,28,1);
INSERT INTO `produk` VALUES (56,'Wireless 1','Wireless 1 Wireless 1',7000000,30,4900000,'0','1','06d24a8014737deed7d4ffe9ff09559a.jpg','2014-02-18',NULL,3,NULL,180,30,16);
INSERT INTO `produk` VALUES (57,'Wireless 2','Wireless 2 Wireless 2',9000000,0,0,'0','1','abc60848179680697db7ca1c54656da7.jpg','2014-02-18',NULL,3,NULL,181,30,18);
INSERT INTO `produk` VALUES (58,'Router 5','Router 5 Router 5 Router 5 Router 5',3000000,15,2550000,'0','1','9439abcf8369b22be1528bc9e7e89dcd.jpg','2014-03-01','2014-03-01',3,3,165,23,4);
INSERT INTO `produk` VALUES (106,'sadfsdf','sdfsadfsadf',123123123,0,0,'0','1','7f8eeb89f7dc88970eaccf334187c0ff.jpg','2014-03-20',NULL,3,NULL,171,25,1);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table produk_spesifikasi
#

CREATE TABLE `produk_spesifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduk` int(11) NOT NULL,
  `idSpesifikasi` int(11) NOT NULL,
  `isiSpesifikasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`idProduk`,`idSpesifikasi`),
  KEY `produk_produk_spesifikasi` (`idProduk`),
  KEY `spesifikasi_produk_spesifikasi` (`idSpesifikasi`)
) ENGINE=MyISAM AUTO_INCREMENT=265 DEFAULT CHARSET=latin1;
INSERT INTO `produk_spesifikasi` VALUES (100,28,92,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (101,28,93,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (102,28,94,'2');
INSERT INTO `produk_spesifikasi` VALUES (103,28,95,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (104,29,92,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (105,29,93,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (106,29,94,'2');
INSERT INTO `produk_spesifikasi` VALUES (107,29,95,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (108,30,92,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (109,30,93,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (110,30,94,'2');
INSERT INTO `produk_spesifikasi` VALUES (111,30,95,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (112,31,92,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (113,31,93,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (114,31,94,'2');
INSERT INTO `produk_spesifikasi` VALUES (115,31,95,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (116,32,74,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (117,32,75,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (118,32,76,'2');
INSERT INTO `produk_spesifikasi` VALUES (119,32,77,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (120,33,74,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (121,33,75,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (122,33,76,'2');
INSERT INTO `produk_spesifikasi` VALUES (123,33,77,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (124,34,74,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (125,34,75,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (126,34,76,'2');
INSERT INTO `produk_spesifikasi` VALUES (127,34,77,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (128,35,74,'detail spesifikasi 1');
INSERT INTO `produk_spesifikasi` VALUES (129,35,75,'detail spesifikasi 2');
INSERT INTO `produk_spesifikasi` VALUES (130,35,76,'2');
INSERT INTO `produk_spesifikasi` VALUES (131,35,77,'detail spesifikasi 4');
INSERT INTO `produk_spesifikasi` VALUES (132,36,89,'Smartphone 1');
INSERT INTO `produk_spesifikasi` VALUES (133,36,90,'Smartphone 1');
INSERT INTO `produk_spesifikasi` VALUES (134,36,91,'2');
INSERT INTO `produk_spesifikasi` VALUES (135,37,89,'Smartphone 2');
INSERT INTO `produk_spesifikasi` VALUES (136,37,90,'Smartphone 2');
INSERT INTO `produk_spesifikasi` VALUES (137,37,91,'2');
INSERT INTO `produk_spesifikasi` VALUES (138,38,89,'Smartphone 3');
INSERT INTO `produk_spesifikasi` VALUES (139,38,90,'Smartphone 3');
INSERT INTO `produk_spesifikasi` VALUES (140,38,91,'2');
INSERT INTO `produk_spesifikasi` VALUES (141,39,89,'Smartphone 4');
INSERT INTO `produk_spesifikasi` VALUES (142,39,90,'Smartphone 4');
INSERT INTO `produk_spesifikasi` VALUES (143,39,91,'2');
INSERT INTO `produk_spesifikasi` VALUES (144,40,96,'Server 1');
INSERT INTO `produk_spesifikasi` VALUES (145,40,97,'Server 1');
INSERT INTO `produk_spesifikasi` VALUES (146,40,98,'2');
INSERT INTO `produk_spesifikasi` VALUES (147,40,99,'Server 1');
INSERT INTO `produk_spesifikasi` VALUES (148,41,96,'Server 2');
INSERT INTO `produk_spesifikasi` VALUES (149,41,97,'Server 2');
INSERT INTO `produk_spesifikasi` VALUES (150,41,98,'2');
INSERT INTO `produk_spesifikasi` VALUES (151,41,99,'Server 2');
INSERT INTO `produk_spesifikasi` VALUES (152,42,96,'Server 3');
INSERT INTO `produk_spesifikasi` VALUES (153,42,97,'Server 3');
INSERT INTO `produk_spesifikasi` VALUES (154,42,98,'2');
INSERT INTO `produk_spesifikasi` VALUES (155,42,99,'Server 3');
INSERT INTO `produk_spesifikasi` VALUES (156,43,96,'Server 3');
INSERT INTO `produk_spesifikasi` VALUES (157,43,97,'Server 3');
INSERT INTO `produk_spesifikasi` VALUES (158,43,98,'2');
INSERT INTO `produk_spesifikasi` VALUES (159,43,99,'Server 3');
INSERT INTO `produk_spesifikasi` VALUES (160,44,100,'Router 1');
INSERT INTO `produk_spesifikasi` VALUES (161,44,101,'Router 1');
INSERT INTO `produk_spesifikasi` VALUES (162,44,102,'2');
INSERT INTO `produk_spesifikasi` VALUES (163,44,103,'Router 1');
INSERT INTO `produk_spesifikasi` VALUES (164,45,100,'Router 2');
INSERT INTO `produk_spesifikasi` VALUES (165,45,101,'Router 2');
INSERT INTO `produk_spesifikasi` VALUES (166,45,102,'2');
INSERT INTO `produk_spesifikasi` VALUES (167,45,103,'Router 2');
INSERT INTO `produk_spesifikasi` VALUES (168,46,100,'Router 3');
INSERT INTO `produk_spesifikasi` VALUES (169,46,101,'Router 3');
INSERT INTO `produk_spesifikasi` VALUES (170,46,102,'2');
INSERT INTO `produk_spesifikasi` VALUES (171,46,103,'Router 3');
INSERT INTO `produk_spesifikasi` VALUES (172,47,100,'Router 4');
INSERT INTO `produk_spesifikasi` VALUES (173,47,101,'Router 4');
INSERT INTO `produk_spesifikasi` VALUES (174,47,102,'2');
INSERT INTO `produk_spesifikasi` VALUES (175,47,103,'Router 4');
INSERT INTO `produk_spesifikasi` VALUES (176,48,104,'Switch 1');
INSERT INTO `produk_spesifikasi` VALUES (177,48,105,'Switch 1');
INSERT INTO `produk_spesifikasi` VALUES (178,48,106,'2');
INSERT INTO `produk_spesifikasi` VALUES (179,48,107,'Switch 1');
INSERT INTO `produk_spesifikasi` VALUES (180,49,104,'Switch 2');
INSERT INTO `produk_spesifikasi` VALUES (181,49,105,'Switch 2');
INSERT INTO `produk_spesifikasi` VALUES (182,49,106,'2');
INSERT INTO `produk_spesifikasi` VALUES (183,49,107,'Switch 2');
INSERT INTO `produk_spesifikasi` VALUES (184,50,104,'Switch 3');
INSERT INTO `produk_spesifikasi` VALUES (185,50,105,'Switch 3');
INSERT INTO `produk_spesifikasi` VALUES (186,50,106,'2');
INSERT INTO `produk_spesifikasi` VALUES (187,50,107,'Switch 3');
INSERT INTO `produk_spesifikasi` VALUES (188,51,104,'Switch 4');
INSERT INTO `produk_spesifikasi` VALUES (189,51,105,'Switch 4');
INSERT INTO `produk_spesifikasi` VALUES (190,51,106,'2');
INSERT INTO `produk_spesifikasi` VALUES (191,51,107,'Switch 4');
INSERT INTO `produk_spesifikasi` VALUES (192,52,108,' UPS 1');
INSERT INTO `produk_spesifikasi` VALUES (193,52,109,' UPS 1');
INSERT INTO `produk_spesifikasi` VALUES (194,52,110,'2');
INSERT INTO `produk_spesifikasi` VALUES (195,52,111,' UPS 1');
INSERT INTO `produk_spesifikasi` VALUES (196,53,108,' UPS 2');
INSERT INTO `produk_spesifikasi` VALUES (197,53,109,' UPS 2');
INSERT INTO `produk_spesifikasi` VALUES (198,53,110,'2');
INSERT INTO `produk_spesifikasi` VALUES (199,53,111,' UPS 2');
INSERT INTO `produk_spesifikasi` VALUES (200,54,108,'UPS 3');
INSERT INTO `produk_spesifikasi` VALUES (201,54,109,'UPS 3');
INSERT INTO `produk_spesifikasi` VALUES (202,54,110,'2');
INSERT INTO `produk_spesifikasi` VALUES (203,54,111,'UPS 3');
INSERT INTO `produk_spesifikasi` VALUES (204,55,108,'UPS 4');
INSERT INTO `produk_spesifikasi` VALUES (205,55,109,'UPS 4');
INSERT INTO `produk_spesifikasi` VALUES (206,55,110,'2');
INSERT INTO `produk_spesifikasi` VALUES (207,55,111,'UPS 4');
INSERT INTO `produk_spesifikasi` VALUES (208,56,116,'Wireless 1');
INSERT INTO `produk_spesifikasi` VALUES (209,56,117,'Wireless 1');
INSERT INTO `produk_spesifikasi` VALUES (210,56,118,'2');
INSERT INTO `produk_spesifikasi` VALUES (211,56,119,'Wireless 1');
INSERT INTO `produk_spesifikasi` VALUES (212,57,116,'Wireless 2');
INSERT INTO `produk_spesifikasi` VALUES (213,57,117,'Wireless 2');
INSERT INTO `produk_spesifikasi` VALUES (214,57,118,'2');
INSERT INTO `produk_spesifikasi` VALUES (215,57,119,'Wireless 2');
INSERT INTO `produk_spesifikasi` VALUES (216,58,89,'Router 5');
INSERT INTO `produk_spesifikasi` VALUES (217,58,90,'Router 5');
INSERT INTO `produk_spesifikasi` VALUES (218,58,91,'2');
INSERT INTO `produk_spesifikasi` VALUES (229,1,100,'asdasd');
INSERT INTO `produk_spesifikasi` VALUES (230,1,101,'asdasd');
INSERT INTO `produk_spesifikasi` VALUES (231,1,102,'aadsad');
INSERT INTO `produk_spesifikasi` VALUES (232,1,103,'asdasdas');
INSERT INTO `produk_spesifikasi` VALUES (261,106,96,'sdfsadfsadf');
INSERT INTO `produk_spesifikasi` VALUES (262,106,97,'sadfasdf');
INSERT INTO `produk_spesifikasi` VALUES (263,106,98,'sadfsaf');
INSERT INTO `produk_spesifikasi` VALUES (264,106,99,'asdfasfsafd');
/*!40000 ALTER TABLE `produk_spesifikasi` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table project
#

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `kategori` varchar(255) DEFAULT NULL,
  `visibilitas` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `perkiraan_anggaran` decimal(19,4) DEFAULT NULL,
  `jenis_industr` varchar(255) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table shipping
#

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif` decimal(19,4) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `id_state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
INSERT INTO `shipping` VALUES (6,10000,160,12);
INSERT INTO `shipping` VALUES (7,5000,161,12);
INSERT INTO `shipping` VALUES (8,5000,162,12);
INSERT INTO `shipping` VALUES (9,5000,163,12);
INSERT INTO `shipping` VALUES (10,5000,164,12);
INSERT INTO `shipping` VALUES (11,5000,165,12);
/*!40000 ALTER TABLE `shipping` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table spesifikasi
#

CREATE TABLE `spesifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaSpesifikasi` varchar(255) DEFAULT NULL,
  `idKategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_spesifikasi` (`idKategori`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;
INSERT INTO `spesifikasi` VALUES (74,'Motherboard',17);
INSERT INTO `spesifikasi` VALUES (75,'RAM',17);
INSERT INTO `spesifikasi` VALUES (76,'Berat',17);
INSERT INTO `spesifikasi` VALUES (77,'Processor',17);
INSERT INTO `spesifikasi` VALUES (89,'RAM',23);
INSERT INTO `spesifikasi` VALUES (90,'Processor',23);
INSERT INTO `spesifikasi` VALUES (91,'Berat',23);
INSERT INTO `spesifikasi` VALUES (92,'Nama Spesifikasi 1',24);
INSERT INTO `spesifikasi` VALUES (93,'Nama Spesifikasi 2',24);
INSERT INTO `spesifikasi` VALUES (94,'Berat',24);
INSERT INTO `spesifikasi` VALUES (95,'Nama Spesifikasi 4',24);
INSERT INTO `spesifikasi` VALUES (96,'Nama Spesifikasi 1',25);
INSERT INTO `spesifikasi` VALUES (97,'Nama Spesifikasi 2',25);
INSERT INTO `spesifikasi` VALUES (98,'Berat',25);
INSERT INTO `spesifikasi` VALUES (99,'Nama Spesifikasi 4',25);
INSERT INTO `spesifikasi` VALUES (100,'Nama Spesifikasi 1',26);
INSERT INTO `spesifikasi` VALUES (101,'Nama Spesifikasi 2',26);
INSERT INTO `spesifikasi` VALUES (102,'Berat',26);
INSERT INTO `spesifikasi` VALUES (103,'Nama Spesifikasi 4',26);
INSERT INTO `spesifikasi` VALUES (104,'Nama Spesifikasi 1',27);
INSERT INTO `spesifikasi` VALUES (105,'Nama Spesifikasi 2',27);
INSERT INTO `spesifikasi` VALUES (106,'Berat',27);
INSERT INTO `spesifikasi` VALUES (107,'Nama Spesifikasi 4',27);
INSERT INTO `spesifikasi` VALUES (108,'Nama Spesifikasi 1',28);
INSERT INTO `spesifikasi` VALUES (109,'Nama Spesifikasi 2',28);
INSERT INTO `spesifikasi` VALUES (110,'Berat',28);
INSERT INTO `spesifikasi` VALUES (111,'Nama Spesifikasi 4',28);
INSERT INTO `spesifikasi` VALUES (112,'Nama Spesifikasi 1',29);
INSERT INTO `spesifikasi` VALUES (113,'Nama Spesifikasi 2',29);
INSERT INTO `spesifikasi` VALUES (114,'Berat',29);
INSERT INTO `spesifikasi` VALUES (115,'Nama Spesifikasi 4',29);
INSERT INTO `spesifikasi` VALUES (116,'Nama Spesifikasi 1',30);
INSERT INTO `spesifikasi` VALUES (117,'Nama Spesifikasi 2',30);
INSERT INTO `spesifikasi` VALUES (118,'Berat',30);
INSERT INTO `spesifikasi` VALUES (119,'Nama Spesifikasi 4',30);
INSERT INTO `spesifikasi` VALUES (120,'test',24);
/*!40000 ALTER TABLE `spesifikasi` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table statuspemesanan
#

CREATE TABLE `statuspemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaStatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
INSERT INTO `statuspemesanan` VALUES (1,'Belum Lunas');
INSERT INTO `statuspemesanan` VALUES (2,'Sudah Lunas');
INSERT INTO `statuspemesanan` VALUES (3,'Canceled');
/*!40000 ALTER TABLE `statuspemesanan` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table user
#

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `hash` varchar(32) NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT '0',
  `tipeUser` int(1) NOT NULL,
  `is_banned` char(1) DEFAULT '0',
  `banned_reason` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `banned_by` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
INSERT INTO `user` VALUES (3,'samandajimmy','202cb962ac59075b964b07152d234b70','','e2a2dcc36a08a345332c751b2f2e476c',1,-1,'0',NULL,NULL,'2014-03-14 10:58:50',NULL,NULL);
INSERT INTO `user` VALUES (4,'samanda','5889136c85ab0b1108170102960899c2','','',1,1,'0',NULL,NULL,'2014-03-14 10:58:50',NULL,NULL);
INSERT INTO `user` VALUES (5,'jimmy','5889136c85ab0b1108170102960899c2','samandajimmyr@gmail.com','816b112c6105b3ebd537828a39af4818',1,1,'0',NULL,NULL,'2014-03-14 10:58:50',NULL,NULL);
INSERT INTO `user` VALUES (8,'a','5889136c85ab0b1108170102960899c2','','e995f98d56967d946471af29d7bf99f1',1,1,'0',NULL,NULL,'2014-03-14 10:58:50',NULL,NULL);
INSERT INTO `user` VALUES (13,'samanda123','202cb962ac59075b964b07152d234b70','samandajimmy@yahoo.com','',1,-2,'0',NULL,3,'2014-03-14 10:58:50',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
