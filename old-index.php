<?php
// connect to DB
mysql_connect('localhost', 'root', 'root');
mysql_select_db('xbee_power');

$query = "SELECT * FROM history ORDER BY id DESC LIMIT 0, 20";
$result = mysql_query($query);

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
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap3/css/dashboard.css" rel="stylesheet">

    <!-- Morris CSS -->
    <link rel="stylesheet" href="bootstrap3/css/morris.css">

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
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="send-char.php">Send Char</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <h2 class="sub-header">Chart for Address ...</h2>
          <div id="powerchart" style="height: 250px;"></div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap3/js/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
  	<script src="bootstrap3/js/raphael-min.js"></script>
  	<script src="bootstrap3/js/morris.min.js"></script>

  	<script type="text/javascript">
  		var graph = Morris.Line({
  		  // ID of the element in which to draw the chart.
  		  element: 'powerchart',
  		  // Chart data records -- each entry in this array corresponds to a point on
  		  // the chart.
  		  data: [
        <?php while($row = mysql_fetch_object($result)): ?>
  		    { time: '<?php echo $row->datetime; ?>', watt: <?php echo $row->watt; ?>, energy: <?php echo $row->energy; ?>},
        <?php endwhile; ?>
  		  ],
  		  // The name of the data record attribute that contains x-values.
  		  xkey: 'time',
  		  // A list of names of data record attributes that contain y-values.
  		  ykeys: ['watt', 'energy'],
  		  // Labels for the ykeys -- will be displayed when you hover over the
  		  // chart.
  		  labels: ['Power (Watt)', 'Energy'],

        lineColors: ['#00991A', '#FFB114']
  		});

      // function to update the graph
      function update() {
        $.getJSON('http://localhost/~gtrdp/xbee-power-meter/ajax.php', function(data){
          graph.setData(data);
        });
      }

      // set interval for every 1 second
      setInterval(update, 1000);
  	</script>
  </body>
</html>
