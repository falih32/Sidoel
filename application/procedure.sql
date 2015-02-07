
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
	WHERE t_surat_msk.sms_id like CONCAT('%','','%')
	AND t_surat_msk.sms_nomor_surat like CONCAT('%','','%')
	AND UPPER(t_surat_msk.sms_perihal) like CONCAT('%',UPPER('ket'),'%')
	AND t_surat_msk.sms_no_agenda like CONCAT('%','','%')
	AND UPPER(t_surat_msk.sms_keterangan) like CONCAT('%',UPPER('ket'),'%')
	AND t_user.usr_username like CONCAT('%','','%')
	AND t_surat_msk.sms_pengirim like CONCAT('%','','%')
	AND t_surat_msk.sms_deleted = '0';
	
DELIMITER //
CREATE PROCEDURE searchSuratMasuk (IN id_jenis INTEGER, IN id_unit INTEGER,
						IN searchWord VARCHAR(200), IN dateAwal DATE, IN dateAkhir DATE)
BEGIN
	SELECT *
	FROM t_surat_msk, t_unit_tujuan as ut, t_jenis_surat_masuk as jsm, t_user as u 
	WHERE sm.id like  CONCAT('%',searchWord,'%')
	AND sm.nomor_surat like CONCAT('%',searchWord,'%')
	AND sm.perihal like CONCAT('%',searchWord,'%')
	AND sm.no_agenda like CONCAT('%',searchWord,'%')
	AND sm.keterangan like CONCAT('%',searchWord,'%')
	AND u.username like CONCAT('%',searchWord,'%')
	AND sm.pengirim like CONCAT('%',searchWord,'%')
	AND sm.jenis_surat = id_jenis
	AND sm.unit_tujuan = id_unit
	AND sm.tgl_srt_diterima >= dateAwal
	AND sm.tgl_srt_dtlanjut <= dateAkhir
	AND sm.deleted = '0';
END;

DROP PROCEDURE searchSuratMasuk;
CALL searchSuratMasuk()



DELIMITER //
CREATE PROCEDURE selectPaginationSuratMasuk(IN perpage INTEGER, IN ofset INTEGER)
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
END;

DROP PROCEDURE selectPaginationSuratMasuk;
call selectPaginationSuratMasuk('1','2')


DELIMITER //
CREATE PROCEDURE selectByIdSuratMasuk(IN id BIGINT)
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
END;

DROP PROCEDURE selectByIdSuratMasuk;
CALL selectByIdSuratMasuk(2);

DELIMITER //
CREATE PROCEDURE selectAllSuratMasuk()
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
END;

DELIMITER //
CREATE PROCEDURE selectPaginationDisposisi()
BEGIN
	SELECT *		
	FROM t_form_disposisi
	LEFT JOIN t_jenis_surat_masuk
	ON t_surat_msk.sms_jenis_surat = t_jenis_surat_masuk.jsm_id
	LEFT JOIN t_unit_tujuan
	ON t_surat_msk.sms_unit_tujuan = t_unit_tujuan.utj_id
	LEFT JOIN t_user
	ON t_surat_msk.sms_unit_tujuan = t_user.usr_id
	ORDER BY t_surat_msk.sms_id;
END;

