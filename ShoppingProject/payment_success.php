<?php

include "db.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:Index.php");
	
}

?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Your Store </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="main.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style>
		table tr td {padding:10px;}
	</style>
	</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<a href="#" class="navbar-brand">Your Store</a>
			</div>
			
			<ul class="nav navbar-nav">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul> 
			
		</div>
	</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"></div>
			<div class="panel-body">
				<h1>Thank You</h1>
				<hr/>
				<p>Hello <?php echo $_SESSION["name"]; ?>, Your payment process is completed and your Transaction id is XXXX-XXX-XXXX<br/>you can continue your shopping</p>
				<a href="Index.php" class="btn btn-success btn-lg"> Continue Shopping</a>
			</div>
			<div class="panel-footer"></div>
		</div>	
	</div>
	<div class="col-md-2"></div>
</div>
</div>
	
</body>

</html>