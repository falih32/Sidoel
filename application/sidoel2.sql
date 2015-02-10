/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sidoel2

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-02-10 22:53:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tr_disposisi_instruksi`
-- ----------------------------
DROP TABLE IF EXISTS `tr_disposisi_instruksi`;
CREATE TABLE `tr_disposisi_instruksi` (
  `din_id_disposisi` bigint(20) DEFAULT NULL,
  `din_id_instruksi` int(11) DEFAULT NULL,
  `din_id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`din_id`),
  KEY `id_disposisi_fk2` (`din_id_disposisi`) USING BTREE,
  KEY `id_instruksi_fk` (`din_id_instruksi`) USING BTREE,
  CONSTRAINT `tr_disposisi_instruksi_ibfk_1` FOREIGN KEY (`din_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tr_disposisi_instruksi_ibfk_2` FOREIGN KEY (`din_id_instruksi`) REFERENCES `t_instruksi` (`ins_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_disposisi_instruksi
-- ----------------------------
INSERT INTO `tr_disposisi_instruksi` VALUES ('28', '13', '10');
INSERT INTO `tr_disposisi_instruksi` VALUES ('28', '12', '11');
INSERT INTO `tr_disposisi_instruksi` VALUES ('29', '13', '12');
INSERT INTO `tr_disposisi_instruksi` VALUES ('29', '6', '13');
INSERT INTO `tr_disposisi_instruksi` VALUES (null, '13', '14');
INSERT INTO `tr_disposisi_instruksi` VALUES (null, '11', '15');
INSERT INTO `tr_disposisi_instruksi` VALUES ('32', '13', '17');
INSERT INTO `tr_disposisi_instruksi` VALUES ('32', '4', '18');
INSERT INTO `tr_disposisi_instruksi` VALUES ('33', '13', '19');
INSERT INTO `tr_disposisi_instruksi` VALUES ('33', '6', '20');
INSERT INTO `tr_disposisi_instruksi` VALUES ('34', '13', '21');
INSERT INTO `tr_disposisi_instruksi` VALUES ('34', '6', '22');

-- ----------------------------
-- Table structure for `tr_disposisi_unit_terusan`
-- ----------------------------
DROP TABLE IF EXISTS `tr_disposisi_unit_terusan`;
CREATE TABLE `tr_disposisi_unit_terusan` (
  `dut_id_unit_terusan` int(11) DEFAULT NULL,
  `dut_id_disposisi` bigint(20) DEFAULT NULL,
  `dut_id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`dut_id`),
  KEY `id_unit_terusan_fk` (`dut_id_unit_terusan`) USING BTREE,
  KEY `id_disposisi_fk` (`dut_id_disposisi`) USING BTREE,
  CONSTRAINT `tr_disposisi_unit_terusan_ibfk_1` FOREIGN KEY (`dut_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tr_disposisi_unit_terusan_ibfk_2` FOREIGN KEY (`dut_id_unit_terusan`) REFERENCES `t_unit_terusan` (`utr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_disposisi_unit_terusan
-- ----------------------------
INSERT INTO `tr_disposisi_unit_terusan` VALUES ('4', '34', '1');

-- ----------------------------
-- Table structure for `t_form_disposisi`
-- ----------------------------
DROP TABLE IF EXISTS `t_form_disposisi`;
CREATE TABLE `t_form_disposisi` (
  `fds_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `fds_id_surat` bigint(11) DEFAULT NULL,
  `fds_kasubbag` char(255) DEFAULT NULL,
  `fds_catatan` char(255) DEFAULT NULL,
  `fds_tgl_disposisi` date DEFAULT NULL,
  `fds_pengirim` int(11) DEFAULT NULL,
  `fds_id_parent` bigint(11) DEFAULT NULL,
  `fds_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`fds_id`),
  KEY `id_surat_fk` (`fds_id_surat`) USING BTREE,
  KEY `pengirim_fk` (`fds_pengirim`) USING BTREE,
  CONSTRAINT `t_form_disposisi_ibfk_1` FOREIGN KEY (`fds_id_surat`) REFERENCES `t_surat_msk` (`sms_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `t_form_disposisi_ibfk_2` FOREIGN KEY (`fds_pengirim`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_form_disposisi
-- ----------------------------
INSERT INTO `t_form_disposisi` VALUES ('1', '29', '1', 'cacat', '2015-02-07', null, null, '0');
INSERT INTO `t_form_disposisi` VALUES ('2', '29', '1', 'ccc', '2015-02-07', null, null, '0');
INSERT INTO `t_form_disposisi` VALUES ('3', '29', '1', 'kkkk', '2015-02-07', null, null, '0');
INSERT INTO `t_form_disposisi` VALUES ('4', '32', '1', 'kaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('5', '32', '1', 'cacat', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('6', '32', '1', 'lll', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('7', '32', '1', 'kakaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('8', '32', '1', 'kaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('9', '32', '1', 'kaaijciawc', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('10', '32', '1', 'lll', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('11', '32', '1', 'lll', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('12', '32', '1', 'lll', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('13', '32', '1', 'lll', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('14', '32', '1', 'lll', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('15', '32', '1', 'kakakakakakaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('16', '32', '1', 'kakakakakakaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('17', '32', '1', 'ahey', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('18', '32', '1', 'ahey', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('19', '32', '1', 'ahey', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('20', '32', '1', 'acecaec', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('21', '32', '', '', '0000-00-00', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('22', '32', '1', 'kakaoe', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('23', '32', '1', 'kakakakaodprptbsay', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('24', '32', '1', 'cacat', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('25', '32', '1', 'cacat', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('26', '32', '1', 'cacataaaaaaaa', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('27', '32', '1', 'aasadadafgagtnmishgr', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('28', '32', '1', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('29', '32', '1', 'lololol', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('30', '32', '1', 'adasfa', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('31', '32', '1', 'akakaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('32', '32', '1', 'akakaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('33', '32', '1', 'kakakaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('34', '32', '1', 'kakakaka', '2015-02-07', '1', null, '0');
INSERT INTO `t_form_disposisi` VALUES ('35', '32', '1', 'kakakakakuku', '2015-02-07', '1', null, '0');

-- ----------------------------
-- Table structure for `t_instruksi`
-- ----------------------------
DROP TABLE IF EXISTS `t_instruksi`;
CREATE TABLE `t_instruksi` (
  `ins_id` int(11) NOT NULL AUTO_INCREMENT,
  `ins_nama_instruksi` char(255) DEFAULT NULL,
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_instruksi
-- ----------------------------
INSERT INTO `t_instruksi` VALUES ('1', 'Info');
INSERT INTO `t_instruksi` VALUES ('2', 'Aksi');
INSERT INTO `t_instruksi` VALUES ('3', 'Tanggapan');
INSERT INTO `t_instruksi` VALUES ('4', 'Bahas');
INSERT INTO `t_instruksi` VALUES ('5', 'Dijawab/dibalas');
INSERT INTO `t_instruksi` VALUES ('6', 'Dilaksanakan');
INSERT INTO `t_instruksi` VALUES ('7', 'Ditindaklanjuti');
INSERT INTO `t_instruksi` VALUES ('8', 'Untuk Diketahui');
INSERT INTO `t_instruksi` VALUES ('9', 'File Karo');
INSERT INTO `t_instruksi` VALUES ('10', 'Bicarakan Dengan Karo');
INSERT INTO `t_instruksi` VALUES ('11', 'Jadwalkan');
INSERT INTO `t_instruksi` VALUES ('12', 'Siapkan Bahan');
INSERT INTO `t_instruksi` VALUES ('13', 'Beri Saran');

-- ----------------------------
-- Table structure for `t_jenis_surat_masuk`
-- ----------------------------
DROP TABLE IF EXISTS `t_jenis_surat_masuk`;
CREATE TABLE `t_jenis_surat_masuk` (
  `jsm_id` int(20) NOT NULL AUTO_INCREMENT,
  `jsm_nama_jenis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jsm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_jenis_surat_masuk
-- ----------------------------
INSERT INTO `t_jenis_surat_masuk` VALUES ('1', 'Sangat Rahasia');
INSERT INTO `t_jenis_surat_masuk` VALUES ('2', 'Rahasia');

-- ----------------------------
-- Table structure for `t_log`
-- ----------------------------
DROP TABLE IF EXISTS `t_log`;
CREATE TABLE `t_log` (
  `log_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `log_nama_tabel` varchar(100) DEFAULT NULL,
  `log_aksi` varchar(100) DEFAULT NULL,
  `log_tanggal` datetime DEFAULT NULL,
  `log_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('1', 'Surat Masuk', 'Create', '2015-02-10 21:48:46', 'Junno');

-- ----------------------------
-- Table structure for `t_role`
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `rle_id` int(11) NOT NULL AUTO_INCREMENT,
  `rle_role_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`rle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('1', 'Administrator');
INSERT INTO `t_role` VALUES ('2', 'Operator');
INSERT INTO `t_role` VALUES ('3', 'User Biasa');

-- ----------------------------
-- Table structure for `t_surat_msk`
-- ----------------------------
DROP TABLE IF EXISTS `t_surat_msk`;
CREATE TABLE `t_surat_msk` (
  `sms_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sms_nomor_surat` varchar(255) DEFAULT NULL,
  `sms_tgl_srt` date DEFAULT NULL,
  `sms_tgl_srt_diterima` date DEFAULT NULL,
  `sms_tgl_srt_dtlanjut` date DEFAULT NULL,
  `sms_tenggat_wkt` int(11) DEFAULT NULL,
  `sms_perihal` varchar(255) DEFAULT NULL,
  `sms_jenis_surat` int(255) DEFAULT NULL,
  `sms_no_agenda` int(11) DEFAULT NULL,
  `sms_unit_tujuan` int(255) DEFAULT NULL,
  `sms_keterangan` varchar(255) DEFAULT NULL,
  `sms_edited_by` int(11) DEFAULT NULL,
  `sms_status_terkirim` varchar(255) DEFAULT '',
  `sms_file` varchar(255) DEFAULT NULL,
  `sms_pengirim` varchar(255) DEFAULT NULL,
  `sms_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`sms_id`),
  KEY `jenis_surat_fk` (`sms_jenis_surat`) USING BTREE,
  KEY `unit_tujuan_fk` (`sms_unit_tujuan`) USING BTREE,
  KEY `user_fk` (`sms_edited_by`) USING BTREE,
  CONSTRAINT `t_surat_msk_ibfk_1` FOREIGN KEY (`sms_jenis_surat`) REFERENCES `t_jenis_surat_masuk` (`jsm_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `t_surat_msk_ibfk_2` FOREIGN KEY (`sms_unit_tujuan`) REFERENCES `t_unit_tujuan` (`utj_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `t_surat_msk_ibfk_3` FOREIGN KEY (`sms_edited_by`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_surat_msk
-- ----------------------------
INSERT INTO `t_surat_msk` VALUES ('2', 'BAAA1', '2015-02-24', '2015-01-28', '2015-01-29', '0', 'Testimoni', '2', '667', '2', 'jkkljhlkjhlkhl', '1', '', null, 'Junno', '0');
INSERT INTO `t_surat_msk` VALUES ('4', '123', '0000-00-00', '2015-02-19', '2015-02-04', '1', 'per', '1', '0', '2', 'ket', '1', '', '10666083_1485349628381481_913245954_a.jpg', 'Tantra', '0');
INSERT INTO `t_surat_msk` VALUES ('5', '1234', '0000-00-00', '2015-02-24', '2015-02-26', '0', 'hal', '2', '1', '2', 'ket', '1', '', null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('6', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '1', 'ket', null, null, null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('7', '2', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'KET', null, '1', '1', 'asasa', null, null, null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('8', '23', '2015-02-04', '2015-02-04', '2015-02-04', null, '', null, '0', null, '', null, null, null, '23', '0');
INSERT INTO `t_surat_msk` VALUES ('9', '23', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', null, 'frvvd', null, null, null, '23', '0');
INSERT INTO `t_surat_msk` VALUES ('10', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '2', 'poiu', null, null, null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('11', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', '', '2', '0', '2', '', null, null, null, '1', '0');
INSERT INTO `t_surat_msk` VALUES ('12', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'lalala', null, null, null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('13', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lelele', null, null, null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('14', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'popopo', null, null, null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('16', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lolilo', '1', null, null, 'Saya', '1');
INSERT INTO `t_surat_msk` VALUES ('17', '28', '2015-02-04', '2015-02-05', '2015-02-06', null, 'Perihal', '2', '2', '1', 'Keterangan', '1', null, null, 'Junno', '0');
INSERT INTO `t_surat_msk` VALUES ('18', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '0');
INSERT INTO `t_surat_msk` VALUES ('19', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up', '1', null, null, 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('20', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up lagi', '1', null, null, 'Saya', '1');
INSERT INTO `t_surat_msk` VALUES ('21', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '0');
INSERT INTO `t_surat_msk` VALUES ('22', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1');
INSERT INTO `t_surat_msk` VALUES ('23', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1');
INSERT INTO `t_surat_msk` VALUES ('24', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1');
INSERT INTO `t_surat_msk` VALUES ('25', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, '20110902_blady_11.jpg', '', '1');
INSERT INTO `t_surat_msk` VALUES ('26', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'ahahahaha', '1', null, '20110902_blady_12.jpg', 'Saya', '0');
INSERT INTO `t_surat_msk` VALUES ('27', 'aaaa', '0000-00-00', '0000-00-00', '0000-00-00', '1', 'aaaa', '2', '0', '2', 'aaaaaaaaa', null, null, null, 'aaaa', '0');
INSERT INTO `t_surat_msk` VALUES ('28', '23', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', null, null, null, '', '0');
INSERT INTO `t_surat_msk` VALUES ('29', '12312312', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', null, null, 'akar.png', '', '0');
INSERT INTO `t_surat_msk` VALUES ('30', '312', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', null, null, 'akr.gif', '', '1');
INSERT INTO `t_surat_msk` VALUES ('31', '1', '2015-02-07', '2015-02-08', '2015-02-09', '1', 'Perihal', '1', '1', '2', 'Keterangan', null, null, null, 'Junno', '1');
INSERT INTO `t_surat_msk` VALUES ('32', '999', '2015-02-07', '2015-02-07', '2015-02-07', '1', 'Perihal', '2', '1', '2', 'kak', null, null, null, 'Junno', '0');

-- ----------------------------
-- Table structure for `t_unit_terusan`
-- ----------------------------
DROP TABLE IF EXISTS `t_unit_terusan`;
CREATE TABLE `t_unit_terusan` (
  `utr_id` int(11) NOT NULL AUTO_INCREMENT,
  `utr_nama_unit_trsn` char(255) DEFAULT NULL,
  PRIMARY KEY (`utr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_unit_terusan
-- ----------------------------
INSERT INTO `t_unit_terusan` VALUES ('1', 'TU Pimpinan');
INSERT INTO `t_unit_terusan` VALUES ('2', 'Rumah Tangga');
INSERT INTO `t_unit_terusan` VALUES ('3', 'Perlengkapan');
INSERT INTO `t_unit_terusan` VALUES ('4', 'TU dan Persuratan');
INSERT INTO `t_unit_terusan` VALUES ('6', 'Kepala Satpam');

-- ----------------------------
-- Table structure for `t_unit_tujuan`
-- ----------------------------
DROP TABLE IF EXISTS `t_unit_tujuan`;
CREATE TABLE `t_unit_tujuan` (
  `utj_id` int(20) NOT NULL AUTO_INCREMENT,
  `utj_unit_tujuan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`utj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_unit_tujuan
-- ----------------------------
INSERT INTO `t_unit_tujuan` VALUES ('1', 'Menteri');
INSERT INTO `t_unit_tujuan` VALUES ('2', 'Staf Ahli Menteri');
INSERT INTO `t_unit_tujuan` VALUES ('3', 'Om Janitor ');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `usr_id` int(2) NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(15) NOT NULL,
  `usr_password` varchar(75) NOT NULL,
  `usr_nama` varchar(15) DEFAULT NULL,
  `usr_nip` varchar(25) DEFAULT NULL,
  `usr_role` int(11) DEFAULT NULL,
  `usr_no_telp` varchar(100) DEFAULT NULL,
  `usr_email` varchar(100) DEFAULT NULL,
  `usr_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`usr_id`),
  KEY `user_role_fk` (`usr_role`) USING BTREE,
  CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`usr_role`) REFERENCES `t_role` (`rle_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'Administrator', '19900326 201401 1 002', '3', '12132434', 'kek', '0');
INSERT INTO `t_user` VALUES ('2', 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e', 'Nur Akhwan', '19900326 201401 1 002', '2', '343242', 'trd', '0');
INSERT INTO `t_user` VALUES ('3', 'tantra', 'c314409d89dea3fb1d2fc4b63e88b7fc', 'Juno', '123', '3', '7566', 'sdsd', '0');
INSERT INTO `t_user` VALUES ('4', 'asasa', '4cfdc2e157eefe6facb983b1d557b3a1', 'ampas', '232324', '2', '879', 'sdsd', '0');
INSERT INTO `t_user` VALUES ('5', 'bbbb', 'a37180db89d784b1b4979b2734aa7c5d', 'aaaa', '121212', '3', '25666', 'ganti', '0');

-- ----------------------------
-- Procedure structure for `selectAllSuratMasuk`
-- ----------------------------
DROP PROCEDURE IF EXISTS `selectAllSuratMasuk`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllSuratMasuk`()
BEGIN
	SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, t_surat_msk.sms_tgl_srt, 
			t_surat_msk.sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted,
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis, 
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_unit_tujuan = t_user.usr_id
	WHERE t_surat_msk.sms_deleted = '0'
	ORDER BY t_surat_msk.sms_id;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `selectByIdSuratMasuk`
-- ----------------------------
DROP PROCEDURE IF EXISTS `selectByIdSuratMasuk`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectByIdSuratMasuk`(IN id BIGINT)
BEGIN
	SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, t_surat_msk.sms_tgl_srt, 
			t_surat_msk.sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted,
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis, 
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_unit_tujuan = t_user.usr_id
	WHERE t_surat_msk.sms_id = id
	AND t_surat_msk.sms_deleted = '0';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `selectPaginationSuratMasuk`
-- ----------------------------
DROP PROCEDURE IF EXISTS `selectPaginationSuratMasuk`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPaginationSuratMasuk`(IN perpage INTEGER, IN ofset INTEGER)
BEGIN
	SELECT	t_surat_msk.sms_id, t_surat_msk.sms_nomor_surat, t_surat_msk.sms_tgl_srt, 
			t_surat_msk.sms_tgl_srt_diterima, t_surat_msk.sms_tgl_srt_dtlanjut,
			t_surat_msk.sms_tenggat_wkt, t_surat_msk.sms_perihal, t_surat_msk.sms_jenis_surat, 
			t_surat_msk.sms_no_agenda, t_surat_msk.sms_unit_tujuan, t_surat_msk.sms_keterangan, 
			t_surat_msk.sms_edited_by, t_surat_msk.sms_status_terkirim, t_surat_msk.sms_file, 
			t_surat_msk.sms_pengirim, t_surat_msk.sms_deleted,
			t_unit_tujuan.utj_unit_tujuan, t_jenis_surat_masuk.jsm_nama_jenis, 
			t_user.usr_userName		
	FROM t_surat_msk
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_unit_tujuan = t_user.usr_id
	WHERE t_surat_msk.sms_deleted = '0'
	ORDER BY t_surat_msk.sms_id
	LIMIT perpage, ofset;
END
;;
DELIMITER ;
