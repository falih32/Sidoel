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
                        	<td><a target="_blank" href="<?php echo site_url('SuratMasuk/detail_surat_masuk')."/".$dataDisposisi->fds_id_surat; ?>"><?php echo $dataDisposisi->sms_nomor_surat; ?></a></td>
                        </tr>
                    	<tr>
                        	<th>Tanggal Disposisi</th>
                        	<td><?php echo $dataDisposisi->fds_tgl_disposisi; ?></td>
                        </tr>
                    	<tr>
                        	<th>Pengirim</th>
                        	<td><?php echo $dataDisposisi->usr_nama; ?></td>
                        </tr>
                    	<tr>
                        	<th>Kasubbag</th>
                        	<td><?php echo $dataDisposisi->fds_kasubbag;; ?></td>
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
                        	<th>Unit Terusan</th>
                        	<td>
                            	<ul>
                                <?php foreach($unitTerusan as $row){?>
									<?php if ($disposisiUnitTerusan != ''){ foreach($disposisiUnitTerusan as $rowIn){?>
                                        <?php if($row->utr_id == $rowIn->dut_id_unit_terusan){?>
                                        <li><?php echo $row->utr_nama_unit_trsn; ?></li>
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
                                <?php foreach($userList as $row){?>
									<?php if ($disposisiUser!= ''){ foreach($disposisiUser as $rowIn){?>
                                        <?php if($row->usr_id == $rowIn->dus_user){?>
                                        <li><?php echo $row->usr_nama; ?></li>
                                        <?php }} ?>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            </td>
                        </tr>
                    	<tr>
                        	<th>Catatan</th>
                        	<td><?php echo $dataDisposisi->fds_catatan; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."disposisi";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>