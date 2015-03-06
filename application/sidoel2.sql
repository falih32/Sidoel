/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sidoel2

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-07 00:56:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `chat`
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`from`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '' ,
`to`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '' ,
`message`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`sent`  datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`recd`  int(10) UNSIGNED NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=20

;

-- ----------------------------
-- Records of chat
-- ----------------------------
BEGIN;
INSERT INTO `chat` VALUES ('1', 'admin', 'umum', 'hallo', '2015-02-21 13:40:34', '1'), ('2', 'umum', 'admin', 'hai', '2015-02-21 13:42:29', '1'), ('3', 'umum', 'admin', 'hei', '2015-02-21 13:42:44', '1'), ('4', 'umum', 'admin', 'asdsad', '2015-02-21 13:43:45', '1'), ('5', 'undefined', 'umum', 'tes', '2015-02-21 13:46:05', '1'), ('6', 'umum', 'admin', 'tes', '2015-02-21 13:49:38', '1'), ('7', 'umum', 'admin', 'jgjkgk', '2015-02-21 13:50:13', '1'), ('8', 'admin', 'umum', ';k;k;', '2015-02-21 13:50:59', '1'), ('9', 'undefined', 'admin', 'hallo', '2015-02-21 13:52:01', '1'), ('10', 'admin', 'umum', '1312', '2015-02-21 13:56:40', '1'), ('11', 'admin', 'umum', 'tes', '2015-02-21 14:07:31', '1'), ('12', 'undefined', 'umum', 'tes', '2015-02-21 14:08:08', '1'), ('13', 'undefined', 'umum', 'huh', '2015-02-21 14:08:18', '1'), ('14', 'admin', 'umum', 'gff', '2015-02-21 14:08:26', '1'), ('15', 'admin', 'umum', 'hai', '2015-02-21 15:12:40', '1'), ('16', 'admin', 'umum', 'hlo', '2015-02-21 15:12:43', '1'), ('17', 'admin', 'junta', 'hey', '2015-02-25 12:55:46', '1'), ('18', 'ampas', 'admini', 'tes', '2015-03-01 11:54:28', '0'), ('19', 'ampas', 'admini', 'OI', '2015-03-01 14:49:52', '0');
COMMIT;

-- ----------------------------
-- Table structure for `t_chat`
-- ----------------------------
DROP TABLE IF EXISTS `t_chat`;
CREATE TABLE `t_chat` (
`cht_id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`cht_from`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '' ,
`cht_to`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '' ,
`cht_message`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`cht_sent`  datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`cht_recd`  int(10) UNSIGNED NOT NULL DEFAULT 0 ,
PRIMARY KEY (`cht_id`),
INDEX `to` (`cht_to`) USING BTREE ,
INDEX `from` (`cht_from`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of t_chat
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `t_departemen`
-- ----------------------------
DROP TABLE IF EXISTS `t_departemen`;
CREATE TABLE `t_departemen` (
`dpt_id`  int(11) NOT NULL AUTO_INCREMENT ,
`dpt_nama`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`dpt_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of t_departemen
-- ----------------------------
BEGIN;
INSERT INTO `t_departemen` VALUES ('1', 'TU Pimpinan'), ('2', 'Rumah Tangga'), ('3', 'Perlengkapan'), ('4', 'TU dan Persuratan');
COMMIT;

-- ----------------------------
-- Table structure for `t_form_disposisi`
-- ----------------------------
DROP TABLE IF EXISTS `t_form_disposisi`;
CREATE TABLE `t_form_disposisi` (
`fds_id`  bigint(11) NOT NULL AUTO_INCREMENT ,
`fds_id_surat`  bigint(11) NULL DEFAULT NULL ,
`fds_kasubbag`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`fds_catatan`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`fds_tgl_disposisi`  date NULL DEFAULT NULL ,
`fds_pengirim`  int(11) NULL DEFAULT NULL ,
`fds_id_parent`  bigint(11) NULL DEFAULT NULL ,
`fds_deleted`  int(11) NULL DEFAULT 0 ,
`fds_file`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`fds_id`),
FOREIGN KEY (`fds_id_surat`) REFERENCES `t_surat_msk` (`sms_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`fds_pengirim`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_surat_fk` (`fds_id_surat`) USING BTREE ,
INDEX `pengirim_fk` (`fds_pengirim`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=63

;

-- ----------------------------
-- Records of t_form_disposisi
-- ----------------------------
BEGIN;
INSERT INTO `t_form_disposisi` VALUES ('1', '29', '1', 'cacat', '2015-01-22', null, null, '0', null), ('2', '29', '1', 'ccc', '2015-02-07', null, null, '0', null), ('3', '29', '1', 'kkkk', '2015-02-07', null, null, '0', null), ('4', '32', '1', 'kaka', '2015-02-07', '1', null, '0', null), ('5', '32', '1', 'cacat', '2015-02-07', '1', null, '0', null), ('6', '32', '1', 'lll', '2015-02-07', '1', null, '0', null), ('7', '32', '1', 'kakaka', '2015-02-07', '1', null, '0', null), ('8', '32', '1', 'kaka', '2015-02-07', '1', null, '0', null), ('9', '32', '1', 'kaaijciawc', '2015-02-07', '1', null, '0', null), ('10', '32', '1', 'lll', '2015-02-07', '1', null, '0', null), ('11', '32', '1', 'lll', '2015-02-07', '1', null, '0', null), ('12', '32', '1', 'lll', '2015-02-07', '1', null, '0', null), ('13', '32', '1', 'lll', '2015-02-07', '1', null, '0', null), ('14', '32', '1', 'lll', '2015-02-07', '1', null, '0', null), ('15', '32', '1', 'kakakakakakaka', '2015-02-07', '1', null, '0', null), ('16', '32', '1', 'kakakakakakaka', '2015-02-07', '1', null, '0', null), ('17', '32', '1', 'ahey', '2015-02-07', '1', null, '0', null), ('18', '32', '1', 'ahey', '2015-02-07', '1', null, '0', null), ('19', '32', '1', 'ahey', '2015-02-07', '1', null, '0', null), ('20', '32', '1', 'acecaec', '2015-02-07', '1', null, '0', null), ('22', '32', '1', 'kakaoe', '2015-02-07', '1', null, '0', null), ('23', '32', '1', 'kakakakaodprptbsay', '2015-02-07', '1', null, '0', null), ('24', '32', '1', 'cacat', '2015-02-07', '1', null, '0', null), ('25', '32', '1', 'cacat', '2015-02-07', '1', null, '0', null), ('26', '32', '1', 'cacataaaaaaaa', '2015-02-07', '1', null, '0', null), ('27', '32', '1', 'aasadadafgagtnmishgr', '2015-02-07', '1', null, '0', null), ('28', '32', '1', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2015-02-07', '1', null, '0', null), ('29', '32', '1', 'lololol', '2015-02-07', '1', null, '0', null), ('30', '32', '1', 'adasfa', '2015-02-07', '1', null, '0', null), ('31', '32', '1', 'akakaka', '2015-02-07', '1', null, '0', null), ('32', '32', '1', 'akakaka', '2015-02-07', '1', null, '0', null), ('33', '32', '1', 'kakakaka', '2015-02-07', '1', null, '0', null), ('34', '32', '1', 'kakakaka', '2015-02-07', '1', null, '0', null), ('35', '32', '1', 'kakakakakuku', '2015-02-07', '1', null, '0', null), ('36', '4', '1', 'pake tujuan gan', '2015-02-11', '1', '-99', '1', null), ('37', '4', '1', 'pake tujuan gan', '2015-02-11', '1', '-99', '0', null), ('38', '8', '1', 'testing', '2015-02-11', '1', '-99', '0', null), ('39', '11', '1', 'tsting lagi', '2015-02-11', '1', '-99', '0', null), ('40', '8', '1', 'pppp', '2015-02-11', '1', '-99', '0', null), ('41', '28', '1', 'cekz', '2015-02-11', '1', '-99', '0', null), ('42', '8', '1', 'kolek', '2015-02-11', '1', '-99', '0', null), ('43', null, '1', 'wasu', '2015-02-11', '1', '-99', '0', null), ('44', '4', '1', 'lodaya', '2015-02-11', '1', '-99', '0', null), ('45', '11', null, 'tambah disposisi dong', '2015-02-11', '1', '39', '0', null), ('46', '5', null, 'ganti model lagi', '2015-02-16', '1', '-99', '0', null), ('47', '5', null, 'ini baru ai baru', '2015-02-16', '1', '-99', '0', null), ('48', '5', null, 'kosong', '2015-02-09', '1', '-99', '1', null), ('49', '19', null, 'disposisi buat aaaa', '2015-02-17', '5', '-99', '1', null), ('50', '19', null, 'lanjut gan!', '2015-02-17', '5', '49', '0', null), ('51', '5', null, 'kok error sih messagenyaaaaa?', '2015-02-17', '1', '47', '0', null), ('52', '41', null, 'test disposisi baru dong', '2015-02-22', '1', '-99', '0', null), ('53', '41', null, 'test upload disposisi', '2015-02-22', '1', '-99', '0', 'luarock.png'), ('54', '41', null, 'edit junno laggi', '2015-02-23', '1', '-99', '0', 'g3475.png'), ('55', '41', null, 'tambahan junno', '2015-02-23', '1', '54', '0', null), ('56', '41', null, 'test123', '2015-02-18', '1', '-99', '0', 'slash.png'), ('57', '41', null, 'test123 tambah', '2015-02-17', '1', '56', '0', 'slash.png'), ('58', '42', null, 'Tes dispo pertama', '2015-02-26', '1', '-99', '0', 'management-resiko-is_it1.pdf'), ('59', '42', null, 'Tes dispo pertama', '2015-02-26', '1', '-99', '0', 'management-resiko-is_it2.pdf'), ('60', '42', null, 'Disposisi pertama', '2015-02-10', '1', '-99', '0', 'Reverse_Engineering_for_Software_Performance_Engineering.pdf'), ('61', '43', null, 'tes dispo tracking tier 1', '2015-03-02', '1', '-99', '0', 'TugasBesar-rev2.pdf'), ('62', '43', null, 'tracking disposisi tier  2', '2015-03-02', '3', '61', '0', 'TugasBesar-rev2.pdf');
COMMIT;

-- ----------------------------
-- Table structure for `t_instruksi`
-- ----------------------------
DROP TABLE IF EXISTS `t_instruksi`;
CREATE TABLE `t_instruksi` (
`ins_id`  int(11) NOT NULL AUTO_INCREMENT ,
`ins_nama_instruksi`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`ins_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=14

;

-- ----------------------------
-- Records of t_instruksi
-- ----------------------------
BEGIN;
INSERT INTO `t_instruksi` VALUES ('1', 'Info'), ('2', 'Aksi'), ('3', 'Tanggapan'), ('4', 'Bahas'), ('5', 'Dijawab/dibalas'), ('6', 'Dilaksanakan'), ('7', 'Ditindaklanjuti'), ('8', 'Untuk Diketahui'), ('9', 'File Karo'), ('10', 'Bicarakan Dengan Karo'), ('11', 'Jadwalkan'), ('12', 'Siapkan Bahan'), ('13', 'Beri Saran');
COMMIT;

-- ----------------------------
-- Table structure for `t_jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan` (
`jbt_id`  int(11) NOT NULL AUTO_INCREMENT ,
`jbt_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jbt_departemen`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`jbt_id`),
FOREIGN KEY (`jbt_departemen`) REFERENCES `t_departemen` (`dpt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_jabatan_departemen` (`jbt_departemen`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=18

;

-- ----------------------------
-- Records of t_jabatan
-- ----------------------------
BEGIN;
INSERT INTO `t_jabatan` VALUES ('1', 'Kabag TU Pimpinan', '1'), ('2', 'Kabag Rumah Tangga', '2'), ('3', 'Kabag Perlengkapan', '3'), ('4', 'Kabag TU & Persuratan', '4'), ('5', 'Kasubbag Protokol', '1'), ('6', 'Kasubbag TU Menteri', '1'), ('7', 'Kasubbag TU Sekretaris Jenderal', '1'), ('8', 'Kasubbag Urusan Dalam', '2'), ('9', 'Kasubbag ANGKAMDAL', '2'), ('10', 'Kasubbag Kesejahteraan', '2'), ('11', 'Kasubbag Perencanaan & Pemanfaatan', '3'), ('12', 'Kasubbag Inventarisasi & Penghapusan', '3'), ('13', 'Kasubbag Pengadaaan & Penyaluran', '3'), ('14', 'Kasubbag Persuratan', '4'), ('15', 'Kasubbag Arsip', '4'), ('16', 'Kasubbag TU BIRO', '4'), ('17', 'Staff Pelaksana', null);
COMMIT;

-- ----------------------------
-- Table structure for `t_jenis_surat_masuk`
-- ----------------------------
DROP TABLE IF EXISTS `t_jenis_surat_masuk`;
CREATE TABLE `t_jenis_surat_masuk` (
`jsm_id`  int(20) NOT NULL AUTO_INCREMENT ,
`jsm_nama_jenis`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jsm_keterangan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`jsm_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of t_jenis_surat_masuk
-- ----------------------------
BEGIN;
INSERT INTO `t_jenis_surat_masuk` VALUES ('1', 'Sangat Rahasia', 'Surat ini umumnya berupa surat yang berhubungan erat dengan keamanan negara dan biasanya dikeluarkan oleh dinas-dinas rahasia negara, seperti Badan Intelijen Negara (BIN) atau dinas-dinas rahasia lainnya yang berada di bawah instansi kepolisian atau kejak'), ('2', 'Rahasia', 'Surat yang bersifat RHS atau R (rahasia) hanya boleh dibaca oleh pihak yang dituju dalam surat itu. Hampir serupa dengan surat rahasia, dikenal dengan surat konfidental, yakni surat yang isinya hanya boleh diketahui atau dibaca oleh pejabat yang bersangku'), ('3', 'Biasa', 'Surat ini bila dibaca pihak lain tidak merugikan penerima maupun pengirimnya. Hal ini karena walaupun isi surat tersebut diketahui banyak orang, tidak akan merugikan penerima maupun pengirimnya. Yang termasuk ke dalam jenis surat ini antara lain surat und'), ('4', 'Pribadi', 'Jenis surat ini diperuntukkan bagi surat ataupun paket yang ditujukan kepada pegawai secara personal, tidak ada hubungannya dengan kedinasan.'), ('5', 'Paket', 'Jenis ini digunakan untuk pengiriman yang diterima berupa paket bagi unit kerja, dan berhubungan dengan kedinasan.\r\n');
COMMIT;

-- ----------------------------
-- Table structure for `t_log`
-- ----------------------------
DROP TABLE IF EXISTS `t_log`;
CREATE TABLE `t_log` (
`log_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`log_nama_tabel`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`log_aksi`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`log_tanggal`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`log_user`  int(255) NULL DEFAULT NULL ,
PRIMARY KEY (`log_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=63

;

-- ----------------------------
-- Records of t_log
-- ----------------------------
BEGIN;
INSERT INTO `t_log` VALUES ('1', 'Surat Masuk', 'Create', '2015-02-10 21:48:46', '1'), ('2', 'Surat Masuk', 'Create', '0000-00-00 00:00:00', '1'), ('3', 'Surat Masuk', 'Update', '0000-00-00 00:00:00', '1'), ('4', 'Surat Masuk', 'Create', '2015-02-11 18:34:41', '1'), ('5', 'Surat Masuk', 'Create', '2015-02-11 18:39:14', '1'), ('6', 'Surat Masuk', 'Update', '2015-02-11 18:41:37', '1'), ('7', 'Disposisi', 'Create', '2015-02-11 19:50:38', '1'), ('8', 'Disposisi', 'Create', '2015-02-11 19:52:27', '1'), ('9', 'Surat Masuk', 'Create', '2015-02-12 11:41:26', '1'), ('10', 'Disposisi', 'Update', '2015-02-15 01:42:52', '1'), ('11', 'Disposisi', 'Create', '2015-02-15 08:43:15', '1'), ('12', 'Surat Masuk', 'Create', '2015-02-16 14:52:26', '1'), ('13', 'Disposisi', 'Update', '2015-02-16 14:55:25', '1'), ('14', 'Disposisi', 'Update', '2015-02-16 14:56:17', '1'), ('15', 'Surat Masuk', 'Update', '2015-02-16 15:09:05', '1'), ('16', 'Surat Masuk', 'Update', '2015-02-16 15:09:32', '1'), ('17', 'Surat Masuk', 'Update', '2015-02-16 15:10:12', '1'), ('18', 'Surat Masuk', 'Create', '2015-02-16 16:35:52', '1'), ('19', 'Unit Tujuan', 'Update', '2015-02-17 16:26:45', '1'), ('20', 'Unit Terusan', 'Update', '2015-02-17 16:44:15', '1'), ('21', 'Unit Terusan', 'Update', '2015-02-17 16:44:22', '1'), ('22', 'Surat Masuk', 'Create', '2015-02-17 22:16:29', '1'), ('23', 'User', 'Update', '2015-02-17 23:25:52', '1'), ('24', 'User', 'Update', '2015-02-17 23:56:02', '4'), ('25', 'User', 'Update', '2015-02-17 23:58:20', '1'), ('26', 'User', 'Update', '2015-02-18 00:02:24', '1'), ('27', 'User', 'Update', '2015-02-18 01:00:09', '4'), ('28', 'User', 'Update', '2015-02-18 01:32:30', '1'), ('29', 'Disposisi', 'Delete', '2015-02-18 02:38:38', '1'), ('30', 'Disposisi', 'Update', '2015-02-18 02:38:57', '1'), ('31', 'Surat Masuk', 'Create', '2015-02-18 02:54:26', '1'), ('32', 'Disposisi', 'Update', '2015-02-18 11:05:53', '5'), ('33', 'Disposisi', 'Update', '2015-02-18 11:07:53', '5'), ('34', 'Disposisi', 'Delete', '2015-02-18 11:08:28', '5'), ('35', 'User', 'Create', '2015-02-20 22:55:45', '1'), ('36', 'User', 'Create', '2015-02-20 23:44:52', '1'), ('37', 'Disposisi', 'Update', '2015-02-22 01:23:07', '1'), ('38', 'Disposisi', 'Update', '2015-02-22 01:41:47', '1'), ('39', 'Disposisi', 'Update', '2015-02-23 12:14:51', '1'), ('40', 'Surat Masuk', 'Create', '2015-02-25 12:31:04', '1'), ('41', 'Unit Terusan', 'Delete', '2015-02-25 13:45:00', '1'), ('42', 'Jabatan', 'Create', '2015-02-25 13:47:13', '1'), ('43', 'Jabatan', 'Create', '2015-02-25 13:54:14', '1'), ('44', 'Jabatan', 'Create', '2015-02-25 13:54:30', '1'), ('45', 'Jabatan', 'Create', '2015-02-25 13:56:07', '1'), ('46', 'Jabatan', 'Create', '2015-02-25 14:37:30', '1'), ('47', 'Jabatan', 'Delete', '2015-02-25 18:50:12', '1'), ('48', 'Jabatan', 'Delete', '2015-02-25 18:50:21', '1'), ('49', 'Jabatan', 'Delete', '2015-02-25 18:51:38', '1'), ('50', 'User', 'Update', '2015-02-25 19:03:13', '1'), ('51', 'Jabatan', 'Delete', '2015-02-25 19:03:47', '1'), ('52', 'Jenis Surat Masuk', 'Create', '2015-02-25 20:13:48', '1'), ('53', 'Jenis Surat Masuk', 'Create', '2015-02-25 20:14:06', '1'), ('54', 'Jenis Surat Masuk', 'Create', '2015-02-25 20:14:20', '1'), ('55', 'Surat Masuk', 'Create', '2015-03-01 08:46:18', '1'), ('56', 'Jenis Surat Masuk', 'Update', '2015-03-01 15:56:13', '1'), ('57', 'Jenis Surat Masuk', 'Create', '2015-03-01 15:56:59', '1'), ('58', 'Jenis Surat Masuk', 'Delete', '2015-03-01 15:57:09', '1'), ('59', 'Jenis Surat Masuk', 'Update', '2015-03-01 15:58:08', '1'), ('60', 'Jenis Surat Masuk', 'Update', '2015-03-01 15:58:30', '1'), ('61', 'Jenis Surat Masuk', 'Update', '2015-03-01 15:59:07', '1'), ('62', 'Jenis Surat Masuk', 'Update', '2015-03-01 15:59:31', '1');
COMMIT;

-- ----------------------------
-- Table structure for `t_role`
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
`rle_id`  int(11) NOT NULL AUTO_INCREMENT ,
`rle_role_name`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`rle_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of t_role
-- ----------------------------
BEGIN;
INSERT INTO `t_role` VALUES ('1', 'Administrator'), ('2', 'Operator'), ('3', 'User Biasa');
COMMIT;

-- ----------------------------
-- Table structure for `t_status_disposisi`
-- ----------------------------
DROP TABLE IF EXISTS `t_status_disposisi`;
CREATE TABLE `t_status_disposisi` (
`sds_id`  int(11) NOT NULL AUTO_INCREMENT ,
`sds_nama_status`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sds_keterangan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`sds_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of t_status_disposisi
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `t_surat_msk`
-- ----------------------------
DROP TABLE IF EXISTS `t_surat_msk`;
CREATE TABLE `t_surat_msk` (
`sms_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`sms_nomor_surat`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_tgl_srt`  date NULL DEFAULT NULL ,
`sms_tgl_srt_diterima`  date NULL DEFAULT NULL ,
`sms_tgl_srt_dtlanjut`  date NULL DEFAULT NULL ,
`sms_tenggat_wkt`  int(11) NULL DEFAULT NULL ,
`sms_perihal`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_jenis_surat`  int(255) NULL DEFAULT NULL ,
`sms_no_agenda`  int(11) NULL DEFAULT NULL ,
`sms_unit_tujuan`  int(255) NULL DEFAULT NULL ,
`sms_keterangan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_edited_by`  int(11) NULL DEFAULT NULL ,
`sms_status_terkirim`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '' ,
`sms_file`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_pengirim`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_deleted`  int(11) NULL DEFAULT 0 ,
`sms_confirm_status`  int(11) NULL DEFAULT 0 ,
`sms_confirm_by`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_indek`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_lampiran`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sms_read`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`sms_id`),
FOREIGN KEY (`sms_jenis_surat`) REFERENCES `t_jenis_surat_masuk` (`jsm_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (`sms_unit_tujuan`) REFERENCES `t_unit_tujuan` (`utj_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (`sms_edited_by`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `jenis_surat_fk` (`sms_jenis_surat`) USING BTREE ,
INDEX `unit_tujuan_fk` (`sms_unit_tujuan`) USING BTREE ,
INDEX `user_fk` (`sms_edited_by`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=44

;

-- ----------------------------
-- Records of t_surat_msk
-- ----------------------------
BEGIN;
INSERT INTO `t_surat_msk` VALUES ('2', 'BAAA1', '2015-02-24', '2015-01-28', '2015-01-29', '0', 'Testimoni', '2', '667', '2', 'jkkljhlkjhlkhl', '1', '', null, 'Junno', '0', '0', null, null, null, '0'), ('4', '123', '0000-00-00', '2015-02-19', '2015-02-04', '1', 'per', '1', '0', '2', 'keter', '1', null, null, 'Tantra', '0', '0', null, null, null, '0'), ('5', '1234', '2015-02-16', '2015-02-24', '2015-02-26', null, 'hal', '2', '1', '2', 'HHAHAHAHAHA', '1', null, null, 'Saya', '0', '0', null, null, null, '0'), ('6', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '1', 'ket', null, null, null, 'Saya', '0', '0', null, null, null, '0'), ('7', '2', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'KET', null, '1', '1', 'asasa', null, null, null, 'Saya', '0', '0', null, null, null, '0'), ('8', '23', '2015-02-04', '2015-02-04', '2015-02-04', null, '', null, '0', null, '', null, null, null, '23', '0', '0', null, null, null, '0'), ('9', '23', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', null, 'frvvd', null, null, null, '23', '0', '0', null, null, null, '0'), ('10', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '2', 'poiu', null, null, null, 'Saya', '0', '0', null, null, null, '0'), ('11', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', '', '2', '0', '2', '', null, null, null, '1', '0', '0', null, null, null, '0'), ('12', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'lalala', null, null, null, 'Saya', '0', '0', null, null, null, '0'), ('13', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lelele', null, null, null, 'Saya', '0', '0', null, null, null, '0'), ('14', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'popopo', null, null, null, 'Saya', '0', '0', null, null, null, '0'), ('16', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lolilo', '1', null, null, 'Saya', '1', '0', null, null, null, '0'), ('17', '28', '2015-02-04', '2015-02-05', '2015-02-06', null, 'Perihal', '2', '2', '1', 'Keterangan', '1', null, null, 'Junno', '0', '0', null, null, null, '0'), ('19', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up', '1', null, null, 'Saya', '0', '0', null, null, null, '0'), ('20', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up lagi', '1', null, null, 'Saya', '1', '0', null, null, null, '0'), ('26', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'ahahahaha', '1', null, '20110902_blady_12.jpg', 'Saya', '0', '0', null, null, null, '0'), ('28', '23', '0000-00-00', '2015-01-14', '0000-00-00', null, '', '2', '0', '2', '', null, null, null, '', '0', '0', null, null, null, '0'), ('29', '12312312', '0000-00-00', '2015-01-02', '0000-00-00', null, '', '2', '0', '2', '', null, null, 'akar.png', '', '0', '0', null, null, null, '0'), ('30', '312', '0000-00-00', '2015-02-17', '0000-00-00', null, '', '2', '0', '2', '', null, null, 'akr.gif', '', '1', '0', null, null, null, '0'), ('31', '1', '2015-02-07', '2015-02-08', '2015-02-09', '1', 'Perihal', '1', '1', '2', 'Keterangan', null, null, null, 'Junno', '1', '0', null, null, null, '0'), ('32', '999', '2015-02-07', '2015-02-07', '2015-02-07', '1', 'Perihal', '2', '1', '2', 'kak', null, null, null, 'Junno', '0', '0', null, null, null, '0'), ('33', '280691', '2015-02-10', '2015-02-11', '2015-02-18', null, 'Coba log', '2', '1', '3', 'Mari kita coba log untuk surat masuk -edit', '1', null, null, 'Junno', '0', '0', null, null, null, '0'), ('34', '280691', '2015-02-10', '2015-02-11', '2015-02-18', null, 'Coba log', '2', '1', '3', 'Mari kita coba log untuk surat masuk', '1', null, 'joint1.png', 'Junno', '0', '0', null, null, null, '0'), ('35', '280691', '2015-02-10', '2015-02-11', '2015-02-18', null, 'Coba log', '2', '1', '3', 'Mari kita coba log untuk surat masuk', '1', null, 'joint2.png', 'Junno', '0', '0', null, null, null, '0'), ('36', '132', '2015-02-11', '2015-02-11', '2015-02-11', null, '', '2', '0', '3', '', '1', null, null, '2432354', '0', '0', null, null, null, '0'), ('37', '280691', '2015-02-12', '2015-02-12', '0000-00-00', null, 'Perihal', '2', '1', '3', 'alert pliss', '1', null, null, 'Junno', '0', '0', null, null, null, '0'), ('38', '280691', '2015-02-16', '2015-02-16', '2015-02-16', '1', 'Perihal', '1', '1', '1', 'tes ganti model', '1', null, null, 'Junno', '0', '0', null, null, null, '0'), ('39', '280691', '2015-02-16', '2015-02-16', '2015-02-16', null, 'Perihal', '2', '1', '3', 'tes ai baru', '1', null, null, 'Junno', '0', '0', null, null, null, '0'), ('40', '280691', '2015-02-17', '2015-02-17', '2015-02-17', '1', 'Perihal', '2', '1', '3', 'coba pengirim admin', '1', null, null, 'Junno', '0', '0', null, null, null, '0'), ('41', '280691', '2015-02-18', '2015-02-18', '2015-02-18', '1', 'Perihal', '2', '1', '3', 'test upload pdf', '1', null, 'img002.pdf', 'Junno', '0', '0', null, null, null, '0'), ('42', '77777', '2015-02-25', '2015-02-26', null, null, 'Tes dispo pertama', '2', null, null, null, '1', null, 'TugasBesar-rev21.pdf', 'Tes', '0', '0', null, null, null, '0'), ('43', '6789', '2015-03-01', '2015-03-02', null, null, 'tes tracking', '3', null, null, null, '1', null, 'UnyuScedule-new.pdf', 'Pengirim', '0', '0', null, null, null, '0');
COMMIT;

-- ----------------------------
-- Table structure for `t_unit_terusan`
-- ----------------------------
DROP TABLE IF EXISTS `t_unit_terusan`;
CREATE TABLE `t_unit_terusan` (
`utr_id`  int(11) NOT NULL AUTO_INCREMENT ,
`utr_nama_unit_trsn`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`utr_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of t_unit_terusan
-- ----------------------------
BEGIN;
INSERT INTO `t_unit_terusan` VALUES ('1', 'TU Pimpinan'), ('2', 'Rumah Tangga'), ('3', 'Perlengkapan'), ('4', 'TU dan Persuratan');
COMMIT;

-- ----------------------------
-- Table structure for `t_unit_tujuan`
-- ----------------------------
DROP TABLE IF EXISTS `t_unit_tujuan`;
CREATE TABLE `t_unit_tujuan` (
`utj_id`  int(20) NOT NULL AUTO_INCREMENT ,
`utj_unit_tujuan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`utj_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of t_unit_tujuan
-- ----------------------------
BEGIN;
INSERT INTO `t_unit_tujuan` VALUES ('1', 'Menterii'), ('2', 'Staf Ahli Menteri'), ('3', 'Om Janitor ');
COMMIT;

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
`usr_id`  int(2) NOT NULL AUTO_INCREMENT ,
`usr_username`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_password`  varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_nama`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`usr_nip`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`usr_role`  int(11) NULL DEFAULT NULL ,
`usr_no_telp`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`usr_email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`usr_deleted`  int(11) NULL DEFAULT 0 ,
`usr_total_read`  int(11) NULL DEFAULT 0 ,
`usr_departemen`  int(11) NULL DEFAULT NULL ,
`usr_jabatan`  int(11) NULL DEFAULT NULL ,
`usr_online`  int(11) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`usr_id`),
FOREIGN KEY (`usr_role`) REFERENCES `t_role` (`rle_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (`usr_departemen`) REFERENCES `t_departemen` (`dpt_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (`usr_jabatan`) REFERENCES `t_jabatan` (`jbt_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
INDEX `user_role_fk` (`usr_role`) USING BTREE ,
INDEX `usr_dpt_fk` (`usr_departemen`) USING BTREE ,
INDEX `usr_jbt_fk` (`usr_jabatan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of t_user
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '199003262014011002', '1', '43434343443', 'kek@sdsds.ccc', '0', '0', '1', '17', '0'), ('2', 'umum', '21232f297a57a5a743894a0e4a801fc3', 'Nur Akhwan', '19900326 201401 1 002', '2', '343242', 'trd', '0', '2', '2', '2', '0'), ('3', 'tantra', '21232f297a57a5a743894a0e4a801fc3', 'Juno', '123', '3', '', 'sdsd', '0', '0', '3', '3', '0'), ('4', 'ampas', '21232f297a57a5a743894a0e4a801fc3', 'ampas', '2323241', '2', '085795862828', 'junnotantra@gmail.com', '0', '0', '4', '4', '0'), ('5', 'bbbb', '21232f297a57a5a743894a0e4a801fc3', 'aaaa', '121212', '3', '25666', 'ganti', '0', '4', '1', '5', '0'), ('6', 'junta', '21232f297a57a5a743894a0e4a801fc3', 'junta', '12345', '3', '085795862827', 'admin@qw.er', '0', '2', '1', '6', '0'), ('7', 'admini', '21232f297a57a5a743894a0e4a801fc3', 'junta', '12345', '3', '085795862827', 'admin@s.ss', '0', '3', '3', '17', '0');
COMMIT;

-- ----------------------------
-- Table structure for `tr_disposisi_instruksi`
-- ----------------------------
DROP TABLE IF EXISTS `tr_disposisi_instruksi`;
CREATE TABLE `tr_disposisi_instruksi` (
`din_id_disposisi`  bigint(20) NULL DEFAULT NULL ,
`din_id_instruksi`  int(11) NULL DEFAULT NULL ,
`din_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
PRIMARY KEY (`din_id`),
FOREIGN KEY (`din_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`din_id_instruksi`) REFERENCES `t_instruksi` (`ins_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_disposisi_fk2` (`din_id_disposisi`) USING BTREE ,
INDEX `id_instruksi_fk` (`din_id_instruksi`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=104

;

-- ----------------------------
-- Records of tr_disposisi_instruksi
-- ----------------------------
BEGIN;
INSERT INTO `tr_disposisi_instruksi` VALUES ('28', '13', '10'), ('28', '12', '11'), ('29', '13', '12'), ('29', '6', '13'), (null, '13', '14'), (null, '11', '15'), ('32', '13', '17'), ('32', '4', '18'), ('33', '13', '19'), ('33', '6', '20'), ('34', '13', '21'), ('34', '6', '22'), ('36', '13', '31'), ('36', '8', '32'), ('37', '13', '37'), ('37', '8', '38'), ('38', '13', '43'), ('38', '7', '44'), ('39', '10', '48'), ('39', '5', '49'), ('41', '13', '55'), ('42', '13', '58'), ('42', '6', '59'), ('43', '13', '60'), ('43', '8', '61'), ('44', '13', '62'), ('44', '6', '63'), ('40', '13', '64'), ('40', '9', '65'), ('45', '11', '66'), ('45', '5', '67'), ('46', '11', '72'), ('46', '5', '73'), ('47', '8', '74'), ('47', '3', '75'), ('50', '7', '78'), ('51', '5', '81'), ('51', '4', '82'), ('49', '13', '85'), ('49', '7', '86'), ('52', '10', '88'), ('53', '2', '90'), ('54', '11', '93'), ('54', '5', '94'), ('55', '11', '95'), ('55', '5', '96'), ('56', '12', '97'), ('57', '9', '98'), ('58', '10', '99'), ('59', '10', '100'), ('60', '3', '101'), ('61', '10', '102'), ('62', '11', '103');
COMMIT;

-- ----------------------------
-- Table structure for `tr_disposisi_unit_terusan`
-- ----------------------------
DROP TABLE IF EXISTS `tr_disposisi_unit_terusan`;
CREATE TABLE `tr_disposisi_unit_terusan` (
`dut_id_unit_terusan`  int(11) NULL DEFAULT NULL ,
`dut_id_disposisi`  bigint(20) NULL DEFAULT NULL ,
`dut_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
PRIMARY KEY (`dut_id`),
FOREIGN KEY (`dut_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`dut_id_unit_terusan`) REFERENCES `t_unit_terusan` (`utr_id`) ON DELETE SET NULL ON UPDATE CASCADE,
INDEX `id_unit_terusan_fk` (`dut_id_unit_terusan`) USING BTREE ,
INDEX `id_disposisi_fk` (`dut_id_disposisi`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=41

;

-- ----------------------------
-- Records of tr_disposisi_unit_terusan
-- ----------------------------
BEGIN;
INSERT INTO `tr_disposisi_unit_terusan` VALUES ('4', '34', '1'), (null, '36', '10'), (null, '37', '13'), ('4', '38', '18'), ('1', '38', '19'), ('3', '39', '23'), ('1', '39', '24'), (null, '40', '27'), ('4', '40', '28'), (null, '41', '31'), ('3', '41', '32'), (null, '42', '35'), ('3', '42', '36'), (null, '43', '37'), ('4', '43', '38'), (null, '44', '39'), ('4', '44', '40');
COMMIT;

-- ----------------------------
-- Table structure for `tr_disposisi_user`
-- ----------------------------
DROP TABLE IF EXISTS `tr_disposisi_user`;
CREATE TABLE `tr_disposisi_user` (
`dus_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`dus_disposisi`  bigint(20) NULL DEFAULT NULL ,
`dus_user`  int(11) NULL DEFAULT NULL ,
`dus_status`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`dus_id`),
FOREIGN KEY (`dus_status`) REFERENCES `t_status_disposisi` (`sds_id`) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (`dus_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`dus_user`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `tr_disposisi_user_fk1` (`dus_disposisi`) USING BTREE ,
INDEX `tr_disposisi_user_fk2` (`dus_user`) USING BTREE ,
INDEX `fk_status` (`dus_status`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=77

;

-- ----------------------------
-- Records of tr_disposisi_user
-- ----------------------------
BEGIN;
INSERT INTO `tr_disposisi_user` VALUES ('25', '42', '2', null), ('26', '42', '4', null), ('27', '43', '1', null), ('28', '43', '3', null), ('29', '44', '1', null), ('30', '44', '4', null), ('31', '40', '1', null), ('32', '40', '4', null), ('33', '45', '2', null), ('34', '45', '5', null), ('39', '46', '2', null), ('40', '46', '4', null), ('41', '47', '2', null), ('42', '47', '5', null), ('44', '50', '3', null), ('46', '51', '4', null), ('48', '49', '5', null), ('51', '52', '1', null), ('52', '52', '7', null), ('54', '53', '4', null), ('57', '54', '5', null), ('58', '54', '7', null), ('59', '55', '5', null), ('60', '55', '2', null), ('61', '56', '1', null), ('62', '56', '6', null), ('63', '57', '5', null), ('64', '58', '3', null), ('65', '58', '7', null), ('66', '58', '4', null), ('67', '59', '3', null), ('68', '59', '7', null), ('69', '59', '4', null), ('70', '60', '1', null), ('71', '60', '5', null), ('72', '60', '6', null), ('73', '60', '2', null), ('74', '60', '4', null), ('75', '61', '3', null), ('76', '62', '4', null);
COMMIT;

-- ----------------------------
-- Auto increment value for `chat`
-- ----------------------------
ALTER TABLE `chat` AUTO_INCREMENT=20;

-- ----------------------------
-- Auto increment value for `t_chat`
-- ----------------------------
ALTER TABLE `t_chat` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `t_departemen`
-- ----------------------------
ALTER TABLE `t_departemen` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `t_form_disposisi`
-- ----------------------------
ALTER TABLE `t_form_disposisi` AUTO_INCREMENT=63;

-- ----------------------------
-- Auto increment value for `t_instruksi`
-- ----------------------------
ALTER TABLE `t_instruksi` AUTO_INCREMENT=14;

-- ----------------------------
-- Auto increment value for `t_jabatan`
-- ----------------------------
ALTER TABLE `t_jabatan` AUTO_INCREMENT=18;

-- ----------------------------
-- Auto increment value for `t_jenis_surat_masuk`
-- ----------------------------
ALTER TABLE `t_jenis_surat_masuk` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `t_log`
-- ----------------------------
ALTER TABLE `t_log` AUTO_INCREMENT=63;

-- ----------------------------
-- Auto increment value for `t_role`
-- ----------------------------
ALTER TABLE `t_role` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `t_status_disposisi`
-- ----------------------------
ALTER TABLE `t_status_disposisi` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `t_surat_msk`
-- ----------------------------
ALTER TABLE `t_surat_msk` AUTO_INCREMENT=44;

-- ----------------------------
-- Auto increment value for `t_unit_terusan`
-- ----------------------------
ALTER TABLE `t_unit_terusan` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `t_unit_tujuan`
-- ----------------------------
ALTER TABLE `t_unit_tujuan` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `t_user`
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for `tr_disposisi_instruksi`
-- ----------------------------
ALTER TABLE `tr_disposisi_instruksi` AUTO_INCREMENT=104;

-- ----------------------------
-- Auto increment value for `tr_disposisi_unit_terusan`
-- ----------------------------
ALTER TABLE `tr_disposisi_unit_terusan` AUTO_INCREMENT=41;

-- ----------------------------
-- Auto increment value for `tr_disposisi_user`
-- ----------------------------
ALTER TABLE `tr_disposisi_user` AUTO_INCREMENT=77;
