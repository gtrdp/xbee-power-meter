<?php
session_start();

if($_SESSION['username'] == '')
    header('Location: index.php');
include_once 'script/mysql.php';
?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Dashboard</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- Bootstrap-Switch -->
        <link href="bootstrap/css/bootstrap-switch.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <!-- Morris CSS -->
        <link rel="stylesheet" href="vendors/morris.css">

        <link rel="shortcut icon" href="bootstrap/img/ico-wifi.png">
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="dashboard.php">XBee</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $_SESSION['username']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li <?php if($page == 'dashboard') echo "class=\"active\"";?>>
                                <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="dropdown <?php if($page == 'xbee') echo "active";?>">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">XBee Network <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="show-device.php">View Devices</a>
                                    </li>
                                    <li>
                                        <a href="add-device.php">Add New Device</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown <?php if($page == 'user') echo "active";?>">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">User Management <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="show-user.php">View User</a>
                                    </li>
                                    <li>
                                        <a href="add-user.php">Add New User</a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($page == 'about') echo "class=\"active\"";?>>
                                <a href="about.php">About</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>