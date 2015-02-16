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
		$utj_unit_tujuan = $dataSurat->utj_unit_tujuan;
		$jsm_nama_jenis = $dataSurat->jsm_nama_jenis;
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Detail surat masuk</h3>
            </div>
            <div class="panel-body">
            	<table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                    	<tr>
                        	<th>Nomor Surat</th>
                        	<td><?php echo $sms_nomor_surat; ?></td>
                        </tr>
                    	<tr>
                        	<th>Pengirim</th>
                        	<td><?php echo $sms_pengirim; ?></td>
                        </tr>
                    	<tr>
                        	<th>Tanggal Surat</th>
                        	<td><?php echo $sms_tgl_srt; ?></td>
                        </tr>
                    	<tr>
                        	<th>Tanggal Surat Diterima</th>
                        	<td><?php echo $sms_tgl_srt_diterima; ?></td>
                        </tr>
                        <?php if($sms_tenggat_wkt == '1'){?>
                    	<tr>
                        	<th>Tanggal Surat Ditindaklanjuti</th>
                        	<td><?php echo $sms_tgl_srt_dtlanjut; ?></td>
                        </tr>
                        <?php } ?>
                    	<tr>
                        	<th>Perihal</th>
                        	<td><?php echo $sms_perihal; ?></td>
                        </tr>
                    	<tr>
                        	<th>Jenis Surat</th>
                        	<td><?php echo $jsm_nama_jenis; ?></td>
                        </tr>
                    	<tr>
                        	<th>Agenda</th>
                        	<td><?php echo $sms_agenda; ?></td>
                        </tr>
                    	<tr>
                        	<th>Unit Tujuan</th>
                        	<td><?php echo $utj_unit_tujuan; ?></td>
                        </tr>
                    	<tr>
                        	<th>Keterangan</th>
                        	<td><?php echo $sms_keterangan; ?></td>
                        </tr>
                    	<tr>
                        	<th>File</th>
                        	<td>
                            	<?php if ($sms_file == ""){echo "<i>Tidak ada file yang diunggah</i>";} else {?>
                                <a class="btn btn-default" target="_blank" href="<?php echo base_url()."uploads/surat_masuk/".$sms_file; ?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Buka file</a>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."SuratMasuk";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>