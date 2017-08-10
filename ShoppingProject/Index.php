 <?php 
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
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
	<div class="navbar bg-success navbar-fixed-top "">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<a href="#" class="navbar-brand">Your Store</a>
			</div>
			
			<ul class="nav navbar-nav">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
								
				
			</ul> 
			<ul class="nav navbar-nav navbar-right">
				<li style= "width:300px;left:10px;top:10px;" ><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px"> <button class="btn btn-primary" id="search_btn">Search</button></li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp &nbsp<span class="glyphicon glyphicon-shopping-cart"></span> MyCart <span class="badge">0</span></a>
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
							<div class="panel-body"></div>
							<div class="panel-footer"></div>

						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
								<div class="panel panel-primary">
									<div class="panel-heading">LogIn</div>
									<div class="panel-heading">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" id="password" required/>
										<p><br/></p>
										<a href="#" style="color:white; list-style: none;">Forgot Password?</a>
										<input type="submit" class="btn btn-success"  style="float: right;" id="login" value="LogIn">
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
						</div>
					</ul>
				</li>
				<li><a href="customer_reg.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
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
			<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories<h4></a></li>
					<li><a href="#">Mens Wears</a></li>
					<li><a href="#">Ladies Wears</a></li>
						
				</div>
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brands<h4></a></li>
					<li><a href="#">Categories</a></li>
							
				</div>-->
			</div>
			<div class="col-md-8">
			<div class="row">
					<div class="col-md-12" id="product_msg"></div>
			</div>
				<div class="panel panel-info">
					<div class="panel-heading">Product</div>
						<div class="panel-body">
					 		<div id="get_product"><!--here we get product with jquery Ajax Request--></div>
								<!--<div class="col-md-3">
									<div class="panel panel-info">
										<div class="panel-heading">iPhone 7Plus Gold</div>
											<div class="panel-body">
												<img src="Product_Images/Product_Thumbnail/iphone7plusgold.png"/>
													</div>
								<div class="panel-heading">$.500.00
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button></div>
							</div>
						</div>-->
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