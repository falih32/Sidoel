<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Unit Terusan 
                <?php if($role <= 1){?>
                <a class="btn btn-success" href="<?php echo base_url()."UnitTerusan/";?>tambah_unit_terusan"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                <?php } ?>
                </h3>
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-unitterusan">
            	<thead>
                <tr>
                	<th>Unit Terusan</th>
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
	
	var table = $('#tabel-unitterusan').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php echo site_url('UnitTerusan/ajaxProcess');?>",
			"type":"POST"
		},
		"columns": [
                { "data": "utr_nama_unit_trsn" },
                { "data": "aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 1 },
				{ "visible":false, "targets": [<?php if($role > 1) echo"1"; ?>]}
			],
		"order": [[ 0, "asc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
		}
	} );
	
});
</script>