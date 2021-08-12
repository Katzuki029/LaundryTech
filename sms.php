<?php
include('db_connect.php');
//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}
//##########################################################################

    if($_POST)
    {
        $number = $_POST['number'];
        $name = $_POST['name'];
        $message = $_POST['msg'];
        $api = "TR-LAUND912642_M4F7S";
        $apiPass = "fu@w!741{%";
        $text = $name.":".$message;

        
        // if(!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['msg']))
        // {
        // $result = itexmo($number,$text,$api, $apiPass);
        // if ($result == ""){
        // echo "iTexMo: No response from server!!!
        // Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        // Please CONTACT US for help. ";	
        // }else if ($result == 0){
        // echo "Message Sent!";
        // }
        // else{	
        // echo "Error Num ". $result . " was encountered!";
        // }
        // }
    }
?>
<sdiv class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
								<!-- <input type="text" name="search" style="margin-left:700px;"> 
								<button class="btn btn-primary">Search</button> -->
							<!-- table for contacts -->
							<div class="card-header">
								<h4><b>Contacts</b></h4>
							</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<table id="table_id" class="display">
											<thead>
												<tr>
													<th class="text-center">#</th>
													<th class="text-center">Name</th>
													<th class="text-center">contact</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$i = 1;
												$contacts = $conn->query("SELECT * FROM laundry_list order by id asc");
												while($row=$contacts->fetch_assoc()):
												?>
												<tr>
														<td class="text-center"><?php echo $i++?></td>
														<td class="text-center"><?php echo $row['customer_name']?></td>
														<td class="text-center"><?php echo $row['contact']?></td>
													</tr>
												<?php endwhile;?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Table Panel -->
					</div>
				</div>
			</div>
			
						<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" method="post">
				<div class="card">
							<div class="card-header">
								<h4><b>New Message</b></h4>
							</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Name: </label>
								<input type="text" maxlenght="10" class="form-control" id="name" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Number: </label>
								<input type="text" maxlenght="11" class="form-control" id="number" name="number" required>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="msg" rows="3" placeholder="Message here." onkeyup="countChar(this)" required></textarea>
							</div>
							<p class="text-lect" id="charNum">100</p>
							<?php 
							
								// echo "<p> Message Sent! </p>";
								if(!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['msg']))
								{
								$result = itexmo($number,$text,$api, $apiPass);
								if ($result == ""){
								echo " <p> iTexMo: No response from server!!!
								Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
								Please CONTACT US for help. </p>";	
								}else if ($result == 0){
								echo "<p> Message Sent! </p>";
								}
								else{	
								echo "<p> Error Num ". $result . " was encountered! </p>";
								}
								}
							
							?>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-lg btn-block">Send Message</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->
			</div>
	</div>	
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        function countChar(val)
        {
            var len = val.value.length;
            if(len>=100)
            {
                val.value = val.value.substring(0,100);
            }
            else
            {
                $('#charNum').text(100 - len);
            }
        };
		$(document).ready(function() 
        {
            $('#table_id').DataTable();
        } );
    </script>
  </body>
</html>
s