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
	
	</head>

<body >
 
	<div class="navbar bg-success navbar-fixed-top">
		<div class="container-fluid embed-responisve">
			<div class="navbar-header">	
				
				<a href="#" class="navbar-brand text-primary">HamroStore</a>
				
			
			</div>
			
			<ul class="nav navbar-nav">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				
			</ul> 
			
			<ul class="nav navbar-nav navbar-right" >
				<li style= "width:300px;right:20px;top:8px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:8px;right:10px"> <button class="btn btn-info " id="search_btn">Search</button></li>

				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown">&nbsp &nbsp<span class="glyphicon glyphicon-shopping-cart"></span> MyCart <span class="badge">0</span></a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">S.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">S.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer">
								<div class="row" >
								<div class="col-md-3" style="float:right;"><a href="cartCheckout.php"> <input type="submit" class="btn btn-success"  style="float: right;" id="checkout" value="Checkout Cart"></a>
								</div>
								</div>
							</div>

						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
				<?php echo "Hi,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cartCheckout.php" style="text-decoration:none; color: blue;"><span class="glyphicon glyphicon-shopping-cart"> CheckoutCart </span></a></li>
						<li class="divider"></li>
						<li><center><a href="" style="text-decoration:none; color:blue; "><h6>Change Password</h6></a></center></li>
						<li class="divider"></li>
						<li><center><a href="logout.php" style="text-decoration:none; color: blue;"><h6>Logout</h6></a></center></li>
					</ul>
				</li>
				
				</ul>

		</div>
	</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
			<div id="get_category">
			</div><div id="get_brand">
			</div>
			
			</div>
			<div class="col-md-8 ">
			<div class="row">
					<div class="col-md-12" id="product_msg"></div>
			</div>
				<div class="panel panel-info">
					<div class="panel-heading">Product</div>
						<div class="panel-body">
					 		<div id="get_product"><!--here we get product with jquery Ajax Request--></div>
								
					</div>
					<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
						
					</ul>
				</center>
			</div>
		</div>
					<div class="panel-footer">&copy;2017</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	
	</div>
</body>

</html>