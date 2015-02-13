<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat masuk <a class="btn btn-success" href="<?php echo base_url()."SuratMasuk/";?>tambah_surat_masuk"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></h3>
            </div>
            <div class="panel-body" style="background: #CCC;">
                <div class="col-md-6 col-md-offset-6 text-right" id="date_search">
                    <input type="date" class="form-control input-sm tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal">
                    <input type="date" class="form-control input-sm tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir">
                    <button type="reset" class="form-control btn btn-default btn-sm" id="remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
                    <button type="button" class="form-control btn btn-default btn-sm" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></button>
                </div>
            </div>
            <table class="table table-responsive table-hover table-striped table-bordered">
            	<thead>
                <tr>
                	<th>No.Agenda</th>
                	<th>No. Surat</th>
                	<th>Tgl. Surat</th>
                	<th>Pengirim</th>
                	<th>Perihal</th>
                	<th>Tgl. Terima</th>
                	<th>Tenggat</th>
                	<th>Keterangan</th>
                	<th>Terkirim</th>
                	<th>Diubah terakhir oleh</th>
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
		"responsive":true,
		"processing":true, 
		"serverSide": true,
		"ajax":{
			"url":"<?php echo site_url('suratmasuk/ajaxProcess');?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal').val();
				d.max = $('#s_date_akhir').val();
			}
		},
		"columns": [
                { "data": "sms_no_agenda" },
                { "data": "sms_nomor_surat" },
                { "data": "sms_tgl_srt" },
                { "data": "sms_pengirim" },
                { "data": "sms_perihal" },
                { "data": "sms_tgl_srt_diterima" },
                { "data": "sms_tgl_srt_dtlanjut" },
                { "data": "sms_keterangan" },
                { "data": "sms_status_terkirim" },
                { "data": "usr_userName" },
                { "data": "sms_aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "targets": 10 }
			],
		"drawCallback": function( settings ) {
			makeConfirmation();
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