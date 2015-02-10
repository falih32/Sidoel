<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Hapus data unit tujuan?")
	if (answer){
		alert("User akan dihapus!")
	}
	else{
		die();
	}
}
//-->
</script>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> User Log <a class="btn btn-success" href="<?php echo base_url()."unittujuan/";?>tambah_unit_tujuan"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></h3>
            </div>
            <table class="table table-responsive table-hover table-striped">
            	<thead>
                <tr>
                	<th>No.</th>
                	<th>User</th>
                        <th>Tabel</th>
                        <th>Aksi</th>
                        <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($logList as $row) { ?>
                <tr>
                	<td><?php echo $row->log_id; ?></td>
                        <td><?php echo $row->log_user; ?></td>
                	<td><?php echo $row->log_nama_tabel; ?></td>
                        <td><?php echo $row->log_aksi; ?></td>
                        <td><?php echo $row->log_tanggal; ?></td>
                	<td>
						<form>
                        <div class="form-group">
                            <div class="btn-group" role="group" aria-label="...">
                                
              
                                
                            </div>
                        </div>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <center><nav><?php echo $this->pagination->create_links(); ?></nav></center>
    </div>
</div>