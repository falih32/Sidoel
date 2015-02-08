<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat masuk <a class="btn btn-success" href="<?php echo base_url()."SuratMasuk/";?>tambah_surat_masuk"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></h3>
            </div>
            <div class="panel-body" style="background: #CCC;">
                <div class="col-md-6 col-md-offset-6 text-right">
                	<form class="form-inline">
                    	<div class="form-group">
                        	<input type="date" class="form-control tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal">
                        	<input type="date" class="form-control tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir">
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-responsive table-hover table-striped table-bordered">
            	<thead>
                <tr>
                	<th>No.Agenda</th>
                	<th>No./ Tanggal Surat</th>
                	<th>Pengirim / Perihal</th>
                	<th>Tanggal Terima</th>
                	<th>Tenggat</th>
                	<th>Keterangan</th>
                	<th>Terkirim</th>
                	<th>Diubah terakhir oleh</th>
                	<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($suratList as $row) { ?>
                <tr>
                	<td><?php echo $row->sms_no_agenda; ?></td>
                	<td><?php if($row->sms_file != ''){echo "<a target='_blank' href='".base_url()."uploads/surat_masuk/".$row->sms_file."'>"; } echo $row->sms_nomor_surat."</a><br>".$row->sms_tgl_srt; ?></td>
                	<td><?php echo $row->sms_pengirim."<br>".$row->sms_perihal; ?></td>
                	<td><?php echo $row->sms_tgl_srt_diterima; ?></td>
					<td><?php echo $row->sms_tgl_srt_dtlanjut; ?></td>
                	<td><?php echo $row->sms_keterangan; ?></td>
                	<td><?php echo $row->sms_status_terkirim; ?></td>
                	<td><?php echo $row->usr_userName; ?></td>
                	<td>
						<form>
                        <div class="form-group">
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-danger delete" data-confirm="Are you sure to delete this item?" href="<?php echo base_url()."suratmasuk/delete_smasuk/".$row->sms_id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a class="btn btn-info" href="<?php echo base_url()."suratmasuk/edit_surat_masuk/".$row->sms_id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a class="btn btn-success" href="<?php echo base_url()."disposisi/buat_disposisi/".$row->sms_id; ?>"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a>
                            </div>
                        </div>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
var deleteLinks = document.querySelectorAll('.delete');
for (var i = 0, length = deleteLinks.length; i < length; i++) {
deleteLinks[i].addEventListener('click', function(event) {
    event.preventDefault();

    var choice = confirm(this.getAttribute('data-confirm'));

    if (choice) {
        window.location.href = this.getAttribute('href');
    }
});
}
//-->

/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, colom, dataIndex ) {
        var min = Date.parse($('#s_date_awal').val());
        var max = Date.parse($('#s_date_akhir').val());
        var awal = Date.parse(colom[3]) || 0;
		var akhir = Date.parse(colom[3]) || 0;
		 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && akhir <= max ) ||
             ( min <= awal   && isNaN( max ) ) ||
             ( min <= awal   && akhir <= max ) )
        {
            return true;
        }
        return false;
    }
);
$(document).ready(function() {
	var table = $('.table').DataTable( {
    	paging: true, ordering: true, search:true, scrollY: "300px"
	} );
	
	// Event listener to the two range filtering inputs to redraw on input
    $('#s_date_awal, #s_date_akhir').keyup( function() {
        table.draw();
    } );
});


</script>