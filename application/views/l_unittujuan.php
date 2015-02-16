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
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Unit Tujuan <a class="btn btn-success" href="<?php echo base_url()."UnitTujuan/";?>tambah_unit_tujuan"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></h3>
            </div>
            <table class="table table-responsive table-hover table-striped">
            	<thead>
                <tr>
                	<th>Nomor</th>
                	<th>Unit Tujuan</th>
                	
                </tr>
                </thead>
                <tbody>
                <?php foreach ($unitList as $row) { ?>
                <tr>
                	<td><?php echo $row->utj_id; ?></td>
                        <td><?php echo $row->utj_unit_tujuan; ?></td>
                	
                	<td>
						<form>
                        <div class="form-group">
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-danger confirmation" href="<?php echo base_url()."UnitTujuan/delete_unit/".$row->utj_id;?>" onclick="confirmation()"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a class="btn btn-info" href="<?php echo base_url()."UnitTujuan/edit_unit_tujuan/".$row->utj_id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              
                                
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