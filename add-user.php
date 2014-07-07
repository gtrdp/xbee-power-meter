<?php
$page = 'user';

include('pages/header.php');

if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "INSERT INTO user (username, password) VALUES ('$username', MD5('$password'))";

	if(!$mysqli->query($query)){
		echo $mysqli->error;
	}
	$mysqli->close();

	$message = '<div class="alert alert-success alert-block">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> The user has been successfully added to database.
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
	                    <div class="muted pull-left">Add New User</div>
	                </div>
	                <div class="block-content collapse in">
	                    <div class="span12">
	                         <form class="form-horizontal" method="post">
	                            <legend>Add New User</legend>
	                        
	                        	<input id="deviceType" type="hidden" value="xbee">
	                            <div class="control-group">
	                              <label class="control-label">Username</label>
	                              <div class="controls">
	                                <input name="username" id="username" class="input-xlarge" type="text">
	                                <p class="help-block">Your username.</p>
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label">Password</label>
	                              <div class="controls">
	                                <input name="password" class="input-xlarge" type="password">
	                                <p class="help-block">Your password.</p>
	                              </div>
	                            </div>
	                        
	                            <div class="form-actions">
	                              <button id="buttonSubmit" class="btn btn-primary">Add This User</button>
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