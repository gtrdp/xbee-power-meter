<?php
$page = 'profile';
include('pages/header.php');
?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
		
		<div class="span9" id="content">
        <?php echo $message; ?>
			<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">List of Profiles</div>
                                <div class="pull-right"><a href="<?php echo $ribbon['href']; ?>"> <span class="badge badge-success"><?php echo $ribbon['name']; ?></span></a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Profile Name</th>
                                                <th colspan="3">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>First Profile</td>
                                                <td><button class="btn btn-mini" type="button" onclick="location.href='edit-user.php?id=<?php echo $value[1]; ?>'">Edit</button></td>
                                                <td><button class="btn btn-mini btn-danger" type="button" onclick="confirmation(<?php echo $value[1]; ?>)">Delete</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
        </div>

    </div>
</div>
</div>
    <hr>

<?php include('pages/footer.php'); ?>