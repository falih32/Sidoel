<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Unit Tujuan 
                <?php if($role <= 2){?>
                <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Unit Tujuan' href="<?php echo base_url()."UnitTujuan/";?>tambah_unit_tujuan"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                <?php } ?>
                </h3>
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-unittujuan">
            	<thead>
                <tr>
                	<th>Nomor</th>
                	<th>Unit Tujuan</th>
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
	
	var table = $('#tabel-unittujuan').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php echo site_url('UnitTujuan/ajaxProcess');?>",
			"type":"POST"
		},
		"columns": [
                { "data": "utj_id" },
                { "data": "utj_unit_tujuan" },
                { "data": "aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 2 },
				{ "visible":false, "targets": [<?php if($role > 1) echo"2"; ?>]}
			],
		"order": [[ 0, "asc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
		}
	} );
	
});
</script>