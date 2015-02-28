<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</h3>
            </div>
            <div class="panel-body text-center">
            	<div class="col-md-12"><h3>Grafik Surat Masuk dan Disposisi</h3></div>
            	<div class="col-md-10" id="conchart"> 
                    <script>
                    var width = document.getElementById('conchart').offsetWidth;
                    var height = width;
                    if(height > 350){height = 350};
                    document.write("<canvas id='chart1' width='"+width+"' height='"+height+"'></canvas>")
                    </script>
                </div>
                <div class="col-md-2" id="chart-legend"></div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">

$(document).ready(function() {
	
	
	// Get context with jQuery - using jQuery's .get() method.
	var data = <?php echo json_encode($info); ?>;
	var canvas1 = document.getElementById("chart1").getContext("2d");
	var chart1 = new Chart(canvas1).Bar(data,'');
	//legend(document.getElementById('chart-legend'), data)
	document.getElementById('chart-legend').innerHTML = chart1.generateLegend();
	// This will get the first returned node in the jQuery collection.
	//$.getJSON('<?php echo site_url('Dashboard/getJson');?>', function(data){
//		legend(document.getElementById('chart-legend'), data);
//		var chart1 = new Chart(canvas1).Bar(data,'');
//	});
});
</script>