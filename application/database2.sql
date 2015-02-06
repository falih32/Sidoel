/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sidoel2

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-02-07 00:06:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_form_disposisi`
-- ----------------------------
DROP TABLE IF EXISTS `t_form_disposisi`;
CREATE TABLE `t_form_disposisi` (
`fds_id`  bigint(11) NOT NULL DEFAULT 0 ,
`fds_id_surat`  bigint(11) NULL DEFAULT NULL ,
`fds_kasubbag`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`fds_catatan`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`fds_tgl_disposisi`  date NULL DEFAULT NULL ,
`fds_pengirim`  int(11) NULL DEFAULT NULL ,
`fds_id_parent`  bigint(11) NULL DEFAULT NULL ,
PRIMARY KEY (`fds_id`),
FOREIGN KEY (`fds_id_surat`) REFERENCES `t_surat_msk` (`sms_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`fds_pengirim`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_surat_fk` (`fds_id_surat`) USING BTREE ,
INDEX `pengirim_fk` (`fds_pengirim`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_form_disposisi
-- ----------------------------
BEGIN;
INSERT INTO `t_form_disposisi` VALUES ('1', null, null, null, null, null, null);
COMMIT;

-- ----------------------------
-- Table structure for `t_instruksi`
-- ----------------------------
DROP TABLE IF EXISTS `t_instruksi`;
CREATE TABLE `t_instruksi` (
`ins_id`  int(11) NOT NULL DEFAULT 0 ,
`ins_nama_instruksi`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`ins_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_instruksi
-- ----------------------------
BEGIN;
INSERT INTO `t_instruksi` VALUES ('1', 'Info'), ('2', 'Aksi'), ('3', 'Tanggapan'), ('4', 'Bahas'), ('5', 'Dijawab/dibalas'), ('6', 'Dilaksanakan'), ('7', 'Ditindaklanjuti'), ('8', 'Untuk Diketahui'), ('9', 'File Karo'), ('10', 'Bicarakan Dengan Karo'), ('11', 'Jadwalkan'), ('12', 'Siapkan Bahan'), ('13', 'Beri Saran');
COMMIT;

-- ----------------------------
-- Table structure for `t_jenis_surat_masuk`
-- ----------------------------
DROP TABLE IF EXISTS `t_jenis_surat_masuk`;
CREATE TABLE `t_jenis_surat_masuk` (
`jsm_id`  int(20) NOT NULL AUTO_INCREMENT ,
`jsm_nama_jenis`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`jsm_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of t_jenis_surat_masuk
-- ----------------------------
BEGIN;
INSERT INTO `t_jenis_surat_masuk` VALUES ('1', 'Sangat Rahasia'), ('2', 'Rahasia');
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
AUTO_INCREMENT=31

;

-- ----------------------------
-- Records of t_surat_msk
-- ----------------------------
BEGIN;
INSERT INTO `t_surat_msk` VALUES ('2', 'BAAA1', '2015-02-24', '2015-01-28', '2015-01-29', '0', 'Testimoni', '2', '667', '2', 'jkkljhlkjhlkhl', '1', '', null, 'Junno', '0'), ('4', '123', '0000-00-00', '2015-02-19', '2015-02-04', '1', 'per', '1', '0', '2', 'ket', '1', '', '10666083_1485349628381481_913245954_a.jpg', 'Tantra', '0'), ('5', '1234', '0000-00-00', '2015-02-24', '2015-02-26', '0', 'hal', '2', '1', '2', 'ket', '1', '', null, 'Saya', '0'), ('6', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '1', 'ket', null, null, null, 'Saya', '0'), ('7', '2', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'per', null, '1', '1', 'asasa', null, null, null, 'Saya', '0'), ('8', '23', '2015-02-04', '2015-02-04', '2015-02-04', null, '', null, '0', null, '', null, null, null, '23', '0'), ('9', '23', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', null, 'frvvd', null, null, null, '23', '0'), ('10', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '2', 'poiu', null, null, null, 'Saya', '0'), ('11', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', '', '2', '0', '2', '', null, null, null, '1', '0'), ('12', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'lalala', null, null, null, 'Saya', '0'), ('13', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lelele', null, null, null, 'Saya', '0'), ('14', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'popopo', null, null, null, 'Saya', '0'), ('16', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lolilo', '1', null, null, 'Saya', '1'), ('17', '28', '2015-02-04', '2015-02-05', '2015-02-06', null, 'Perihal', '2', '2', '1', 'Keterangan', '1', null, null, 'Junno', '1'), ('18', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '0'), ('19', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up', '1', null, null, 'Saya', '0'), ('20', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up lagi', '1', null, null, 'Saya', '1'), ('21', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '0'), ('22', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1'), ('23', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1'), ('24', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1'), ('25', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, '20110902_blady_11.jpg', '', '1'), ('26', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'ahahahaha', '1', null, '20110902_blady_12.jpg', 'Saya', '0'), ('27', 'aaaa', '0000-00-00', '0000-00-00', '0000-00-00', '1', 'aaaa', '2', '0', '2', 'aaaaaaaaa', null, null, null, 'aaaa', '0'), ('28', '23', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', null, null, null, '', '0'), ('29', '12312312', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', null, null, 'akar.png', '', '0'), ('30', '312', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', null, null, 'akr.gif', '', '0');
COMMIT;

-- ----------------------------
-- Table structure for `t_unit_terusan`
-- ----------------------------
DROP TABLE IF EXISTS `t_unit_terusan`;
CREATE TABLE `t_unit_terusan` (
`utr_id`  int(11) NOT NULL DEFAULT 0 ,
`utr_nama_unit_trsn`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`utr_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

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
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of t_unit_tujuan
-- ----------------------------
BEGIN;
INSERT INTO `t_unit_tujuan` VALUES ('1', 'Menteri'), ('2', 'Staf Ahli Menteri');
COMMIT;

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
`usr_id`  int(2) NOT NULL AUTO_INCREMENT ,
`usr_username`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_password`  varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_nama`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_nip`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_level`  enum('Super Admin','Admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`usr_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of t_user
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '19900326 201401 1 002', 'Super Admin'), ('2', 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e', 'Nur Akhwan', '19900326 201401 1 002', 'Admin');
COMMIT;

-- ----------------------------
-- Table structure for `tr_disposisi_instruksi`
-- ----------------------------
DROP TABLE IF EXISTS `tr_disposisi_instruksi`;
CREATE TABLE `tr_disposisi_instruksi` (
`din_id_disposisi`  bigint(20) NULL DEFAULT NULL ,
`din_id_instruksi`  int(11) NULL DEFAULT NULL ,
`din_id`  bigint(20) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`din_id`),
FOREIGN KEY (`din_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`din_id_instruksi`) REFERENCES `t_instruksi` (`ins_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_disposisi_fk2` (`din_id_disposisi`) USING BTREE ,
INDEX `id_instruksi_fk` (`din_id_instruksi`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tr_disposisi_instruksi
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `tr_disposisi_unit_terusan`
-- ----------------------------
DROP TABLE IF EXISTS `tr_disposisi_unit_terusan`;
CREATE TABLE `tr_disposisi_unit_terusan` (
`dut_id_unit_terusan`  int(11) NULL DEFAULT NULL ,
`dut_id_disposisi`  bigint(20) NULL DEFAULT NULL ,
`dut_id`  bigint(20) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`dut_id`),
FOREIGN KEY (`dut_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`dut_id_unit_terusan`) REFERENCES `t_unit_terusan` (`utr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_unit_terusan_fk` (`dut_id_unit_terusan`) USING BTREE ,
INDEX `id_disposisi_fk` (`dut_id_disposisi`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tr_disposisi_unit_terusan
-- ----------------------------
BEGIN;
COMMIT;

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

-- ----------------------------
-- Auto increment value for `t_jenis_surat_masuk`
-- ----------------------------
ALTER TABLE `t_jenis_surat_masuk` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `t_surat_msk`
-- ----------------------------
ALTER TABLE `t_surat_msk` AUTO_INCREMENT=31;

-- ----------------------------
-- Auto increment value for `t_unit_tujuan`
-- ----------------------------
ALTER TABLE `t_unit_tujuan` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `t_user`
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=3;
