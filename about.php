<?php
session_start();
if (!isset($_SESSION['username'])) header('Location: index.php');

$page = 'about';
include('pages/header.php');
?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
        
        <div class="span9" id="content">
	        <!-- morris stacked chart -->
	        <div class="row-fluid">
	            <!-- block -->
	            <div class="block">
	                <div class="navbar navbar-inner block-header">
	                    <div class="muted pull-left">About</div>
	                </div>
	                <div class="block-content collapse in">
	                    <div class="span12">
	                    	<h1>XBee Dashboard</h1>
	                    	<hr>
	                    	<p>A dashboard for monitoring xbee devices.</p>
	                    </div>
	                </div>
	            </div>
	            <!-- /block -->
	        </div>
	    </div>
    </div>
    <hr>

<?php include('pages/footer.php'); ?>