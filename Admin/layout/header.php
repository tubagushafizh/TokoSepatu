<?php 
include '../conn.php';
session_start();
if(!isset($_SESSION['role'])){
	header('location:../login.php');
}

if ($_SESSION['role'] != 0) {
  header('location:../login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Toko Sepatu</title>
	<link
      class="jsbin"
      href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
      rel="stylesheet"
      type="text/css"
    />
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
    ></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
    ></script>
    <meta charset="utf-8" />
    <title>JS Bin</title>
    <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.css">
	<script  src="../assets/js/jquery.js"></script>
	<script  src="../assets/js/bootstrap.min.js"></script>


</head>
<body>

	<nav class="navbar navbar-default" style="padding: 5px;">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-folder-close"></i> Data Master <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="produk.php">Master Produk</a></li>							
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-retweet"></i> Data Transaksi <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="order.php">Order</a></li>														
							<li><a href="histori_order.php">Histori Transaksi</a></li>
						</ul>
					</li>
					
					<li><a href="index.php">Dashboard</a></li>

				</ul>

				<ul class="nav navbar-nav navbar-right">					

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="../proses/logout.php">Log Out</a></li>
						</ul>
					</li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>