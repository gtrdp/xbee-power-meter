<?php
$page = 'user';
include('pages/header.php');

if(isset($_GET['delete'])){
    if(!$mysqli->query("DELETE FROM user WHERE id = " . $_GET['delete'])){
        echo $mysqli->error;
        exit();
    }

    $message = '<div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Success!</strong> The user has been successfully deleted from database.
                </div>';
}

$query = "SELECT * FROM user";

if($result = $mysqli->query($query)) {
}else{
    echo $mysqli->error;
    exit();
}
?>


<div class="container-fluid">
    <div class="row-fluid">
        <?php include('pages/sidebar.php'); ?>
		
		<div class="span9" id="content">
        <?php echo $message; ?>
            <div class="row-fluid">
                <div class="span12">
                    <!-- block -->
                        <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">List of Users</div>
                            <div class="pull-right">
                                <a href="add-user.php">
                                    <span class="badge badge-info">Add New User</span>
                                </a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>username</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $i = 1; while($row = $result->fetch_object()):?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $row->username; ?></td>
                                  <td>
                                      <a href="add-user.php?id=<?php echo $row->id; ?>" class="btn btn-mini btn-info">
                                        Edit User
                                      </a>
                                      <a class="btn btn-mini btn-danger"
                                        onclick="confirmDelete(<?php echo $row->id; ?>)">
                                        Delete User
                                      </a>
                                  </td>
                                </tr>
                              <?php endwhile; ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function confirmDelete(id) {
        console.log('click');
        if(confirm('Are you sure?')){
            window.location.href='show-user.php?delete=' + id;
        }
    }
</script>


<?php include('pages/footer.php'); ?>