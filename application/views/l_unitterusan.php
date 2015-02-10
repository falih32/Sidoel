<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Hapus data unit terusan?")
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
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Unit Terusan <a class="btn btn-success" href="<?php echo base_url()."UnitTerusan/";?>tambah_unit_terusan"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></h3>
            </div>
            <table class="table table-responsive table-hover table-striped">
            	<thead>
                <tr>
                	<th>Nomor</th>
                	<th>Unit Terusan</th>
                	
                </tr>
                </thead>
                <tbody>
                <?php foreach ($unitList as $row) { ?>
                <tr>
                	<td><?php echo $row->utr_id; ?></td>
                        <td><?php echo $row->utr_nama_unit_trsn; ?></td>
                	
                	<td>
						<form>
                        <div class="form-group">
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-danger confirmation" href="<?php echo base_url()."UnitTerusan/delete_unit/".$row->utr_id;?>" onclick="confirmation()"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a class="btn btn-info" href="<?php echo base_url()."UnitTerusan/edit_unit_terusan/".$row->utr_id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              
                                
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