<?php
$page = 'xbee';
include('pages/header.php');

if(isset($_GET['address'])){
    $query = "SELECT * FROM device WHERE address = '".$_GET['address']."'";

    if($result = $mysqli->query($query)) {
        if($result->num_rows == 0)
            $xbee_no_device = true;
    }else{
        echo $mysqli->error;
        exit();
    }
}else{
    $query = "SELECT * FROM device";

    if($result = $mysqli->query($query)) {
        if($result->num_rows == 0)
            $xbee_no_device = true;
    }else{
        echo $mysqli->error;
        exit();
    }
}
?>


<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
		
		<div class="span9" id="content">
            <div class="row-fluid">
                <div class="span12">
                    <!-- block -->
                    <?php if($xbee_no_device): ?>
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Relay Status</div>
                            <div class="pull-right"><a href="add-device.php?device=xbee"> <span class="badge badge-success">Add Device</span></a></div>
                        </div>
                        <div class="block-content collapse in">
                            <p>Sorry, no device installed.</p>
                        </div>
                    </div>
                    <?php elseif(isset($_GET['all-device']) || isset($_GET['address'])): ?>
                        <?php while($row = $result->fetch_object()):?>
                            <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Device address <?php echo $row->address; ?></div>
                                <div class="pull-right">
                                    <a href="show-device.php">
                                        <span class="badge badge-success">View Table</span>
                                    </a>
                                    <a href="edit-device.php?id=<?php echo $row->id; ?>">
                                        <span class="badge badge-warning">Edit Device</span>
                                    </a>
                                    <a href="edit-device.php?id=<?php echo $row->id; ?>">
                                        <span class="badge badge-important">Delete Device</span>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="row-fluid">
                                            <div class="span6">
                                            <?php
                                                $relay_name = explode(',', $row->relay_name);
                                                $relay_status = explode(',', $row->relay_status);
                                                $label = [  '',
                                                            'label-success',
                                                            'label-warning',
                                                            'label-important',
                                                            'label-info',
                                                            'label-inverse',
                                                            '',
                                                            'label-success'];

                                                for ($i=0; $i < $row->relay_count; $i++) :
                                            ?>
                                                <div class="chart-bottom-heading" style="margin: 15px;">
                                                    <span class="label <?php echo $label[$i]; ?>"><?php echo $relay_name[$i] ?></span>
                                                    <div address="<?php echo $row->address; ?>"
                                                        relay-id="<?php echo ($i + 1); ?>"
                                                        class="make-switch switch-small button-relay"
                                                        data-on="success" data-off="warning"
                                                        <?php if($relay_status[$i] == 1) echo 'checked'; ?> >
                                                        <input class="relay-checkbox" type="checkbox" >
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <br><br>
                                        <?php if($row->sensor_type == 'power'): ?>
                                            <div id="powerchart" style="height: 340px;"></div>
                                        <?php elseif($row->sensor_type == 'temperature'): ?>
                                            <div node="<?php echo $row->address; ?>" class="temperatureGauge" style="height:340px"></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">List of Registered Devices</div>
                            <div class="pull-right">
                                <a href="show-device.php?all-device=true">
                                    <span class="badge badge-success">View All Devices</span>
                                </a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Device Address</th>
                                  <th>Installed Sensor</th>
                                  <th>Relay Count</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $i = 1; while($row = $result->fetch_object()):?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $row->address; ?></td>
                                  <td><?php echo ucwords($row->sensor_type); ?></td>
                                  <td><?php echo $row->relay_count; ?></td>
                                  <td>
                                      <a href="show-device.php?address=<?php echo $row->address; ?>" class="btn btn-mini btn-warning">
                                        View Device
                                      </a>
                                      <a class="btn btn-mini btn-danger">
                                        Delete Device
                                      </a>
                                  </td>
                                </tr>
                              <?php endwhile; ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <hr>

<?php include('pages/footer.php'); ?>