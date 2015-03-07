<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat masuk
                <?php if($role <= 2){?>
                <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Surat masuk' href="<?php echo base_url()."SuratMasuk/";?>tambah_surat_masuk"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                <?php } ?>
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-6 text-right" id="date_search">
                    <input type="text" class="form-control input-sm tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal">
                    <input type="text" class="form-control input-sm tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir">
                    <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                </div>
            </div>
            <table class="table table-hover table-striped table-bordered" id="tabel-suratmasuk">
            	<thead>
                <tr>
                	<th>ID surat</th>
                	<th>No. Surat</th>
                	<th>Tgl. Surat</th>
                	<th>Tgl. Terima</th>
                	<th>Pengirim</th>
                	<th>Perihal</th>
                	<th>Direkam oleh</th>
                    <th>Diterima</th>
                	<th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	
	var table = $('#tabel-suratmasuk').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"scrollX":true,
		"processing":true, 
		"serverSide": true,
		"pageLength": 50,
		"ajax":{
			"url":"<?php echo site_url('SuratMasuk/ajaxProcess');?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal').val();
				d.max = $('#s_date_akhir').val();
			}
		},
		"columns": [
                { "data": "sms_id" },
                { "data": "sms_nomor_surat" },
                { "data": "sms_tgl_srt" },
                { "data": "sms_tgl_srt_diterima" },
                { "data": "sms_pengirim" },
                { "data": "sms_perihal" },
                { "data": "usr_nama" },
                { "data": "sms_confirm" },
                { "data": "<?php if($role > 2) {echo"sms_view";} else{echo "sms_aksi";}?>" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": [8] },
				{ "searchable": false, "visible":false, "targets": [0]},
				{ "className": "dt-body-center", "targets": [7] }
			],
		"order": [[ 0, "desc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
			moveSearch()
		},
		"createdRow": function ( row, data, index ) {
            if ( data.sms_confirm_status == "1") {
                $('td', row).eq(6).html('<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Konfirmasi terima form disposisi"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>');
            }
        }
	} );
	
	// refresh event listener
	var refreshLink = document.querySelector('#refresh');
	refreshLink.addEventListener('click', function(event){
		table.draw();
	});
	
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
	
	var confirmLinks = document.querySelectorAll('.confirm');
	for (var i = 0, length = confirmLinks.length; i < length; i++) {
		confirmLinks[i].addEventListener('click', function(event) {
			event.preventDefault();
		
			var choice = confirm(this.getAttribute('data-confirm'));
		
			if (choice) {
				$.ajax({
					url: this.getAttribute('data-href'),
					type: "POST",
					success: function(){table.draw();}
				});
			}
		});
	}
}

function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
}

function moveSearch(){
	var newParent = document.getElementById('tabel-suratmasuk_filter');
	var oldParent = document.getElementById('date_search');
	
	while (oldParent.childNodes.length > 0) {
		newParent.appendChild(oldParent.childNodes[0]);
	}
}
//-->
});


</script>