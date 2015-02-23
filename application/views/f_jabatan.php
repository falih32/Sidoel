<?php
	if($mode == 'edit'){
		$id = $dataUnit->jbt_id;
		$jbt_nama = $dataUnit->jbt_nama;
                
			}
	else{
		
		$jbt_nama = "";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."Jabatan/proses_edit_jabatan";}else{echo base_url()."Jabatan/proses_tambah_jabatan";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jbt_nama" class="col-sm-2 control-label text-left">Jabatan</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="jbt_nama" name="jbt_nama" placeholder="Jabatan" value="<?php echo $jbt_nama; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
              
                    </div>
                
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
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