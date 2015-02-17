<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi <?php if ($mode=='byUserMasuk'){echo"Masuk";} elseif($mode=='byUserKeluar'){echo "Keluar";}?></h3>
            </div>
            <div class="panel-body" style="background: #CCC;" id="conchart">
            	<div class="col-md-12">                
					<?php if($mode == "bySurat"){?>
                        <div id="mynetwork"></div>
                                        
                        <script type="text/javascript">
                          // create an array with nodes
                          var nodes = [
                            <?php 
                            $tot=count($graphData); 
                            $i=0;
                            foreach($graphData as $row){
                                $i=$i+1;?>
                                {id: <?php echo $row->fds_id; ?>, label: <?php echo "\"".$row->usr_username."\""; ?>}<?php if($i != $tot){echo ",";} ?>
                            <?php } ?>
                          ];
                        
                          // create an array with edges
                          var edges = [
                          <?php
                            $i=0;
                            foreach($graphData as $row){
                                $i=$i+1;?>
                                <?php if($row->fds_id_parent != "-99"){?>
                                    {from: <?php echo $row->fds_id_parent; ?>, to: <?php echo $row->fds_id; ?>}<?php if($i != $tot){echo ",";} ?>
                                <?php } ?>
                            <?php } ?>
                          ];
                        
                          // create a network
                          var container = document.getElementById('mynetwork');
                          var data= {
                            nodes: nodes,
                            edges: edges,
                          };
                          var options = {
                            width: document.getElementById('conchart').offsetWidth * 0.9,
                            height: '500px',
                            edges:{
                                color: 'red',
                                style: 'arrow'
                            }
                          };
                          var network = new vis.Network(container, data, options);
                        </script>
        
                    <?php } ?>
                </div>
                <div class="col-md-6 col-md-offset-6 text-right" id="date_search">
                    <input type="text" class="form-control input-sm tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal">
                    <input type="text" class="form-control input-sm tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir">
                    <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
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