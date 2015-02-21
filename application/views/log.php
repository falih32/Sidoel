<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> User Log </h3>
            </div>
            <div class="panel-body" style="background: #CCC;">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-log">
            	<thead>
                <tr>
                	<th>No.</th>
                	<th>Nama User</th>
                	<th>Role</th>
                    <th>Tabel</th>
                    <th>Aksi</th>
                    <th>Waktu</th>
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

function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
}

$(document).ready(function() {
	
	var table = $('#tabel-log').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php echo site_url('Log/ajaxProcess');?>",
			"type":"POST"
		},
		"columns": [
                { "data": "log_id" },
                { "data": "usr_nama" },
                { "data": "rle_role_name" },
                { "data": "log_nama_tabel" },
                { "data": "log_aksi" },
                { "data": "log_tanggal" }
              ],
		"order": [[ 0, "desc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
		}
	} );
	
});
</script>