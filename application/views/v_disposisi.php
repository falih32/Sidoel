<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Detail Disposisi</h3>
            </div>
            <div class="panel-body">
            	<table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                    	<tr>
                        	<th>Nomor Surat</th>
                        	<td><?php echo $dataDisposisi->sms_nomor_surat; ?> <a class="btn btn-default btn-sm" target="_blank" href="<?php echo site_url('SuratMasuk/detail_surat_masuk')."/".$dataDisposisi->fds_id_surat; ?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Lihat detail surat</a></td>
                        </tr>
                        <?php if($dataDisposisi->fds_id_parent != "-99"){?>
                    	<tr>
                        	<th>Disposisi sebelumnya</th>
                        	<td><a class="btn btn-default btn-sm" target="_blank" href="<?php echo site_url('Disposisi/detail_disposisi')."/".$dataDisposisi->fds_id_parent; ?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Lihat detail disposisi</a></td>
                        </tr>
                        <?php } ?>
                    	<tr>
                        	<th>Tanggal Disposisi</th>
                        	<td><?php echo $dataDisposisi->fds_tgl_disposisi; ?></td>
                        </tr>
                    	<tr>
                        	<th>Pengirim</th>
                        	<td><?php echo $dataDisposisi->usr_nama; ?></td>
                        </tr>
                    	<tr>
                        	<th>Instruksi</th>
                        	<td>
                            	<ul>
                                <?php foreach($instruksi as $row){?>
									<?php if ($disposisiInstruksi != ''){ foreach($disposisiInstruksi as $rowIn){?>
                                        <?php if($row->ins_id == $rowIn->din_id_instruksi){?>
                                        <li><?php echo $row->ins_nama_instruksi; ?></li>
                                        <?php }} ?>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            </td>
                        </tr>
                    	<tr>
                        	<th>Tujuan</th>
                        	<td>
                            	<ul>
                                <?php 
								$finish = false;
								$showStatusBtn = false;
								foreach($userList as $row){
									if ($disposisiUser!= ''){ 
										foreach($disposisiUser as $rowIn){
											if($row->usr_id == $rowIn->dus_user){
												echo "<li>".$row->usr_nama;
												if($rowIn->dus_status == '1'){
													echo ' <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
												}
												echo "</li>";
												if($rowIn->dus_user == $this->session->userdata('id_user')){
													$showStatusBtn = true;
													if($rowIn->dus_status == '1'){$finish=true;}
												}
											}
										}
                                    }
                                } ?>
                                </ul>
                            </td>
                        </tr>
                    	<tr>
                        	<th>Catatan</th>
                        	<td><?php echo $dataDisposisi->fds_catatan; ?></td>
                        </tr>
                    	<tr>
                        	<th>File</th>
                        	<td>
                            	<?php if ($dataDisposisi->fds_file == ""){echo "<i>Tidak ada file yang diunggah</i>";} else {?>
                                <a class="btn btn-default" target="_blank" href="<?php echo base_url()."uploads/disposisi/".$dataDisposisi->fds_file; ?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Buka file</a>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                        	<a class="btn btn-lg btn-primary" href="<?php echo site_url('Disposisi/tracking')."/".$dataDisposisi->fds_id_surat; ?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Tracking</a>
                            <?php if($showStatusBtn != ""){?>
                        	<a class="btn btn-lg btn-success" <?php if($finish){echo "disabled";}?> id="set_status" data-confirm='Anda yakin telah menyelesaikan disposisi ini?' href="<?php echo site_url('Disposisi/set_selesai')."/".$dataDisposisi->fds_id."/".$this->session->userdata('id_user'); ?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Set Selesai</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	
	$('[data-toggle="tooltip"]').tooltip({});
	
	var deleteLinks = document.querySelectorAll('#set_status');
	for (var i = 0, length = deleteLinks.length; i < length; i++) {
		deleteLinks[i].addEventListener('click', function(event) {
			event.preventDefault();
		
			var choice = confirm(this.getAttribute('data-confirm'));
		
			if (choice) {
				window.location.href = this.getAttribute('href');
			}
		});
	}
});
</script>