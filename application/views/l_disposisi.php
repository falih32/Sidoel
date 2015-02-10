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
	                        <label for="s_date_awal">Tanggal disposisi : </label>
                        	<input type="date" class="form-control tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal">
                        	<input type="date" class="form-control tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir">
                            <button type="reset" class="form-control btn btn-default" id="remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
                            <button type="button" class="form-control btn btn-default" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></button>
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
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
function makeConfirmation(){
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
}
//-->

$(document).ready(function() {
	var table = $('.table').DataTable( {
    	"paging": true, 
		"ordering": true, 
		"search":true, 
		"scrollY": "300px", 
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php echo site_url('disposisi/ajaxProcess');?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal').val();
				d.max = $('#s_date_akhir').val();
			}
		},
		"columns": [
                { "data": "fds_id" },
                { "data": "sms_nomor_surat" },
                { "data": "fds_kasubbag" },
                { "data": "usr_username" },
                { "data": "fds_catatan" },
                { "data": "fds_tgl_disposisi" },
                { "data": "fds_aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "targets": 6 }
			],
		"drawCallback": function( settings ) {
			makeConfirmation();
		}
	} );
	
	// refresh event listener
	var refreshLink = document.querySelector('#refresh');
	refreshLink.addEventListener('click', function(event){
		table.draw();
	});
});

</script>