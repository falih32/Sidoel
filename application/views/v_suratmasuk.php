<?php

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
                $sms_file =$dataSurat-> sms_file;
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Detail surat masuk</h3>
            </div>
            <div class="panel-body">
            <form>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_surat" class="col-sm-2 control-label text-left">No. Surat</label>
                        <div class="col-sm-10">
	                        <p class="form-control-static"><?php echo $sms_nomor_surat; ?> </p>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="pengirim" class="col-sm-2 control-label text-left">Pengirim</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><?php echo $sms_pengirim; ?></p>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_srt" class="col-sm-2 control-label text-left">Tanggal</label>
                        <div class="col-sm-3">
                            <p class="form-control-static"><?php echo $sms_tgl_srt; ?>></p>
                            <p class="help-block">Tanggal surat</p>
                        </div>
                        
                        <div class="col-sm-3">
                            <p class="form-control-static"><?php echo $sms_tgl_srt_diterima; ?></p>
                            <div class="help-block with-errors"></div>
                            <p class="help-block">Tanggal surat diterima</p>
                        </div>
                        
                        <div class="col-sm-3">
                            <p class="form-control-static"><?php echo $sms_tgl_srt_dtlanjut; ?></p>
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
                            <p class="form-control-static"><?php echo $sms_perihal; ?></p>
                               </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_surat" class="col-sm-2 control-label text-left">Jenis</label>
                        <div class="col-sm-4">
	                        <p class="form-control-static"><?php echo $sms_jenis_surat; ?></p>
                            	
                        </div>
                        <label for="no_agenda" class="col-sm-2 control-label text-left">Agenda</label>
                        <div class="col-sm-4">
                            <p class="form-control-static"><?php echo $sms_agenda; ?></p>
                              </div>
                    </div>
                    <div class="form-group">
                        <label for="unit_tujuan" class="col-sm-2 control-label text-left">Unit Tujuan</label>
                        <div class="col-sm-10">
	                        <p class="form-control-static"><?php echo $sms_unit_tujuan; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file_upload" class="col-sm-2 control-label text-left">Upload file</label>
                        <div class="col-sm-10">
	                        <p class="form-control-static"><?php echo $sms_file; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label text-left">Keterangan</label>
                                <div class="col-sm-10">
	                        <p class="form-control-static"><?php echo $sms_keterangan; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."suratmasuk";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                                                   </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>
</div>