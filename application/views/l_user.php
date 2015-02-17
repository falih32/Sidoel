<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> User List 
                <?php if($role <= 2){?>
                <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah User' href="<?php echo base_url()."User/";?>addUser"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                <?php } ?>
                </h3>
            </div>
            <table class="table table-responsive table-hover table-striped">
            	<thead>
                <tr>
                	<th>User ID</th>
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
	
	var table = $('.table').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php echo site_url('User/ajaxProcess');?>",
			"type":"POST"
		},
		"columns": [
                { "data": "usr_id" },
                { "data": "usr_nama" },
                { "data": "usr_username" },
                { "data": "usr_no_telp" },
                { "data": "usr_email" },
                { "data": "rle_role_name" },
                { "data": "aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 6 },
				{ "visible":false, "targets": [<?php if($role > 2) echo"6"; ?>]}
			],
		"order": [[ 0, "asc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
		}
	} );
	
});
</script>