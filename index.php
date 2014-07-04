<?php
session_start();
include 'script/mysql.php';

if($_SESSION['username'] != ''){
  header('Location: dashboard.php');
}elseif (isset($_POST['username']) && isset($_POST['password'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);

  $result = $mysqli->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

  $result->store_result();
  if($result->num_rows > 0){
    $_SESSION['username'] = $username;

    header('Location: dashboard.php');
  }else{
    $error = '<div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> Username atau password salah.
              </div>';
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" action="dashboard.php" method="post">
        <h2 class="form-signin-heading">Please Log in</h2>
        <?php if(isset($error)) echo $error;?>
        <input type="text" name="username"
          class="input-block-level" placeholder="Username" value="<?php if(isset($username)) echo $username; ?>">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Log in</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>