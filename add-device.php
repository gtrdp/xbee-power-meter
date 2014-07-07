<?php
$page = 'xbee';

include('pages/header.php');

if(isset($_POST['address'])) {
	$address = $_POST['address'];
	$sensor_type = $_POST['sensor_type'];
	$relay_count = $_POST['relay_count'];
	$relay_name = 'Relay 1,Relay 2,Relay 3,Relay 4,Relay 5,Relay 6,Relay 7,Relay 8';
	$relay_status = '0,0,0,0,0,0,0,0';

	$query = "INSERT INTO device (address, sensor_type, relay_count, relay_name, relay_status)".
			" VALUES ('$address', '$sensor_type', $relay_count, '$relay_name', '$relay_status')";
	
	$mysqli = new mysqli($database['server'],
						$database['username'],
						$database['password'],
						$database['database']);
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
		exit();
	}

	$mysqli->query($query);

	$message = '<div class="alert alert-success">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> The device has been successfully added to database.
				</div>';
}
?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
        
        <div class="span9" id="content">
        <?php echo $message; ?>
	        <!-- morris stacked chart -->
	        <div class="row-fluid">
	            <!-- block -->
	            <div class="block">
	                <div class="navbar navbar-inner block-header">
	                    <div class="muted pull-left">Add New XBee Device</div>
	                </div>
	                <div class="block-content collapse in">
	                    <div class="span12">
	                    <legend>Read Me First</legend>
	                    	<div class="alert alert-block">
								<a class="close" data-dismiss="alert" href="#">&times;</a>
								<h4 class="alert-heading">Warning!</h4>
								Please make sure that you have read this information carefully
								before you proceed to further process. Thank you.
							</div>
							<p>Before proceed, please make sure that your device meets these following conditions:
								<ol>
									<li>The device is equipped with a sensor.</li>
									
								</ol>
							</p>
							
	                         <form class="form-horizontal" method="post">
	                            <legend>Add New XBee Device</legend>
	                        
	                        	<input id="deviceType" type="hidden" value="xbee">
	                            <div class="control-group">
	                              <label class="control-label">XBee Address</label>
	                              <div class="controls">
	                                <input name="address" id="address" class="input-xlarge" type="text">
	                                <p class="help-block">Your device address.</p>
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label">Number of Relay</label>
	                              <div class="controls">
	                                <select name="relay_count">
	                                	<option disabled="true" selected value="0">Select number.</option>
	                                	<option value="1">1</option>
	                                	<option value="2">2</option>
	                                	<option value="3">3</option>
	                                	<option value="4">4</option>
	                                	<option value="5">5</option>
	                                	<option value="6">6</option>
	                                	<option value="7">7</option>
	                                	<option value="8">8</option>
	                                </select>
	                                <p class="help-block">Choose desired number of relay.</p>
	                              </div>
	                            </div>
	                        	<div class="control-group">
	                              <label class="control-label">Sensor Type</label>
	                              <div class="controls">
	                                <select name="sensor_type">
	                                	<option disabled="true" selected value="0">Select sensor.</option>
	                                	<option value="temperature">Temperature</option>
	                                	<option value="power">Power usage</option>
	                                </select>
	                                <p class="help-block">Choose appropriate sensor.</p>
	                              </div>
	                            </div>
	                        
	                            <div class="form-actions">
	                              <button id="buttonSubmit" class="btn btn-primary">Add This Device</button>
	                              <button type="reset" class="btn">Cancel</button>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <!-- /block -->
	        </div>
	    </div>
    </div>
    <hr>

<?php include('pages/footer.php');?>