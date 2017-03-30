/*
Navicat MySQL Data Transfer

Source Server         : sig
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : gis

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2014-05-19 17:13:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for db_admin
-- ----------------------------
DROP TABLE IF EXISTS `db_admin`;
CREATE TABLE `db_admin` (
  `id` int(1) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `tgl_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_admin
-- ----------------------------
INSERT INTO `db_admin` VALUES ('1', 'Ulil', 'mO7LFmT2f7IUhbt4o3or7klLjA3t4QMNXWfT7UOwZbg=', 'kudus', '2014-03-20 01:58:00');

-- ----------------------------
-- Table structure for db_alamat
-- ----------------------------
DROP TABLE IF EXISTS `db_alamat`;
CREATE TABLE `db_alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `kd_alamat` varchar(9) DEFAULT NULL,
  `kd_produksi` varchar(9) DEFAULT NULL,
  `kd_kecamatan` varchar(9) DEFAULT NULL,
  `nama_usaha` varchar(50) DEFAULT NULL,
  `pemilik` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tng_kerja` int(5) DEFAULT NULL,
  `nilai_investasi` int(15) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `lat` varchar(10) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `gambar` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_alamat
-- ----------------------------
INSERT INTO `db_alamat` VALUES ('1', '01.01.003', 'K0101', '33.19.03', 'FATIKHASARI COLLECTION', 'Muahammad Zaim', 'Ds.Loram Kulon RT.02/02', '10', '20000000', 'sasaran pemasaran solo, semarang, megelang, sekitar wilayah jawa tengah', '-6.829542', '110.846592', '1394864606.jpg');
INSERT INTO `db_alamat` VALUES ('2', '01.01.002', 'K0101', '33.19.06', 'DINSA', 'Miftahuddin', 'Ds.hadipolo RT.01/02', '8', '30000000', 'sasaran pemasaran solo, semarang, megelang, sekitar wilayah jawa tengah', '-6.802502', '110.908033', null);
INSERT INTO `db_alamat` VALUES ('3', '01.02.002', 'K0102', '33.19.02', 'INDRIA LADIES', 'Indriyati', 'Dk. Nganguk Pengapon No.313 A RT.04/03', '5', '5000000', 'pemasaran semarang, cilacap, grobogan', '-6.802875', '110.849424', '1394989923.jpg');
INSERT INTO `db_alamat` VALUES ('4', '01.03.002', 'K0103', '33.19.02', 'PILIPINE ISTACHORI', '-', 'Kel.Wergu Kulon RT.04/03', '10', '70000000', 'pemasaran solo, pasar klewer, surabaya, bojonegoro', '-6.813049', '110.843504', '1394990022.jpg');
INSERT INTO `db_alamat` VALUES ('5', '01.04.006', 'K0104', '33.19.02', 'TERANG JAYA', 'Iswanto Santoso', 'Kel.Wergu Kulon RT.02 RW.05', '15', '50000000', 'sasaran pemasaran kerisedenan pati, lokal kudus, solo, magelang, ', '-6.812444', '110.843888', '1394990069.jpg');
INSERT INTO `db_alamat` VALUES ('6', '01.04.007', 'K0104', '33.19.02', 'ALIYAH', 'Lilik Aliyati', 'Jl. Gor Wetan No. 189 Kudus', '9', '7000000', 'pemasaran se- karisedanan pati, kota kudus, jepara, demak', '-6.814876', '110.845441', '1394990117.jpg');
INSERT INTO `db_alamat` VALUES ('7', '01.04.003', 'K0104', '33.19.02', 'ARWIDYA KRIYA MANDIRI', 'Tedy Arwiyanto', 'Jl. KH.Subkhan No.3 ', '15', '50000000', 'sasaran pemasaran semarang, kab semarang dan kota-kota kecil lainnya', '', '', null);
INSERT INTO `db_alamat` VALUES ('8', '01.05.009', 'K0105', '33.19.02', 'MADWI', 'Achmad Shidqi, SE', 'Ds. Janggalan RT. 03/01', '7', '4000000', 'pemasaran se-karisedanan pati, semarang, pekalongan', '-6.806346', '110.829681', '1394989483.jpg');
INSERT INTO `db_alamat` VALUES ('9', '01.05.010', 'K0105', '33.19.02', 'SALMA COLLECTION', 'Moch Mahfudz', 'Jl. Sekaran, Purwosari RT. 05/06', '6', '5000000', 'pemasaran se-karisedanan pati, solo, magelang', '-6.811962', '110.82239', '1394989845.jpg');
INSERT INTO `db_alamat` VALUES ('10', '01.05.008', 'K0105', '33.19.02', 'ERRINDA', 'H. Muhammad Alif', 'Ds. Janggalan RT. 01/02', '10', '50000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.807017', '110.829686', '1394989392.jpg');
INSERT INTO `db_alamat` VALUES ('11', '01.05.007', 'K0105', '33.19.07', 'AL-ASRO', 'Isyam Iskandar', 'Ds. Gondangmanis RT. 07/02', '8', '50000000', 'pemasaran kota gresik, lamongan', '-6.771364', '110.872851', '1394729454.jpg');
INSERT INTO `db_alamat` VALUES ('12', '01.05.006', 'K0105', '33.19.09', 'UST FAT EMBROIDERY COLLECTION', 'H. Sumadi Usman', 'Ds. Lau RT. 02/01', '8', '25000000', 'rata-rata pemasaran di daerah jawa timur, semarang, solo', '-6.737614', '110.89256', '1394724950.jpg');
INSERT INTO `db_alamat` VALUES ('13', '01.06.001', 'K0106', '33.19.04', 'PUTRA TUNGGAL', 'Suwanti', 'Ds. Undaan Tengah RT. 01/04', '13', '30000000', 'sasaran pemasaran lokal kudus, yogya, jakata, jawa timur', '-6.88345', '110.814006', null);
INSERT INTO `db_alamat` VALUES ('14', '01.06.002', 'K0106', '33.19.04', 'RISNA EMBROIDERY', 'Azizun Kharis', 'Ds. Undaan Kidul RT. 02/03', '10', '26000000', 'sasaran pemasaran lokal kudus, pati, solo', '-6.897528', '110.806574', null);
INSERT INTO `db_alamat` VALUES ('15', '01.06.003', 'K0106', '33.19.04', 'NADA FASHION', 'Choirunni\'mah', 'Ds. Wates Gang 2 RT. 05/01', '9', '19000000', 'sasaran pemasaran lokal kudus,  jawa timur, jepara', '-6.865342', '110.828413', null);
INSERT INTO `db_alamat` VALUES ('16', '01.06.004', 'K0106', '33.19.04', 'PUTRA TUNGGAL', 'Suharto', 'Ds. Undaan Tengah RT. 01/02', '14', '32000000', 'sasaran pemasaran lokal kudus, demak, grobogan, semarang', '-6.88214', '110.814977', null);
INSERT INTO `db_alamat` VALUES ('17', '01.06.015', 'K0106', '33.19.01', 'TION&#39;S COLLECTION', 'Sutiyono', 'Ds. Prambatan Kidul RT.08/04', '8', '10000000', 'sasaran pemasaran lokal kudus, demak, pati, jepara, semarang, kota-kota di jawa timur', '-6.808862', '110.820784', '1394989536.jpg');
INSERT INTO `db_alamat` VALUES ('18', '01.06.014', 'K0106', '33.19.02', 'ALDA BORDIR', 'Sri Darojatun', 'Ds.Janggalan No.149 RT.01/02', '10', '20000000', 'pemasaran lokal kudus, jepara, pati, semarang', '-6.805933', '110.829552', '1394989450.jpg');
INSERT INTO `db_alamat` VALUES ('19', '01.06.007', 'K0106', '33.19.02', 'BARIK LY', 'Ani Nurnaeni', 'Jl. KHR asnawi no.25', '7', '27200000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '', '', null);
INSERT INTO `db_alamat` VALUES ('20', '01.06.008', 'K0106', '33.19.08', 'ALIMA EMBROIDERY', 'SITI KHALIMAH', 'Ds. Karangmalang RT.02 RW.03', '15', '33000000', 'pemasaran solo, jawa timur', '', '', null);
INSERT INTO `db_alamat` VALUES ('21', '01.06.012', 'K0106', '33.19.09', 'CRISTY', 'Sukirno', 'Ds. Lau RT. 01/02', '5', '20000000', 'rata-rata pemasaran di daerah kudus sendiri, pati, jepara', '-6.737526', '110.89138', '1394725041.jpg');
INSERT INTO `db_alamat` VALUES ('22', '01.06.013', 'K0106', '33.19.02', 'TARA&#39;S', 'H. Ma&#39;ruf', 'Jl. Kyai Telingsing no. 42 Deamangan RT. 01/01', '8', '20000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.807667', '110.832248', '1394989325.jpg');
INSERT INTO `db_alamat` VALUES ('23', '01.07.009', 'K0107', '33.19.01', 'ZEILA COLLECTION', 'Insyiah', 'Dk. Winong RT.01/07 Ds. Kaliwungu', '10', '20000000', 'sasaran pemasaran semarang, jepara, salatiga, lokal kudus', '-6.795988', '110.806944', '1394988523.jpg');
INSERT INTO `db_alamat` VALUES ('24', '01.07.012', 'K0107', '33.19.02', 'SUMBER REJEKI', 'Nur Azizah', 'Wijilan RT.1/4 Purwosari', '7', '5000000', 'pemasaran semarang, gresik dan kota terdekat', '-6.812881', '110.823726', '1394989617.jpg');
INSERT INTO `db_alamat` VALUES ('25', '01.07.011', 'K0107', '33.19.02', 'AYU COLLECTION', 'H. Ahmad Rifa&#39;i', 'Ds. Langgardalem RT.04/01', '8', '98500000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.805088', '110.835158', '1394989152.jpg');
INSERT INTO `db_alamat` VALUES ('26', '01.07.004', 'K0107', '33.19.02', 'RIZQA RIZQI COLLECTION', 'Suwartono', 'Kel. Mlati Kidul RT. 02/03', '6', '8000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '', '', null);
INSERT INTO `db_alamat` VALUES ('27', '01.07.010', 'K0107', '33.19.02', 'VICTORY&#39;S HNF', 'Hj. Elvi Hayati, SH', 'Ds. Langgardalem No.273/253 RT.01/03', '7', '8000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.802979', '110.835265', '1394989101.jpg');
INSERT INTO `db_alamat` VALUES ('28', '01.07.008', 'K0107', '33.19.03', 'RIZA COLLECTION', 'Husin Jayadi', 'Ds.Loram Kulon RT.02/03', '15', '35000000', 'sasaran pemasaran jawa timur, luar jawa', '-6.829795', '110.846168', '1394864708.jpg');
INSERT INTO `db_alamat` VALUES ('29', '01.08.002', 'K0108', '33.19.02', 'M E CONFEKTION', 'H. MA&#39;RUF EFENDI', 'Kel. Kajeksan No. 25 B RT.01 RW.03', '9', '23000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.802063', '110.836217', '1394989051.jpg');
INSERT INTO `db_alamat` VALUES ('30', '01.09.002', 'K0109', '33.19.02', 'DAFFA COLLECTION', 'SAIFUL ANWAR', 'Kel. Purwosari RT.05 RW.02', '8', '30000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.812743', '110.822763', '1394989655.jpg');
INSERT INTO `db_alamat` VALUES ('31', '01.10.002', 'K0110', '33.19.03', 'HQ&#39;', 'ALI HAFIDH', 'Ds.Loram Wetan RT.3/5', '5', '10000000', 'sasaran pemasaran lokal kudus, demak, jepara, pati, se-karisedenan pati', '-6.833146', '110.848596', '1394864185.jpg');
INSERT INTO `db_alamat` VALUES ('32', '01.11.003', 'K0111', '33.19.03', 'ALFIZ', 'JOYO UNTUNG', 'Ds. Loram Wetan RT. 03 RW. 03', '7', '15000000', 'sasaran pemasaran lokal kudus, demak, jepara', '-6.832901', '110.849497', '1394864093.jpg');
INSERT INTO `db_alamat` VALUES ('33', '01.11.005', 'K0111', '33.19.03', 'NIA COLLECTION', 'SUTRISNO', 'Ds. Loram Kulon RT. 06 RW. 04', '11', '30000000', 'sasaran pemasaran lokal kudus, semarang, demak, jepara', '-6.831084', '110.845114', '1394989686.jpg');
INSERT INTO `db_alamat` VALUES ('34', '01.12.004', 'K0112', '33.19.08', 'ALFA COLLECTION', 'MASWAN', 'Ds. Karangmalang 1/8 ', '10', '12500000', 'pemasaran lokal kudus, jepara, demak, se-karisedan pati', '-6.786', '110.83166', '1394988675.jpg');
INSERT INTO `db_alamat` VALUES ('35', '01.13.001', 'K0113', '33.19.06', 'MAWADAH JAYA KONFEKSI', 'H. CHAMBALI', 'Ds. Pladen 3/3 ', '10', '60000000', 'pemasaran se-karisedenan pati, kudus, demak, ', '-6.811225', '110.934225', null);
INSERT INTO `db_alamat` VALUES ('36', '01.14.002', 'K0114', '33.19.03', 'AZ-ZAHRA', 'M.ALI LUTFI, SH', 'Loram Wetan RT.3/4', '15', '35000000', 'sasaran pemasaran lokal kudus, pati, se-karisedanan pati', '-6.83363', '110.849306', '1394864031.jpg');
INSERT INTO `db_alamat` VALUES ('37', '01.15.001', 'K0115', '33.19.02', 'KALIGUNTING COLLECTION', 'Drs. AGUS ABDUL MUKHID', 'Ds. Kajeksan RT.01 RW.02', '4', '10000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.801842', '110.836445', null);
INSERT INTO `db_alamat` VALUES ('38', '01.16.001', 'K0116', '33.19.05', 'EVI JAYA COLLECTION', 'JUMADI', 'Ds. Hadiwarno RT. 04 RW. 01', '7', '20000000', 'sasaran pemasaran lokal kudus, pati, grobogan, demak', '-6.828336', '110.899987', null);
INSERT INTO `db_alamat` VALUES ('39', '01.16.003', 'K0116', '33.19.06', 'N A D A', 'GUFERON', 'Ds. Hongosoco RT. 03 RW. 02', '5', '10000000', 'pemasaran se-karisedenan pati, kudus, demak, ', '-6.787297', '110.895108', '1394865787.jpg');
INSERT INTO `db_alamat` VALUES ('40', '01.17.009', 'K0117', '33.19.02', 'FADIA BORDIR', 'Fuadiyah', 'Kel. Mlatinorowito gang VII RT.01/05', '7', '43000000', 'sasaran pemasaran lokal kudus, jepara, karisedanan pati', '-6.80907', '110.855301', '1394989965.jpg');
INSERT INTO `db_alamat` VALUES ('41', '01.17.002', 'K0117', '33.19.02', 'ANTING COLLECTION', 'ZAENUDDIN, SH', 'Kel. Sunggingan RT.02 RW.06', '4', '3000000', 'pemasran lokal kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('42', '01.17.008', 'K0117', '33.19.02', 'E L I C A', 'HJ. SRI WAHYUNI', 'Jl. HM Suchan ZE  Kel. Purwosari RT.04 RW.03', '2', '2500000', 'pemasaran lokal kudus', '-6.814439', '110.825089', '1394989574.jpg');
INSERT INTO `db_alamat` VALUES ('43', '01.17.007', 'K0117', '33.19.08', 'BORDIR KHARISMA', 'Drs.Sholikul Hadi', 'Ds. Klumpit RT.03/01', '5', '7500000', 'pemasaran lokal kudus, jepara, demak', '-6.772187', '110.837496', '1394988622.jpg');
INSERT INTO `db_alamat` VALUES ('44', '01.17.006', 'K0117', '33.19.08', 'Fida Jaya Bordir', 'Mindayati', 'Ds. Kedungsari RT.03/09', '4', '5000000', 'pemasaran lokal kudus, jepara, demak', '-6.771213', '110.834943', '1394988592.jpg');
INSERT INTO `db_alamat` VALUES ('45', '01.18.002', 'K0118', '33.19.02', 'NING COLLECTION', 'Muhammadun', 'Dk.Wijilan RT. 02/04 kel. Purwosari', '15', '25000000', 'sasaran pemasaran lokal kudus, jepara, karisedanan pati', '-6.812634', '110.822503', '1394989777.jpg');
INSERT INTO `db_alamat` VALUES ('46', '01.19.008', 'K0119', '33.19.02', 'AMALYA', 'MUHAMAD IDRIS', 'Ds. Krandon RT. 05 RW. 01', '8', '30000000', 'pemasaran se-karisedanan pati, semarang, pekalongan', '-6.794784', '110.840168', '1394988957.jpg');
INSERT INTO `db_alamat` VALUES ('47', '01.19.009', 'K0119', '33.19.03', 'FARIA BORDIR', 'BASUKI WIBOWO', 'Ds. Getas Pejaten RT. 07 RW. 01', '13', '50000000', 'sasaran pemasaran jawa timur, luar jawa', '-6.830051', '110.841276', '1394990200.jpg');
INSERT INTO `db_alamat` VALUES ('48', '01.19.003', 'K0119', '33.19.08', 'SHOOFA', 'UMMU ASIYATI', 'Ds. Gribig RT. 05 RW. 04', '10', '45500000', 'sasaran pemasaran lokal kudus, pati, solo', '', '', null);
INSERT INTO `db_alamat` VALUES ('49', '01.20.002', 'K0120', '33.19.02', 'YULI COLLECTION', 'H. MUZJAMMIL KARSANI', 'Ds. Demangan 18 A 03/03', '6', '15000000', 'pemasaran lokal kota kudus, se-karisedanan pati, semarang, pekalongan', '-6.803147', '110.831048', '1394989206.jpg');
INSERT INTO `db_alamat` VALUES ('50', '01.21.001', 'K0121', '33.19.06', 'AL - KHUSNA', 'SUDIYONO', 'Ds. Hadipolo RT. 02 RW. 04', '7', '50000000', 'pemasaran lokal kudus, solo, jawa timur', '-6.801354', '110.907355', null);
INSERT INTO `db_alamat` VALUES ('51', '01.21.002', 'K0121', '33.19.06', 'AZZA COLLECTION', 'SUTIYONO', 'Ds. Hadipolo RT. 01 RW. 04', '4', '53000000', 'pemasaran lokal kudus, jawa timur, semarang', '-6.800374', '110.90729', null);
INSERT INTO `db_alamat` VALUES ('52', '01.21.003', 'K0121', '33.19.06', 'BENANG MAS', 'A M B Y A K', 'Ds. Hadipolo RT. 01 RW. 04', '4', '10000000', 'pemasaran lokal kudus, jepara, demak, se-karisedan pati', '-6.800417', '110.907529', null);
INSERT INTO `db_alamat` VALUES ('53', '01.21.004', 'K0121', '33.19.06', 'BUSANA INDAH', 'SADIKUL HUDA', 'Ds. Hadipolo RT. 02 RW. 04', '5', '10000000', 'pemasaran se-karisedenan pati, kudus, demak, ', '-6.801613', '110.907256', null);
INSERT INTO `db_alamat` VALUES ('54', '01.21.005', 'K0121', '33.19.06', 'ENDAH COLLECTION', 'Drs. AGUS SUHARYONO', 'Ds. Hadipolo RT. 01 RW. 04', '7', '50000000', 'pemasaran lokal kudus, solo, jawa timur', '-6.80035', '110.907867', null);
INSERT INTO `db_alamat` VALUES ('55', '01.21.006', 'K0121', '33.19.06', 'M A R T I N O', 'K U S T I O N O', 'Ds. Hadipolo RT. 01 RW. 04', '4', '53000000', 'pemasaran lokal kudus, jawa timur, semarang', '-6.800468', '110.908125', null);
INSERT INTO `db_alamat` VALUES ('56', '01.21.007', 'K0121', '33.19.06', 'M U G H I S', 'NORKHALIM', 'Ds. Hadipolo RT. 02 RW. 04', '4', '10000000', 'pemasaran lokal kudus, jepara, demak, se-karisedan pati', '-6.801602', '110.907124', null);
INSERT INTO `db_alamat` VALUES ('57', '01.21.008', 'K0121', '33.19.06', 'MUNA JAYA', 'MUHAMAD SAKURI', 'Ds. Hadipolo RT. 02 RW. 04', '5', '10000000', 'pemasaran lokal kudus, jepara, demak, se-karisedan pati', '-6.801549', '110.906888', null);
INSERT INTO `db_alamat` VALUES ('58', '01.21.011', 'K0121', '33.19.01', 'MUTIARA KONVEKSI', 'H.KASRUN', 'Ds.Kedungdowo RT.1/2', '13', '50000000', 'sasaran pemasaran lokal kudus, demak, pati, jepara, semarang, kota-kota di jawa timur', '-6.794579', '110.792041', '1394988371.jpg');
INSERT INTO `db_alamat` VALUES ('59', '01.21.010', 'K0121', '33.19.04', 'ARS', 'H. AINUR ROIS', 'Ds. Undaan Kidul 03/03', '10', '45000000', 'sasaran pemasaran lokal kudus, yogya, jakata, jawa timur', '-6.897196', '110.806603', null);
INSERT INTO `db_alamat` VALUES ('60', '01.22.001', 'K0122', '33.19.02', 'VADEL', 'MAEMUDIN', 'Kel. Purwosari RT. 03 RW. 05', '5', '10000000', 'pemasaran lokal kota kudus, se-karisedanan pati, semarang, pekalongan', '', '', null);
INSERT INTO `db_alamat` VALUES ('61', '01.23.008', 'K0123', '33.19.02', 'ANDRE COLLECTION', 'SURAJI', 'Ds. Damaran RT. 02 RW. 01', '10', '25000000', 'pemasaran lokal kota kudus, se-karisedanan pati, semarang, pekalongan', '-6.802161', '110.828597', '1394989265.jpg');
INSERT INTO `db_alamat` VALUES ('62', '01.23.002', 'K0123', '33.19.02', 'ELECTION KONFEKSI', 'MOCH AZKA RIF^AN', 'Jl. KHA Dahlan N0 25  ', '8', '5000000', 'pemasaran lokal kota kudus, se-karisedanan pati, semarang, pekalongan', '', '', null);
INSERT INTO `db_alamat` VALUES ('63', '01.23.007', 'K0123', '33.19.02', 'ARI COLLECTION', 'H.M. JUPRI', 'Ds. Singocandi RT. 02 RW. 01', '6', '3000000', 'pemasaran lokal kota kudus, se-karisedanan pati, semarang, pekalongan', '-6.792808', '110.841584', '1394988866.jpg');
INSERT INTO `db_alamat` VALUES ('64', '01.24.002', 'K0124', '33.19.09', 'K. BUSANA BARU KONFEKSI. SIM', 'SUNARYO', 'Ds. Piji RT.01 RW.05', '14', '35000000', 'rata-rata pemasaran di daerah jawa timur, semarang, solo, luar jawa', '-6.701973', '110.878567', '1394988741.jpg');
INSERT INTO `db_alamat` VALUES ('65', '01.25.002', 'K0125', '33.19.03', 'AR  RAFI', 'RINTO SUSIANTO', 'Loram Kulon RT.8/1', '9', '25000000', 'sasaran pemasaran sekitar jawa tengah, jawa timur', '-6.829723', '110.847051', '1394864308.jpg');
INSERT INTO `db_alamat` VALUES ('66', '02.01.009', 'K0201', '33.19.02', 'LILA', 'Kasmilah', 'DS. Singgocandi RT. 04/02', '5', '2500000', 'pemasaran lokal kudus', '-6.791607', '110.843162', '1394985875.jpg');
INSERT INTO `db_alamat` VALUES ('67', '02.01.008', 'K0201', '33.19.06', 'BUDI ARTO', 'Kutni', 'Ds. Bulung Cangkring RT. 04/05', '5', '4000000', 'sasarn pemasaran lokal kota kudus sendiri', '-6.821997', '110.924097', '1394865854.jpg');
INSERT INTO `db_alamat` VALUES ('68', '02.01.003', 'K0201', '33.19.08', 'rizka bolu', 'abdul ghofur', 'Ds. Sudimoro Rt 02/02', '4', '4000000', 'sasaran pemasaran lokal kudus, pati, solo', '', '', null);
INSERT INTO `db_alamat` VALUES ('69', '02.01.007', 'K0201', '33.19.09', 'ANEKA', 'Siti Normah', 'Ds. Lau RT. 07/03', '3', '5000000', 'rata-rata pemasaran di daerah kudus sendiri', '-6.739268', '110.892672', '1394724822.jpg');
INSERT INTO `db_alamat` VALUES ('70', '02.02.001', 'K0202', '33.19.02', 'D I T A', 'IRFAN SISWANTO', 'Kel. Mlati Kidul RT.03 RW.01', '4', '3000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '', '', null);
INSERT INTO `db_alamat` VALUES ('71', '02.02.003', 'K0202', '33.19.02', 'GADO-GADO CAP SEMANGGI', 'ELMAN ES', 'Ds. Kauman 31/57 RT. 03 RW. 01', '5', '10000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.804598', '110.832202', '1394986388.jpg');
INSERT INTO `db_alamat` VALUES ('72', '02.03.004', 'K0203', '33.19.03', 'GUNUNG GEDE', 'SUPRIYONO', 'Ds. Pasuruhan Lor RT.01 RW.10', '7', '8000000', 'sasaran pemasaran lokal kudus, demak, pati, jepara, semarang, kota-kota di jawa timur', '-6.81943', '110.822036', '1394988215.jpg');
INSERT INTO `db_alamat` VALUES ('73', '02.03.006', 'K0203', '33.19.03', 'MANFAAT', 'SUTARNO', 'Ds.Pasuruan Lor RT.2/10', '7', '20000000', 'sasaran pemasaran lokal kudus, semarang, demak, jepara', '-6.818708', '110.821586', '1394988297.jpg');
INSERT INTO `db_alamat` VALUES ('74', '02.03.005', 'K0203', '33.19.03', 'RANTAI IKAN MAS', 'ARI WIJANARKA', 'Pasuruhan Lor Rt.3/10', '12', '30000000', 'sasaran pemasaran lokal kudus, semarang, demak, jepara', '-6.819212', '110.821881', '1394988267.jpg');
INSERT INTO `db_alamat` VALUES ('75', '02.04.003', 'K0204', '33.19.01', 'BAWANG MERAH', 'MUHTAROM', 'Ds. Prambatan Kidul RT. 05 RW. 02', '4', '5000000', 'sasaran pemasaran lokal kudus, demak, pati, jepara, semarang, kota-kota sekitar jawa tengah', '-6.807581', '110.819598', '1394986491.jpg');
INSERT INTO `db_alamat` VALUES ('76', '02.04.002', 'K0204', '33.19.09', 'WELAS ASIH', 'A S W A T I', 'Ds. Rejosari RT. 05 RW. 04', '7', '15000000', 'rata-rata pemasaran di daerah semarang, solo, sekitar kota jawa tengah', '', '', null);
INSERT INTO `db_alamat` VALUES ('77', '02.05.002', 'K0205', '33.19.07', 'NINA ABADI', 'NOOR YUSUF', 'Ds. Peganjaran RT. 02 RW. 02', '2', '2000000', 'pemasaran lokal kota kudus', '-6.782186', '110.835721', '1394863202.jpg');
INSERT INTO `db_alamat` VALUES ('78', '02.06.001', 'K0206', '33.19.02', 'D  E  K  A', 'DEDE KARYADI', 'Wergu Kulon RT.4/1', '2', '2500000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '', '', null);
INSERT INTO `db_alamat` VALUES ('79', '02.06.002', 'K0206', '33.19.02', 'D I N A R', 'SITI ZAHROH', 'Ds. Mlati Kidul 04/01 ', '6', '15000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '', '', null);
INSERT INTO `db_alamat` VALUES ('80', '02.06.003', 'K0206', '33.19.09', 'RIZQI MS', 'NOOR BADRI', 'Ds.Kuwukan RT.2/4', '9', '18000000', 'rata-rata pemasaran di daerah kudus sendiri, semarang', '-6.68264', '110.900285', null);
INSERT INTO `db_alamat` VALUES ('81', '02.07.002', 'K0207', '33.19.05', 'BOSS', 'NINING PUJI ASTUTI Amd', 'Ds. Tenggeles RT. 06 RW. 04', '12', '50000000', 'sasaran pemasaran lokal kudus, semarang', '-6.810655', '110.907148', '1394985601.jpg');
INSERT INTO `db_alamat` VALUES ('82', '02.08.002', 'K0208', '33.19.02', 'SELARAS', 'tutik', 'Ds.Purwosari RT.4/4', '6', '3000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '-6.814016', '110.823702', '1394986986.jpg');
INSERT INTO `db_alamat` VALUES ('83', '02.09.003', 'K0209', '33.19.03', 'RUMAH SNACK', 'NINING SUSANTI, S.SOS', 'Perum Megawon Indah F3', '3', '5000000', 'sasaran pemasaran lokal kudus', '-6.81575', '110.86971', '1394863939.jpg');
INSERT INTO `db_alamat` VALUES ('84', '02.10.010', 'K0210', '33.19.01', 'U M M I', 'YASIN', 'Ds.Prambatan Lor No.58 RT.02/1', '4', '5000000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '-6.801528', '110.818533', '1394986741.jpg');
INSERT INTO `db_alamat` VALUES ('85', '02.10.009', 'K0210', '33.19.02', 'MOYAN', 'S.RIYANTI', 'Jl.Sunan Kudus No.33', '5', '3000000', 'sasaran pemasaran lokal kudus, wisatawan,peziarah sunan kudus, sebagai oleh&#34; khas kudus', '-6.805355', '110.833229', '1394985952.jpg');
INSERT INTO `db_alamat` VALUES ('86', '02.10.008', 'K0210', '33.19.02', 'SINAR ANDHIM', 'M.ZUAZHZHIM M', 'Jl.Sosro kartono no.138', '3', '1750000', 'sasaran pemasaran lokal kudus, wisatawan,peziarah sunan kudus, sebagai oleh&#34; khas kudus', '-6.792312', '110.848899', '1394985830.jpg');
INSERT INTO `db_alamat` VALUES ('87', '02.10.007', 'K0210', '33.19.03', 'JR. JAYA ABADI', 'JAJANG R JUANDA', 'Ds. Jepang Pakis RT. 07  RW.04', '3', '7000000', 'sasaran pemasaran lokal kudus, jepara', '-6.821481', '110.860896', '1394734150.jpg');
INSERT INTO `db_alamat` VALUES ('88', '02.10.006', 'K0210', '33.19.07', 'PRISMA SARI KUDUS', 'LISWATI', 'Ds. Ngembalrejo RT. 03 RW. 05', '4', '4000000', 'pemasaran wisatawan kota kudus, para peziarah sunan kudus dan sunan muria', '-6.803126', '110.878419', '1394730499.jpg');
INSERT INTO `db_alamat` VALUES ('89', '02.11.001', 'K0211', '33.19.01', 'LANGGENG', 'MUH. FAUSAN, SE', 'Dk.Kaliwungu RT.5/3', '5', '20000000', 'sasaran pemasaran lokal kudus, demak, pati, jepara, semarang, kota-kota di jawa timur', '-6.796726', '110.804929', null);
INSERT INTO `db_alamat` VALUES ('90', '02.12.016', 'K0212', '33.19.01', 'PJ. SINAR TIGA SEGI TIGA', 'KASMI', ' Ds. Prambatan Lor RT. 07 RW. 02', '4', '15000000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '-6.80508', '110.817085', '1394987859.jpg');
INSERT INTO `db_alamat` VALUES ('91', '02.12.002', 'K0212', '33.19.01', 'PJ. NUSANTARA', 'Purmaningsih', 'Kedungdowo RT.2/6', '8', '28500000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '-6.794384', '110.791512', null);
INSERT INTO `db_alamat` VALUES ('92', '02.12.003', 'K0212', '33.19.02', 'PJ. ANNISA', 'NOOR ROCHMAT', ' Ds. Kaliputu RT. 08 RW. 01', '8', '98500000', 'sasaran pemasaran lokal kudus, wisatawan,peziarah sunan kudus, sebagai oleh\" khas kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('93', '02.12.004', 'K0212', '33.19.02', 'PJ. KURNIA', 'SUMARNO', ' Ds. Kaliputu RT. 08 RW. 01', '7', '27200000', 'sasaran pemasaran lokal kudus, wisatawan,peziarah sunan kudus, sebagai oleh\" khas kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('94', '02.12.005', 'K0212', '33.19.02', 'PJ. NIKMAH', 'SITI ZULAESAH', 'Ds. Kaliputu Gang III No 74 RT. 08 RW. 01', '8', '20000000', 'sasaran pemasaran lokal kudus, wisatawan,peziarah sunan kudus, sebagai oleh\" khas kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('95', '02.12.006', 'K0212', '33.19.03', 'PJ. TIGA TUGU TIGA', 'MUCHAMMAD SHOLEH A', ' Ds. Tumpangkrasak 4/1', '8', '20000000', 'sasaran pemasaran wisatawan kota kudus, para peziarah sunan kudus dan sunan muria', '', '', null);
INSERT INTO `db_alamat` VALUES ('96', '02.12.007', 'K0212', '33.19.03', 'PJ. DANISTOFOOD', 'ISMANTO', ' Ds. Getas Pejaten 03/03 ', '3', '3000000', 'pemasaran wisatawan kota kudus, para peziarah sunan kudus dan sunan muria', '', '', null);
INSERT INTO `db_alamat` VALUES ('97', '02.12.008', 'K0212', '33.19.05', 'PJ. KHARISMA', 'SARPINAH', 'Ds.Temulus RT.2/6', '12', '75000000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('98', '02.12.009', 'K0212', '33.19.05', 'PJ. MANUHARA', 'KUSLAN', 'Ds.Temulus RT.3/5', '10', '28500000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('99', '02.12.010', 'K0212', '33.19.05', 'PJ. ANUGRAH', 'RUPI\'AH', 'Ds.Temulus RT.1/6', '8', '28500000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('100', '02.12.011', 'K0212', '33.19.05', 'PJ. MATAHARI', 'IMAM SUTIYO', ' Ds. Temulus  RT.02  RW.06', '15', '24000000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('101', '02.12.012', 'K0212', '33.19.05', 'PJ. SURYA JAYA', 'DEWI CHOTIJAH', 'Ds.Mejobo RT.8/4', '2', '7500000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('102', '02.12.013', 'K0212', '33.19.06', 'PJ. CAKRA', 'ERA ASTUTI', 'Ds. Jekulo RT. 02 RW. 09', '7', '50000000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('103', '02.12.014', 'K0212', '33.19.08', 'PJ. ASLI', 'Bambang Sugeng', 'Ds,Klumpit RT.4/5 ', '2', '10000000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('104', '02.12.015', 'K0212', '33.19.08', 'PJ. ASLI SINAR JAYA', 'BAMBANG SUGENG', 'Dk.Klumpit Rt.4/5', '2', '10000000', 'sasaran pemasaran lokal kudus, para peziarah sunan kudus dan sunan muria sebagai oleh-oleh', '', '', null);
INSERT INTO `db_alamat` VALUES ('105', '02.13.001', 'K0213', '33.19.01', 'S J', 'SUTRI YULIANI', 'Ds. Mijen RT.02 RW.04', '5', '22000000', 'sasaran pemasaran lokal kudus, pati, jepara', '', '', null);
INSERT INTO `db_alamat` VALUES ('106', '02.13.002', 'K0213', '33.19.02', 'ENGGAL JAYA', 'HJ. MASLICHAH', 'Ds. Kaliputu RT. 08 RW. 01', '6', '8000000', 'sasaran pemasaran lokal kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('107', '02.13.003', 'K0213', '33.19.02', 'KECAP SUPER ENGGAL', 'Hj. MASLICHAH', 'Ds. Kaliputu Gg. 1 / 28 RT 08 RW 01', '7', '8000000', 'sasaran pemasaran lokal kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('108', '02.13.004', 'K0213', '33.19.02', 'T H G', 'NY. SUKINAH', 'Jl. Bhakti No. 45  ', '9', '23000000', 'sasaran pemasaran lokal kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('109', '02.13.005', 'K0213', '33.19.04', 'AROMA', 'Afifudin', 'Ds. Ngemplak', '15', '33000000', 'sasaran pemasaran lokal kudus, pati, solo, demak, jepara', '', '', null);
INSERT INTO `db_alamat` VALUES ('110', '02.13.006', 'K0213', '33.19.05', 'KARYA UTAMA MANDIRI', 'SUBIYANTO', 'Ds.Payaman RT.1/4', '3', '10000000', 'sasaran pemasaran lokal kudus, pati', '', '', null);
INSERT INTO `db_alamat` VALUES ('111', '02.13.007', 'K0213', '33.19.05', 'SARI BUMI RAYA', 'H. ACHMADI', 'Ds.Golan Tepus RT.1/6', '9', '44000000', 'sasaran pemasaran lokal kudus, pati, grobogan', '', '', null);
INSERT INTO `db_alamat` VALUES ('112', '02.13.008', 'K0213', '33.19.06', 'JAYA PERTIWI', 'ISTI FA\'IZAH', 'Ds.Hadipolo RT.4/3', '4', '53000000', 'sasaran pemasaran lokal kudus, kota pati, rembang, demak', '', '', null);
INSERT INTO `db_alamat` VALUES ('113', '02.13.009', 'K0213', '33.19.06', 'NURRUR AIN', 'SYAHRUL ARIF', 'Sumber bulusan Ds.Hadipolo Rt.4/5', '4', '10000000', 'sasaran pemasaran lokal kudus, kota pati, rembang, demak', '', '', null);
INSERT INTO `db_alamat` VALUES ('114', '03.01.002', 'K0301', '33.19.03', 'BINTANG JEMPOL NO. 1 ', 'SUJAD', 'Ds. Loram Kulon RT. 01 RW. 03', '9', '10000000', 'sasaran pemasaran lokal kudus, surabaya, sekitar kota jawa timur', '-6.829865', '110.845836', '1394983724.jpg');
INSERT INTO `db_alamat` VALUES ('115', '03.02.002', 'K0302', '33.19.07', 'HERMAN JAYA', 'HERI TAUBAROKAH', 'Ds.Pedawang RT.4/2', '7', '20000000', 'pemasaran wisatawan kota kudus, para peziarah sunan kudus dan sunan muria', '-6.796441', '110.86044', '1394983471.jpg');
INSERT INTO `db_alamat` VALUES ('116', '03.03.002', 'K0303', '33.19.03', 'U L I K', 'SOEDJONO', 'Ds. Getas Pejaten 3/3 ', '10', '25000000', 'sasaran pemasaran lokal kudus, jawa timur, bali', '-6.829564', '110.838655', '1394984643.jpg');
INSERT INTO `db_alamat` VALUES ('117', '03.04.002', 'K0304', '33.19.03', 'JAYA SETIA', 'H. Mahmudi', 'Ds. Ploso RT. 03/04', '14', '35000000', 'sasaran pemasaran semarang, lokal kota kudus, surabaya, luar jawa', '-6.818605', '110.832615', '1394984934.jpg');
INSERT INTO `db_alamat` VALUES ('118', '04.01.001', 'K0401', '33.19.02', 'GEMILANG JAYA', 'SUMBER AMBARWATI', 'Ds. Mlati Lor RT.01 RW.02', '10', '25000000', 'sasaran pemasaran se-karisedanan pati, solo, magelang', '', '', null);
INSERT INTO `db_alamat` VALUES ('119', '04.01.003', 'K0401', '33.19.07', 'PK. DARUSSALAM', 'Drs. ARIES SYAMSUL', 'Jl.Raya Dersalam No.519 Kudus', '5', '15000000', 'pemasaran kota kudus, pati, demak', '-6.802588', '110.867821', '1394987709.jpg');
INSERT INTO `db_alamat` VALUES ('120', '04.02.004', 'K0402', '33.19.01', 'MANDIRI', 'SUTAR', 'Ds. Blimbing Kidul RT.9/1', '6', '10000000', 'sasaran pemasaran lokal kudus, semarang, jepara, pati', '-6.770792', '110.768043', '1394987510.jpg');
INSERT INTO `db_alamat` VALUES ('121', '04.02.002', 'K0402', '33.19.03', 'AGUS JAYA GYPSUM', 'NUR SALIM', 'Ds. Jetis Kapuan RT. 02 RW. 01', '6', '14000000', 'sasaran pemasaran lokal kudus, jepara, demak, pati, semarang', '', '', null);
INSERT INTO `db_alamat` VALUES ('122', '04.02.003', 'K0402', '33.19.03', 'MAHKOTA FARIASI GYPSUM', 'SUJIANTO', ' Ds. Jetis Kapuan RT. 05 RW. 01', '6', '30000000', 'sasaran pemasaran lokal kudus, jepara, demak, pati, semarang', '', '', null);
INSERT INTO `db_alamat` VALUES ('123', '05.01.002', 'K0501', '33.19.02', 'MERPATI', 'Ma&#39;ruf', 'Ds. Krandon RT. 02/03', '7', '7500000', 'sasaran pemasaran lokal kudus, se-karisedenan pati', '-6.794675', '110.841338', '1394985392.jpg');
INSERT INTO `db_alamat` VALUES ('124', '05.02.005', 'K0502', '33.19.02', 'DIKA', 'Ike Rachmawati', 'Ds. Glantengan no.146 RT. 03/03', '3', '3000000', 'sasaran pemasaran lokal kudus, pati, demak, semarang', '-6.801685', '110.845154', '1394985190.jpg');
INSERT INTO `db_alamat` VALUES ('125', '05.02.002', 'K0502', '33.19.02', 'HIKMAH', 'Sofiatun', 'Ds. Mlati Norowito RT. 03/09', '4', '3000000', 'sasaran pemasaran lokal kudus', '', '', null);
INSERT INTO `db_alamat` VALUES ('128', '06.01.001', 'K0601', '33.19.10', 'TEST', 'TEST', 'test', '12', '100000000', 'test', '-6.7514321', '111.037177', '1390555589.jpg');
INSERT INTO `db_alamat` VALUES ('129', '05.02.006', 'K0502', '33.19.06', 'asc', 'axsz', 'nk k', '45', '12345', 'nljknjkl', '-6.80537', '110.925680', '1394985466.jpg');
INSERT INTO `db_alamat` VALUES ('130', '01.04.004', 'K0104', '33.19.03', 'bejo', 'udin', 'chcvmhjh', '4', '2500000', 'cgcnghhj', '-6.8237', '110.839339', '1394495760.jpg');
INSERT INTO `db_alamat` VALUES ('131', '01.04.005', 'K0104', '33.19.06', 'kkkk', 'khdkasj', 'jjjkjkkjk', '6', '50000000', 'sasaran pemasaran jawa tengah', '-6.80537', '110.925680', '1394519639.jpg');

-- ----------------------------
-- Table structure for db_kategori
-- ----------------------------
DROP TABLE IF EXISTS `db_kategori`;
CREATE TABLE `db_kategori` (
  `id_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `kd_kategori` varchar(4) DEFAULT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL,
  `icon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_kategori
-- ----------------------------
INSERT INTO `db_kategori` VALUES ('1', 'K01', 'Pakaian', 'home_8.png');
INSERT INTO `db_kategori` VALUES ('2', 'K02', 'Makanan dan Minuman', 'home_2.png');
INSERT INTO `db_kategori` VALUES ('3', 'K03', 'Aksesoris', 'home_3.png');
INSERT INTO `db_kategori` VALUES ('4', 'K04', 'Perlengkapan Rumah', 'home_4.png');
INSERT INTO `db_kategori` VALUES ('5', 'K05', 'Bumbu Masakan', 'home_6.png');

-- ----------------------------
-- Table structure for db_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `db_kecamatan`;
CREATE TABLE `db_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_kecamatan` varchar(8) DEFAULT NULL,
  `nama_kecamatan` varchar(50) DEFAULT NULL,
  `lat` varchar(10) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_kecamatan
-- ----------------------------
INSERT INTO `db_kecamatan` VALUES ('1', '33.19.01', 'Kaliwungu', '-6.7975', '110.80336');
INSERT INTO `db_kecamatan` VALUES ('2', '33.19.02', 'Kota Kudus', '-6.80771', '110.84162');
INSERT INTO `db_kecamatan` VALUES ('3', '33.19.03', 'Jati', '-6.8237', '110.83934');
INSERT INTO `db_kecamatan` VALUES ('4', '33.19.04', 'Undaan', '-6.86667', '110.82589');
INSERT INTO `db_kecamatan` VALUES ('5', '33.19.05', 'Mejobo', '-6.82894', '110.89087');
INSERT INTO `db_kecamatan` VALUES ('6', '33.19.06', 'Jekulo', '-6.80537', '110.92568');
INSERT INTO `db_kecamatan` VALUES ('7', '33.19.07', 'Bae', '-6.768096', '110.854019');
INSERT INTO `db_kecamatan` VALUES ('8', '33.19.08', 'Gebog', '-6.718742', '110.837247');
INSERT INTO `db_kecamatan` VALUES ('9', '33.19.09', 'Dawe', '-6.736852', '110.866081');

-- ----------------------------
-- Table structure for db_produksi
-- ----------------------------
DROP TABLE IF EXISTS `db_produksi`;
CREATE TABLE `db_produksi` (
  `id_produksi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_produksi` varchar(8) DEFAULT NULL,
  `kd_kategori` varchar(4) DEFAULT NULL,
  `nama_produksi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_produksi`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_produksi
-- ----------------------------
INSERT INTO `db_produksi` VALUES ('126', 'K0101', 'K01', 'blouse dan daster');
INSERT INTO `db_produksi` VALUES ('127', 'K0102', 'K01', 'blouse, bawahan dan rok seragam');
INSERT INTO `db_produksi` VALUES ('128', 'K0103', 'K01', 'blouse dan pakain wanita anak');
INSERT INTO `db_produksi` VALUES ('129', 'K0104', 'K01', 'Bordiran');
INSERT INTO `db_produksi` VALUES ('130', 'K0105', 'K01', 'Busana Muslim');
INSERT INTO `db_produksi` VALUES ('131', 'K0106', 'K01', 'Busana Muslim dan Bahan Kebaya');
INSERT INTO `db_produksi` VALUES ('132', 'K0107', 'K01', 'Busana Muslim dan Blose ');
INSERT INTO `db_produksi` VALUES ('133', 'K0108', 'K01', 'Busana muslim, Kaos dan Pakaian wanita');
INSERT INTO `db_produksi` VALUES ('134', 'K0109', 'K01', 'Celana panjang, Daster dan rok');
INSERT INTO `db_produksi` VALUES ('135', 'K0110', 'K01', 'Celana pendek');
INSERT INTO `db_produksi` VALUES ('136', 'K0111', 'K01', 'Celana pendek  dan celana panjang');
INSERT INTO `db_produksi` VALUES ('137', 'K0112', 'K01', 'Jaket ');
INSERT INTO `db_produksi` VALUES ('138', 'K0113', 'K01', 'Jaket dan Celana');
INSERT INTO `db_produksi` VALUES ('139', 'K0114', 'K01', 'Jaket dan Kaos');
INSERT INTO `db_produksi` VALUES ('140', 'K0115', 'K01', 'Kaos, Training dan Seragam');
INSERT INTO `db_produksi` VALUES ('141', 'K0116', 'K01', 'Kaos dan training ');
INSERT INTO `db_produksi` VALUES ('142', 'K0117', 'K01', 'Kebaya');
INSERT INTO `db_produksi` VALUES ('143', 'K0118', 'K01', 'kebaya dan bluose');
INSERT INTO `db_produksi` VALUES ('144', 'K0119', 'K01', 'Kebaya, Mukena dan Busana Muslim');
INSERT INTO `db_produksi` VALUES ('145', 'K0120', 'K01', 'Kebaya, Mukena dan Taplak meja');
INSERT INTO `db_produksi` VALUES ('146', 'K0121', 'K01', 'Kemeja');
INSERT INTO `db_produksi` VALUES ('147', 'K0122', 'K01', 'Kemeja, Blues dan busana muslim ');
INSERT INTO `db_produksi` VALUES ('148', 'K0123', 'K01', 'Kemeja dan celana');
INSERT INTO `db_produksi` VALUES ('149', 'K0124', 'K01', 'Kemeja lengan pendek dan panjang');
INSERT INTO `db_produksi` VALUES ('150', 'K0125', 'K01', 'Kerudung');
INSERT INTO `db_produksi` VALUES ('151', 'K0201', 'K02', 'Bolu dan kue kering');
INSERT INTO `db_produksi` VALUES ('152', 'K0202', 'K02', 'Ceriping gado-gado ');
INSERT INTO `db_produksi` VALUES ('153', 'K0203', 'K02', 'Cipir dan sakura');
INSERT INTO `db_produksi` VALUES ('154', 'K0204', 'K02', 'Ceriping ketela');
INSERT INTO `db_produksi` VALUES ('155', 'K0205', 'K02', 'Ceriping ketela dan kerupuk kulit');
INSERT INTO `db_produksi` VALUES ('156', 'K0206', 'K02', 'Ceriping pisang');
INSERT INTO `db_produksi` VALUES ('157', 'K0207', 'K02', 'Chocho Cronch');
INSERT INTO `db_produksi` VALUES ('158', 'K0208', 'K02', 'Donat/bapau');
INSERT INTO `db_produksi` VALUES ('159', 'K0209', 'K02', 'Keripik bayam');
INSERT INTO `db_produksi` VALUES ('160', 'K0210', 'K02', 'Madumongso');
INSERT INTO `db_produksi` VALUES ('161', 'K0211', 'K02', 'Jamur kering');
INSERT INTO `db_produksi` VALUES ('162', 'K0212', 'K02', 'jenang');
INSERT INTO `db_produksi` VALUES ('163', 'K0213', 'K02', 'kecap');
INSERT INTO `db_produksi` VALUES ('164', 'K0301', 'K03', 'Cat kuku');
INSERT INTO `db_produksi` VALUES ('165', 'K0302', 'K03', 'liontin, gelang, kalung dari monel');
INSERT INTO `db_produksi` VALUES ('166', 'K0303', 'K03', 'Keranjang sampah, Vas bunga, meja');
INSERT INTO `db_produksi` VALUES ('167', 'K0304', 'K03', 'mainan anak');
INSERT INTO `db_produksi` VALUES ('168', 'K0401', 'K04', 'Jendela, Daun pintu dan Kusen');
INSERT INTO `db_produksi` VALUES ('169', 'K0402', 'K04', 'Gypsum');
INSERT INTO `db_produksi` VALUES ('170', 'K0501', 'K05', 'Bubuk Gula jahe');
INSERT INTO `db_produksi` VALUES ('171', 'K0502', 'K05', 'Bumbu pecel');
INSERT INTO `db_produksi` VALUES ('176', 'K0601', 'K06', 'test');
INSERT INTO `db_produksi` VALUES ('177', 'K0403', 'K04', 'testing');
INSERT INTO `db_produksi` VALUES ('178', 'K0603', 'K06', 'hhh');
INSERT INTO `db_produksi` VALUES ('179', 'K0503', 'K05', 'jjjj');
