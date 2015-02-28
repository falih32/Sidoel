<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi <?php if ($mode=='byUserMasuk'){echo"Masuk";} elseif($mode=='byUserKeluar'){echo "Keluar";}?></h3>
            </div>
            <div class="panel-body" id="conchart">
            	<div class="col-md-9">                
					<?php if($mode == "bySurat"){?>
                        <div id="mynetwork"></div>
                                        
                        <script type="text/javascript">
						  // set option
                          var options = {
                            width: document.getElementById('conchart').offsetWidth * 0.9,
                            height: '500px',
                            edges:{
                                color: 'red',
                                style: 'arrow'
                            },
							groups: {
							  finished: {
								color: {
								  border: '#006600',
								  background: '#66ff00',
								  highlight: {
									border: 'black',
									background: '#99ff00'
								  }
								},
								fontColor: 'black'
							  }
							}
                          };
						  
						  // create an array with nodes
                          var nodes = <?php echo $nodes; ?>;
                        
                          // create an array with edges
                          var edges = <?php echo $edges; ?>;
                        
                          // create a network
                          var container = document.getElementById('mynetwork');
                          var data= {
                            nodes: nodes,
                            edges: edges,
                          };
                          var network = new vis.Network(container, data, options);
                        </script>
        
                    <?php } ?>
                </div>
                <?php if ($mode == 'bySurat'){?>
                <div class="col-md-3">
                	<ul class="bar-legend">
                    	<li><strong>Status:</strong></li>
                    	<li><span style="background-color:#6F0"></span> Selesai</li>
                    	<li><span style="background-color:#0CF"></span> Belum Selesai</li>
                    </ul>
                </div>
                <?php } ?>
                <div class="col-md-6 col-md-offset-6 text-right" id="date_search">
                    <input type="text" class="form-control input-sm tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal">
                    <input type="text" class="form-control input-sm tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir">
                    <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                </div>
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-disposisi">
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
	var newParent = document.getElementById('tabel-disposisi_filter');
	var oldParent = document.getElementById('date_search');
	
	while (oldParent.childNodes.length > 0) {
		newParent.appendChild(oldParent.childNodes[0]);
	}
}
//-->

$(document).ready(function() {
	var table = $('#tabel-disposisi').DataTable( {
    	"paging": true, 
		"ordering": true, 
		"scrollX":true,
		"search":true, 
		"processing":true, 
		"serverSide": true,
		"pageLength": 50,
		"ajax":{
			"url":"<?php 
				if($mode == "normal"){echo site_url('Disposisi/ajaxProcess');}
				elseif($mode == "byUserMasuk"){echo site_url('Disposisi/ajaxProcessByUserMasuk');}
				elseif($mode == "byUserKeluar"){echo site_url('Disposisi/ajaxProcessByUserKeluar');}
				elseif($mode == "bySurat"){echo site_url('Disposisi/ajaxProcessBySurat/'.$this->uri->segment(3));}
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
                { "data": "usr_nama" },
                { "data": "fds_catatan" },
                { "data": "fds_tgl_disposisi" },
                { "data": "fds_aksi" },
				{ "data": "fds_id" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 5 },
				{ "visible":false, "targets": [1, 6]},
				{ "visible":false, "targets": [<?php if($mode == "normal"&& $role > 2) echo"5"; ?>]}
			],
		"order": [[ 6, "desc" ]],
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