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
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<h1>Customer Order Details</h1>
				<hr/>
				<div class="row">
					<div class="col-md-6">
						<img  style="float:right; " src="Product_Images\Product_Thumbnail\tn_Basketball.JPG" class="img-thumbnail"/>

					</div>
					<div class="col-md-6">
						<table>
							<tr>
								<td>Product Name</td>
								<td><b>Sony Camera</b></td>
							</tr>
							<tr>
								<td>Product Price</td>
								<td><b>$500</b></td>
							</tr>
							<tr>
								<td>Quantity</td>
								<td><b>3</b></td>
							</tr>
							<tr>
								<td>Payment</td>
								<td><b>Completed </b></td>
							</tr>
							<tr>
								<td>Transaction Id</td>
								<td><b>RTHSH415SHSHYD87D25S</b></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="panel-footer"></div>
		</div>	
	</div>
	<div class="col-md-2"></div>
</div>
</div>
	
</body>

</html>