<?php
	if($mode == 'edit'){
		
		$usr_nama = $userlist-> usr_nama;
		$usr_username = $userlist-> usr_username;
		$usr_nip = $userlist-> usr_nip;
		$usr_no_telp = $userlist-> usr_no_telp;
                $usr_role = $userlist->usr_role;
                $usr_password = $userlist->usr_password;
                $konfirm = "";
                $usr_email = $userlist->usr_email;
                
			}
	else{
		
		$usr_nama = "";
		$usr_username = "";
		$usr_nip = "";
		$usr_no_telp = "";
                $usr_role = "";
                $usr_password ="";
                $konfirm ="";
                $usr_email ="";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."user/proses_editUser";}else{echo base_url()."user/proses_addUser";}?>" class="form-horizontal" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="usr_nama" class="col-sm-2 control-label text-left">Nama</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_nama" name="usr_nama" placeholder="Nama" value="<?php echo $usr_nama; ?>">
                        </div>
                    </div>
              <div class="form-group">
                        <label for="usr_username" class="col-sm-2 control-label text-left">Username</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_username" name="usr_username" placeholder="Username" value="<?php echo $usr_username; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usr_nip" class="col-sm-2 control-label text-left">NIP</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_nip" name="usr_nip" placeholder="Nomor Induk Pegawai" value="<?php echo $usr_nip; ?>">
                             </div>
                    </div>
               <div class="form-group">
                        <label for="usr_no_telp" class="col-sm-2 control-label text-left">Nomor Handphone</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_no_telp" name="usr_no_telp" placeholder="Nomor Handphone" value="<?php echo $usr_no_telp; ?>">
                        </div>
                    </div>
                 <div class="form-group">
                        <label for="usr_email" class="col-sm-2 control-label text-left">E-mail</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_email" name="usr_email" placeholder="Alamat E-mail" value="<?php echo $usr_email; ?>">
                        </div>
                    </div>       
                    <div class="form-group">
                        <label for="usr_role" class="col-sm-2 control-label text-left">User Level</label>
                        <div class="col-sm-10">
	                   		 <select class="form-control" id="usr_role" name="usr_role">
                            	<?php foreach ($rolelist as $row) {?>
                            	<option value="<?php echo $row->rle_id; ?>" <?php if($row->rle_id == $usr_role){echo "selected";}?>><?php echo $row->rle_role_name; ?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usr_password" class="col-sm-2 control-label text-left">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="usr_password" name="usr_password" placeholder="User Password" value="<?php echo $usr_password; ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konfirm" class="col-sm-2 control-label text-left">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="konfirm" name="konfirm" placeholder="User Password" value="<?php echo $konfirm; ?>">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."user";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="reset" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Reset</button>
                            <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>
</div>