<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Hapus data?")
	if (answer){
		alert("Dataakan dihapus!")
	}
	else{
		die();
	}
}
//-->
</script>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat masuk <a class="btn btn-success" href="<?php echo base_url()."SuratMasuk/";?>tambah_surat_masuk"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></h3>
            </div>
            <table class="table table-responsive table-hover table-striped">
            	<thead>
                <tr>
                	<th>No.Agenda</th>
                	<th>No./ Tanggal Surat</th>
                	<th>Pengirim / Perihal</th>
                	<th>Tanggal Terima / Tenggat</th>
                	<th>Keterangan</th>
                	<th>Terkirim</th>
                	<th>Direkam / diubah terakhir oleh</th>
                	<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($suratList as $row) { ?>
                <tr>
                	<td><?php echo $row->no_agenda; ?></td>
                	<td><?php if($row->file != ''){echo "<a target='_blank' href='".base_url()."uploads/surat_masuk/".$row->file."'>"; } echo $row->nomor_surat."</a><br>".$row->tgl_srt; ?></td>
                	<td><?php echo $row->pengirim."<br>".$row->perihal; ?></td>
                	<td><?php echo $row->tgl_srt_diterima."<br>".$row->tgl_srt_dtlanjut; ?></td>
                	<td><?php echo $row->keterangan; ?></td>
                	<td><?php echo $row->status_terkirim; ?></td>
                	<td><?php echo $row->username; ?></td>
                	<td>
						<form>
                        <div class="form-group">
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-danger confirmation" href="<?php echo base_url()."suratmasuk/delete_smasuk/".$row->id;?>" onclick="confirmation()"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a class="btn btn-info" href="<?php echo base_url()."suratmasuk/edit_surat_masuk/".$row->id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a class="btn btn-success" href="#"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a>
                            </div>
                        </div>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <center><nav><?php echo $this->pagination->create_links(); ?></nav></center>
    </div>
</div>