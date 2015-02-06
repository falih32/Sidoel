<?php
	if($this->uri->segment(2) == "edit_surat_masuk"){
		$mode = 'edit';
		$sms_nomor_surat = $dataSurat-> sms_nomor_surat;
		$sms_pengirim = $dataSurat-> sms_pengirim;
		$sms_tgl_srt = $dataSurat-> sms_tgl_srt;
		$sms_tgl_srt_diterima = $dataSurat-> sms_tgl_srt_diterima;
		$sms_tgl_srt_dtlanjut = $dataSurat-> sms_tgl_srt_dtlanjut;
		$sms_tenggat_wkt = $dataSurat-> sms_tenggat_wkt;
		$sms_perihal = $dataSurat-> sms_perihal;
		$sms_jenis_surat = $dataSurat-> sms_jenis_surat;
		$sms_agenda = $dataSurat-> sms_no_agenda;
		$sms_unit_tujuan = $dataSurat-> sms_unit_tujuan;
		$sms_keterangan = $dataSurat-> sms_keterangan;
	}
	else{
		$mode = 'add';
		$sms_nomor_surat = "";
		$sms_pengirim = "";
		$sms_tgl_srt = "";
		$sms_tgl_srt_diterima = "";
		$sms_tgl_srt_dtlanjut = "";
		$sms_tenggat_wkt = "";
		$sms_perihal = "";
		$sms_jenis_surat = "";
		$sms_agenda = "";
		$sms_unit_tujuan = "";
		$sms_keterangan = "";
	}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Surat masuk</h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."suratmasuk/proses_edit_smasuk";}else{echo base_url()."suratmasuk/proses_tambah_smasuk";}?>" class="form-horizontal" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_surat" class="col-sm-2 control-label text-left">No. Surat</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="nomor_surat" name="sms_nomor_surat" placeholder="No. Surat" value="<?php echo $sms_nomor_surat; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pengerim" class="col-sm-2 control-label text-left">Pengirim</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="pengirim" name="sms_pengirim" placeholder="Pengirim" value="<?php echo $sms_pengirim; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_srt" class="col-sm-2 control-label text-left">Tanggal</label>
                        <div class="col-sm-3">
	                        <input type="date" class="form-control tgl" id="tgl_srt" name="sms_tgl_srt" placeholder="yyyy-mm-dd" value="<?php echo $sms_tgl_srt; ?>">
                            <p class="help-block">Tanggal surat</p>
                        </div>
                        
                        <div class="col-sm-3">
	                        <input type="date" class="form-control tgl" id="tgl_srt_diterima" name="sms_tgl_srt_diterima" placeholder="yyyy-mm-dd" value="<?php echo $sms_tgl_srt_diterima; ?>">
                            <p class="help-block">Tanggal surat diterima</p>
                        </div>
                        
                        <div class="col-sm-3">
	                        <input type="date" class="form-control tgl" id="tgl_srt_dtlanjut" name="sms_tgl_srt_dtlanjut" placeholder="yyyy-mm-dd" value="<?php echo $sms_tgl_srt_dtlanjut; ?>">
                            <p class="help-block">Tenggat Waktu untuk ditindaklanjuti</p>
                        </div>
                        
                        <div class="col-sm-1">
                            <label>
                              <input type="checkbox" id="tenggat_wkt" name="sms_tenggat_wkt" value="1"  <?php if($sms_tenggat_wkt == 1){echo "checked";} ?>>
                            </label>
                            <p class="help-block">Tanpa tenggat waktu</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="perihal" class="col-sm-2 control-label text-left">Perihal</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="perihal" name="sms_perihal" placeholder="Perihal" value="<?php echo $sms_perihal; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_surat" class="col-sm-2 control-label text-left">Jenis</label>
                        <div class="col-sm-4">
	                        <select class="form-control" id="jenis_surat" name="sms_jenis_surat">
                            	<?php foreach ($jenisList as $row) {?>
                            	<option value="<?php echo $row->jsm_id; ?>" <?php if($row->jsm_id == $sms_jenis_surat){echo "selected";}?>><?php echo $row->jsm_nama_jenis; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="no_agenda" class="col-sm-2 control-label text-left">Agenda</label>
                        <div class="col-sm-4">
	                        <input type="text" class="form-control" id="no_agenda" name="sms_no_agenda" placeholder="Agenda" value="<?php echo $sms_agenda; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit_tujuan" class="col-sm-2 control-label text-left">Unit Tujuan</label>
                        <div class="col-sm-10">
	                        <select class="form-control" id="unit_tujuan" name="sms_unit_tujuan">
                            	<?php foreach ($unitList as $row) {?>
                            	<option value="<?php echo $row->utj_id; ?>" <?php if($row->utj_id == $sms_unit_tujuan){echo "selected";}?>><?php echo $row->utj_unit_tujuan; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file_upload" class="col-sm-2 control-label text-left">Upload file</label>
                        <div class="col-sm-10">
	                        <input type="file" class="" id="file_upload" name="sms_file" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label text-left">Keterangan</label>
                        <div class="col-sm-10">
	                        <textarea rows="5" class="form-control" id="keterangan" name="sms_keterangan" ><?php echo $sms_keterangan; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."suratmasuk";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
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