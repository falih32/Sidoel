<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Hapus data user?")
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
                <h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> User List <a class="btn btn-success" href="<?php echo base_url()."User/";?>addUser"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></h3>
            </div>
            <table class="table table-responsive table-hover table-striped">
            	<thead>
                <tr>
                	<th>User ID</th>
                	<th>Nama</th>
                	<th>Username</th>
                	<th>Nomor HP</th>
                	<th>E-mail</th>
                	<th>Role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($userList as $row) { ?>
                <tr>
                	<td><?php echo $row->usr_id; ?></td>
                        <td><?php echo $row->usr_nama; ?></td>
                	<td><?php echo $row->usr_username; ?></td>
                	<td><?php echo $row->usr_no_telp; ?></td>
                	<td><?php echo $row->usr_email; ?></td>
                	<td><?php echo $row->rle_role_name; ?></td>
                	<td>
						<form>
                        <div class="form-group">
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-danger confirmation" href="<?php echo base_url()."User/deleteUser/".$row->usr_id;?>" onclick="confirmation()"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a class="btn btn-info" href="<?php echo base_url()."User/editUser/".$row->usr_id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a class="btn btn-success" href="#"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a>
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