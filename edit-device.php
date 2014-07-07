<?php
$page = 'xbee';

if(!isset($_GET['address'])){
	header('Location: show-device.php');
}

include('pages/header.php');

if(isset($_POST['address'])) {
	$address = $_POST['address'];
	$sensor_type = $_POST['sensor_type'];
	$relay_count = $_POST['relay_count'];
	$relay_name = '';
	foreach ($_POST['status'] as $key => $value) {
		$relay_name .= $value . ',';
	}

	$query = "UPDATE device SET sensor_type = '$sensor_type', relay_count = $relay_count, relay_name = '$relay_name' WHERE address = '$address'";

	if(!$mysqli->query($query)){
		echo $mysqli->error;
		exit();
	}

	$message = '<div class="alert alert-success">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> The device has been successfully edited.
				</div>';
}

$result = $mysqli->query("SELECT * FROM device WHERE address='" . $_GET['address'] . "'");
$row = $result->fetch_object();

$relay_status = explode(',', $row->relay_name);

$mysqli->close();
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
	                    <div class="muted pull-left">Edit XBee Device</div>
	                </div>
	                <div class="block-content collapse in">
	                    <div class="span12">
	                         <form class="form-horizontal" method="post">
	                            <legend>Edit XBee Device</legend>
	                            <div class="control-group">
	                              <label class="control-label">XBee Address</label>
	                              <div class="controls">
	                                <input value="<?php echo $row->address; ?>" class="input-xlarge" type="text" disabled>
	                                <input value="<?php echo $row->address; ?>" class="input-xlarge" type="hidden" name="address">
	                                <p class="help-block">Your device address.</p>
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label">Sensor Type</label>
	                              <div class="controls">
	                                <select name="sensor_type">
	                                	<option disabled="true" value="0">Select sensor.</option>
	                                	<option value="temperature" <?php if($row->sensor_type == 'temperature') echo 'selected'; ?>>Temperature</option>
	                                	<option value="power" <?php if($row->sensor_type == 'power') echo 'selected'; ?>>Power usage</option>
	                                </select>
	                                <p class="help-block">Choose appropriate sensor.</p>
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label">Number of Relay</label>
	                              <div class="controls">
	                                <select name="relay_count">
	                                	<option disabled="true" selected value="0">Select number.</option>
	                                	<option value="1" <?php if($row->relay_count == 1) echo 'selected'; ?>>1</option>
	                                	<option value="2" <?php if($row->relay_count == 2) echo 'selected'; ?>>2</option>
	                                	<option value="3" <?php if($row->relay_count == 3) echo 'selected'; ?>>3</option>
	                                	<option value="4" <?php if($row->relay_count == 4) echo 'selected'; ?>>4</option>
	                                	<option value="5" <?php if($row->relay_count == 5) echo 'selected'; ?>>5</option>
	                                	<option value="6" <?php if($row->relay_count == 6) echo 'selected'; ?>>6</option>
	                                	<option value="7" <?php if($row->relay_count == 7) echo 'selected'; ?>>7</option>
	                                	<option value="8" <?php if($row->relay_count == 8) echo 'selected'; ?>>8</option>
	                                </select>
	                                <p class="help-block">Choose desired number of relay.</p>
	                              </div>
	                            </div>
	                        	<div class="control-group">
	                              <label class="control-label">Relay Name</label>
	                              <div class="controls">
	                              <?php for($i = 0; $i < $row->relay_count; $i++): ?>
	                              	<input value="<?php echo $relay_status[$i]; ?>" name="status[]" class="input-xlarge" type="text" style="margin-bottom: 5px;"><br>
	                              <?php endfor; ?>
	                              </div>
	                            </div>
	                        
	                            <div class="form-actions">
	                              <button id="buttonSubmit" class="btn btn-primary">Edit This Device</button>
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