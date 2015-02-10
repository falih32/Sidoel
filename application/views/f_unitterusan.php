<?php
	if($mode == 'edit'){
		
		$utr_nama_unit_trsn = $dataUnit-> utr_nama_unit_trsn;
                
			}
	else{
		
		$utr_nama_unit_trsn = "";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."UnitTerusan/proses_edit_unit";}else{echo base_url()."UnitTerusan/proses_tambah_unit";}?>" class="form-horizontal" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="utr_nama_unit_trsn" class="col-sm-2 control-label text-left">Unit Terusan</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="utr_nama_unit_trsn" name="utr_nama_unit_trsn" placeholder="Unit Terusan" value="<?php echo $utr_nama_unit_trsn; ?>">
                        </div>
                    </div>
              
                    </div>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."UnitTerusan";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="reset" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Reset</button>
                            <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>