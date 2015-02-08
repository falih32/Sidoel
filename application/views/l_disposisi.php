<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi</h3>
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
                	<th>ID Disposisi</th>
                	<th>No. Surat</th>
                	<th>Kepada</th>
                	<th>Dari</th>
                	<th>Catatan</th>
                	<th>Tgl. Disposisi</th>
                	<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($suratList as $row) { ?>
                <tr>
                	<td><?php echo $row->fds_id; ?></td>
                	<td><?php echo $row->sms_nomor_surat; ?></td>
                	<td><?php echo $row->fds_kasubbag ?></td>
                	<td><?php echo $row->usr_username; ?></td>
                	<td><?php echo $row->fds_catatan; ?></td>
                	<td><?php echo $row->fds_tgl_disposisi; ?></td>
                	<td>
						<form>
                        <div class="form-group">
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-danger delete" data-confirm="Are you sure to delete this item?" href="<?php echo base_url()."disposisi/hapus_disposisi/".$row->fds_id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a class="btn btn-info" href="<?php echo base_url()."disposisi/edit_disposisi/".$row->fds_id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a class="btn btn-success" href="<?php echo base_url()."disposisi/tambah_disposisi/".$row->fds_id; ?>"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a>
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
        var awal = Date.parse(colom[5]) || 0;
		var akhir = Date.parse(colom[5]) || 0;
		 
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