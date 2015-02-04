/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sidoel

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-02-04 12:10:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ref_klasifikasi`
-- ----------------------------
DROP TABLE IF EXISTS `ref_klasifikasi`;
CREATE TABLE `ref_klasifikasi` (
`id`  int(4) NOT NULL AUTO_INCREMENT ,
`kode`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`uraian`  mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=176

;

-- ----------------------------
-- Records of ref_klasifikasi
-- ----------------------------
BEGIN;
INSERT INTO `ref_klasifikasi` VALUES ('1', 'KU.00', 'RENCANA DAN PENYUSUNAN ANGGARAN', 'Rencana dan Penyusunan Anggaran'), ('2', 'KU.00.1', 'RENCANA ANGGARAN', 'Berkenaan dgn perencanaan anggaran seperti RAKIP, RKA-KL, RASKIP, usulan RAPBN'), ('3', 'KU.00.2', 'PENYUSUNAN ANGGARAN', 'Surat-surat yang berkenaan dengan anggaran belanja, seperti PAGU Indikatif, Pagu Definitif, RKA, DIPA, POK, Revisi Anggaran'), ('4', 'KU.00.3', 'NON BUDGETER', 'Berkaitan dgn penyusunan anggaran non budgeter (NTCR, Biaya petugas haji, Badan Kesejahteraan Masjid, BP4, MTQ)'), ('5', 'KU.01', 'BELANJA', '-'), ('6', 'KU.01.1', 'SURAT PERMINTAAN PEMBAYARAN', 'Surat-surat   yang   berkenaan   dengan   pengajuan   dan   pengeluaran surat permintaan pembayaran (SPP) meliputi SPPGU, SPPDU/TU, SPPLS,   ABT   rutin,   termasuk   gaji   pegawai,  Surat   Pernyataan  Pengajuan   Tambahan   Uang   Persediaan,  Surat   Permohonan  Tambahan   Uang   Persediaan,  Surat   Pernyataan   Permintaan \r\nDispensasi   Tambahan   Uang   Persediaan,  Penambahan  Anggaran/Anggaran Pendapatan Belanja Negara Perubahan.'), ('7', 'KU.01.2', 'SPJ', 'Surat-surat   yang   berkenaan   dengan   pengajuan   dan   pengeluaran surat   permintaan   pembayaran   (SPP)   beban   tetap   dan sementara/UUDP   (Uang   Untuk   Dipertanggungjawabkan) pembangunan.'), ('8', 'KU.02', 'SPJ', '-'), ('9', 'KU.02.1', 'SPJ APBN ', 'Surat-surat yang berkenaan dengan pertanggungjawaban keuangan anggaran belanja rutin, seperti: laporan Realisasi Keuangan, surat Pernyataan Tanggung Jawab Belanja, surat Keterangan Tanggung Jawab Mutlak, laporan Realisasi Anggaran '), ('10', 'KU.02.2', 'SPJ NON BUDGETER', 'Surat-surat yang berkenaan dengan pertanggungjawaban keuangan (NTCR, Biaya petugas haji, Badan Kesejahteraan Masjid, BP4, MTQ)'), ('11', 'KU.03', 'PENDAPATAN NEGARA', '-'), ('12', 'KU.03.1', 'PAJAK', 'Surat-surat yang berkenaan dengan pendapatan Negara dari hasil pajak yang meliputi: MPO (Menghitung Pajak Orang), PPN (Pajak Pendapatan Negara), Pajak Jasa, PPH (Pajak Pendapatan Penghasilan), Dan pajak lainnya.'), ('13', 'KU.03.2', 'BUKAN PAJAK', 'Surat-surat   yang   berkenaan   dengan   pendapatan   Negara   dan   hasil bukan pajak (nontax) yang meliputi penerimaan dari : biaya   penelitian   hasil   penerimaan negara, biaya NTCR, biaya   perkara   dan   hasil   penjualan barang-barang   inventaris   yang dihapuskan.'), ('14', 'KU.04', 'PERBANKAN', '-'), ('15', 'KU.04.1', 'VALUTA ASING/TRANSFER', 'Surat-surat yang berkenaan dengan pembelian Valuta Asing.'), ('16', 'KU.04.2', 'SURAT-SURAT YANG BERKENAAN DENGAN PEMBELIAN VALUTA ASING.', 'ralat Rekening, Surat Pernyataan Rekening'), ('17', 'KU.05', 'SUMBANGAN/BANTUAN', 'Surat-surat   yang   berkenaan   dengan   permintaan,   pemberian sumbangan/bantuan   khusus   di   luar   tugas   pokok   Kementerian   Agama, seperti: bencana alam, kebakaran, pekan Olah Raga, dan lain sebagainnya'), ('18', 'KP', 'KEPEGAWAIAN', '-'), ('19', 'KP.00', 'PENGADAAN', '-'), ('20', 'KP.00.1', 'FORMASI', 'Surat-surat   yang   berkenaan   dengan   perencanaan   pengadaan pegawai,   nota   usul,   formasi   sampai   dengan   persetujuan   termasuk didalamnya berzetting.'), ('21', 'KP.00.2', 'PENERIMAAN', 'Surat-surat yang berkenaan dengan penerimaan pegawai baru, mulai dari   pengumuman   penerimaan,   panggilan testing/psychotest/clearance test sampai pengumuman yang diterima, termasuk di dalamnya:  GAH (Guru Agama Honorarium), GTT (Guru Tidak Tetap), P3-NTCR   (Pegawai   Pembantu Pencatat   Nikah   Talak   Cerai   Rujuk)   / Pembantu   PPN   dan   Tenaga honorarium   lainnya,   termasuk pengangkatan dan pemberhentiannya.'), ('22', 'KP.00.3', 'PENGANGKATAN', 'Surat-surat   yang   berkenaan   dengan   seluruh   proses   pengangkatan calon   pegawai   dan   menempatkan   calon   pegawai   sampai   dengan menjadi   pegawai   negeri,   mulai   dan   pemeriksaan   kesehatan   sampai dengan pengangkatan, termasuk pelimpahan/penempatan.'), ('23', 'KP.01', 'TATA USAHA KEPEGAWAIAN', '-'), ('24', 'KP.01.1', 'IZIN/DISPENSASI', 'Surat-surat   yang   berkenaan   dengan   izin   tidak   masuk   kerja   atas permintaan   yang   diajukan   oleh   pegawai   yang  bersangkutan, maupun dispensasi yang diajukan oleh instansi lain termasuk tugas pada instansi lain dan tugas ke luar negeri bagi pegawai Kementerian Agama serta tugas belajar yang diberikan oleh instansi Kementerian Agama atau atas permintaan pegawai yang bersangkutan.'), ('25', 'KP.01.2', 'KETERANGAN', 'Surat-surat yang berkenaan dengan keterangan pegawai keluarganya, termasuk   surat-surat   mengenai   NIP/KARPEG   penunjukan penghubung ke instansi lain dan data pegawai/pejabat.'), ('26', 'KP.02', 'PENDIDIKAN DAN PELATIHAN', '-'), ('27', 'KP.02.1', 'DIKLAT PRAJABATAN', 'Surat-surat yang berkenaan dengan: Diklat Prajabatan Golongan I sebagai syarat untuk menjadi PNS golongan I, Diklat Prajabatan Golongan II sebagai syarat untuk menjadi PNS golongan II, Diklat Prajabatan Golongan III sebagai syarat untuk menjadi PNS golongan III, Mulai dan  perencanaan  (training  need survei  kurikulum, silabus dan lainnya), pelaksanaan dan evaluasi. '), ('28', 'KP.02.2', 'DIKLAT DALAM JABATAN', 'Surat-surat yang berkenaan dengan: Diklat Kepemimpinan, Diklat Fungsional, Diklat Teknis, '), ('29', 'KP.02.3', 'LATIHAN KURSUS', 'Surat-surat   yang   berkenaan   dengan   kursus   baik   yang diselenggarakan dalam negeri maupun luar negeri, misalnya: LEMHANAS (Lembaga Pertahanan Nasional), Workshop, Lokakarya, Orientasi, Konsultasi, Sosialisasi, Seminar, dan lain-lain, Mulai dan perencanaan, persiapan, pelaksanaan dan evaluasi.'), ('30', 'KP.03', 'KORPRI', 'Surat-   surat   yang   berkenaan   dengan   organisasi   KORPRI   termasuk   di dalamnya: Dharma Wanita, PEMILU dan lain-lain yang sejenis.'), ('31', 'KP.04', 'PENILAIAN DAN HUKUMAN', '-'), ('32', 'KP.04.1', 'PENILAIAN', 'Surat-surat yang berkenaan dengan penilaian pelaksanaan pekerjaan, disiplin   pegawai,   pemalsuan   administrasi   kepegawaian,   rehabilitasi dan pemutihan.'), ('33', 'KP.04.2', 'HUKUMAN', 'Surat-surat yang berkenaan dengan hukuman pegawai yang meliputi: teguran tertulis pernyataan tidak puas secara tertulis, enundaan kenaikan gaji berkala untuk paling lama 1 (satu) tahun penundaan kenaikan pangkat untuk paling lama 1 (satu) tahun, penurunan   pangkat   pada   pangkat   yang   setingkat   lebih  rendah untuk paling lama 1 (satu) tahun pembebasan dari jabatan,  pemberhentian   dengan   hormat   tidak   atas   permintaan   sendiri sebagai Pegawai Negeri Sipil, pemberhentian tidak dengan hormat sebagai Pegawai Negeri Sipil.'), ('34', 'KP.05', 'SCREENING', 'Surat-surat yang berhubungan dengan screening bagi pegawai dalam hal kegiatan politik.'), ('35', 'KP.06', 'PEMBINAAN MENTAL', 'Surat-surat   yang   berkenaan   dengan   pembinaan   mental pegawai termasuk di dalamnya kerokhanian dan P4'), ('36', 'KP.07', 'MUTASI', '-'), ('37', 'KP.07.1', 'KEPANGKATAN', 'Surat-surat   yang   berkenaan   dengan   kenaikan   pangkat/golongan termasuk di dalamnya ujian dinas, penyesuaian ijazah dan daftar unit kepangkatan.'), ('38', 'KP.07.2', 'KENAIKAN GAJI BERKALA', 'Surat-surat yang berkenaan dengan kenaikan gaji berkala.'), ('39', 'KP.07.3', 'PENYESUAIN MASA KERJA', 'Surat-surat   yang   berkenaan   dengan   penyesuaian   masa   kerja   untuk perubahan ruang gaji dan impassing'), ('40', 'KP.07.4', 'PENYESUAIAN TUNJANGAN KELUARGA', 'Surat-surat yang berkenaan dengan penyesuaian tunjangan keluarga'), ('41', 'KP.07.5', 'ALIH TUGAS', 'Surat-surat   yang   berkenaan   dengan   alih   tugas   bagi   para pelaksana/staf,   perpindahan   dalam   rangka   pemantapan   tugas pekerjaan termasuk mengenai fasilitasnya.'), ('42', 'KP.07.6', 'JABATAN STRUKTURAL/FUNGSIONAL', 'Surat-surat   yang   berkenaan   dengan   pengangkatan   dan pemberhentian   dalam   jabatan   struktural/fungsional   termasuk tunjangan  jabatan  sewaktu   penugasan   atau   pemberian   kuasa  untuk menjabat sementara, termasuk fasilitasnya.'), ('43', 'KP.08', 'KESEJAHTERAAN', '-'), ('44', 'KP.08.1', 'KESEHATAN', 'Surat-surat yang berkenaan dengan penyelenggaraan kesehatan bagi pegawai meliputi: asuransi kesehatan (ASKES), general chek up pejabat, general chek up karyawan/i'), ('45', 'KP.08.2', 'CUTI', 'Surat-surat yang berkenaan dengan cuti pegawai meliputi: cuti tahunan, cuti karena alasan penting,  cuti sakit, cuti bersalin/hamil, dan,  cuti di luar tanggungan negara.'), ('46', 'KP.08.3', 'REKREASI', 'Surat-surat yang berkenaan dengan rekreasi dan olah raga.'), ('47', 'KP.08.4', 'BANTUAN/SANTUAN SOSIAL', 'Surat-surat   yang   berkenaan   pemberian   bantuan/tunjangan   sosial kepada   pegawai   dan   keluarga   yang   mengalami   musibah,   termasuk ucapan duka cita.'), ('48', 'KP.08.5', 'KOPERASI', 'Surat-surat yang berkenaan dengan organisasi koperasi termasuk di dalamnya masalah pengurusan kebutuhan bahan pokok.'), ('49', 'KP.08.6', 'PERUMAHAN', 'Surat-surat yang berkenaan dengan perumahan pegawai.'), ('50', 'KP.08.7', 'ANTAR  JEMPUT/TRANSPORTASI', 'Surat-surat yang berkenaan dengan transportasi pegawai.'), ('51', 'KP.08.8', 'PENGHARGAAN', 'Surat-surat   yang   berkenaan   dengan   penghargaan,   Tanda   jasa, Piagam, Satya Lencana,  Penghargaan Anumerta dan sebagainya'), ('52', 'KP.09', 'PEMUTUSAN HUBUNGAN KERJA', 'Surat-surat   yang   berkenaan   pemberian   dengan   pensiun   pegawai, termasuk   jaminan-jaminan   asuransi   karena   berhenti   atas   permintaan sendiri,  berhenti  dengan  hormat  bukan  karena   hukuman,  pindah  keluar dari Departemen dan meninggal dunia.'), ('53', 'OT', 'ORGANISASI DAN TATALAKSANA', '-'), ('54', 'OT.00', 'ORGANISASI', 'Surat-surat yang berhubungan dengan pembentukan dan pengembangan organisasi serta analisis jabatan.'), ('55', 'OT.01', 'TATALAKSANA', '-'), ('56', 'OT.01.1', 'PERENCANAAN', 'Surat-surat   yang   berhubungan   dengan   perencanaan/program kerja,   pengembangan   organisasi  dan   kebijakan   dibidang perencanaan'), ('57', 'OT.01.2', 'LAPORAN', 'Surat-surat   yang   berhubungan   dengan   monitoring,   evaluasi   dan laporan antara lain: AKIP, kinerja Menteri , mingguan, bulanan, triwulan, semesteran'), ('58', 'OT.01.3', 'PENYUSUNAN PROSEDUR KERJA', 'Surat-surat   yang   berhubungan   dengan   penyusunan   sistem, pedoman,   petunjuk   pelaksanaanan,   petunjuk   teknis   dan pembakuan sarana kerja'), ('59', 'OT.01.4', 'PELAYANAN MASYARAKAT', 'Surat-surat   yang   berhubungan   dengan   peningkatan   pelayanan masyarakat antara lain : penilaian kinerja unit pelayan masyarakat, penilaian kinerja Sumber Daya Manusia,  indek kepuasan masyarakat, standar pelayan minimal (SPM), standar pelayan Prosedur (SPP), standar operasional prosedur (SOP) '), ('60', 'OT.01.5', '', '-'), ('61', 'OT.01.6', '', '-'), ('62', 'HK', 'HUKUM', '-'), ('63', 'HK.00', 'PERATURAN PERUNDANG-UNDANGAN', 'Surat-surat   yang   berkenaan   dengan   pemrosesan   suatu   peraturan perundang-undangan   produk  Kementerian   Agama   dan   konsep/draf sampai   selesai,   maupun   produk   peraturan-peraturan   perundang-undangan yang diterima baik interen Kementerian maupun dan instansi lain.'), ('64', 'HK.00.1', 'UNDANG-UNDANG TERMASUK PERPU', '-'), ('65', 'HK.00.2', 'PERATURAN PEMENINTAH', '-'), ('66', 'HK.00.3', 'KEPUTUSAN PRESIDEN, INSTRUKSI PRESIDEN', '-'), ('67', 'HK.00.4', 'PERATURAN MENTERI, INSTRUKSI MENTERI', '-'), ('68', 'HK.00.5', 'KEPUTUSAN MENTERI, PIMPINAN UNIT ESELON I', '-'), ('69', 'HK.00.6', 'KEPUTUSAN MENTERI, PIMPINAN UNIT ESELON I', '-'), ('70', 'HK.00.7', 'EDARAN MENTERI/PIMPINAN UNIT ESELON I/II', '-'), ('71', 'HK.00.8', 'PERATURAN   KANTOR   WILAYAH   KEMENTERIAN  AGAMA  PROVINSI   DAN KANTOR KEMENTERIAN AGAMA KABUPATEN/KOTA', '-'), ('72', 'HK.00.9', 'PERATURAN PEMDA TK. I/PEMDA TK. II', '-'), ('73', 'HK.01', 'PIDANA', '-'), ('74', 'HK.01.1', 'PENCURIAN', 'Surat-surat yang berkenaan dengan pencurian yang terjadi di dalam lingkungan Kantor Kementerian Agama baik pusat maupun daerah.'), ('75', 'HK.01.2', 'KORUPSI', 'Surat-surat   yang   berkenaan   dengan   korupsi,   penyelewengan   dan penyalahgunaan wewenang/jabatan'), ('76', 'HK.02', 'PERDATA', '-'), ('77', 'HK.02.1', 'PERIKATAN', 'Surat-surat yang berhubungan dengan perikatan yang meliputi: hak pakai, peminjaman, sewa menyewa, dan lain-lain sejenisnya'), ('78', 'HK.03', 'HUKUM AGAMA', '-'), ('79', 'HK.03.1', 'FATWA', 'Surat-surat yang berkenaan dengan pendapat hukum dan penetapan status hukum mengenai suatu hal yang belum jelas hukumnya seperti: bedah mayat, masalah waris (di Jawa dan Madura), masalah   hibah/Shodaqoh   (di   Jawa   dan Madura), dan lain-lain sejenisnya.'), ('80', 'HK.03.2', 'RUKYAT/HISAB', 'Surat-surat yang berkenaan dengan penentuan: arah kiblat, awal/akhir Ramadhan, hari besar Islam, jadwal waktu sholat,  kalender'), ('81', 'HK.03.3', 'HARI BESAR AGAMA', 'Surat-surat yang berhubungan dengan hari besar agama:, Islam,  Kristen, Katholik, Hindu,  Budha dan Kong Hu Cu (Imlek)'), ('82', 'HK.04', 'BANTUAN HUKUM', '-'), ('83', 'HK.04.1', 'KASUS HUKUM PIDANA', 'Surat-surat   yang   berkenaan   dengan   bantuan   hukum   kepada pejabat/pegawai   Kementerian   Agama   dalam   kasus   pidana   yang berhubungan dengan pelaksanaan tugas.'), ('84', 'HK.04.2', 'KASUS HUKUM PERDATA', 'Surat-surat   yang   meliputi/berhubungan   dengan   bantuan   hukum kepada   pejabat/pegawai   Kementerian   Agama   dalam   kasus   perdata yang berhubungan dengan pelaksanaan tugas.'), ('85', 'HK.04.3', 'KASUS HUKUM TATA USAHA NEGARA (TUN) ', 'Surat-surat   yang   berkenaan   dengan   pemberian   bantuan   hukum kepada   Menteri   Agama   atau   pejabat   Kementerian   Agama   dalam kasus Tata Usaha Negara (TUN)'), ('86', 'HK.04.4', 'PENELAAHAN HUKUM', 'Surat-surat   yang   meliputi/berhubungan   dengan   penelaahan   hukum yang berkaitan dengan masalah agama, selain agama Islam'), ('87', 'HM', 'KEHUMASAN', '-'), ('88', 'HM.00', 'PENERANGAN', 'Surat-surat yang berhubungan dengan kegiatan yang berkenaan dengan penerangan terhadap masyarakat antara lain :  konperensi pers, pameran, wawancara, dan penerangan dalam media massa lainnya.'), ('89', 'HM.01', 'HUBUNGAN', 'Surat-surat yang berhubungan dengan kerja sama dalam dan luar negeri dan kordinasi intern dan ekstern antar pemerintahan umum antara lain: Bakohumas, Hearing DPR, AMd, PKP, Kelompok kerja (POKJA) dan organisasi-organisasi mass media termasuk di dalamnya   pengarahan/sambutan   yang   bersifat umum'), ('90', 'HM.02', 'DOKUMENTASI DAN KEPUSTAKAAN', '-'), ('91', 'HM.02.1', 'DOKUMENTASI', 'Surat-surat   yang   berkenaan   dengan   kegiatan   yang   berhubungan dengan   penyediaan/pengumpulan   bahan/dokumentasi   termasuk penyebarannya.'), ('92', 'HM.02.2', 'KEPUSTAKAAN', 'Surat-surat   yang   berkenaan   dengan   kegiatan   yang   berhubungan dengan penyediaan pengumpulan bahan-bahan kepustakaan.'), ('93', 'HM.03', 'KEPROTOKOLAN', 'Surat-surat yang berkenaan dengan masalah keprotokolan, seperti: tamu-tamu pimpinan Kementerian (dalam maupun luar negeri), kunjungan kerja, upacara hari nasional, dan HUT Kementerian Agama.'), ('94', 'KS', 'KESEKRETARIATAN', '-'), ('95', 'KS.00', 'KERUMAHTANGGAAN', 'Surat-surat yang berkenaan dengan: penggunaan   fasilitas;   contoh:   pinjam   untuk   dapat menggunakan ruang rapat, kendaraan dsb, Keamanan dan ketertiban, Konsumsi, pakaian dinas kerja, papan nama, lambang, alamat pejabat dan telekomunikasi/listrik/air (langganan)'), ('96', 'KS.01', 'PERLENGKAPAN', '-'), ('97', 'KS.01.1', 'GEDUNG', 'Surat-surat yang berkenaan dengan: asrama, -bangunan kantor,  gedung sekolah, pos penjagaan, rumah dinas, termasuk   tanah,   mulai   dan   perencanaan,   pengadaan,   pendistribusian, pemeliharaan sampai dengan penghapusannya.'), ('98', 'KS.01.2', 'ALAT KANTOR', 'Surat-surat yang berkenaan dengan alat kantor seperti: ATK (Alat Tulis Kantor), Formulir/faktur   mulai   dan   perencanaan,   pengadaan   dan pendistribusian'), ('99', 'KS.01.3', 'MESIN KANTOR/ALAT-ALAT ELEKTRONIK', 'Surat-surat   yang   berkenaan   dengan   mesin   kantor   (barang-barang mekanis)/alat-alat elektronik meliputi:  Amplifier, Fan/kipas angin, Foto copy, Kamera, Mesin ketik/hitung, Overhead proyektor, Proyektor film, Radio, Roneo, Slide, Mesin stensil, Tape recorder, Teleks, Video tape, dan   lain-lain   yang   sejenis,   mulai   dan perencanaan,   pendistribusian, pemeliharaan   sampai   dengan penghapusan'), ('100', 'KS.01.4', 'PERABOT KANTOR', 'Surat-surat   yang   berkenaan   dengan   pengelolaan   perabot   kantor,  meliputi: kursi, meja, lemari,  filing cabinet/card rak, dan   lain-lain   yang   sejenis   mulai   dan perencanaan,   pengadaan, pendistribusian,   pemeliharaan   sampai dengan penghapusannya');
INSERT INTO `ref_klasifikasi` VALUES ('101', 'KS.01.5', 'KENDARAAN', 'Surat-surat   yang   berkenaan   dengan   masalah   kendaraan   mulai   dari perencanaan,  pengadaan,  pendistribusian  dan  pemeliharaan  sampai dengan penghapusannya.'), ('102', 'KS.01.6', 'INVENTARIS PERLENGKAPAN', 'Surat-surat yang berkenaan dengan inventaris perlengkapan, laporan inventaris perlengkapan pusat dan daerah.'), ('103', 'KS.01.7', 'PENAWARAN UMUM', 'Surat-surat   yang   berkenaan   dengan   penyelenggaraan   prakualifikasi calon rekanan dan penawaran umum termasuk persyaratannya.'), ('104', 'KS.02', 'KETATAUSAHAAN', 'Surat-surat   yang   berkenaan   dengan   korespondensi   dan   kearsipan, penandatanganan surat dan wewenangnya serta cap dinas.'), ('105', 'TL', 'PENELITIAN', '-'), ('106', 'TL.00', 'PENELITIAN PENDIDIKAN', 'Surat-surat yang  berhubungan dengan penelitian pendidikan, sejak dari perizinan, pelaksanaan sampai laporan hasilnya.'), ('107', 'TL.01', 'PENELITIAN KEAGAMAAN', 'Surat-surat yang berhubungan dengan penelitian keagamaan, sejak dari perizinan, pelaksanaan sampai dengan laporan hasilnya.'), ('108', 'TL.02', 'PENELITIAN LEKTUR AGAMA', '-'), ('109', 'TL.02.1', 'PENELITIAN LEKTUR AGAMA', 'Surat-surat   yang   berhubungan   dengan   penelitian   atas   penerbitan, import dan penyebaran kitab-kitab suci agama'), ('110', 'TL.02.2', 'PENELITIAN BUKU-BUKU AGAMA', 'Surat-surat yang berhubungan dengan penelitian buku-buku agama yang diterbitkan, diimport dan penyebaran buku-buku agama'), ('111', 'TL.03', 'PENGEMBANGAN PENELITIAN', 'Surat-surat yang berhubungan dengan masalah-masalah pengembangan penelitian   sejak   dari   perencanaan,   pelaksanaannya   sampai   dengan laporannya.'), ('112', 'PS', 'PENGAWASAN', '-'), ('113', 'PS.00', 'ADMINISTRASI UMUM', 'Surat-surat yang berkenaan dengan pengawasan adminitrasi umum '), ('114', 'PS.01', 'TUGAS UMUM', 'Surat-surat   yang   berkenaan   dengan   pengawasan   tugas   umum,  yang meliputi bidang-bidang: pendidikan agama, penerangan agama, urusan agama, bimbingan masyarakat beragama,  peradilan agama, haji, penelitian dan pengembangan keagamaan'), ('115', 'PS.02', 'PROYEK PEMBANGUNAN', '-'), ('116', 'PS.02.1', 'FISIK', 'Surat-surat   yang   berkenaan   dengan   pengawasan   proyek-proyek pembangunan   fisik,   termasuk   laporan   hasil   pemeriksaan   (LHP) maupun tindak lanjut hasil pemeriksaan (TLHP) nya.'), ('117', 'PS.02.2', 'NON FISIK', 'Surat-surat   yang   berkenaan   dengan   pengawasan   proyek-proyek pembangunan   non   fisik,   termasuk   laporan   hasil   pemeriksaan   (LHP) maupun tindak lanjut hasil pemeriksaan (TLHP) nya.'), ('118', 'PS.03', 'PENGAWASAN EKSTERNAL', '-'), ('119', 'PS.03.1', 'BPK RI', 'Surat-surat yang berkenaan dengan pengawasan Bepeka RI termasuk laporan hasil pemeriksaan semester (HAPSEM) maupun tindak lanjut hasil pemeriksaan (TLHP) nya.'), ('120', 'PS.03.2', 'BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN (BPKP)', 'Surat-surat   yang   berkenaan   dengan   pengawasan   BPKP,   termasuk laporan hasil audit (LHA) maupun tindak lanjut audit (TLHA) nya.'), ('121', 'PS.03.3', 'PENGADUAN MASYARAKAT', 'Surat-surat   yang   berkenaan   dengan   pengaduan   atau   pengawasan dan   masyarakat   yang   disampaikan   melalui   Tromol   Pos   5000   (TP 5000) termasuk tindak lanjutnya.'), ('122', 'PS.03.4', 'PENGADUAN MASYARAKAT (NON TP 5000) ', 'Surat-surat   yang   berkenaan   dengan   pengaduan   atau   pengawasan yang disampaikan secara langsung oleh masyarakat (non TP 5000), termasuk tindak lanjutnya.'), ('123', 'PW', 'PERKAWINAN', '-'), ('124', 'PW.01', 'PENYULUHAN', 'Surat-surat yang berkenaan dengan: penyuluhan perkawinan, KB (Keluarga Berencana) dan KKB (Keluarga Kecil Bahagia),  BP 4 (Badan Penasehat Perkawinan dan Penyelesaian Perceraian),  PKK (Pendidikan Kesejahteraan Keluarga), Dan UPGK (Usaha Peningkatan Gizi Keluarga)'), ('125', 'PW.02', 'PERKAWINAN', 'Surat-surat yang berkenaan dengan seluruh proses: Nikah,  Talak,  Cerai, Rujuk Termasuk akte dan sarananya.'), ('126', 'PW.03', 'CAMPURAN', 'Surat-surat   yang   berkenaan   dengan   seluruh   proses   perkawinan campuran antar agama dan bangsa.'), ('127', 'HJ', 'HAJI', '-'), ('128', 'HJ.00', 'CALON HAJI', 'Surat-surat   yang   berkenaan   dengan   pendaftaran   calon   haji,   termasuk kelengkapan dokumen, seperti: daftar nominative,  STPH (Surat Tanda Pergi Haji),  Paspor,  Paskim,  Visa, dan lain-lain yang sehubungan'), ('129', 'HJ.01', 'BIMBINGAN', 'Surat-surat yang berkenaan dengan bimbingan jemaah haji dan petugas haji, termasuk: pameran,  penataran,  dan peragaan'), ('130', 'HJ.02', 'PETUGAS HAJI', 'Surat-surat yang berkenaan dengan petugas haji: TPHI (Tim Petugas Haji Indonesia),  TKHI (Tim Kesehatan Haji Indonesia), Tenaga   Musiman/P3H   (Panitia   Pemberangkatan   dan   Pemulangan Haji), Sekretariat Boyongan, Amirul Haj dan Naib Amirul Haj, PPIH non kloter termasuk laporan kegiatan.'), ('131', 'HJ.03', 'ONGKOS NAIK HAJI', 'Surat-surat yang berkenaan dengan: penentuan besarnya ONH, restitusi, living cost, free seat, uang bekal daerah, dan asuransi'), ('132', 'HJ.04', 'JEMAAH HAJI', 'Surat-surat yang berkenaan dengan jemaah haji, meliputi: sejkh/muzawwir,  sakit, meninggal, melahirkan, dan hilang'), ('133', 'HJ.05', 'ANGKUTAN', 'Surat-surat   yang   berkenaan   dengan   transportasi   haji   dalam   dan   luar negeri, jadwal pemberangkatan dan pemulangan jemaah haji dan daftar jemaah (manifest).'), ('134', 'HJ.06', 'PENGASRAMAAN', 'Surat-surat   yang   berkenaan   dengan   pengasramaan   calon   haji   di dalam/luar negeri, pengembalian biaya perumahaan di   Arab Saudi dan Qur’ah.'), ('135', 'HJ.07', 'PEMBEKALAN', 'Surat-surat yang berhubungan dengan pembekalan jemaah haji termasuk pengadaan, penyimpanan, pendistribusian, antara lain: kemas haji, Katering,  obat-obatan,  buku manasik haji,  buku kesehatan jamaah haji,  petunjuk perjalanan haji,  barang-barang   bawaan   dan   dalam/luar   negeri serta kelengkapan lainnya yang sehubungan'), ('136', 'HJ.08', 'DISPENSASI / REKOMENDASI KHUSUS', 'Surat-surat yang berkenaan dengan dispensasi dan rekomendasi masuk Arab Saudi pada masa-masa musim haji baik bagi WNI dalam maupun luar negeri.'), ('137', 'HJ.09', 'UMROH', 'Surat-surat yang berkenaan dengan masalah-masalah umroh, termasuk perizinan, pelaksanaan penyelenggara/organisasi - organisasi, yayasan-yayasan, travel biro dan pengawasan penyelenggaraannnya.'), ('138', 'BA', 'PEMBINAAN AGAMA', '-'), ('139', 'BA.00', 'PENYULUHAN', 'Surat-surat   yang   berkenaan   dengan   seluruh   proses   yang   berhubungan dengan penerangan agama kepada masyarakat dan lingkungan khusus (transmigrasi,   suku   terasing   inrehab   dan   narapidana),   termasuk sarananya seperti: film,  drama, MTQ (Musabaqoh Tilawati Qur’an),  pagelaran seni budaya, perayaan hari-hari besar agama,   sekaten, fesparani, Utsawa Dharma Gita,  Orientasi Seni Budaya, Siaran RRI I TVRI'), ('140', 'BA.01', 'BIMBINGAN', '-'), ('141', 'BA.01.1', 'LEMBAGA KEAGAMAAN', 'Surat-surat   yang   berkenaan   dengan   bimbingan   kepada   lembaga-lembaga keagamaan yang ada dalam masyarakat, meliputi: da’i /juru penerang agama, organisasi-organisasi keagamaan kepengurusan rumah ibadah organisasi remaja keagamaan dan sarana bimbingannya, rekomendasi   DPKK   (Dana   Pengembangan   Keahlian   dan Ketrampilan), rekomendasi   izin   impor   terhadap   barang   bantuan/hibah   dari   luar negeri, rekomendasi pembebasan pajak pertambahan nilai terhadap buku  kitab suci, buku pelajaran agama'), ('142', 'BA.01.2', 'ALIRAN KEROHANIAN/KEAGAMAAN', 'Surat-surat yang berkenaan dengan aliran kerohanian/ keagamaan yang timbul dalam masyarakat.'), ('143', 'BA.02', 'KERUKUNAN HIDUP BERAGAMA', 'Surat-surat   yang   berkenaan   dengan   bimbingan   kerukunan   hidup beragama,   termasuk   surat-surat   yang  berkenaan   dengan   hal-hal   yang menyinggung  perasaan umat beragama.'), ('144', 'BA.03', 'IBADAH DAN IBADAH SOSIAL', '-'), ('145', 'BA.03.1', 'IBADAH', 'Surat-surat   yanng   berkenaan   dengan   seluruh   proses kegiatan pembinaan ibadah seperti: Shalat led, Eka Dhasa Rudra, Kebaktian, Natal, Galungan, Waisak, Nyepi'), ('146', 'BA.03.2', 'IBADAH SOSIAL', 'Surat-surat   yang   berkenaan   dengan   seluruh   proses   kegiatan   ibadah sosial, seperti:baitul maal termasuk zakat, hibah, infak, wakaf dan bondo masjid, dana punia,  dana paramita,  kolekta,  diskonia, dan lain-lain termasuk bantuan rumah ibadah.'), ('147', 'BA.04', 'PENGEMBANGAN KEAGAMAAN', 'Surat-surat yang berkenaan dengan pengeimbangan keagamaan, meliputi data: statistik keagamaan,  pemeluk agama,  tokoh agama, dan rumah ibadah'), ('148', 'BA.05', 'ROHANIAWAN', 'Surat-surat yang berkenaan dengan rohaniawan, termasuk: urusan perizinan,  naturalisasi,  paskim,  visa,   perpanjangan izin,  dan pengambilan sumpah.'), ('149', 'PP', 'PENDIDIKAN DAN PENGAJARAN', '-'), ('150', 'PP.00', 'KURIKULUM, TENAGA EDUKATIF DAN SARANA', '-'), ('151', 'PP.00.1', 'SEKOLAH   UMUM   TINGKAT   TAMAN   KANAK-KANAK   DAN SEKOLAH DASAR (TK DAN SD).', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut siswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran termasuk subsidi dan bantuan pada TK dan SD.'), ('152', 'PP.00.2', 'SEKOLAH LANJUTAN TINGKAT PERTAMA (SLTP)', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut siswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran termasuk subsidi dan bantuan pada tingkat  SLTP.'), ('153', 'PP.00.3', 'SEKOLAH LANJUTAN TINGKAT ATAS (SLTA).', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut siswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran termasuk subsidi dan bantuan pada tingkat SLTA.'), ('154', 'PP.00.4', 'RAUDHATUL   ATHFAL   DAN   MADRASAH   IBTIDAIYAH (PRASEKOLAH DAN PRATAMA)', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut siswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran   termasuk   subsidi   dan   bantuan   pada   perguruan   agama tingkat RA dan Madrasah lbtidaiyah (prasekolah dan pratama).'), ('155', 'PP.00.5', 'MADRASAH  TSANAWIYAH (MENENGAH PERTAMA)', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut siswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran termasuk subsidi dan bantuan pada Madrasah Tsanawiyah (menengah pertama).'), ('156', 'PP.00.6', 'MADRASAH  ALIYAH (MENENGAH ATAS)', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut siswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran termasuk subsidi dan bantuan pada Madrasah Aliyah baik Madrasah maupun PGA.'), ('157', 'PP.00.7', 'PONDOK PESANTREN', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut santri, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran termasuk subsidi dan bantuan pada pondok pesantren.'), ('158', 'PP.00.8', 'MADRASAH DINIYAH', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut mahasiswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran, termasuk subsidi dan bantuan pada rnadrasah diniyah.'), ('159', 'PP.00.9', 'PERGURUAN TINGGI  AGAMA', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut mahasiswa, kurikulum, tenaga edukatif, sarana pendidikan dan  pengajaran   termasuk subsidi   dan   bantuan   pada  perguruan  tinggi agama termasuk program pasca purna sarjana.'), ('160', 'PP.00.10', 'PERGURUAN TINGGI UMUM', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut mahasiswa, kurikulum, tenaga edukatif, sarana pendidikan dan pengajaran, termasuk subsidi dan bantuan pada perguruan tinggi umum termasuk program pasca purna sarjana.'), ('161', 'PP.00.11', 'PENGEMBANGAN SARANA PENDIDIKAN', 'Surat-surat yang berkenaan dengan masalah-masalah pengembangan kurikulum,   tenaga   edukatif   dan   sarana   pendidikan   di   lingkungan Kementerian   Agama.   Ruang   ini   juga   untuk   menampung   masalah   PP  00.1 s/d PP 00.10 yang termuat secara kolektif dalam satu surat.'), ('162', 'PP.01', 'EVALUASI DAN IJAZAH', '-'), ('163', 'PP.01.1', 'PERGURUAN AGAMA', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut soal evaluasi/ujian dan ijazah dan tingkat TK/RA. Diniyah, pondok pesantren sampai perguruan tinggi agama.'), ('164', 'PP.01.2', 'SEKOLAH PERGURUAN UMUM', 'Surat-surat   yang   berkenaan   dengan   masalah-masalah   yang menyangkut soal evaluasi/ujian dan ijazah tingkat TK, SD, SLTP, SLTA, dan perguruan tinggi umum.'), ('165', 'PP.02', 'KEPENILIKAN, KEPENGAWASAN DAN PEMBINAAN', '-'), ('166', 'PP.02.1', 'KEPENILIKAN', 'Surat.-surat yang berkenaan dengan kegiatan kepenilikan pada TK/RA, SD/Ibtidaiyah dan Diniyah Awaliyah'), ('167', 'PP.02.2', 'KEPENGAWASAN', 'Surat-surat   yang   berkenaan   dengan   kepengawasan   pada SLTP/Tsanawiyah,   SLTA/Aliyah,   pondok   pesantren   dan   Diniyah Wustho.'), ('168', 'PP.02.3', 'PEMBINAAN', 'Surat-surat   yang   berkenaan   dengan   kegiatan   pembinaan   pada perguruan   tinggi   agama   dan   perguruan   tinggi   umum   di   bidang keagamaan.'), ('169', 'PP.03', 'KELEMBAGAAN', '-'), ('170', 'PP.03.1', 'ORGANISASI', 'Surat-surat yang menyangkut masalah organisasi intra maupun ekstra sekolah/siswa/mahasiswa/guru maupun orang tua murid. Contoh: OSIS, MENWA,   POMD,   PGRI,   Musyawarah   guru   mata   pelajaran   (MGMP) PAK, Kelompok Kerja Guru (KKG) dan sebagainya.'), ('171', 'PP.03.2', 'PENGEMBANGAN', 'Surat-surat   yang   menyangkut   masalah   pengembangan,   relokasi, fisial/kelas   jauh,   perubahan/persamaan/penyesuaian   status   swasta-negeri pada perguruan agama.'), ('172', 'PP.04', 'BEASISWA', 'Surat-surat   yang   berkenaan   dengan   pemberian   beasiswa   baik   dari pemerintah, swasta maupun dan luar negeri, termasuk anak asuh.'), ('173', 'PP.05', 'SUMBANGAN', 'Surat-surat yang berkenaan dengan: uang sekolah,  uang ujian dan lain-lain yang sejenis.'), ('174', 'PP.06', 'PENGABDIAN', 'Surat-surat yang berkenaan dengan pengabdian terhadap masyarakat seperti: KKN (Kuliah Kerja Nyata), Butsi   Badan   Usaha   Tenaga   Sukarela   Indonesia) dan kegiatan - kegiatan ektra kurikuler lainnya.'), ('175', 'PP.07', 'PERIZINAN', 'Surat-surat   yang   menyangkut   masalah   perizinan   belajar/mengajar   bagi lembaga/instasi/orang Indonesia ke luar negeri.');
COMMIT;

-- ----------------------------
-- Table structure for `t_disposisi`
-- ----------------------------
DROP TABLE IF EXISTS `t_disposisi`;
CREATE TABLE `t_disposisi` (
`id`  bigint(6) NOT NULL AUTO_INCREMENT ,
`id_surat`  int(6) NOT NULL ,
`kpd_yth`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`isi_disposisi`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`sifat`  enum('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`batas_waktu`  date NOT NULL ,
`catatan`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of t_disposisi
-- ----------------------------
BEGIN;
INSERT INTO `t_disposisi` VALUES ('1', '1', 'Sekretaris', 'tes disposisi', 'Perlu Perhatian Khusus', '2015-02-09', 'yg bener ya'), ('2', '1', 'Manajer', 'dsdsdsdsd', 'Perhatian Batas Waktu', '2015-01-31', 'aaa'), ('3', '2', 'tuh', 'isi', 'Biasa', '0000-00-00', 'catat'), ('4', '2', 'td', 'id', 'Perlu Perhatian Khusus', '0000-00-00', 'apapun');
COMMIT;

-- ----------------------------
-- Table structure for `t_form_disposisi`
-- ----------------------------
DROP TABLE IF EXISTS `t_form_disposisi`;
CREATE TABLE `t_form_disposisi` (
`id`  bigint(11) NOT NULL DEFAULT 0 ,
`id_surat`  bigint(11) NULL DEFAULT NULL ,
`kasubbag`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`catatan`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tgl_disposisi`  date NULL DEFAULT NULL ,
`pengirim`  int(11) NULL DEFAULT NULL ,
`id_parent`  bigint(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_surat`) REFERENCES `t_surat_msk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`pengirim`) REFERENCES `t_admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_surat_fk` (`id_surat`) USING BTREE ,
INDEX `pengirim_fk` (`pengirim`) USING BTREE 
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
`id_instruksi`  int(11) NOT NULL DEFAULT 0 ,
`nama_instruksi`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_instruksi`)
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
`id_jns`  int(20) NOT NULL AUTO_INCREMENT ,
`nama_jenis`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_jns`)
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
-- Table structure for `t_surat_keluar`
-- ----------------------------
DROP TABLE IF EXISTS `t_surat_keluar`;
CREATE TABLE `t_surat_keluar` (
`id`  int(6) NOT NULL AUTO_INCREMENT ,
`kode`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_agenda`  varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`isi_ringkas`  mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tujuan`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_surat`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tgl_surat`  date NOT NULL ,
`tgl_catat`  date NOT NULL ,
`keterangan`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`file`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`pengolah`  int(11) NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of t_surat_keluar
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `t_surat_keputusan`
-- ----------------------------
DROP TABLE IF EXISTS `t_surat_keputusan`;
CREATE TABLE `t_surat_keputusan` (
`id`  int(6) NOT NULL AUTO_INCREMENT ,
`nomor`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tahun`  varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tentang`  mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tgl_surat`  date NOT NULL ,
`keterangan`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`file`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`pengolah`  int(11) NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of t_surat_keputusan
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `t_surat_masuk`
-- ----------------------------
DROP TABLE IF EXISTS `t_surat_masuk`;
CREATE TABLE `t_surat_masuk` (
`id`  int(6) NOT NULL AUTO_INCREMENT ,
`kode`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_agenda`  varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`indek_berkas`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`isi_ringkas`  mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`dari`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_surat`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tgl_surat`  date NOT NULL ,
`tgl_diterima`  date NOT NULL ,
`keterangan`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`file`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`pengolah`  int(4) NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of t_surat_masuk
-- ----------------------------
BEGIN;
INSERT INTO `t_surat_masuk` VALUES ('1', 'xxx', '1', '34334', 'testlah', 'gue', '3', '2015-01-19', '2015-01-13', 'huehue', 'Petunjuk-Aplikasi-ASAMURAT.pdf', '1'), ('2', 'xxxyyy', '111', '55656', 'testlagi', 'admin', '222', '2015-01-14', '2015-01-13', 'testing', '', '1');
COMMIT;

-- ----------------------------
-- Table structure for `t_surat_msk`
-- ----------------------------
DROP TABLE IF EXISTS `t_surat_msk`;
CREATE TABLE `t_surat_msk` (
`id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`nomor_surat`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tgl_srt`  date NULL DEFAULT NULL ,
`tgl_srt_diterima`  date NULL DEFAULT NULL ,
`tgl_srt_dtlanjut`  date NULL DEFAULT NULL ,
`tenggat_wkt`  int(11) NULL DEFAULT NULL ,
`perihal`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jenis_surat`  int(255) NULL DEFAULT NULL ,
`no_agenda`  int(11) NULL DEFAULT NULL ,
`unit_tujuan`  int(255) NULL DEFAULT NULL ,
`keterangan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`edited_by`  int(11) NULL DEFAULT NULL ,
`status_terkirim`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '' ,
`file`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pengirim`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`deleted`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`id`),
FOREIGN KEY (`jenis_surat`) REFERENCES `t_jenis_surat_masuk` (`id_jns`) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (`unit_tujuan`) REFERENCES `t_unit_tujuan` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (`edited_by`) REFERENCES `t_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `jenis_surat_fk` (`jenis_surat`) USING BTREE ,
INDEX `unit_tujuan_fk` (`unit_tujuan`) USING BTREE ,
INDEX `user_fk` (`edited_by`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=27

;

-- ----------------------------
-- Records of t_surat_msk
-- ----------------------------
BEGIN;
INSERT INTO `t_surat_msk` VALUES ('2', 'BAAA1', '2015-02-24', '2015-01-28', '2015-01-29', '0', 'Testimoni', '2', '667', '2', 'jkkljhlkjhlkhl', '1', '', null, 'Junno', '0'), ('4', '123', '0000-00-00', '2015-02-19', '2015-02-04', '1', 'per', '1', '0', '2', 'ket', '1', '', '10666083_1485349628381481_913245954_a.jpg', 'Tantra', '0'), ('5', '1234', '0000-00-00', '2015-02-24', '2015-02-26', '0', 'hal', '2', '1', '2', 'ket', '1', '', null, 'Saya', '0'), ('6', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '1', 'ket', null, null, null, 'Saya', '0'), ('7', '2', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'per', null, '1', '1', 'asasa', null, null, null, 'Saya', '0'), ('8', '23', '2015-02-04', '2015-02-04', '2015-02-04', null, '', null, '0', null, '', null, null, null, '23', '0'), ('9', '23', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', null, 'frvvd', null, null, null, '23', '0'), ('10', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', null, '1', '2', 'poiu', null, null, null, 'Saya', '0'), ('11', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', '', '2', '0', '2', '', null, null, null, '1', '0'), ('12', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'lalala', null, null, null, 'Saya', '0'), ('13', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lelele', null, null, null, 'Saya', '0'), ('14', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'popopo', null, null, null, 'Saya', '0'), ('16', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'lolilo', '1', null, null, 'Saya', '1'), ('17', '28', '2015-02-04', '2015-02-05', '2015-02-06', null, 'Perihal', '2', '2', '1', 'Keterangan', '1', null, null, 'Junno', '1'), ('18', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '0'), ('19', '1', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up', '1', null, null, 'Saya', '0'), ('20', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '2', '1', '2', 'up lagi', '1', null, null, 'Saya', '1'), ('21', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '0'), ('22', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1'), ('23', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1'), ('24', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, null, '', '1'), ('25', '', '0000-00-00', '0000-00-00', '0000-00-00', null, '', '2', '0', '2', '', '1', null, '20110902_blady_11.jpg', '', '1'), ('26', '1234', '2015-02-04', '2015-02-04', '2015-02-04', '1', 'hal', '1', '1', '1', 'ahahahaha', '1', null, '20110902_blady_12.jpg', 'Saya', '0');
COMMIT;

-- ----------------------------
-- Table structure for `t_unit_terusan`
-- ----------------------------
DROP TABLE IF EXISTS `t_unit_terusan`;
CREATE TABLE `t_unit_terusan` (
`id_diteruskan`  int(11) NOT NULL DEFAULT 0 ,
`nama_unit_trsn`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_diteruskan`)
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
`id_unit`  int(20) NOT NULL AUTO_INCREMENT ,
`unit_tujuan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_unit`)
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
`id`  int(2) NOT NULL AUTO_INCREMENT ,
`username`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`password`  varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nip`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`level`  enum('Super Admin','Admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
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
`id_disposisi`  bigint(20) NULL DEFAULT NULL ,
`id_instruksi`  int(11) NULL DEFAULT NULL ,
FOREIGN KEY (`id_disposisi`) REFERENCES `t_disposisi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`id_instruksi`) REFERENCES `t_instruksi` (`id_instruksi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_disposisi_fk2` (`id_disposisi`) USING BTREE ,
INDEX `id_instruksi_fk` (`id_instruksi`) USING BTREE 
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
`id_unit_terusan`  int(11) NULL DEFAULT NULL ,
`id_disposisi`  bigint(20) NULL DEFAULT NULL ,
FOREIGN KEY (`id_disposisi`) REFERENCES `t_disposisi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`id_unit_terusan`) REFERENCES `t_unit_terusan` (`id_diteruskan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `id_unit_terusan_fk` (`id_unit_terusan`) USING BTREE ,
INDEX `id_disposisi_fk` (`id_disposisi`) USING BTREE 
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
-- Table structure for `tr_instansi`
-- ----------------------------
DROP TABLE IF EXISTS `tr_instansi`;
CREATE TABLE `tr_instansi` (
`id`  int(1) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`alamat`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`kepsek`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nip_kepsek`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`logo`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of tr_instansi
-- ----------------------------
BEGIN;
INSERT INTO `tr_instansi` VALUES ('1', 'Kementerian Kelautan dan Perikanan', 'Jl. Thamrin', 'Drs. KURDIYANTO', '196402051993031003', 'logokelautan.jpg');
COMMIT;

-- ----------------------------
-- View structure for `tf_surat_masuk`
-- ----------------------------
DROP VIEW IF EXISTS `tf_surat_masuk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tf_surat_masuk` AS select `a`.`id` AS `id`,`a`.`nomor_surat` AS `nomor_surat`,`a`.`tgl_srt` AS `tgl_srt`,`a`.`tgl_srt_diterima` AS `tgl_srt_diterima`,`a`.`tgl_srt_dtlanjut` AS `tgl_srt_dtlanjut`,`a`.`tenggat_wkt` AS `tenggat_wkt`,`a`.`perihal` AS `perihal`,`a`.`jenis_surat` AS `jenis_surat`,`a`.`no_agenda` AS `no_agenda`,`a`.`unit_tujuan` AS `unit_tujuan`,`a`.`keterangan` AS `keterangan`,`a`.`edited_by` AS `edited_by`,`a`.`status_terkirim` AS `status_terkirim`,`a`.`file` AS `file`,`a`.`pengirim` AS `pengirim`,`c`.`unit_tujuan` AS `unit_name`,`b`.`nama_jenis` AS `nama_jenis`,`d`.`username` AS `username` from (((`t_surat_msk` `a` join `t_jenis_surat_masuk` `b`) join `t_unit_tujuan` `c`) join `t_user` `d`) where ((`a`.`jenis_surat` = `b`.`id_jns`) and (`a`.`unit_tujuan` = `c`.`id_unit`) and (`a`.`edited_by` = `d`.`id`) and (`a`.`deleted` = '0')) ;

-- ----------------------------
-- Auto increment value for `ref_klasifikasi`
-- ----------------------------
ALTER TABLE `ref_klasifikasi` AUTO_INCREMENT=176;

-- ----------------------------
-- Auto increment value for `t_disposisi`
-- ----------------------------
ALTER TABLE `t_disposisi` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `t_jenis_surat_masuk`
-- ----------------------------
ALTER TABLE `t_jenis_surat_masuk` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `t_surat_keluar`
-- ----------------------------
ALTER TABLE `t_surat_keluar` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `t_surat_keputusan`
-- ----------------------------
ALTER TABLE `t_surat_keputusan` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `t_surat_masuk`
-- ----------------------------
ALTER TABLE `t_surat_masuk` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `t_surat_msk`
-- ----------------------------
ALTER TABLE `t_surat_msk` AUTO_INCREMENT=27;

-- ----------------------------
-- Auto increment value for `t_unit_tujuan`
-- ----------------------------
ALTER TABLE `t_unit_tujuan` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `t_user`
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `tr_instansi`
-- ----------------------------
ALTER TABLE `tr_instansi` AUTO_INCREMENT=2;
