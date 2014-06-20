<?php
$page = 'xbee';
include('pages/header.php');
include('script/db.php');
?>


<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
		
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
                            <div class="muted pull-left">XBee Control Panel</div>
                            <div class="pull-right"><a href="show-device.php"> <span class="badge badge-warning">View More</span></a></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-success">Relay 1</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="1" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-info">Relay 2</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="2" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" <?php echo $checked2; ?> >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-info">Relay 2</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="2" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" <?php echo $checked2; ?> >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-info">Relay 2</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="2" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" <?php echo $checked2; ?> >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <br>
                                    <div node="<?php echo $node_address; ?>" class="temperatureGauge" style="height:340px"></div>
                                </div>
                            
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>



            <div class="row-fluid">
                <div class="span12">
                    <!-- block -->
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
                            <div class="muted pull-left">XBee Control Panel</div>
                            <div class="pull-right"><a href="show-device.php"> <span class="badge badge-warning">View More</span></a></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-success">Relay 1</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="1" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-info">Relay 2</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="2" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" <?php echo $checked2; ?> >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-info">Relay 2</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="2" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" <?php echo $checked2; ?> >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="chart chart-relay" data-percent="0">
                                                <span class="status-relay">OFF</span>
                                            </div>
                                            <div class="chart-bottom-heading">
                                                <span class="label label-info">Relay 2</span><br><br>
                                                <div atmy="<?php echo $atmy; ?>" relay-id="2" class="make-switch switch-small button-relay" data-on="success" data-off="warning">
                                                    <input class="relay-checkbox" type="checkbox" <?php echo $checked2; ?> >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <br><br>
                                    <div id="powerchart" style="height: 340px;"></div>
                                </div>
                            
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <hr>

<?php include('pages/footer.php'); ?>