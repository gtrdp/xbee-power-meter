<?php
$page = 'dashboard';
include('pages/header.php');
?> 


<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
        
        <!--/span-->
        <div class="span9" id="content">
            <div class="row-fluid">
                <div class="span12">
                    <div class="block">

                        <?php if($xbee_no_device): ?>
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Relay Status</div>
                            <div class="pull-right"><a href="add-device.php?device=xbee"> <span class="badge badge-success">Add Device</span></a></div>
                        </div>
                        <div class="block-content collapse in">
                            <p>Sorry, no device installed.</p>
                        </div>
                        <?php else: ?>

                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Dashboard</div>
                            <div class="pull-right"><a href="show-device.php"> <span class="badge badge-warning">View More Device</span></a></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="hero-unit">
                              <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
                              <p>To start click this button below.</p>
                              <p>
                                <a class="btn btn-success btn-large" href="add-device.php">
                                  Add new device
                                </a>
                                <a class="btn btn-warning btn-large" href="show-device.php">
                                  View device
                                </a>
                              </p>
                            </div>                            
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php include('pages/footer.php'); ?>