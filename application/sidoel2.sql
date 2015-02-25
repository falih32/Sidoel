-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 06:01 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sidoel2`
--

DELIMITER $$
--
-- Procedures
--
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
END$$

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
END$$

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
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`id` int(10) unsigned NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(1, 'admin', 'umum', 'hallo', '2015-02-21 13:40:34', 1),
(2, 'umum', 'admin', 'hai', '2015-02-21 13:42:29', 1),
(3, 'umum', 'admin', 'hei', '2015-02-21 13:42:44', 1),
(4, 'umum', 'admin', 'asdsad', '2015-02-21 13:43:45', 1),
(5, 'undefined', 'umum', 'tes', '2015-02-21 13:46:05', 1),
(6, 'umum', 'admin', 'tes', '2015-02-21 13:49:38', 1),
(7, 'umum', 'admin', 'jgjkgk', '2015-02-21 13:50:13', 1),
(8, 'admin', 'umum', ';k;k;', '2015-02-21 13:50:59', 1),
(9, 'undefined', 'admin', 'hallo', '2015-02-21 13:52:01', 1),
(10, 'admin', 'umum', '1312', '2015-02-21 13:56:40', 1),
(11, 'admin', 'umum', 'tes', '2015-02-21 14:07:31', 1),
(12, 'undefined', 'umum', 'tes', '2015-02-21 14:08:08', 1),
(13, 'undefined', 'umum', 'huh', '2015-02-21 14:08:18', 1),
(14, 'admin', 'umum', 'gff', '2015-02-21 14:08:26', 1),
(15, 'admin', 'umum', 'hai', '2015-02-21 15:12:40', 1),
(16, 'admin', 'umum', 'hlo', '2015-02-21 15:12:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_disposisi_instruksi`
--

CREATE TABLE IF NOT EXISTS `tr_disposisi_instruksi` (
  `din_id_disposisi` bigint(20) DEFAULT NULL,
  `din_id_instruksi` int(11) DEFAULT NULL,
`din_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_disposisi_instruksi`
--

INSERT INTO `tr_disposisi_instruksi` (`din_id_disposisi`, `din_id_instruksi`, `din_id`) VALUES
(28, 13, 10),
(28, 12, 11),
(29, 13, 12),
(29, 6, 13),
(NULL, 13, 14),
(NULL, 11, 15),
(32, 13, 17),
(32, 4, 18),
(33, 13, 19),
(33, 6, 20),
(34, 13, 21),
(34, 6, 22),
(36, 13, 31),
(36, 8, 32),
(37, 13, 37),
(37, 8, 38),
(38, 13, 43),
(38, 7, 44),
(39, 10, 48),
(39, 5, 49),
(41, 13, 55),
(42, 13, 58),
(42, 6, 59),
(43, 13, 60),
(43, 8, 61),
(44, 13, 62),
(44, 6, 63),
(40, 13, 64),
(40, 9, 65),
(45, 11, 66),
(45, 5, 67),
(46, 11, 72),
(46, 5, 73),
(47, 8, 74),
(47, 3, 75),
(50, 7, 78),
(51, 5, 81),
(51, 4, 82),
(49, 13, 85),
(49, 7, 86),
(52, 10, 88),
(53, 2, 90),
(54, 11, 93),
(54, 5, 94),
(55, 11, 95),
(55, 5, 96),
(56, 12, 97),
(57, 9, 98);

-- --------------------------------------------------------

--
-- Table structure for table `tr_disposisi_unit_terusan`
--

CREATE TABLE IF NOT EXISTS `tr_disposisi_unit_terusan` (
  `dut_id_unit_terusan` int(11) DEFAULT NULL,
  `dut_id_disposisi` bigint(20) DEFAULT NULL,
`dut_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_disposisi_unit_terusan`
--

INSERT INTO `tr_disposisi_unit_terusan` (`dut_id_unit_terusan`, `dut_id_disposisi`, `dut_id`) VALUES
(4, 34, 1),
(6, 36, 10),
(6, 37, 13),
(4, 38, 18),
(1, 38, 19),
(3, 39, 23),
(1, 39, 24),
(6, 40, 27),
(4, 40, 28),
(6, 41, 31),
(3, 41, 32),
(6, 42, 35),
(3, 42, 36),
(6, 43, 37),
(4, 43, 38),
(6, 44, 39),
(4, 44, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tr_disposisi_user`
--

CREATE TABLE IF NOT EXISTS `tr_disposisi_user` (
`dus_id` bigint(20) NOT NULL,
  `dus_disposisi` bigint(20) DEFAULT NULL,
  `dus_user` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_disposisi_user`
--

INSERT INTO `tr_disposisi_user` (`dus_id`, `dus_disposisi`, `dus_user`) VALUES
(25, 42, 2),
(26, 42, 4),
(27, 43, 1),
(28, 43, 3),
(29, 44, 1),
(30, 44, 4),
(31, 40, 1),
(32, 40, 4),
(33, 45, 2),
(34, 45, 5),
(39, 46, 2),
(40, 46, 4),
(41, 47, 2),
(42, 47, 5),
(44, 50, 3),
(46, 51, 4),
(48, 49, 5),
(51, 52, 1),
(52, 52, 7),
(54, 53, 4),
(57, 54, 5),
(58, 54, 7),
(59, 55, 5),
(60, 55, 2),
(61, 56, 1),
(62, 56, 6),
(63, 57, 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_chat`
--

CREATE TABLE IF NOT EXISTS `t_chat` (
`cht_id` int(10) unsigned NOT NULL,
  `cht_from` varchar(255) NOT NULL DEFAULT '',
  `cht_to` varchar(255) NOT NULL DEFAULT '',
  `cht_message` text NOT NULL,
  `cht_sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cht_recd` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_departemen`
--

CREATE TABLE IF NOT EXISTS `t_departemen` (
`dpt_id` int(11) NOT NULL,
  `dpt_nama` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_departemen`
--

INSERT INTO `t_departemen` (`dpt_id`, `dpt_nama`) VALUES
(1, 'TU Pimpinan'),
(2, 'Rumah Tangga'),
(3, 'Perlengkapan'),
(4, 'TU dan Persuratan');

-- --------------------------------------------------------

--
-- Table structure for table `t_form_disposisi`
--

CREATE TABLE IF NOT EXISTS `t_form_disposisi` (
`fds_id` bigint(11) NOT NULL,
  `fds_id_surat` bigint(11) DEFAULT NULL,
  `fds_kasubbag` char(255) DEFAULT NULL,
  `fds_catatan` char(255) DEFAULT NULL,
  `fds_tgl_disposisi` date DEFAULT NULL,
  `fds_pengirim` int(11) DEFAULT NULL,
  `fds_id_parent` bigint(11) DEFAULT NULL,
  `fds_deleted` int(11) DEFAULT '0',
  `fds_file` char(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_form_disposisi`
--

INSERT INTO `t_form_disposisi` (`fds_id`, `fds_id_surat`, `fds_kasubbag`, `fds_catatan`, `fds_tgl_disposisi`, `fds_pengirim`, `fds_id_parent`, `fds_deleted`, `fds_file`) VALUES
(1, 29, '1', 'cacat', '2015-01-22', NULL, NULL, 0, NULL),
(2, 29, '1', 'ccc', '2015-02-07', NULL, NULL, 0, NULL),
(3, 29, '1', 'kkkk', '2015-02-07', NULL, NULL, 0, NULL),
(4, 32, '1', 'kaka', '2015-02-07', 1, NULL, 0, NULL),
(5, 32, '1', 'cacat', '2015-02-07', 1, NULL, 0, NULL),
(6, 32, '1', 'lll', '2015-02-07', 1, NULL, 0, NULL),
(7, 32, '1', 'kakaka', '2015-02-07', 1, NULL, 0, NULL),
(8, 32, '1', 'kaka', '2015-02-07', 1, NULL, 0, NULL),
(9, 32, '1', 'kaaijciawc', '2015-02-07', 1, NULL, 0, NULL),
(10, 32, '1', 'lll', '2015-02-07', 1, NULL, 0, NULL),
(11, 32, '1', 'lll', '2015-02-07', 1, NULL, 0, NULL),
(12, 32, '1', 'lll', '2015-02-07', 1, NULL, 0, NULL),
(13, 32, '1', 'lll', '2015-02-07', 1, NULL, 0, NULL),
(14, 32, '1', 'lll', '2015-02-07', 1, NULL, 0, NULL),
(15, 32, '1', 'kakakakakakaka', '2015-02-07', 1, NULL, 0, NULL),
(16, 32, '1', 'kakakakakakaka', '2015-02-07', 1, NULL, 0, NULL),
(17, 32, '1', 'ahey', '2015-02-07', 1, NULL, 0, NULL),
(18, 32, '1', 'ahey', '2015-02-07', 1, NULL, 0, NULL),
(19, 32, '1', 'ahey', '2015-02-07', 1, NULL, 0, NULL),
(20, 32, '1', 'acecaec', '2015-02-07', 1, NULL, 0, NULL),
(22, 32, '1', 'kakaoe', '2015-02-07', 1, NULL, 0, NULL),
(23, 32, '1', 'kakakakaodprptbsay', '2015-02-07', 1, NULL, 0, NULL),
(24, 32, '1', 'cacat', '2015-02-07', 1, NULL, 0, NULL),
(25, 32, '1', 'cacat', '2015-02-07', 1, NULL, 0, NULL),
(26, 32, '1', 'cacataaaaaaaa', '2015-02-07', 1, NULL, 0, NULL),
(27, 32, '1', 'aasadadafgagtnmishgr', '2015-02-07', 1, NULL, 0, NULL),
(28, 32, '1', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2015-02-07', 1, NULL, 0, NULL),
(29, 32, '1', 'lololol', '2015-02-07', 1, NULL, 0, NULL),
(30, 32, '1', 'adasfa', '2015-02-07', 1, NULL, 0, NULL),
(31, 32, '1', 'akakaka', '2015-02-07', 1, NULL, 0, NULL),
(32, 32, '1', 'akakaka', '2015-02-07', 1, NULL, 0, NULL),
(33, 32, '1', 'kakakaka', '2015-02-07', 1, NULL, 0, NULL),
(34, 32, '1', 'kakakaka', '2015-02-07', 1, NULL, 0, NULL),
(35, 32, '1', 'kakakakakuku', '2015-02-07', 1, NULL, 0, NULL),
(36, 4, '1', 'pake tujuan gan', '2015-02-11', 1, -99, 1, NULL),
(37, 4, '1', 'pake tujuan gan', '2015-02-11', 1, -99, 0, NULL),
(38, 8, '1', 'testing', '2015-02-11', 1, -99, 0, NULL),
(39, 11, '1', 'tsting lagi', '2015-02-11', 1, -99, 0, NULL),
(40, 8, '1', 'pppp', '2015-02-11', 1, -99, 0, NULL),
(41, 28, '1', 'cekz', '2015-02-11', 1, -99, 0, NULL),
(42, 8, '1', 'kolek', '2015-02-11', 1, -99, 0, NULL),
(43, NULL, '1', 'wasu', '2015-02-11', 1, -99, 0, NULL),
(44, 4, '1', 'lodaya', '2015-02-11', 1, -99, 0, NULL),
(45, 11, NULL, 'tambah disposisi dong', '2015-02-11', 1, 39, 0, NULL),
(46, 5, NULL, 'ganti model lagi', '2015-02-16', 1, -99, 0, NULL),
(47, 5, NULL, 'ini baru ai baru', '2015-02-16', 1, -99, 0, NULL),
(48, 5, NULL, 'kosong', '2015-02-09', 1, -99, 1, NULL),
(49, 19, NULL, 'disposisi buat aaaa', '2015-02-17', 5, -99, 1, NULL),
(50, 19, NULL, 'lanjut gan!', '2015-02-17', 5, 49, 0, NULL),
(51, 5, NULL, 'kok error sih messagenyaaaaa?', '2015-02-17', 1, 47, 0, NULL),
(52, 41, NULL, 'test disposisi baru dong', '2015-02-22', 1, -99, 0, NULL),
(53, 41, NULL, 'test upload disposisi', '2015-02-22', 1, -99, 0, 'luarock.png'),
(54, 41, NULL, 'edit junno laggi', '2015-02-23', 1, -99, 0, 'g3475.png'),
(55, 41, NULL, 'tambahan junno', '2015-02-23', 1, 54, 0, NULL),
(56, 41, NULL, 'test123', '2015-02-18', 1, -99, 0, 'slash.png'),
(57, 41, NULL, 'test123 tambah', '2015-02-17', 1, 56, 0, 'slash.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_instruksi`
--

CREATE TABLE IF NOT EXISTS `t_instruksi` (
`ins_id` int(11) NOT NULL,
  `ins_nama_instruksi` char(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_instruksi`
--

INSERT INTO `t_instruksi` (`ins_id`, `ins_nama_instruksi`) VALUES
(1, 'Info'),
(2, 'Aksi'),
(3, 'Tanggapan'),
(4, 'Bahas'),
(5, 'Dijawab/dibalas'),
(6, 'Dilaksanakan'),
(7, 'Ditindaklanjuti'),
(8, 'Untuk Diketahui'),
(9, 'File Karo'),
(10, 'Bicarakan Dengan Karo'),
(11, 'Jadwalkan'),
(12, 'Siapkan Bahan'),
(13, 'Beri Saran');

-- --------------------------------------------------------

--
-- Table structure for table `t_jabatan`
--

CREATE TABLE IF NOT EXISTS `t_jabatan` (
  `jbt_id` int(11) NOT NULL,
  `jbt_nama` varchar(255) DEFAULT NULL,
  `jbt_departemen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jabatan`
--

INSERT INTO `t_jabatan` (`jbt_id`, `jbt_nama`, `jbt_departemen`) VALUES
(1, 'Kabag TU Pimpinan', 1),
(2, 'Kabag Rumah Tangga', 2),
(3, 'Kabag Perlengkapan', 3),
(4, 'Kabag TU & Persuratan', 4),
(5, 'Kasubbag Protokol', 1),
(6, 'Kasubbag TU Menteri', 1),
(7, 'Kasubbag TU Sekretaris Jenderal', 1),
(8, 'Kasubbag Urusan Dalam', 2),
(9, 'Kasubbag ANGKAMDAL', 2),
(10, 'Kasubbag Kesejahteraan', 2),
(11, 'Kasubbag Perencanaan & Pemanfaatan', 3),
(12, 'Kasubbag Inventarisasi & Penghapusan', 3),
(13, 'Kasubbag Pengadaaan & Penyaluran', 3),
(14, 'Kasubbag Persuratan', 4),
(15, 'Kasubbag Arsip', 4),
(16, 'Kasubbag TU BIRO', 4),
(17, 'Staff Pelaksana', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_surat_masuk`
--

CREATE TABLE IF NOT EXISTS `t_jenis_surat_masuk` (
`jsm_id` int(20) NOT NULL,
  `jsm_nama_jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jenis_surat_masuk`
--

INSERT INTO `t_jenis_surat_masuk` (`jsm_id`, `jsm_nama_jenis`) VALUES
(1, 'Sangat Rahasia'),
(2, 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `t_log`
--

CREATE TABLE IF NOT EXISTS `t_log` (
`log_id` bigint(20) NOT NULL,
  `log_nama_tabel` varchar(100) DEFAULT NULL,
  `log_aksi` varchar(100) DEFAULT NULL,
  `log_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_user` int(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_log`
--

INSERT INTO `t_log` (`log_id`, `log_nama_tabel`, `log_aksi`, `log_tanggal`, `log_user`) VALUES
(1, 'Surat Masuk', 'Create', '2015-02-10 21:48:46', 1),
(2, 'Surat Masuk', 'Create', '0000-00-00 00:00:00', 1),
(3, 'Surat Masuk', 'Update', '0000-00-00 00:00:00', 1),
(4, 'Surat Masuk', 'Create', '2015-02-11 18:34:41', 1),
(5, 'Surat Masuk', 'Create', '2015-02-11 18:39:14', 1),
(6, 'Surat Masuk', 'Update', '2015-02-11 18:41:37', 1),
(7, 'Disposisi', 'Create', '2015-02-11 19:50:38', 1),
(8, 'Disposisi', 'Create', '2015-02-11 19:52:27', 1),
(9, 'Surat Masuk', 'Create', '2015-02-12 11:41:26', 1),
(10, 'Disposisi', 'Update', '2015-02-15 01:42:52', 1),
(11, 'Disposisi', 'Create', '2015-02-15 08:43:15', 1),
(12, 'Surat Masuk', 'Create', '2015-02-16 14:52:26', 1),
(13, 'Disposisi', 'Update', '2015-02-16 14:55:25', 1),
(14, 'Disposisi', 'Update', '2015-02-16 14:56:17', 1),
(15, 'Surat Masuk', 'Update', '2015-02-16 15:09:05', 1),
(16, 'Surat Masuk', 'Update', '2015-02-16 15:09:32', 1),
(17, 'Surat Masuk', 'Update', '2015-02-16 15:10:12', 1),
(18, 'Surat Masuk', 'Create', '2015-02-16 16:35:52', 1),
(19, 'Unit Tujuan', 'Update', '2015-02-17 16:26:45', 1),
(20, 'Unit Terusan', 'Update', '2015-02-17 16:44:15', 1),
(21, 'Unit Terusan', 'Update', '2015-02-17 16:44:22', 1),
(22, 'Surat Masuk', 'Create', '2015-02-17 22:16:29', 1),
(23, 'User', 'Update', '2015-02-17 23:25:52', 1),
(24, 'User', 'Update', '2015-02-17 23:56:02', 4),
(25, 'User', 'Update', '2015-02-17 23:58:20', 1),
(26, 'User', 'Update', '2015-02-18 00:02:24', 1),
(27, 'User', 'Update', '2015-02-18 01:00:09', 4),
(28, 'User', 'Update', '2015-02-18 01:32:30', 1),
(29, 'Disposisi', 'Delete', '2015-02-18 02:38:38', 1),
(30, 'Disposisi', 'Update', '2015-02-18 02:38:57', 1),
(31, 'Surat Masuk', 'Create', '2015-02-18 02:54:26', 1),
(32, 'Disposisi', 'Update', '2015-02-18 11:05:53', 5),
(33, 'Disposisi', 'Update', '2015-02-18 11:07:53', 5),
(34, 'Disposisi', 'Delete', '2015-02-18 11:08:28', 5),
(35, 'User', 'Create', '2015-02-20 22:55:45', 1),
(36, 'User', 'Create', '2015-02-20 23:44:52', 1),
(37, 'Disposisi', 'Update', '2015-02-22 01:23:07', 1),
(38, 'Disposisi', 'Update', '2015-02-22 01:41:47', 1),
(39, 'Disposisi', 'Update', '2015-02-23 12:14:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE IF NOT EXISTS `t_role` (
`rle_id` int(11) NOT NULL,
  `rle_role_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`rle_id`, `rle_role_name`) VALUES
(1, 'Administrator'),
(2, 'Operator'),
(3, 'User Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_msk`
--

CREATE TABLE IF NOT EXISTS `t_surat_msk` (
`sms_id` bigint(20) NOT NULL,
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
  `sms_deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_msk`
--

INSERT INTO `t_surat_msk` (`sms_id`, `sms_nomor_surat`, `sms_tgl_srt`, `sms_tgl_srt_diterima`, `sms_tgl_srt_dtlanjut`, `sms_tenggat_wkt`, `sms_perihal`, `sms_jenis_surat`, `sms_no_agenda`, `sms_unit_tujuan`, `sms_keterangan`, `sms_edited_by`, `sms_status_terkirim`, `sms_file`, `sms_pengirim`, `sms_deleted`) VALUES
(2, 'BAAA1', '2015-02-24', '2015-01-28', '2015-01-29', 0, 'Testimoni', 2, 667, 2, 'jkkljhlkjhlkhl', 1, '', NULL, 'Junno', 0),
(4, '123', '0000-00-00', '2015-02-19', '2015-02-04', 1, 'per', 1, 0, 2, 'keter', 1, NULL, NULL, 'Tantra', 0),
(5, '1234', '2015-02-16', '2015-02-24', '2015-02-26', NULL, 'hal', 2, 1, 2, 'HHAHAHAHAHA', 1, NULL, NULL, 'Saya', 0),
(6, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', NULL, 1, 1, 'ket', NULL, NULL, NULL, 'Saya', 0),
(7, '2', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'KET', NULL, 1, 1, 'asasa', NULL, NULL, NULL, 'Saya', 0),
(8, '23', '2015-02-04', '2015-02-04', '2015-02-04', NULL, '', NULL, 0, NULL, '', NULL, NULL, NULL, '23', 0),
(9, '23', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', NULL, 1, NULL, 'frvvd', NULL, NULL, NULL, '23', 0),
(10, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', NULL, 1, 2, 'poiu', NULL, NULL, NULL, 'Saya', 0),
(11, '1', '2015-02-04', '2015-02-04', '2015-02-04', 1, '', 2, 0, 2, '', NULL, NULL, NULL, '1', 0),
(12, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', 2, 1, 2, 'lalala', NULL, NULL, NULL, 'Saya', 0),
(13, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', 1, 1, 1, 'lelele', NULL, NULL, NULL, 'Saya', 0),
(14, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', 1, 1, 1, 'popopo', NULL, NULL, NULL, 'Saya', 0),
(16, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', 1, 1, 1, 'lolilo', 1, NULL, NULL, 'Saya', 1),
(17, '28', '2015-02-04', '2015-02-05', '2015-02-06', NULL, 'Perihal', 2, 2, 1, 'Keterangan', 1, NULL, NULL, 'Junno', 0),
(19, '1', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', 2, 1, 2, 'up', 1, NULL, NULL, 'Saya', 0),
(20, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', 2, 1, 2, 'up lagi', 1, NULL, NULL, 'Saya', 1),
(26, '1234', '2015-02-04', '2015-02-04', '2015-02-04', 1, 'hal', 1, 1, 1, 'ahahahaha', 1, NULL, '20110902_blady_12.jpg', 'Saya', 0),
(28, '23', '0000-00-00', '2015-01-14', '0000-00-00', NULL, '', 2, 0, 2, '', NULL, NULL, NULL, '', 0),
(29, '12312312', '0000-00-00', '2015-01-02', '0000-00-00', NULL, '', 2, 0, 2, '', NULL, NULL, 'akar.png', '', 0),
(30, '312', '0000-00-00', '2015-02-17', '0000-00-00', NULL, '', 2, 0, 2, '', NULL, NULL, 'akr.gif', '', 1),
(31, '1', '2015-02-07', '2015-02-08', '2015-02-09', 1, 'Perihal', 1, 1, 2, 'Keterangan', NULL, NULL, NULL, 'Junno', 1),
(32, '999', '2015-02-07', '2015-02-07', '2015-02-07', 1, 'Perihal', 2, 1, 2, 'kak', NULL, NULL, NULL, 'Junno', 0),
(33, '280691', '2015-02-10', '2015-02-11', '2015-02-18', NULL, 'Coba log', 2, 1, 3, 'Mari kita coba log untuk surat masuk -edit', 1, NULL, NULL, 'Junno', 0),
(34, '280691', '2015-02-10', '2015-02-11', '2015-02-18', NULL, 'Coba log', 2, 1, 3, 'Mari kita coba log untuk surat masuk', 1, NULL, 'joint1.png', 'Junno', 0),
(35, '280691', '2015-02-10', '2015-02-11', '2015-02-18', NULL, 'Coba log', 2, 1, 3, 'Mari kita coba log untuk surat masuk', 1, NULL, 'joint2.png', 'Junno', 0),
(36, '132', '2015-02-11', '2015-02-11', '2015-02-11', NULL, '', 2, 0, 3, '', 1, NULL, NULL, '2432354', 0),
(37, '280691', '2015-02-12', '2015-02-12', '0000-00-00', NULL, 'Perihal', 2, 1, 3, 'alert pliss', 1, NULL, NULL, 'Junno', 0),
(38, '280691', '2015-02-16', '2015-02-16', '2015-02-16', 1, 'Perihal', 1, 1, 1, 'tes ganti model', 1, NULL, NULL, 'Junno', 0),
(39, '280691', '2015-02-16', '2015-02-16', '2015-02-16', NULL, 'Perihal', 2, 1, 3, 'tes ai baru', 1, NULL, NULL, 'Junno', 0),
(40, '280691', '2015-02-17', '2015-02-17', '2015-02-17', 1, 'Perihal', 2, 1, 3, 'coba pengirim admin', 1, NULL, NULL, 'Junno', 0),
(41, '280691', '2015-02-18', '2015-02-18', '2015-02-18', 1, 'Perihal', 2, 1, 3, 'test upload pdf', 1, NULL, 'img002.pdf', 'Junno', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_unit_terusan`
--

CREATE TABLE IF NOT EXISTS `t_unit_terusan` (
`utr_id` int(11) NOT NULL,
  `utr_nama_unit_trsn` char(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_unit_terusan`
--

INSERT INTO `t_unit_terusan` (`utr_id`, `utr_nama_unit_trsn`) VALUES
(1, 'TU Pimpinan'),
(2, 'Rumah Tangga'),
(3, 'Perlengkapan'),
(4, 'TU dan Persuratan'),
(6, 'Kepala Satpam');

-- --------------------------------------------------------

--
-- Table structure for table `t_unit_tujuan`
--

CREATE TABLE IF NOT EXISTS `t_unit_tujuan` (
`utj_id` int(20) NOT NULL,
  `utj_unit_tujuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_unit_tujuan`
--

INSERT INTO `t_unit_tujuan` (`utj_id`, `utj_unit_tujuan`) VALUES
(1, 'Menterii'),
(2, 'Staf Ahli Menteri'),
(3, 'Om Janitor ');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`usr_id` int(2) NOT NULL,
  `usr_username` varchar(15) NOT NULL,
  `usr_password` varchar(75) NOT NULL,
  `usr_nama` varchar(15) DEFAULT NULL,
  `usr_nip` varchar(25) DEFAULT NULL,
  `usr_role` int(11) DEFAULT NULL,
  `usr_no_telp` varchar(100) DEFAULT NULL,
  `usr_email` varchar(100) DEFAULT NULL,
  `usr_deleted` int(11) DEFAULT '0',
  `usr_total_read` int(11) DEFAULT '0',
  `usr_departemen` int(11) DEFAULT NULL,
  `usr_jabatan` int(11) DEFAULT NULL,
  `usr_online` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`usr_id`, `usr_username`, `usr_password`, `usr_nama`, `usr_nip`, `usr_role`, `usr_no_telp`, `usr_email`, `usr_deleted`, `usr_total_read`, `usr_departemen`, `usr_jabatan`, `usr_online`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '19900326 201401 1 002', 1, '', 'kek', 0, 99999999, 1, 1, 0),
(2, 'umum', '21232f297a57a5a743894a0e4a801fc3', 'Nur Akhwan', '19900326 201401 1 002', 2, '343242', 'trd', 0, 1, 2, 2, 0),
(3, 'tantra', '21232f297a57a5a743894a0e4a801fc3', 'Juno', '123', 3, '', 'sdsd', 0, 0, 3, 3, 0),
(4, 'ampas', '21232f297a57a5a743894a0e4a801fc3', 'ampas', '2323241', 2, '085795862828', 'junnotantra@gmail.com', 0, 3, 4, 4, 0),
(5, 'bbbb', '21232f297a57a5a743894a0e4a801fc3', 'aaaa', '121212', 3, '25666', 'ganti', 0, 3, 1, 5, 0),
(6, 'junta', '21232f297a57a5a743894a0e4a801fc3', 'junta', '12345', 3, '085795862827', 'admin@qw.er', 0, 1, 1, 6, 0),
(7, 'admini', '21232f297a57a5a743894a0e4a801fc3', 'junta', '12345', 3, '085795862827', 'admin@s.ss', 0, 1, 3, 17, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_disposisi_instruksi`
--
ALTER TABLE `tr_disposisi_instruksi`
 ADD PRIMARY KEY (`din_id`), ADD KEY `id_disposisi_fk2` (`din_id_disposisi`) USING BTREE, ADD KEY `id_instruksi_fk` (`din_id_instruksi`) USING BTREE;

--
-- Indexes for table `tr_disposisi_unit_terusan`
--
ALTER TABLE `tr_disposisi_unit_terusan`
 ADD PRIMARY KEY (`dut_id`), ADD KEY `id_unit_terusan_fk` (`dut_id_unit_terusan`) USING BTREE, ADD KEY `id_disposisi_fk` (`dut_id_disposisi`) USING BTREE;

--
-- Indexes for table `tr_disposisi_user`
--
ALTER TABLE `tr_disposisi_user`
 ADD PRIMARY KEY (`dus_id`), ADD KEY `tr_disposisi_user_fk1` (`dus_disposisi`) USING BTREE, ADD KEY `tr_disposisi_user_fk2` (`dus_user`) USING BTREE;

--
-- Indexes for table `t_chat`
--
ALTER TABLE `t_chat`
 ADD PRIMARY KEY (`cht_id`), ADD KEY `to` (`cht_to`), ADD KEY `from` (`cht_from`);

--
-- Indexes for table `t_departemen`
--
ALTER TABLE `t_departemen`
 ADD PRIMARY KEY (`dpt_id`);

--
-- Indexes for table `t_form_disposisi`
--
ALTER TABLE `t_form_disposisi`
 ADD PRIMARY KEY (`fds_id`), ADD KEY `id_surat_fk` (`fds_id_surat`) USING BTREE, ADD KEY `pengirim_fk` (`fds_pengirim`) USING BTREE;

--
-- Indexes for table `t_instruksi`
--
ALTER TABLE `t_instruksi`
 ADD PRIMARY KEY (`ins_id`);

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
 ADD PRIMARY KEY (`jbt_id`), ADD KEY `fk_jabatan_departemen` (`jbt_departemen`);

--
-- Indexes for table `t_jenis_surat_masuk`
--
ALTER TABLE `t_jenis_surat_masuk`
 ADD PRIMARY KEY (`jsm_id`);

--
-- Indexes for table `t_log`
--
ALTER TABLE `t_log`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
 ADD PRIMARY KEY (`rle_id`);

--
-- Indexes for table `t_surat_msk`
--
ALTER TABLE `t_surat_msk`
 ADD PRIMARY KEY (`sms_id`), ADD KEY `jenis_surat_fk` (`sms_jenis_surat`) USING BTREE, ADD KEY `unit_tujuan_fk` (`sms_unit_tujuan`) USING BTREE, ADD KEY `user_fk` (`sms_edited_by`) USING BTREE;

--
-- Indexes for table `t_unit_terusan`
--
ALTER TABLE `t_unit_terusan`
 ADD PRIMARY KEY (`utr_id`);

--
-- Indexes for table `t_unit_tujuan`
--
ALTER TABLE `t_unit_tujuan`
 ADD PRIMARY KEY (`utj_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`usr_id`), ADD KEY `user_role_fk` (`usr_role`) USING BTREE, ADD KEY `usr_dpt_fk` (`usr_departemen`), ADD KEY `usr_jbt_fk` (`usr_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tr_disposisi_instruksi`
--
ALTER TABLE `tr_disposisi_instruksi`
MODIFY `din_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `tr_disposisi_unit_terusan`
--
ALTER TABLE `tr_disposisi_unit_terusan`
MODIFY `dut_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tr_disposisi_user`
--
ALTER TABLE `tr_disposisi_user`
MODIFY `dus_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `t_chat`
--
ALTER TABLE `t_chat`
MODIFY `cht_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_departemen`
--
ALTER TABLE `t_departemen`
MODIFY `dpt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_form_disposisi`
--
ALTER TABLE `t_form_disposisi`
MODIFY `fds_id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `t_instruksi`
--
ALTER TABLE `t_instruksi`
MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_jenis_surat_masuk`
--
ALTER TABLE `t_jenis_surat_masuk`
MODIFY `jsm_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_log`
--
ALTER TABLE `t_log`
MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
MODIFY `rle_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_surat_msk`
--
ALTER TABLE `t_surat_msk`
MODIFY `sms_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `t_unit_terusan`
--
ALTER TABLE `t_unit_terusan`
MODIFY `utr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_unit_tujuan`
--
ALTER TABLE `t_unit_tujuan`
MODIFY `utj_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `usr_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tr_disposisi_instruksi`
--
ALTER TABLE `tr_disposisi_instruksi`
ADD CONSTRAINT `tr_disposisi_instruksi_ibfk_1` FOREIGN KEY (`din_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tr_disposisi_instruksi_ibfk_2` FOREIGN KEY (`din_id_instruksi`) REFERENCES `t_instruksi` (`ins_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tr_disposisi_unit_terusan`
--
ALTER TABLE `tr_disposisi_unit_terusan`
ADD CONSTRAINT `tr_disposisi_unit_terusan_ibfk_1` FOREIGN KEY (`dut_id_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tr_disposisi_unit_terusan_ibfk_2` FOREIGN KEY (`dut_id_unit_terusan`) REFERENCES `t_unit_terusan` (`utr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tr_disposisi_user`
--
ALTER TABLE `tr_disposisi_user`
ADD CONSTRAINT `tr_disposisi_user_ibfk_1` FOREIGN KEY (`dus_disposisi`) REFERENCES `t_form_disposisi` (`fds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tr_disposisi_user_ibfk_2` FOREIGN KEY (`dus_user`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_form_disposisi`
--
ALTER TABLE `t_form_disposisi`
ADD CONSTRAINT `t_form_disposisi_ibfk_1` FOREIGN KEY (`fds_id_surat`) REFERENCES `t_surat_msk` (`sms_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_form_disposisi_ibfk_2` FOREIGN KEY (`fds_pengirim`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
ADD CONSTRAINT `fk_jabatan_departemen` FOREIGN KEY (`jbt_departemen`) REFERENCES `t_departemen` (`dpt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_surat_msk`
--
ALTER TABLE `t_surat_msk`
ADD CONSTRAINT `t_surat_msk_ibfk_1` FOREIGN KEY (`sms_jenis_surat`) REFERENCES `t_jenis_surat_masuk` (`jsm_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `t_surat_msk_ibfk_2` FOREIGN KEY (`sms_unit_tujuan`) REFERENCES `t_unit_tujuan` (`utj_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `t_surat_msk_ibfk_3` FOREIGN KEY (`sms_edited_by`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`usr_role`) REFERENCES `t_role` (`rle_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `usr_dpt_fk` FOREIGN KEY (`usr_departemen`) REFERENCES `t_departemen` (`dpt_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `usr_jbt_fk` FOREIGN KEY (`usr_jabatan`) REFERENCES `t_jabatan` (`jbt_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
