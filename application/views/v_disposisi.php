<?php
	if($mode == 'edit'){
		$fds_id_surat = $dataDisposisi-> fds_id_surat;
		$fds_kasubbag = $dataDisposisi-> fds_kasubbag;
		$fds_catatan = $dataDisposisi-> fds_catatan;
		$fds_pengirim = $dataDisposisi-> fds_pengirim;
		$fds_tgl_disposisi = $dataDisposisi-> fds_tgl_disposisi;
		$fds_id_parent = $dataDisposisi-> fds_id_parent;
		$fds_id = $dataDisposisi-> fds_id;
		$utr_unitTerusan = $unitTerusan;
		$ins_instruksi  = $instruksi;
	}
	else{
		$fds_id_surat = $id_surat;
		$fds_kasubbag = '';
		$fds_catatan = '';
		$fds_pengirim = '';
		$fds_tgl_disposisi = '';
		$fds_id_parent = $fds_id_parent;
		$fds_id = '';
		$utr_unitTerusan = $unitTerusan;
		$ins_instruksi  = $instruksi;
	}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Tambah Disposisi</h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."disposisi/proses_edit_disposisi";}else{echo base_url()."disposisi/proses_tambah_disposisi";}?>" class="form-horizontal" role="form" data-toggle="validator" enctype="multipart/form-data">
            <input type="hidden" name="fds_id" value="<?php echo $fds_id; ?>">
            <input type="hidden" name="fds_id_parent" value="<?php echo $fds_id_parent; ?>">
            <input type="hidden" name="fds_id_surat" value="<?php echo $fds_id_surat; ?>">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dummy" class="col-sm-2 control-label text-left">ID Surat</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="dummy" name="dummy" placeholder="ID Surat" value="<?php echo $fds_id_surat; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fds_kasubbag" class="col-sm-2 control-label text-left">Kasubag</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="fds_kasubbag" name="fds_kasubbag" placeholder="Kasubag" value="<?php echo $fds_kasubbag; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ins_instruksi" class="col-sm-2 control-label">Instruksi</label>
                        <div class="col-sm-10 checkbox text-left">
                        	<?php foreach($ins_instruksi as $row){?>
                            <label class="checkbox">
	                        <input type="checkbox" class="form-control" id="ins_instruksi" name="ins_instruksi[<?php echo $row->ins_id; ?>]" value="<?php echo $row->ins_id?>"
                            <?php if ($disposisiInstruksi != ''){ foreach($disposisiInstruksi as $rowIn){?>
                            	<?php if($row->ins_id == $rowIn->din_id_instruksi){echo "checked";}?>
							<?php }} ?>>
							<?php echo $row->ins_nama_instruksi; ?>
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fds_tgl_disposisi" class="col-sm-2 control-label text-left">Tgl. disposisi</label>
                        <div class="col-sm-3">
	                        <input type="date" class="form-control tgl" id="fds_tgl_disposisi" name="fds_tgl_disposisi" placeholder="yyyy-mm-dd" value="<?php echo $fds_tgl_disposisi; ?>" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tr_disposisi_user" class="col-sm-2 control-label text-left">Tujuan</label>
                        <div class="col-sm-10 checkbox text-left">
                        	<?php foreach($userList as $row){ ?>
                            <label class="checkbox">
	                        <input type="checkbox" class="form-control" id="tr_disposisi_user" name="tr_disposisi_user[<?php echo $row->usr_id; ?>]" value="<?php echo $row->usr_id?>"
                            <?php if ($disposisiUser != ''){ foreach($disposisiUser as $rowIn){?>
                            	<?php if($row->usr_id == $rowIn->dus_user){echo "checked";}?>
							<?php }} ?>>
							<?php echo $row->usr_nama; ?>
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="utr_unitTerusan" class="col-sm-2 control-label">Unit terusan</label>
                        <div class="col-sm-10 checkbox">
                        	<?php foreach($utr_unitTerusan as $row){?>
                            <label class="checkbox">
	                        <input type="checkbox" class="form-control" id="utr_unitTerusan" name="utr_unitTerusan[<?php echo $row->utr_id; ?>]" value="<?php echo $row->utr_id?>"
							<?php if($disposisiUnitTerusan != ''){ foreach($disposisiUnitTerusan as $rowUt){?>
                            	<?php if($row->utr_id == $rowUt->dut_id_unit_terusan){echo "checked";}?>
							<?php } }?>>
							<?php echo $row->utr_nama_unit_trsn; ?>
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fds_catatan" class="col-sm-2 control-label text-left">Catatan</label>
                        <div class="col-sm-10">
	                        <textarea class="form-control" id="fds_catatan" name="fds_catatan" placeholder="catatan" required><?php echo $fds_catatan; ?></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."disposisi";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="reset" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Reset</button>
                            <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>
</div>