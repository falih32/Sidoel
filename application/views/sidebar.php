<?php
$_SESSION['username'] = $this->session->userdata('username'); // Must be already set
$ore = $_SESSION['username'];
?>

<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <h3><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Chat</h3>
            </div>
            <table class="table" id="chat-table">
                <thead>
                    <tr>
                        <th>Chat with</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    

$(document).ready(function() {
	var table = $('#chat-table').DataTable( {
    	"paging": false, 
		"searching":false,  
		"ordering": false, 
		"responsive": false,
		"info": false,
		"scrollX":false,
		"scrollY":350,
		"processing":false, 
		"serverSide": false,
		"ajax":{
			"url":"<?php echo site_url('User/ajaxUserOnline');?>",
			"type":"POST"
		},
		"columns": [
				{ "data": "usr_chat" }
              ]
	} );
});
 
setUsername('<?php echo $this->session->userdata('username'); ?>');
</script>