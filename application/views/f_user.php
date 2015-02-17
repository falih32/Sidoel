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
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."user/proses_editUser";}else{echo base_url()."user/proses_addUser";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="usr_nama" class="col-sm-2 control-label text-left">Nama</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_nama" name="usr_nama" placeholder="Nama" value="<?php echo $usr_nama; ?>" required data-minlength="3" pattern="^[a-zA-Z\s]*$">
                            <p class="help-block">Minimal 3 karakter, hanya huruf dan spasi</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
              <div class="form-group">
                        <label for="usr_username" class="col-sm-2 control-label text-left">Username</label>
                        <div class="col-sm-10">
                        	<?php if($mode == "add"){?>
	                        <input type="text" class="form-control" id="usr_username" name="usr_username" placeholder="Username" value="<?php echo $usr_username; ?>" required data-minlength="5" pattern="^[a-zA-Z0-9]*$">
                            <p class="help-block">Minimal 5 karakter, hanya huruf dan angka</p>
                            <div class="help-block with-errors"></div>
                            <?php } else {?>
                            <input type="hidden" id="usr_username" name="usr_username" value="<?php echo $usr_username; ?>">
                            <p class="form-control-static"><?php echo $usr_username; ?></p>
                            <?php }?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usr_nip" class="col-sm-2 control-label text-left">NIP</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_nip" name="usr_nip" placeholder="Nomor Induk Pegawai" value="<?php echo $usr_nip; ?>" pattern="^[0-9]*$">
                            <p class="help-block">Hanya angka</p>
                            <div class="help-block with-errors"></div>
                             </div>
                    </div>
               <div class="form-group">
                        <label for="usr_no_telp" class="col-sm-2 control-label text-left">Nomor Handphone</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_no_telp" name="usr_no_telp" placeholder="Nomor Handphone" value="<?php echo $usr_no_telp; ?>" pattern="^[0-9]*$" required data-minlength="10">
                            <p class="help-block">Hanya angka</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                 <div class="form-group">
                        <label for="usr_email" class="col-sm-2 control-label text-left">E-mail</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_email" name="usr_email" placeholder="Alamat E-mail" value="<?php echo $usr_email; ?>"required pattern="^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$">
                            <p class="help-block">Alamat email harus valid</p>
                            <div class="help-block with-errors"></div>
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
                        <label for="usr_password" class="col-sm-2 control-label text-left"><?php if($mode == "edit"){echo "Konfirmasi ";}?>Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="usr_password" name="usr_password" placeholder="User Password" value="<?php echo $usr_password; ?>" required data-minlength="5">
                            <p class="help-block">Minimal 5 karakter</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <?php if($mode == "add"){?>
                    <div class="form-group">
                        <label for="konfirm" class="col-sm-2 control-label text-left">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="konfirm" name="konfirm" placeholder="User Password" value="<?php echo $konfirm; ?>" required data-match="#usr_password">
                            <p class="help-block">Ketik ulang password</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <?php } ?>
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