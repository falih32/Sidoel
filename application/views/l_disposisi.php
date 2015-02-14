<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi <?php if ($mode=='byUserMasuk'){echo"Masuk";} elseif($mode=='byUserKeluar'){echo "Keluar";}?></h3>
            </div>
            <div class="panel-body" style="background: #CCC;">
                <div class="col-md-6 col-md-offset-6 text-right" id="date_search">
                    <input type="date" class="form-control input-sm tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal">
                    <input type="date" class="form-control input-sm tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir">
                    <button type="reset" data-toggle='tooltip' data-placement='top' title='Clear' class="form-control btn btn-default btn-sm" id="remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
                    <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></button>
                </div>
            </div>
            <table class="table table-responsive table-hover table-striped table-bordered" cellspacing="0" width="100%">
            	<thead>
                <tr>
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

function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
}

function moveSearch(){
	var newParent = document.getElementById('DataTables_Table_0_filter');
	var oldParent = document.getElementById('date_search');
	
	while (oldParent.childNodes.length > 0) {
		newParent.appendChild(oldParent.childNodes[0]);
	}
}
//-->

$(document).ready(function() {
	var table = $('.table').DataTable( {
    	"paging": true, 
		"ordering": true, 
		"search":true, 
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php 
				if($mode == "normal"){echo site_url('disposisi/ajaxProcess');}
				elseif($mode == "byUserMasuk"){echo site_url('disposisi/ajaxProcessByUser');}
				elseif($mode == "byUserKeluar"){echo site_url('disposisi/ajaxProcessByUserKeluar');}
				elseif($mode == "bySurat"){echo site_url('disposisi/ajaxProcessBySurat/'.$this->uri->segment(3));}
			?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal').val();
				d.max = $('#s_date_akhir').val();
			}
		},
		"columns": [
                { "data": "sms_nomor_surat" },
                { "data": "fds_kasubbag" },
                { "data": "usr_username" },
                { "data": "fds_catatan" },
                { "data": "fds_tgl_disposisi" },
                { "data": "fds_aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 5 },
				{ "visible":false, "targets": 1}
			],
		"order": [[ 4, "desc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
			moveSearch();
		}
	} );
	
	// refresh event listener
	var refreshLink = document.querySelector('#refresh');
	refreshLink.addEventListener('click', function(event){
		table.draw();
	});
});

</script>