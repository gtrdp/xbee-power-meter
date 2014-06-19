<?php
$page = 'xbee';

include('pages/header.php');
?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
        
        <div class="span9" id="content">
        <?php echo $message; ?>
        	<div class="row-fluid">
            	<div class="navbar">
                	<div class="navbar-inner">
                        <ul class="breadcrumb">
                            <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                            <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                            <li>
                                <a href="add-device.php?<?php echo $_GET['device']; ?>">
                                	Add New <?php echo strtoupper($_GET['device']);?> Device
                                </a>
                            </li>
                        </ul>
                	</div>
            	</div>
            </div>
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
							
	                         <form class="form-horizontal" onsubmit="return startSpin();">
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
	                              <label class="control-label">Sensor Type</label>
	                              <div class="controls">
	                                <select name="sensor">
	                                	<option disabled="true" selected value="0">Select sensor.</option>
	                                	<option value="1">Temperature</option>
	                                	<option value="2">Power usage</option>
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

<?php include('pages/footer.php'); ?>