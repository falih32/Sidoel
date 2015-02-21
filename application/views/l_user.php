<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> User List 
                <?php if($role <= 1){?>
                <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah User' href="<?php echo base_url()."User/";?>addUser"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                <?php } ?>
                </h3>
            </div>
            <div class="panel-body" style="background: #CCC;">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-user">
            	<thead>
                <tr>
                	<th>Nama</th>
                	<th>Username</th>
                	<th>Nomor HP</th>
                	<th>E-mail</th>
                	<th>Role</th>
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

function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
}

$(document).ready(function() {
	
	var table = $('#tabel-user').DataTable( {
    	"paging": true, 
		"search":true,  
		"scrollX":true,
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php echo site_url('User/ajaxProcess');?>",
			"type":"POST"
		},
		"columns": [
                { "data": "usr_nama" },
                { "data": "usr_username" },
                { "data": "usr_no_telp" },
                { "data": "usr_email" },
                { "data": "rle_role_name" },
                { "data": "aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 5 },
				{ "visible":false, "targets": [<?php if($role > 1) echo"5"; ?>]}
			],
		"order": [[ 4, "asc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
		}
	} );
	
});
</script>