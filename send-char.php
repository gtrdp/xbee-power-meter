<?php
if(isset($_POST['device-address']) && isset($_POST['char'])) {
  
  $device_address = $_POST['device-address'];
  $char = $_POST['char'];

  if(strlen($device_address) < 8) {
    $alert = '<div class="alert alert-danger">Wrong address! Address must be 8 hexadecimals!</div>';
  }else{
    $foo = shell_exec('python send-char.py '.$device_address.' '.$char);
    $alert = '<div class="alert alert-success">'.$foo.'</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Morris CSS -->
    <link rel="stylesheet" href="css/morris.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">XBee Power Meter</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Dashboard</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active"><a href="send-char.php">Send Char</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Send Character</h1>

          <?php if(isset($alert)) echo $alert; ?>

          <form id="send-char-form" class="form-horizontal" role="form" method="post">
            <div class="form-group">
              <label for="device-address" class="col-sm-2 control-label">Address</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="device-address"
                  placeholder="eg. 409f40e8"
                  name="device-address"
                  value="<?php if(isset($device_address)) echo $device_address;?>"
                >
              </div>
            </div>
            <div class="form-group">
              <label for="char" class="col-sm-2 control-label">Character (s)</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="char" name="char"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Send!</button>
              </div>
            </div>
          </form>  
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  	<script src="js/raphael-min.js"></script>
  	<script src="js/morris.min.js"></script>

  	<script type="text/javascript">
  		
  	</script>
  </body>
</html>
