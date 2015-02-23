<?php
	if($mode == 'edit'){
		$id = $dataUnit->utj_id;
		$utj_unit_tujuan = $dataUnit->utj_unit_tujuan;
                
			}
	else{
		
		$utj_unit_tujuan = "";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."UnitTujuan/proses_edit_unit";}else{echo base_url()."UnitTujuan/proses_tambah_unit";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="utj_unit_tujuan" class="col-sm-2 control-label text-left">Unit Tujuan</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="utj_unit_tujuan" name="utj_unit_tujuan" placeholder="Unit Tujuan" value="<?php echo $utj_unit_tujuan; ?>" required>
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