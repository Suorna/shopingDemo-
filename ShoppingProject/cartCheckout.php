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

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<a href="#" class="navbar-brand">Your Store</a>
			</div>
			
			<ul class="nav navbar-nav">
				<li><a href="Index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>

	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg"><!--Cart Message--></div>
			<div class="col-md-2"></div>
		</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Checkout</div>
						<div class="panel-body">
							<div class="row">
								<b>
							
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2">Product Image</div>
							<div class="col-md-2">Product Price</div>
							<div class="col-md-2">Quantity</div>
							<div class="col-md-2">Total Price</div>
							<div class="col-md-2">Delete/Update</div></b>
						</div>
						<br/>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></a>
								</div>
							</div>
							<div class="col-md-2"><img src="Product_Images/Product_Thumbnail/images.jpg"></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type="text" class="form-control" value="5000" disabled> </div>
							<div class="col-md-2"><input type="text" class="form-control" value="1" disabled></div>
							<div class="col-md-2"><input type="text" class="form-control" value="5000" disabled></div>
						</div>-->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4"><b>total </b>
							</div>
						</div>-->
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>

		</div>
	</div>





</body>
</html>